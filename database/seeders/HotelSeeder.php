<?php

namespace Database\Seeders;

use App\Models\City;
use App\Models\Hotel;
use Illuminate\Database\Seeder;

class HotelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $alexandria = City::where('name', 'alexandria')->first();
        $mekka = City::where('name', 'mekka')->first();
        $newYork = City::where('name', 'New York')->first();

        Hotel::create(['name' => 'cleopatra', 'city_id' => $alexandria->id, 'price_per_night' => 100]);
        Hotel::create(['name' => 'haram', 'city_id' => $mekka->id, 'price_per_night' => 200]);
        Hotel::create(['name' => 'The Plaza', 'city_id' => $newYork->id, 'price_per_night' => 300]);

    }
}
