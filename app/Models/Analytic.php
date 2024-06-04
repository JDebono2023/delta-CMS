<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Analytic extends Model
{
    use HasFactory;

    protected $table = 'analytics';

    protected $fillable = [

        'page_id',
        'action_id',

    ];

    protected $primaryKey = 'id';
}
