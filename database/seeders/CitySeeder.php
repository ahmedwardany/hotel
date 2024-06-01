<?php

namespace Database\Seeders;

use App\Models\City;
use Illuminate\Database\Seeder;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        City::create(['name' => 'Alexandria', 'country_code' => 'EG']);
        City::create(['name' => 'Mekka', 'country_code' => 'SA']);
        City::create(['name' => 'New York', 'country_code' => 'US']);
        City::create(['name' => 'Paris', 'country_code' => 'FR']);

    }
}
