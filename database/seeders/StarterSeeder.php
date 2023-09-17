<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class StarterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for($i = 1; $i <= 100; $i++){
            User::create(
                [
                    'name' => fake()->name(),
                    'email' => 'user'.$i.'@example.com',
                    'password' => Hash::make('rahasia123'),
                    'role_id' => Role::where('name','user')->first()->id,
                ]
            );
        }
        for($i = 1; $i <= 10; $i++){
            User::create(
                [
                    'name' => fake()->name(),
                    'email' => 'seller'.$i.'@example.com',
                    'password' => Hash::make('rahasia123'),
                    'role_id' => Role::where('name','seller')->first()->id,
                ]
            );
        }

    }
}
