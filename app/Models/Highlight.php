<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Highlight extends Model
{
    public function places(){
        return $this->belongsToMany(Place::class);
    }
}
