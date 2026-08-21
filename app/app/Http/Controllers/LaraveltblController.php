<?php

namespace App\Http\Controllers;

use App\Laravel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class LaraveltblController extends Controller
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
        return view('content/laravel/laravel_create');
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
       $html = new Html;
       /**user_idは仮で入れている。　**/
       $html->user_id       = 1;
       $html->date = Carbon::today()->format('Y-m-d');
       $html->html_structure = $request->html_structure;
       $html->html_property = $request->html_property;
       $html->html_posision = $request->html_posision;
       $html->html_link     = $request->html_link;
       $html->html_form     = $request->html_form;
       $html->html_table    = $request->html_table;
       $html->html_path     = $request->html_path;
       $html->html_element  = $request->html_element;
       $html->html_tool     = $request->html_tool;
       $html->html_web      = $request->html_web;
       $html->comment       = $request->comment;
       $html->save();
       //Auth::user()->html()->save($html);
       return redirect('/');
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
