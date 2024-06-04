<?php

namespace App\Models;

use App\Models\Map;
use App\Models\Room;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Floor extends Model
{
    use HasFactory;

    protected $table = 'floors';

    protected $fillable = [
        'floor',

    ];

    protected $primaryKey = 'id';

    public function allMaps(): HasMany
    {
        return $this->hasMany(Map::class, 'floor_id');
    }

    public function rooms(): HasMany
    {
        return $this->hasMany(Room::class, 'floor_id');
    }
}
