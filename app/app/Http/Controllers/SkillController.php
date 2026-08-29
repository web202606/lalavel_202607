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

class SkillController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('content/skill/skill_create');
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\CreateData  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateData $request)
    {
        //

       $latest_1 = new Html;
       $latest_2 = new Css;
       $latest_3 = new Javascript;
       $latest_4 = new Jquery;
       $latest_5 = new Php;
       $latest_6 = new Database;
       $latest_7 = new Laraveltbl;
       $html       = Auth::user()->html()->latest('updated_at')->first();
       $css        = Auth::user()->css()->latest('updated_at')->first();
       $javascript = Auth::user()->javascript()->latest('updated_at')->first();
       $jquery     = Auth::user()->jquery()->latest('updated_at')->first();
       $php        = Auth::user()->php()->latest('updated_at')->first();
       $database   = Auth::user()->database()->latest('updated_at')->first();
       $laraveltbl = Auth::user()->laraveltbl()->latest('updated_at')->first();

       $skill      = new Skill;
       
        $html_point=[];
        $html_point[1] = $html->html_structure;
        $html_point[2] = $html->html_property;
        $html_point[3] = $html->html_posision;
        $html_point[4] = $html->html_link;
        $html_point[5] = $html->html_form;
        $html_point[6] = $html->html_table;
        $html_point[7] = $html->html_path;
        $html_point[8] = $html->html_element;
        $html_point[9] = $html->html_tool;
        $html_point[10] = $html->html_web;
        
        $css_point=[];
        $css_point[1] = $css->css_property;
        $css_point[2] = $css->css_element;
        $css_point[3] = $css->css_box;
        $css_point[4] = $css->css_Flexbox;
        $css_point[5] = $css->css_responsive;
        $css_point[6] = $css->css_position;
        $css_point[7] = $css->css_glid;
        $css_point[8] = $css->css_background;
        $css_point[9] = $css->css_display;
        $css_point[10] = $css->css_coding;

        $javascript_point=[];
        $javascript_point[1] = $javascript->javascript_read;
        $javascript_point[2] = $javascript->javascript_file;
        $javascript_point[3] = $javascript->javascript_grammar;
        $javascript_point[4] = $javascript->javascript_variable;
        $javascript_point[5] = $javascript->javascript_data;
        $javascript_point[6] = $javascript->javascript_comparison;
        $javascript_point[7] = $javascript->javascript_logical;
        $javascript_point[8] = $javascript->javascript_dom;
        $javascript_point[9] = $javascript->javascript_structure;
        $javascript_point[10] = $javascript->javascript_method;
        

        $jquery_point=[];
        $jquery_point[1] = $jquery->jquery_plugin;
        $jquery_point[2] = $jquery->jquery_read;
        $jquery_point[3] = $jquery->jquery_structure;
        $jquery_point[4] = $jquery->jquery_method;
        $jquery_point[5] = $jquery->jquery_event;
        $jquery_point[6] = $jquery->jquery_ajax;
        $jquery_point[7] = $jquery->jquery_alert;
        $jquery_point[8] = $jquery->jquery_counter;
        $jquery_point[9] = $jquery->jquery_animation;
        $jquery_point[10] = $jquery->jquery_fade;
    
        $php_point=[];
        $php_point[1] = $php->php_if;
        $php_point[2] = $php->php_array;
        $php_point[3] = $php->php_for;
        $php_point[4] = $php->php_object;
        $php_point[5] = $php->php_error;
        $php_point[6] = $php->php_get;
        $php_point[7] = $php->php_post;
        $php_point[8] = $php->php_session;
        $php_point[9] = $php->php_xss;
        $php_point[10] = $php->php_validation;
        

        $database_point=[];
        $database_point[1] = $database->database_crud;
        $database_point[2] = $database->database_rule;
        $database_point[3] = $database->database_query;
        $database_point[4] = $database->database_join;
        $database_point[5] = $database->database_groupby;
        $database_point[6] = $database->database_transaction;
        $database_point[7] = $database->database_Injection;
        $database_point[8] = $database->database_placeholder;
        $database_point[9] = $database->database_connect;
        $database_point[10] = $database->database_sql;
       

        $laraveltbl_point=[];
        $laraveltbl_point[1] = $laraveltbl->laraveltbl_mvs;
        $laraveltbl_point[2] = $laraveltbl->laraveltbl_route;
        $laraveltbl_point[3] = $laraveltbl->laraveltbl_controller;
        $laraveltbl_point[4] = $laraveltbl->laraveltbl_model;
        $laraveltbl_point[5] = $laraveltbl->laraveltbl_view;
        $laraveltbl_point[6] = $laraveltbl->laraveltbl_naming;
        $laraveltbl_point[7] = $laraveltbl->laraveltbl_eloquent;
        $laraveltbl_point[8] = $laraveltbl->laraveltbl_join;
        $laraveltbl_point[9] = $laraveltbl->laraveltbl_templete;
        $laraveltbl_point[10] = $laraveltbl->laraveltbl_web;

       $skill->html_point       = array_sum($html_point);
       $skill->css_point        = array_sum($css_point);
       $skill->javascript_point = array_sum($javascript_point);
       $skill->jquery_point     = array_sum($jquery_point);
       $skill->php_point        = array_sum($php_point);
       $skill->db_point         = array_sum($database_point);
       $skill->laravel_point    = array_sum($laraveltbl_point);

       $skill->user_id       = Auth::id();
       $skill->date          = Carbon::today()->format('Y-m-d');
       $skill->comment       = $request->comment;
       Auth::user()->skill()->save($skill);
       return view('parts/create_complete');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
