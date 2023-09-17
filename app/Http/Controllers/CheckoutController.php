<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    public function index(){
        // $data['order'] = Order::whereIn('cart_id', Cart::where('user_id',Auth::user()->id)->where('status','checkout')->pluck('id'))->where('status','pending')->get();
        $data['carts'] = Cart::where('user_id', Auth::user()->id)->where('status','checkout')->get()->groupBy(function($query){
            return $query->product->user->name;
        });
        $data['orders'] = Order::where('user_id', Auth::user()->id)->where('status','pending')->get()->groupBy(function($query){
            return $query->orderDetail[0]->cart->product->user->name;
        });
        // return $data['orders'];
        return view('frontend.pages.checkout.index',$data);
    }

    public function rajaongkir(Request $request){
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
        return response()->json(['ongkir' => $order,'id'=> $request->order_id]);
    }
    public function checkout(Request $request){
        $order = Order::find($request->order_id);
    }
}
