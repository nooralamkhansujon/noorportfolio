@extends('backend.layout')
@section('title','Edit Project')
@section('content')

<div id="content">
  <div id="content-header">
    <div id="breadcrumb">
       <a href="{{route('admin.dashboard')}}" title="Go to Dashboard" class="tip-bottom"><i class="icon-home"></i>Dashboard</a>
       <a href="{{route('admin.project.index')}}">Projects</a>
        <a href="#" class="current">Edit Project</a>
    </div>
    <h1>Edit Project</h1>
    @if($errors->any())
        <div class="alert alert-error alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <ul>
                @foreach($errors->all() as $error)
                    <li><strong>{{$error}}</strong></li>
                @endforeach
            </ul>
        </div>
    @endif
    @if(Session::has('message'))
        <div class="alert alert-{{Session('type')}} alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <strong>{!! session('message') !!}</strong>
        </div>
    @endif
  </div>
  <div class="container-fluid"><hr>
    <div class="row-fluid">
      <div class="span12">
        <div class="widget-box">
          <div class="widget-title">
              <span class="icon"> <i class="icon-info-sign"></i> </span>
            <h5>Edit Project</h5>
          </div>
          <div class="widget-content nopadding">
            <form  enctype="multipart/form-data" class="form-horizontal" method="post"
            action="{{route('admin.project.update',$project->id)}}" >
                @csrf
                @method('put')
              <div class="control-group">
                <label class="control-label">Project Title</label>
                <div class="controls">
                  <input type="text" name="title" id="title" value="{{ $project->title }}">
                </div>
              </div>

              <div class="control-group">
                <label class="control-label">Project Url</label>
                <div class="controls">
                  <input type="text" name="url" id="url" value="{{ $project->url }}">
                </div>
              </div>

              <div class="control-group">
                <label class="control-label">Project Image</label>
                <div class="controls">
                  <input type="file" name="image" id="image" value="{{ $project->image }}">
                </div>
              </div>

              <div class="control-group">
                <label class="control-label">Project Description</label>
                <div class="controls">
                  <textarea  rows="5" name="description" id="description">{{ $project->description }}</textarea>
                </div>
              </div>

              <div class="form-actions">
                <input type="submit" value="Update Project" class="btn btn-success">
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection
