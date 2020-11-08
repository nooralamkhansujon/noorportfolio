<?php

namespace App\Http\Controllers\Admin;

use App\Reference;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class ReferenceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $references = reference::all();
        return view('backend.reference.referenceList',compact('references'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.reference.addreference');
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
            'name'          => 'required|string|max:80',
            'qualification' => 'required|string|max:180',
            'address'       => 'required|string',
        ]);

        if ($validator->fails()) {
            return redirect(route('admin.reference.create'))
                        ->withErrors($validator)
                        ->withInput($request->all());
        }

        //Store data in profile table
        $data  = array(
            'name'          => $request->name,
            'qualification' => $request->qualification,
            'address'       => $request->address,
        );
        $reference  = reference::create($data);

        if(!$reference)
        {
            $this->setError('Error! reference not created!');
            return redirect(route('admin.reference.create'));
        }

        $this->setSuccess('reference Created successfully');
        return redirect(route('admin.reference.index'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Reference  $reference
     * @return \Illuminate\Http\Response
     */
    public function edit(Reference $reference)
    {
        return view('backend.reference.addreference',compact('reference'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Reference  $reference
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Reference $reference)
    {
        $validator = Validator::make($request->all(), [
            'name'          => 'required|string|max:80',
            'qualification' => 'required|string|max:180',
            'address'       => 'required|string',
        ]);


        if ($validator->fails()) {
            return redirect(route('admin.reference.edit',$reference))
                        ->withErrors($validator);
        }

        //Store data in profile table
        $data  = array(
            'name'          => $request->name,
            'qualification' => $request->qualification,
            'address'       => $request->address,
        );

        if(!$reference->update($data))
        {
            $this->setError('Error! reference not Updated!');
            return redirect(route('admin.reference.edit',$reference));
        }

        $this->setSuccess('reference Update successfully');
        return redirect(route('admin.reference.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Reference  $reference
     * @return \Illuminate\Http\Response
     */
    public function destroy(Reference $reference)
    {
        if($reference->delete()){

            $this->setSuccess('Reference deleted successfully!');
            return redirect(route('admin.reference.index'));
        }
        $this->setError('Reference Not deleted!');
        return redirect(route('admin.reference.index'));
    }
}
