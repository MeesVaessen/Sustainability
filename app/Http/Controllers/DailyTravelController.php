<?php

namespace App\Http\Controllers;

use App\Models\dailyTravel;
use App\Models\travelMode;

class DailyTravelController extends Controller
{
    public function index() {

        return view('/test', [
            'travels' => dailyTravel::query()->with(['User', 'travelMode'])->where('date', today())->get()
        ]);
    }
}
