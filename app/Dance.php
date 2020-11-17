<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Dance extends Model
{
    protected $fillable = ['user_id' , 'title' , 'subtitle' , 'movie' , 'genre'];

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    
}  