<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Comment extends Model
{
    protected $fillable = [
        'text',
        'place_id',
        'parent_id',
        'commentable_id',
        'commentable_type',
    ];
    public function commentable(){
        return $this->morphTo();
    }
}
