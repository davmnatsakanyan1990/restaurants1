<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PlaceCategory extends Model
{
    protected $fillable = [
        'place_id',
        'category_id'
    ];
}
