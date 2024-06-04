<?php

namespace App\Models;

use App\Models\Floor;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Room extends Model
{
    use HasFactory;
    protected $table = 'rooms';

    protected $fillable = [
        'room',
        'floor_id'

    ];

    protected $primaryKey = 'id';

    public function floors(): BelongsTo
    {
        return $this->belongsTo(Floor::class, 'floor_id');
    }

    public function events(): HasOne
    {
        return $this->hasOne(Event::class, 'room_id');
    }
}
