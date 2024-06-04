<?php

namespace App\Models;

use App\Models\MenuType;
use App\Models\Restaurant;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Menu extends Model
{
    use HasFactory;

    protected $table = 'menus';

    protected $fillable = [

        'image',
        'file_name',
        'menu',
        'rest_id',
        'type_id'
    ];

    protected $primaryKey = 'id';

    public function restaurant(): BelongsTo
    {
        return $this->belongsTo(Restaurant::class, 'rest_id');
    }

    public function menuTypes(): BelongsTo
    {
        return $this->belongsTo(MenuType::class, 'type_id');
    }
}
