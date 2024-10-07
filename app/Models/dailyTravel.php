<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class dailyTravel extends Model
{
    use HasFactory;

    public function travelMode(): BelongsTo
    {
        return $this->belongsTo(TravelMode::class);
    }

    public function user() : BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
