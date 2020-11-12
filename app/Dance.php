<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dance extends Model
{
    protected $fillable = ['user_id' , 'title' , 'subtitle' , 'movie' , 'genre'];
}
