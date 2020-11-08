<?php

namespace App\Http\Controllers\Admin;

use App\Education;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class EducationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $education_all = education::all();
        return view('backend.education.education',compact('education_all'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('backend.education.addeducation');
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
            'degree_name' => 'required|string',
            'from_where'  => 'required|string|max:300',
            'address'     => 'required|string',
            'subject'     => 'required|string'
        ]);

        if ($validator->fails()) {
            return redirect(route('admin.education.create'))
                        ->withErrors($validator)
                        ->withInput($request->all());
        }

        //Store data in profile table
        $data  = array(
            'degree_name' => $request->degree_name,
            'from_where'  => $request->from_where,
            'address'     => $request->address,
            'subject'     => $request->subject
        );
        $education  = education::create($data);

        if(!$education)
        {
            $this->setError('Error! Education not created!');
            return redirect(route('admin.education.create'));
        }
        $this->setSuccess('Education Created successfully');
        return redirect(route('admin.education.index'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Education  $education
     * @return \Illuminate\Http\Response
     */
    public function edit(Education $education)
    {
        return view('backend.education.addeducation',compact('education'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Education  $education
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Education $education)
    {
        $validator = Validator::make($request->all(), [
            'degree_name' => 'required|string',
            'from_where'  => 'required|string|max:300',
            'address'     => 'required|string',
            'subject'     => 'required|string'
        ]);

        if ($validator->fails()) {
            return redirect(route('admin.education.edit',$education))
                        ->withErrors($validator);
        }

        //Store data in profile table
        $data  = array(
            'degree_name' => $request->degree_name,
            'from_where'  => $request->from_where,
            'address'     => $request->address,
            'subject'     => $request->subject
        );

        if(!$education->update($data))
        {
            $this->setError('Error! Education not Updated!');
            return redirect(route('admin.education.edit',$education));
        }

        $this->setSuccess('Education Updated successfully');
        return redirect(route('admin.education.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Education  $education
     * @return \Illuminate\Http\Response
     */
    public function destroy(Education $education)
    {
        if($education->delete()){
            $this->setSuccess('Education deleted successfully!');
            return redirect(route('admin.education.index'));
        }
        $this->setError('Education Not deleted!');
        return redirect(route('admin.education.index'));
    }
}
