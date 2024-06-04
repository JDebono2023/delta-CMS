<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Attraction extends Model
{
    use HasFactory;

    protected $table = 'attractions';

    protected $fillable = [

        'image',
        'attraction',
        'description',
        'distance',
        'attractcat_id',
        'address',
        'phone',
        'website',
    ];

    protected $primaryKey = 'id';

    public function attractionCategory(): BelongsTo
    {
        return $this->belongsTo(AttractionCategory::class, 'attractcat_id');
    }
}
