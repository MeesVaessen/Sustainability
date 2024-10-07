<?php

namespace Database\Factories;

use App\Models\dailyTravel;
use App\Models\travelMode;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class dailyTravelFactory extends Factory
{
    protected $model = dailyTravel::class;

    public function definition()
    {
        return [
            'user_id' => User::factory(), // this will generate associated users automatically
            'travel_mode_id' => TravelMode::factory(), // associate random travel modes
            'date' => $this->faker->dateTimeBetween('-1 year', 'now'), // random dates in the last year
        ];
    }
}
