<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use Exception;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use iPaymu\iPaymu;

class CheckoutController extends Controller
{
    public function index()
    {
        // $data['order'] = Order::whereIn('cart_id', Cart::where('user_id',Auth::user()->id)->where('status','checkout')->pluck('id'))->where('status','pending')->get();
        $data['carts'] = Cart::where('user_id', Auth::user()->id)->where('status', 'checkout')->get()->groupBy(function ($query) {
            return $query->product->user->name;
        });
        $data['orders'] = Order::where('user_id', Auth::user()->id)->where('status', 'pending')->get()->groupBy(function ($query) {
            return $query->orderDetail[0]->cart->product->user->name;
        });
        // return $data['orders'];
        return view('frontend.pages.checkout.index', $data);
    }

    public function rajaongkir(Request $request)
    {
        $client = new Client();
        $response = $client->request('POST', 'https://api.rajaongkir.com/starter/cost', [
            'headers' => [
                'key' => env('RAJAONGKIR_API_KEY'), // Replace with your RajaOngkir API key
            ],
            'form_params' => [
                'origin' => $request->user_city, // City ID for the origin city
                'destination' => $request->cart_city, // City ID for the destination city
                'weight' => 1, // Weight in grams
                'courier' => $request->courier, // Specify the courier service (e.g., jne, tiki, pos)
            ],
        ]);
        $order = Order::find($request->order_id);
        $ongkir = json_decode($response->getBody(), true);
        $order->shipping_code = $ongkir['rajaongkir']['results'][0]['costs'][0]['service'];
        $order->shipping_description = $ongkir['rajaongkir']['results'][0]['costs'][0]['description'];
        $order->shipping_fee = $ongkir['rajaongkir']['results'][0]['costs'][0]['cost'][0]['value'];
        $order->total_payment = $order->total_payment + $order->shipping_fee;
        $order->save();
        return response()->json(['ongkir' => $order, 'id' => $request->order_id]);
    }
    public function checkout(Request $request)
    {
        $order = Order::find($request->order_id);
        $order->status = 'waiting';
        $order->save();


        $apiKey = 'SANDBOXD93DA5FA-91EA-4800-9FFD-57B8745FBD5F';
        $va = '0000009512301910';
        // $production = true;


        // $apiKey = 'api-key';
        // $va = 'va';
        $production = false;

        $ipaymu = new iPaymu($apiKey, $va, $production);

        $ipaymu->setURL([
            'ureturn' => 'https://your-website/thankyou_page',
            'unotify' => 'https://your-website/notify_page',
            'ucancel' => 'https://your-website/cancel_page',
        ]);

        // // set buyer name
        $ipaymu->setBuyer([
            'name' => $order->user->name,
            'email' => $order->user->email,
            'phone' => '08',
        ]);

        // $ipaymu->setReferenceId($order->order_id);
        $ipaymu->setComments('Pembayaran Item di BKAS');
        // // set your expiredPayment


        // // set payment method
        // // check https://ipaymu.com/api-collection for list payment method
        // $iPaymu->setPaymentMethod('va');

        // // check https://ipaymu.com/api-collection for list payment channel
        // $iPaymu->setPaymentChannel('bca');

        // $iPaymu->setExpired(15, 'minutes'); // 24 hours
        // return $order->orderDetail;
        $product = array();
        $price = array();
        $quantity = array();
        $description = array();
        foreach ($order->orderDetail as $orderDetail){
            array_push($product, $orderDetail->cart->product->name);
            array_push($price, $orderDetail->cart->total_payment);
            array_push($quantity, $orderDetail->cart->amount);
            array_push($description, 'pembayaran'.$orderDetail->cart->product->name);
        }
        array_push($product, $order->shipping_code);
        array_push($price, $order->shipping_fee);
        array_push($quantity, 1);
        array_push($description, 'pembayaran'.$order->shipping_description);

        $ipaymu->addCart(
            [
                'product' => $product,
                'price' => $price,
                'quantity' =>$quantity,
                'referenceId' => 10101011,
                'description' => $description,
            ]
        );
        $data = [
            'referenceId' => $order->order_id,
        ];
        $order->payment_link = $ipaymu->redirectPayment($data)['Data']['Url'];
        $order->save();

        return redirect($order->payment_link);
    }

    public function ipaymu(Request $request){
        $request->validate(
            [
                'reference_id' => 'required',
            ]
        );
        $order = Order::where('order_id', $request->reference_id)->first();
        if($request->status_code == 1){
            $order->status = 'success';
        }
        else if($request->status_code == -2){
            $order->status = 'failed';
        }
        $order->save();
    }
}
