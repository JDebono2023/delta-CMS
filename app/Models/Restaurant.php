<?php

namespace App\Models;

use App\Models\Menu;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Restaurant extends Model
{
    use HasFactory;

    protected $table = 'restaurants';

    protected $fillable = [
        'name',

    ];

    protected $primaryKey = 'id';

    public function allMenus(): HasMany
    {
        return $this->hasMany(Menu::class, 'rest_id');
    }
}
