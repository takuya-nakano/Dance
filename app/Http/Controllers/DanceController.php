<?php

namespace App\Http\Controllers;

use App\Dance;
use Illuminate\Http\Request;

class DanceController extends Controller
{
    public function index()
    {
          $dances = Dance::orderby('created_at','desc')->get();

          return view('dance.dance',compact('dances'));
        
    }

}
