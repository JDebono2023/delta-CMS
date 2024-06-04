<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class AttractionCategory extends Model
{
    use HasFactory;

    protected $table = 'attraction_categories';

    protected $fillable = [
        'category',
        'image'

    ];

    protected $primaryKey = 'id';

    public function allAttractions(): HasMany
    {
        return $this->hasMany(Attraction::class, 'attractcat_id');
    }
}
