<?php

namespace App\Http\Controllers;

use App\Exports\DailyTravelExport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\Request;

class ExportController extends Controller
{
    /**
     * Export travels as Excel
     */
    public function exportExcel()
    {
        return Excel::download(new DailyTravelExport, 'travels.xlsx');
    }

    /**
     * Export travels as CSV
     */
    public function exportCsv()
    {
        return Excel::download(new DailyTravelExport, 'travels.csv');
    }
}

