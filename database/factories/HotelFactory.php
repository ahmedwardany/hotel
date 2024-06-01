<?php 
namespace Database\Factories;

use App\Models\Hotel;
use App\Models\City;
use Illuminate\Database\Eloquent\Factories\Factory;

class HotelFactory extends Factory
{
    protected $model = Hotel::class;

    public function definition()
    {
        return [
            'name' => $this->faker->company,
            'city_id' => City::factory(),
            'price_per_night' => $this->faker->numberBetween(50, 500),
        ];
    }
}
