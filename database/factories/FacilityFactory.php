<?php 
namespace Database\Factories;

use App\Models\Facility;
use App\Models\Hotel;
use Illuminate\Database\Eloquent\Factories\Factory;

class FacilityFactory extends Factory
{
    protected $model = Facility::class;

    public function definition()
    {
        return [
            'name' => $this->faker->word,
            'capacity' => $this->faker->numberBetween(10, 100),
            'hotel_id' => Hotel::factory(),
        ];
    }
}
