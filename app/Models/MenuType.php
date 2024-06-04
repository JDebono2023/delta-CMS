<?php

namespace App\Models;

use App\Models\Menu;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class MenuType extends Model
{
    use HasFactory;

    protected $table = 'menu_types';

    protected $fillable = [
        'type',

    ];

    protected $primaryKey = 'id';

    public function allMenus(): HasMany
    {
        return $this->hasMany(Menu::class, 'type_id');
    }
}
