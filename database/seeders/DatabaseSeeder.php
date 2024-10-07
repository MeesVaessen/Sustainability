<?php

namespace Database\Seeders;

use App\Models\dailyTravel;
use App\Models\travelMode;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $travelModes = TravelMode::factory()->count(5)->create();

        // Create 20 users
        User::factory()->count(20)->create()->each(function ($user) use ($travelModes) {
            // Assign 15 travels for each user
            DailyTravel::factory()->count(15)->create([
                'user_id' => $user->id,
                'travel_mode_id' => $travelModes->random()->id, // Assign random travel mode
            ]);
        });

    }
}
