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
        Category::create(
            [
                'name' => 'Pulsa dan Tagihan',
                'description' => 'Pulsa dan Tagihan'
            ],
        );
        Category::create(
            [
                'name' => 'Laptop',
                'description' => 'Laptop'
            ],
        );
        Category::create(
            [
                'name' => 'Aksesoris',
                'description' => 'Aksesoris'
            ],
        );
        Category::create(
            [
                'name' => 'Fashion',
                'description' => 'Fashion'
            ],
        );
        Category::create(
            [
                'name' => 'Buku',
                'description' => 'Buku'
            ],
        );
        Category::create(
            [
                'name' => 'Perabotan',
                'description' => 'Perabotan'
            ],
        );
        Category::create(
            [
                'name' => 'Hobi dan Koleksi',
                'description' => 'Hobi dan Koleksi'
            ],
        );
    }
}
