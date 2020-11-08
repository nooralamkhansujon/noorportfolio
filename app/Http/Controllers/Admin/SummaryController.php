<?php

namespace App\Http\Controllers\Admin;

use App\Summary;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class SummaryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $summaries = Summary::all();
        return view('backend.summary.summaryList',compact('summaries'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.summary.addSummary');
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
            'summary'         => 'required|max:500',

        ]);

        if ($validator->fails()) {
            return redirect(route('admin.summary.create'))
                        ->withErrors($validator)
                        ->withInput($request->all());
        }

        //Store data in profile table
        $data  = array(
            'summary'  => $request->summary,
        );
        $summary = Summary::create($data);
        $this->setSuccess('summary Created successfully');
        return redirect(route('admin.summary.index'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Summary  $summary
     * @return \Illuminate\Http\Response
     */
    public function edit(Summary $summary)
    {
        return view('backend.summary.editSummary',compact('summary'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Summary  $summary
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Summary $summary)
    {
        $validator = Validator::make($request->all(), [
            'summary'  => 'required|max:500',
        ]);

        if ($validator->fails()) {
            return redirect(route('admin.summary.edit',$summary))
                        ->withErrors($validator);
        }

        //Store data in profile table
        $data  = array(
            'summary'  => $request->summary,
        );

        $summary->update($data);
        $this->setSuccess('Summary Update successfully');
        return redirect(route('admin.summary.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Summary  $summary
     * @return \Illuminate\Http\Response
     */
    public function destroy(Summary $summary)
    {
        if($summary->delete())
            return response()->json('Summary has been Deleted !');
        else
            return response()->json('Summary Not deleted!',500);
    }
}
