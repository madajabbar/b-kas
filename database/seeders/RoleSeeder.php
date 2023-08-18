<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Role::create(
                [
                    'name' => 'admin'
                ],
        );
        Role::create(

            [
                'name' => 'user'
            ],
        );
        User::create(
            [
                'name' => 'admin',
                'email' => 'admin@gmail.com',
                'password' => Hash::make('rahasia123'),
                'role_id' => Role::where('name','admin')->first()->id,
            ]
        );
    }
}
