<?php

namespace App\Http\Controllers;

use App\Database;
use Illuminate\Http\Request;
use App\Http\Requests\CreateData;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class DatabaseController extends Controller
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
        return view('content/database/database_create');
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
       $database = new Database;
       $database->user_id       = Auth::id();
       $database->date          = Carbon::today()->format('Y-m-d');
       $database->database_crud = $request->database_crud;
       $database->database_rule = $request->database_rule;
       $database->database_query = $request->database_query;
       $database->database_join     = $request->database_join;
       $database->database_groupby     = $request->database_groupby;
       $database->database_transaction    = $request->database_transaction;
       $database->database_Injection     = $request->database_Injection;
       $database->database_placeholder  = $request->database_placeholder;
       $database->database_connect     = $request->database_connect;
       $database->database_sql      = $request->database_sql;
       $database->comment       = $request->comment;
       Auth::user()->database()->save($database);
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
