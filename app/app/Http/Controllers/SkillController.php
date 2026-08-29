<?php

namespace App\Http\Controllers;

use App\Skill;
use Illuminate\Http\Request;
use App\Http\Requests\CreateData;
use Illuminate\Support\Facades\Auth;
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
       $skill = new Skill;
       $skill->user_id       = Auth::id();
       $skill->date          = Carbon::today()->format('Y-m-d');
       $skill->skill_structure = $request->skill_structure;
       $skill->skill_property = $request->skill_property;
       $skill->skill_posision = $request->skill_posision;
       $skill->skill_link     = $request->skill_link;
       $skill->skill_form     = $request->skill_form;
       $skill->skill_table    = $request->skill_table;
       $skill->skill_path     = $request->skill_path;
       $skill->skill_element  = $request->skill_element;
       $skill->skill_tool     = $request->skill_tool;
       $skill->skill_web      = $request->skill_web;
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
