<?php

namespace App\Models;

use App\Models\Floor;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Map extends Model
{
    use HasFactory;

    protected $table = 'maps';

    protected $fillable = [

        'image',
        'file_name',
        'map_name',
        'floor_id',
    ];

    protected $primaryKey = 'id';

    public function floors(): BelongsTo
    {
        return $this->belongsTo(Floor::class, 'floor_id');
    }
}