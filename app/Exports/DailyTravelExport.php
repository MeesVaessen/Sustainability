<?php
namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class DailyTravelExport implements FromCollection, WithHeadings
{
    protected $travels;

    // Constructor to accept the filtered travels
    public function __construct($travels)
    {
        $this->travels = $travels;
    }

    /**
     * Retrieve the collection of data for export.
     */
    public function collection()
    {
        // Use the travels passed in the constructor
        return $this->travels->map(function ($travel) {
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
