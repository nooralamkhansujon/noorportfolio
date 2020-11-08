@extends('backend.layout')
@section('title','Edit Project')
@section('content')

<div id="content">
  <div id="content-header">
  <div id="breadcrumb">
      <a href="{{route('admin.dashboard')}}" title="Go to Dasbhoard" class="tip-bottom"><i class="icon-home"></i> Dasbhoard</a>
      <a class="current" disabled>Projects</a>
    <h1>Projects</h1>
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
            <h5>View Projects</h5>
          </div>
          <div class="widget-content nopadding">
            <table class="table table-bordered data-table">
              <thead>
                <tr>
                  <th>Project Id</th>
                  <th>Title</th>
                  <th>Project URL</th>
                  <th>Image</th>
                  <th width="20%">Description</th>
                  <th>Actions</th>
                </tr>
              </thead>
              <tbody>
              	@foreach($projects as $project)
                 <tr class="gradeX">
                        <td>{{ $project->id }}</td>
                        <td>{{ $project->title }}</td>
                        <td>{{ $project->url }}</td>
                        <td>
                           <img width="150px" src="{{asset('images/projects/'. $project->image )}}" alt="">
                        </td>
                        <td>{{ $project->description }}</td>
                        <td class="center">
                            <a href="{{ route('admin.project.edit',$project->id) }}" class="btn btn-primary btn-mini">Edit</a>
                            <a rel="{{$project->id}}" rel1="project" href="javascript:void(0)" class="btn btn-danger btn-mini deleteRecord">Delete</a>
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
