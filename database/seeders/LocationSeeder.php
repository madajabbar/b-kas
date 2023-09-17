<?php

namespace Database\Seeders;

use App\Models\City;
use App\Models\Province;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Http;

class LocationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $provinces = Http::withOptions(['verify' => false,])->withHeaders([
            'key' => env('RAJAONGKIR_API_KEY')
        ])->get('https://api.rajaongkir.com/starter/province')->json()['rajaongkir']['results'];

        foreach ($provinces as $province) {
            $prvnc = Province::create([
                'id' => $province['province_id'],
                'name'        => $province['province'],
                'created_at'  => now(),
                'updated_at'  => now(),
            ]);
        }
        $cities = Http::withOptions(['verify' => false,])->withHeaders([
            'key' => env('RAJAONGKIR_API_KEY')
        ])->get('https://api.rajaongkir.com/starter/city?province=')->json()['rajaongkir']['results'];

        foreach ($cities as $city) {
            City::create([
                'id' => $city['city_id'],
                'province_id'   => $city['province_id'],
                'type'          => $city['type'],
                'name'          => $city['type'] . ' ' . $city['city_name'],
                'postal_code'   => $city['postal_code'],
                'created_at'    => now(),
                'updated_at'    => now(),
            ]);

        }
    }
}
