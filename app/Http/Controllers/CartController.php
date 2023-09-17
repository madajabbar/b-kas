<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product;
use Carbon\Carbon;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Str;


class CartController extends Controller
{
    public function index(){
        $data['carts'] = Cart::where('user_id',Auth::user()->id)->get();
        foreach($data['carts'] as $query) {
            if($query->amount == 0){
                Cart::find($query->id)->delete();
            }
        }
        $data['carts'] = Cart::where('user_id',Auth::user()->id)->where('status','waiting')->get()->groupBy(function($query){
            return $query->product->user->name;
        });
        $data['total'] = Cart::where('user_id',Auth::user()->id)->get();
        return view('frontend.pages.cart.index',$data);
    }
    public function cart(Request $request){
        $data = Cart::where('user_id',Auth::user()->id)->query()->with(['product','product.user']);
        return DataTables::of($data);
    }
    public function delete(Request $request){
        $data = Cart::find($request->id)->delete();
        return redirect()->back();
    }
    public function update(Request $request){
        $request->validate(
            [
                'cart_id' => 'required',
                'amount' => 'required',
            ]
        );
        $cart = Cart::find($request->cart_id);
        $product = Product::find($cart->product_id);
        if ($request->amount >= $product->quantity){
            return response()->json(['error' => $request->amount-1,'id'=>$request->cart_id],403);
        }
        $cart->price = $product->price;
        $cart->discount = $product->discount;
        $cart->amount = $request->amount;
        $cart->total_payment = ($cart->price * $request->amount) - ($cart->discount * $request->amount);
        $cart->save();
        return response()->json(['total_payment'=>$cart->total_payment,'id'=>$request->cart_id,'amount'=>$request->amount]);
    }
    public function checkout(Request $request){
        $request->validate(
            [
                'cart_id' => 'required'
            ]
        );
        $total_payment = 0;
        $order = Order::create(
            [
                'order_id' => 'Order-'. Carbon::now()->format('Ymdhis').'-'.Auth::user()->ulid,
                'total_payment' => $total_payment,
                'payment_type' => 'iPaymu',
                'shipping_fee' => 0,
                'shipping_service' => '',
                'shipping_code' => '',
                'shipping_description' => '',
                'user_id' => Auth::user()->id,
            ]
        );
        foreach($request->cart_id as $cart){
            $cart = Cart::find($cart);
            $product = Product::find($cart->product_id);
            if($product->quantity >= $cart->amount){
                $cart->status = 'checkout';
                $cart->save();
                $total_payment += $cart->total_payment;
                OrderDetail::create(
                    [
                        'cart_id' => $cart->id,
                        'order_id' => $order->id,
                    ]
                );
            }
        }
        $order->total_payment = $total_payment;
        $order->save();
        return redirect(route('checkout.index'));
        // return $carts;
    }
    public function store(Request $request){
        $request->validate(
            [
                'product_id' => 'required',
                'amount' => 'required',
            ]
        );

        $product = Product::find($request->product_id);

        if ($request->amount >= $product->quantity){
            return response()->json(['error' =>'Stock not enough'],403);
        }
        $cart = Cart::where('product_id', $request->product_id)->where('user_id', Auth::user()->id)->first();
        if(isset($cart)){
            $cart->amount = $cart->amount + $request->amount;
            $cart->total_payment = $cart->total_payment + (($cart->price * $request->amount) - ($cart->discount * $request->amount));
            $cart->save();
            return response()->json(['success' =>'Add more this product']);
        }
        else{
            Cart::create(
                [
                    'product_id' => $product->id,
                    'user_id' => Auth::user()->id,
                    'total_payment' => ($product->price * $request->amount) - ($product->discount * $request->amount),
                    'price' => $product->price,
                    'discount' => $product->discount,
                    'status' => 'waiting',
                    'amount' => $request->amount,
                ]
            );
            return response()->json(['success' =>'Success add to cart']);
        }
    }
}
