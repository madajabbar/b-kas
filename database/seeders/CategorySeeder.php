<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Get the
        $data = [
            [
                'name' => 'Pulsa dan Tagihan',
                'description' => 'Pulsa dan Tagihan'
            ],
            [
                'name' => 'Laptop',
                'description' => 'Laptop'
            ],
            [
                'name' => 'Aksesoris',
                'description' => 'Aksesoris'
            ],
            [
                'name' => 'Fashion',
                'description' => 'Fashion'
            ],
            [
                'name' => 'Buku',
                'description' => 'Buku'
            ],
            [
                'name' => 'Perabotan',
                'description' => 'Perabotan'
            ],
            [
                'name' => 'Hobi dan Koleksi',
                'description' => 'Hobi dan Koleksi'
            ],
        ];
        Category::insert($data);
    }
}
