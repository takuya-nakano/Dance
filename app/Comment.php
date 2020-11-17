<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = [ 'user_id','dance_id','body'];

    public function dances()
    {
        return $this->belongsTo(Dance::class);
    }

    public function users()
    {
        return $this->belongsTo(User::class);
    }

    
}
