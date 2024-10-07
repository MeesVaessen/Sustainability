<?php

namespace Database\Factories;

use App\Models\travelMode;
use Illuminate\Database\Eloquent\Factories\Factory;

class travelModeFactory extends Factory
{
    protected $model = travelMode::class;

    public function definition()
    {
        return [
            'type' => $this->faker->randomElement(['Car', 'Bus', 'Bike', 'Train', 'Walk']),
            'co2' => $this->faker->numberBetween(10, 500), // Assuming CO2 values are integers
        ];
    }
}
