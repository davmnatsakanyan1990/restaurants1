<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PlaceType extends Model
{
    protected $fillable = [
        'place_id',
        'type_id'
    ];
}
