<?php

namespace App;

use App\Models\Rate;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'username', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function images(){
        return $this->morphMany('App\Models\Image', 'imageable');
    }
    
    public function comments(){
        $this->morphMany('App\Models\Comment', 'commentable');
    }

    public function rates(){
        return $this->hasMany(Rate::class);
    }
}
