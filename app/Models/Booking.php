<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Booking extends Model
{
    use HasFactory;

    protected $table = 'booking';

    protected $fillable = [
        'start_time_end_time', 'day', 'rooms_id', 'users_id',
    ];

    public function users() : BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function rooms() : BelongsTo
    {
        return $this->belongsTo(Room::class);
    }

    public function rating() : HasMany
    {
        return $this->hasMany(Rating::class);
    }
}
