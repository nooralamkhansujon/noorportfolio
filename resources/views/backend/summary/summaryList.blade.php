@extends('backend.layout')
@section('title','Summary List')
@section('content')

<div id="content">
  <div id="content-header">
  <div id="breadcrumb">
      <a href="{{route('admin.dashboard')}}" title="Go to Dasbhoard" class="tip-bottom"><i class="icon-home"></i> Dasbhoard</a>
      <a class="current" disabled>Summaries</a>
    <h1>Summaries</h1>
    @if(Session::has('message'))
        <div class="alert alert-{{Session('type')}} alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <strong>{!! session('message') !!}</strong>
        </div>
   @endif
  </div>
  <div class="container-fluid">
    <hr>
    <div class="row-fluid">
      <div class="span12">
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
            <h5>View Summary</h5>
          </div>
          <div class="widget-content nopadding">
            <table class="table table-bordered data-table">
              <thead>
                <tr>
                  <th>Summary Id</th>
                  <th>Summary</th>
                  <th>Actions</th>
                </tr>
              </thead>
              <tbody>
              	@foreach($summaries as $summary)
                <tr class="gradeX">
                  <td>{{ $summary->id }}</td>
                  <td>{{ $summary->summary }}</td>
                  <td class="center">
                      <a href="{{ route('admin.summary.edit',$summary->id) }}" class="btn btn-primary btn-mini">Edit</a>
                      <a rel="{{$summary->id}}" rel1="summary" href="javascript:void(0)" class="btn btn-danger btn-mini deleteRecord">Delete</a>
                  </td>
                </tr>
                @endforeach

              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection
