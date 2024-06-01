<?php
namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\User;
use App\Models\Hotel;
use App\Models\City;
use Laravel\Sanctum\Sanctum;

class HotelControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_can_list_hotels()
    {
        $user = User::factory()->create();
        Sanctum::actingAs($user, ['*']);

        $city = City::factory()->create(['name' => 'Test City', 'country_code' => 'TC']);
        Hotel::factory()->create(['name' => 'Test Hotel 1', 'city_id' => $city->id, 'price_per_night' => 100]);
        Hotel::factory()->create(['name' => 'Test Hotel 2', 'city_id' => $city->id, 'price_per_night' => 200]);

        $response = $this->getJson('/api/hotels');

        $response->assertStatus(200)
            ->assertJsonStructure([
                'data' => [
                    '*' => [
                        'id',
                        'name',
                        'price_per_night',
                        'city' => [
                            'id',
                            'name',
                            'country_code'
                        ],
                        'facilities'
                    ]
                ]
            ]);
    }

    public function test_can_search_hotels_by_name()
    {
        $user = User::factory()->create();
        Sanctum::actingAs($user, ['*']);

        $city = City::factory()->create(['name' => 'Test City', 'country_code' => 'TC']);
        Hotel::factory()->create(['name' => 'Special Hotel', 'city_id' => $city->id, 'price_per_night' => 100]);
        Hotel::factory()->create(['name' => 'Regular Hotel', 'city_id' => $city->id, 'price_per_night' => 200]);

        $response = $this->getJson('/api/hotels?name=Special');

        $response->assertStatus(200)
            ->assertJsonCount(1, 'data')
            ->assertJsonFragment(['name' => 'Special Hotel']);
    }

    public function test_can_create_hotel()
    {
        $user = User::factory()->create();
        Sanctum::actingAs($user, ['*']);

        $city = City::factory()->create(['name' => 'Test City', 'country_code' => 'TC']);

        $response = $this->postJson('/api/hotels', [
            'name' => 'New Hotel',
            'city_id' => $city->id,
            'price_per_night' => 150
        ]);

        $response->assertStatus(201)
            ->assertJsonFragment(['name' => 'New Hotel']);
    }
}
