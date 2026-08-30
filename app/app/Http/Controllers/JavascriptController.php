<?php

namespace App\Http\Controllers;

use App\Javascript;
use Illuminate\Http\Request;
use App\Http\Requests\CreateData;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class JavascriptController extends Controller
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
        return view('content/javascript/javascript_create');
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     *@param  \App\Http\Requests\CreateData  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateData $request)
    {
        //
       $javascript = new Javascript;
       $javascript->user_id       = Auth::id();
       $javascript->date          = Carbon::today()->format('Y-m-d');
       $javascript->javascript_read = $request->javascript_read;
       $javascript->javascript_file = $request->javascript_file;
       $javascript->javascript_grammar = $request->javascript_grammar;
       $javascript->javascript_variable     = $request->javascript_variable;
       $javascript->javascript_data     = $request->javascript_data;
       $javascript->javascript_comparison    = $request->javascript_comparison;
       $javascript->javascript_logical     = $request->javascript_logical;
       $javascript->javascript_dom  = $request->javascript_dom;
       $javascript->javascript_structure     = $request->javascript_structure;
       $javascript->javascript_method      = $request->javascript_method;
       $javascript->comment       = $request->comment;
       Auth::user()->javascript()->save($javascript);
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
