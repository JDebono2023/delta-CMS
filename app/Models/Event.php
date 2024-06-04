<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Event extends Model
{
    use HasFactory;
    protected $table = 'events';

    protected $fillable = [

        'event_name',
        'room_id',
        'starts_at',
        'ends_at',
        'visible'
    ];

    protected $primaryKey = 'id';

    public function eventRoom(): BelongsTo
    {
        return $this->belongsTo(Room::class, 'room_id');
    }
}
