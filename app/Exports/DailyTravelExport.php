<?php

namespace App\Exports;

use App\Models\dailyTravel;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class DailyTravelExport implements FromCollection, WithHeadings
{
    /**
     * Retrieve the collection of data for export.
     */
    public function collection()
    {
        // Return the data you want to export, adjust to your needs
        return dailyTravel::with('user', 'travelMode')->get()->map(function ($travel) {
            return [
                'id' => $travel->id,
                'user_name' => $travel->user->name,
                'travel_mode' => $travel->travelMode->type,
                'CO2' => $travel->travelMode->co2 * $travel->user->distance,
                'date' => $travel->date,
                'created_at' => $travel->created_at,
            ];
        });
    }

    /**
     * Set the headings for the exported file.
     */
    public function headings(): array
    {
        return [
            'ID',
            'User Name',
            'Travel Mode',
            'CO2',
            'Date',
            'Created At',
        ];
    }
}
