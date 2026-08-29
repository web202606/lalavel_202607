<?php

namespace App\Http\Controllers;

use App\Php;
use Illuminate\Http\Request;
use App\Http\Requests\CreateData;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class PhpController extends Controller
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
        return view('content/php/php_create');
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
       $php = new Php;
       $php->user_id       = Auth::id();
       $php->date          = Carbon::today()->format('Y-m-d');
       $php->php_if = $request->php_if;
       $php->php_array = $request->php_array;
       $php->php_for = $request->php_for;
       $php->php_object     = $request->php_object;
       $php->php_error     = $request->php_error;
       $php->php_get    = $request->php_get;
       $php->php_post     = $request->php_post;
       $php->php_session  = $request->php_session;
       $php->php_xss     = $request->php_xss;
       $php->php_validation      = $request->php_validation;
       $php->comment       = $request->comment;
       Auth::user()->php()->save($php);
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
