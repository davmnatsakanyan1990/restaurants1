<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    public $fillable = [
        'name',
        'city_id'
    ];
    public function places(){
        return $this->hasMany(Place::class);
    }
    
    public function city(){
        return $this->belongsTo(City::class);
    }
}
