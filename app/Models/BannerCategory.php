<?php

namespace App\Models;

use App\Models\banners;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class BannerCategory extends Model
{
    use HasFactory;

    protected $table = 'banner_categories';

    protected $fillable = [
        'center',
        'header',
    ];

    protected $primaryKey = 'id';

    public function banner(): HasMany
    {
        return $this->hasMany(banners::class, 'banner_cat_id');
    }
}
