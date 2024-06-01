<?php

namespace Database\Seeders;

use App\Models\Facility;
use App\Models\Hotel;
use Illuminate\Database\Seeder;

class FacilitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $cleopatraHotel = Hotel::where('name', 'cleopatra')->first();
        $haramHotel = Hotel::where('name', 'haram')->first();
        $plazaHotel = Hotel::where('name', 'The Plaza')->first();
        
        Facility::create(['name' => 'restaurant', 'capacity' => 70, 'hotel_id' => $cleopatraHotel->id]);
        Facility::create(['name' => 'room1', 'capacity' => 2, 'hotel_id' => $cleopatraHotel->id]);
        Facility::create(['name' => 'room101', 'capacity' => 1, 'hotel_id' => $haramHotel->id]);
        Facility::create(['name' => 'room101', 'capacity' => 4, 'hotel_id' => $haramHotel->id]);
        Facility::create(['name' => 'Swimming Pool', 'capacity' => 50, 'hotel_id' => $plazaHotel->id]);
        Facility::create(['name' => 'Gym', 'capacity' => 30, 'hotel_id' => $plazaHotel->id]);
        Facility::create(['name' => 'Spa', 'capacity' => 20, 'hotel_id' => $plazaHotel->id]);

    }
}
