<?php

namespace App\Http\Controllers;

use App\Models\dailyTravel;
use App\Models\travelMode;
use Illuminate\Http\Request; // Import the Request class
class DailyTravelController extends Controller
{
    public function index(Request $request) {
        // Get the filter parameter from the request, default to 'today'
        $filter = $request->input('filter', 'today');

        // Start building the query
        $query = dailyTravel::query()->with(['User', 'travelMode']);

        // Apply the appropriate filter based on the input
        switch ($filter) {
            case 'today':
                $query->where('date', today());
                break;
            case 'last_week':
                $query->where('date', '>=', today()->subWeek());
                break;
            case 'last_month':
                $query->where('date', '>=', today()->subMonth());
                break;
            case 'all':
                // No additional filter needed for all records
                break;
            default:
                // Handle unknown filter values (optional)
                return response()->json(['error' => 'Invalid filter'], 400);
        }

        // Execute the query and return the view with results
        return view('/dashboard', [
            'travels' => $query->get()
        ]);
    }

}
