<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{

    protected $fillable = [
        'name',
        'imageable_id',
        'imageable_type',
        'role'
    ];

    // role=0 Default
    // role=1 Place Cover
    // role=2 Place Thumbnail
    // ...


    public function imageable(){
        return $this->morphTo();
    }
}
