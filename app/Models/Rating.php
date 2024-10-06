<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Rating extends Model
{
    use HasFactory;

    protected $table = 'rating';
    protected $fillable = [
        'stars', 'comment', 'users_id', 'rooms_id', 'booking_id',
    ];

    public function user() : BelongsTo
    {
        return $this->belongsTo(User::class, 'users_id');
    }

    public function room() : BelongsTo
    {
        return $this->belongsTo(Room::class);
    }

    public function booking() : BelongsTo
    {
        return $this->belongsTo(Booking::class);
    }
}
