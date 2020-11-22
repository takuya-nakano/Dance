<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
  protected $fillable = ['dance_id','user_id'];

  public function dance()
  {
    return $this->belongsTo(Dance::class);
  }

  public function user()
  {
    return $this->belongsTo(User::class);
  }
}

