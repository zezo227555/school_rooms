<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Room extends Model
{
    use HasFactory;
    protected $table = 'rooms';

    protected $fillable = [
        'name', 'description', 'capacity', 'available', 'type', 'image',
    ];

    public function booking() : HasMany
    {
        return $this->hasMany(Booking::class);
    }

    public function rating() : HasMany
    {
        return $this->hasMany(Rating::class);
    }
}
