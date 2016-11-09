<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    public $fillable = [
        'name'
    ];
    
    public function locations(){
        return $this->hasMany(Location::class);
    }
}
