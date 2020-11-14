<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = [ 'dance_id','body'];

    public function dances()
    {
        return $this->belongsTo(Dance::class);
    }
}
