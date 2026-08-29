<?php

namespace App\Http\Controllers;

use App\Css;
use Illuminate\Http\Request;
use App\Http\Requests\CreateData;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class CssController extends Controller
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
        return view('content/css/css_create');
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
       $css = new Css;
       $css->user_id       = Auth::id();
       $css->date          = Carbon::today()->format('Y-m-d');
       $css->css_property = $request->css_property;
       $css->css_element = $request->css_element;
       $css->css_box = $request->css_box;
       $css->css_Flexbox     = $request->css_Flexbox;
       $css->css_responsive     = $request->css_responsive;
       $css->css_position    = $request->css_position;
       $css->css_glid     = $request->css_glid;
       $css->css_background  = $request->css_background;
       $css->css_display     = $request->css_display;
       $css->css_coding      = $request->css_coding;
       $css->comment       = $request->comment;
       Auth::user()->css()->save($css);
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
