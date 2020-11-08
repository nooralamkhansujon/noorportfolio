<?php

namespace App\Http\Controllers\Admin;

use App\Skill;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class SkillController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $skills = Skill::all();
        return view('backend.skills.skillList',compact('skills'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.skills.addSkill');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $validator = Validator::make($request->all(), [
            'name'         => 'required|max:120',
            'skill_range'  => 'required|integer',
        ]);


        if ($validator->fails()) {
            return redirect(route('admin.skill.create'))
                        ->withErrors($validator)
                        ->withInput($request->all());
        }


        //Store data in profile table
        $data  = array(
            'name'         => $request->name,
            'skill_range'  => $request->skill_range,
        );
        if($request->has('status')){
            $data['status'] = '1';
        }
        else{
            $data['status'] = '0';
        }
        Skill::create($data);
        $this->setSuccess('Skill Created successfully');
        return redirect(route('admin.skills.index'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Skill  $skill
     * @return \Illuminate\Http\Response
     */
    public function edit(Skill $skill)
    {
        return view('backend.skills.editskill',compact('skill'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Skill  $skill
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Skill $skill)
    {
        $validator = Validator::make($request->all(), [
            'name'         => 'required|max:120',
            'skill_range'  => 'required|integer',
        ]);

        if ($validator->fails()) {
            return redirect(route('admin.skill.edit',$skill))
                        ->withErrors($validator);
        }

        //Store data in profile table
        $data  = array(
            'name'         => $request->name,
            'skill_range'  => $request->skill_range,
        );

        if($request->has('status')){
            $data['status'] = '1';
        }
        else{
            $data['status'] = '0';
        }

        $skill->update($data);

        $this->setSuccess('Skill Updated successfully');
        return redirect(route('admin.skills.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Skill  $skill
     * @return \Illuminate\Http\Response
     */
    public function destroy(Skill $skill)
    {
        if($skill->delete())
            return response()->json('Skill has been Deleted !');
        else
            return response()->json('Skill Not deleted!');
    }
}
