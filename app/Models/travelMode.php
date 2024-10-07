<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class travelMode extends Model
{
    use HasFactory;

    public function dailyTravel(): HasMany
    {
        return $this->hasMany(dailyTravel::class);
    }
}
