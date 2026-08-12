<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DisplayController extends Controller
{
    //
    public function top(){
        return view('top');
        //return view('parts/header');
        
    }
    
}
