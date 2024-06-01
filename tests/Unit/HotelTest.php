<?php

namespace Tests\Unit;

use App\Models\City;
use App\Models\Hotel;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Laravel\Sanctum\Sanctum;
use Tests\TestCase;

class HotelTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_can_create_a_hotel()
    {
        $city = City::factory()->create();
        $hotel = Hotel::create([
            'name' => 'Test Hotel',
            'city_id' => $city->id,
            'price_per_night' => 150.00,
        ]);

        $this->assertDatabaseHas('hotels', [
            'name' => 'Test Hotel',
            'city_id' => $city->id,
            'price_per_night' => 150.00,
        ]);
    }

    /** @test */
    public function it_can_update_a_hotel()
    {
        $city = City::factory()->create();
        $hotel = Hotel::create([
            'name' => 'Test Hotel',
            'city_id' => $city->id,
            'price_per_night' => 150.00,
        ]);

        $hotel->update([
            'name' => 'Updated Hotel',
        ]);

        $this->assertDatabaseHas('hotels', [
            'name' => 'Updated Hotel',
        ]);
    }

    public function it_can_delete_a_hotel()
    {
        $user = User::factory()->create();
        Sanctum::actingAs($user, ['*']);

        $city = City::factory()->create();

        $hotel = Hotel::create([
            'name' => 'Test Hotel',
            'city_id' => $city->id,
            'price_per_night' => 150.00,
        ]);

        $response = $this->deleteJson('/api/hotels/' . $hotel->id);

        $response->assertStatus(204);

        $this->assertDatabaseMissing('hotels', [
            'id' => $hotel->id,
            'name' => 'Test Hotel',
        ]);
    }


}
