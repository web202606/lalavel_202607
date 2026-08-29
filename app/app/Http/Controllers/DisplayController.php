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
        public function csssearch(){
        return view('content/css/css_search');
        
    }
        public function javascriptsearch(){
        return view('content/javascript/javascript_search');
        
    }
        public function jquerysearch(){
        return view('content/jquery/jquery_search');
        
    }
        public function phpsearch(){
        return view('content/php/php_search');
        
    }
        public function dbsearch(){
        return view('content/db/db_search');
        
    }
        public function laravelsearch(){
        return view('content/laravel/laravel_search');
        
    }
        public function skillsearch(){
        return view('content/skill/skill_search');
        
    }
 
 
   
    
}
