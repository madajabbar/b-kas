<?php
namespace App\Http\Traits;
use App\Models\Cart;
use App\Models\Category;
use App\Models\Condition;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Support\Str;
trait CreateTrait{
    public function createCategory($request){
        $data = Category::updateOrCreate(
            [
                'id' => $request->id,
            ],
            [
                'name' => $request->name,
                'slug' => Str::slug($request->name),
                'description' => $request->description
            ]
        );
        return $data;
    }
    public function createCondition($request){
        $data = Condition::updateOrCreate(
            [
                'id' => $request->id,
            ],
            [
                'name' => $request->name,
                'slug' => Str::slug($request->name),
            ]
        );
        return $data;
    }
    public function createOrder($request){
        $data = Order::updateOrCreate(
            [
                'id' => $request->id,
            ],
            [
                'total_payment' => $request->total_payment,
                'status' => $request->status,
                'payment_type' => $request->payment_type,
                'cart_id' => $request->cart_id,
            ]
        );
        return $data;
    }
    public function createCart($request){
        $data = Cart::updateOrCreate(
            [
                'id' => $request->id,
            ],
            [
                'product_id' => $request->product_id,
                'user_id' => $request->user_id,
                'total_payment' => $request->total_payment,
                'price' => $request->price,
                'discount' => $request->discount,
                'amount' => $request->amount,
                'status' => $request->status,
            ]
        );
        return $data;
    }
    public function createProduct($request){
        $data = Product::updateOrCreate(
            [
                'id' => $request->id,
            ],
            [
                'name' => $request->name,
                'description' => $request->description,
                'quantity' => $request->quantity,
                'price' => $request->price,
                'discount' => $request->discount,
                'discount_status' => $request->discount_status,
                'category_id'=>$request->category_id,
                'condition_id' => $request->condition_id,
                'user_id' => $request->user_id,
            ]
        );
    }
}
