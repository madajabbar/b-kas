<?php

namespace Database\Seeders;

use App\Models\City;
use App\Models\User;
use App\Models\UserData;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = User::all();
        $cities = City::all();
        foreach($users as $user){
            $city = $cities[rand(0,count($cities)-1)];
            UserData::create(
                [
                    'user_id' => $user->id,
                    'fullname' => fake()->name(),
                    'birth_place' => $cities[rand(0,count($cities)-1)]->name,
                    'birth_date' => fake()->date(),
                    'city_id'=> $city->id,
                    'province_id'=> $city->province->id,
                    'postal_code'=> $city->postal_code,
                    'address'=> fake()->address(),
                ]
            );
        }
    }
}
