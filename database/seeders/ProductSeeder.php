<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Condition;
use App\Models\Product;
use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $category = Category::all()->pluck('id');
        $condition = Condition::all()->pluck('id');
        $user = User::where('role_id', Role::where('name','seller')->first()->id)->pluck('id');

        for($i=0; $i<100;$i++){
            Product::create(
                [
                    'user_id'=> $user[rand(0,count($user)-1)],
                    'category_id'=> $category[rand(0,count($category)-1)],
                    'condition_id'=> $condition[rand(0,count($condition)-1)],
                    'name' => fake()->word(),
                    'description' => 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Voluptates magnam facere veniam error eum, omnis doloribus in. Eius itaque doloribus commodi eveniet debitis placeat facere.',
                    'price' => rand(1,100) * 1000,
                    'discount' => rand(0,10) * 1000,
                    'quantity' => rand(1,999),

                ]
            );
        }

    }
}
