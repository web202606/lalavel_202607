<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CreateData;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Html;
use App\Css;
use App\Javascript;
use App\Jquery;
use App\Php;
use App\Database;
use App\Laraveltbl;
use App\Skill;
use Carbon\Carbon;

class DisplayController extends Controller
{
    //
    public function top(){
    //TOP画面表示
        return view('top');
        //return view('parts/header');
        
    }

 
 
   
    
}
