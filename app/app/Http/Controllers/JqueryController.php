<?php

namespace App\Http\Controllers;

use App\Jquery;
use Illuminate\Http\Request;
use App\Http\Requests\CreateData;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class JqueryController extends Controller
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
        return view('content/jquery/jquery_create');
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
       //dd($request);
       $jquery = new Jquery;
       
       $jquery->user_id       = Auth::id();
       $jquery->date          = Carbon::today()->format('Y-m-d');
       $jquery->jquery_plugin = $request->jquery_plugin;
       $jquery->jquery_read = $request->jquery_read;
       $jquery->jquery_structure = $request->jquery_structure;
       $jquery->jquery_method     = $request->jquery_method;
       $jquery->jquery_event     = $request->jquery_event;
       $jquery->jquery_ajax    = $request->jquery_ajax;
       $jquery->jquery_alert     = $request->jquery_alert;
       $jquery->jquery_counter  = $request->jquery_counter;
       $jquery->jquery_animation     = $request->jquery_animation;
       $jquery->jquery_fade      = $request->jquery_fade;
       $jquery->comment       = $request->comment;
       
       Auth::user()->jquery()->save($jquery);
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
