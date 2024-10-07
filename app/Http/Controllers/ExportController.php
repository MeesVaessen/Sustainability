<?php

namespace App\Http\Controllers;

use App\Exports\DailyTravelExport;
use App\Models\dailyTravel;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\Request;

class ExportController extends Controller
{
    /**
     * Export travels as Excel
     */


    /**
     * Export travels as CSV
     */
    public function exportCsv(Request $request)
    {
        // Get the filter parameter from the request
        $filter = $request->input('filter', 'today');

        // Build the query based on the filter
        $query = dailyTravel::query()->with(['User', 'travelMode']);

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

        // Get the filtered data
        $travels = $query->get();

        // Pass the filtered data to the export class
        return Excel::download(new DailyTravelExport($travels), 'travels.csv');
    }




}

