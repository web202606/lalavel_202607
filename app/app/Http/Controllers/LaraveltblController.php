<?php

namespace App\Http\Controllers;

use App\Laraveltbl;
use Illuminate\Http\Request;
use App\Http\Requests\CreateData;
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
        return view('content/laraveltbl/laraveltbl_create');
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
       $laraveltbl = new Laraveltbl;
       $laraveltbl->user_id       = Auth::id();
       $laraveltbl->date          = Carbon::today()->format('Y-m-d');
       $laraveltbl->laraveltbl_mvs = $request->laraveltbl_mvs;
       $laraveltbl->laraveltbl_route = $request->laraveltbl_route;
       $laraveltbl->laraveltbl_controller = $request->laraveltbl_controller;
       $laraveltbl->laraveltbl_model     = $request->laraveltbl_model;
       $laraveltbl->laraveltbl_view     = $request->laraveltbl_view;
       $laraveltbl->laraveltbl_naming    = $request->laraveltbl_naming;
       $laraveltbl->laraveltbl_eloquent     = $request->laraveltbl_eloquent;
       $laraveltbl->laraveltbl_join  = $request->laraveltbl_join;
       $laraveltbl->laraveltbl_templete     = $request->laraveltbl_templete;
       $laraveltbl->laraveltbl_web      = $request->laraveltbl_web;
       $laraveltbl->comment       = $request->comment;
       Auth::user()->laraveltbl()->save($laraveltbl);
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
