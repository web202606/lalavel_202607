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
    //検索画面表示
        public function htmlsearch(){
        return view('content/html/html_search');
        
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
