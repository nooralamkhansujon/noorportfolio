<?php

namespace App\Http\Controllers\Admin;

use App\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projects = Project::all();
        return view('backend.project.projectList',compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.project.addProject');
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title'        => 'required|string|max:180',
            'url'          => 'required|url|active_url',
            'description'  => 'required',
        ]);

        if ($validator->fails()) {
            return redirect(route('admin.project.create'))
                        ->withErrors($validator)
                        ->withInput($request->all());
        }

        //Store data in profile table
        $data  = array(
            'title'       => $request->title,
            'url'         => $request->url,
            'description' => $request->description
        );
        // Upload Image
        if($request->hasFile('image')){
            $image_tmp = $request->image;
            if($image_tmp->isValid()){
                $extension         = $image_tmp->getClientOriginalExtension();
                $filename          = "projects_".rand(111,99999).'.'.$extension;
                $image_path        = public_path('images/projects/'.$filename);
                Image::make($image_tmp)->resize(300,300)->save($image_path);

                // Store image name in profiles table
                $data['image'] = $filename;
            }
            else{
                $this->setError('Image Field is not valid Image');
                return redirect()->back();
            }
        }
        else{
            $this->setError('Image Field is required');
            return redirect()->back();
        }
        Project::create($data);
        $this->setSuccess('Project Created successfully');
        return redirect(route('admin.project.index'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project)
    {
        return view('backend.project.editProject',compact('project'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Project $project)
    {
        $validator = Validator::make($request->all(), [
            'title'        => 'required|string|max:180',
            'url'          => 'required|url|active_url',
            'description'  => 'required',
        ]);

        if ($validator->fails()) {
            return redirect(route('admin.project.edit',$project))
                        ->withErrors($validator);
        }

        //Store data in profile table
        $data  = array(
            'title'       => $request->title,
            'url'         => $request->url,
            'description' => $request->description
        );

         // Upload Image
         if($request->hasFile('image')){
            $image_tmp = $request->image;
            if($image_tmp->isValid()){
                $extension         = $image_tmp->getClientOriginalExtension();
                $filename          = "project_".rand(111,99999).'.'.$extension;
                $image_path        = public_path('images/projects/'.$filename);
                Image::make($image_tmp)->resize(300,300)->save($image_path);

                // Store image name in profiles table
                $data['image'] = $filename;
            }
            else{
                $this->setError('Image Field is not valid Image');
                return redirect()->back();
            }
        }
        else{
            $data['image']  = $project->image;
        }

        $project->update($data);
        $this->setSuccess('Project Updated successfully');
        return redirect(route('admin.project.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {
        if($project->delete())
            return response()->json('Project has been Deleted !');
        else
            return response()->json('Project Not deleted!',500);
    }
}
