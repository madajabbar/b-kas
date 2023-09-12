<?php

namespace Database\Seeders;

use App\Models\Cart;
use App\Models\Product;
use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CartSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $products = Product::all();
        $users = User::where('role_id',2)->get();

        foreach($users as $user){
            for($i = 0; $i < rand(1,3);$i++){
                $product = $products[rand(0,count($products)-1)];
                $amount = rand(1, $product->quantity);
                $price = $product->price;
                $discount = $product->discount;
                $total_payment = ($price - $discount) * $amount;
                Cart::create([
                    'product_id' => $product->id,
                    'user_id' => $user->id,
                    'total_payment' => $total_payment,
                    'price' => $price,
                    'discount' => $discount,
                    'amount' => $amount,
                ]);
            }
        }
    }
}
