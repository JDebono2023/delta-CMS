<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class banners extends Model
{
    use HasFactory;

    protected $table = 'banners';

    protected $fillable = [
        'banner_cat_id',
        'image',
        'name',
        'visible',
    ];

    protected $primaryKey = 'id';

    public function bannerCat(): BelongsTo
    {
        return $this->belongsTo(BannerCategory::class, 'banner_cat_id');
    }
}
