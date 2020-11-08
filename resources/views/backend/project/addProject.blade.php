@extends('backend.layout')
@section('title','Add Project')
@section('content')

<div id="content">
  <div id="content-header">
    <div id="breadcrumb">
       <a href="{{route('admin.dashboard')}}" title="Go to Dashboard" class="tip-bottom"><i class="icon-home"></i>Dashboard</a>
       <a href="{{route('admin.project.index')}}">Projects</a>
        <a href="#" class="current">Add Project</a>
    </div>
    <h1>Add Project</h1>
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
            <form class="form-horizontal" method="post"
            action="{{route('admin.project.store')}}" enctype="multipart/form-data">
                @csrf
              <div class="control-group">
                <label class="control-label">Project Title</label>
                <div class="controls">
                  <input type="text" name="title" id="title">
                </div>
              </div>

              <div class="control-group">
                <label class="control-label">Project Url</label>
                <div class="controls">
                  <input type="text" name="url" id="url">
                </div>
              </div>

              <div class="control-group">
                <label class="control-label">Project Image</label>
                <div class="controls">
                  <input type="file" name="image" id="image">
                </div>
              </div>

              <div class="control-group">
                <label class="control-label">Project Description</label>
                <div class="controls">
                  <textarea  rows="5" name="description" id="description"></textarea>
                </div>
              </div>

              <div class="form-actions">
                <input type="submit" value="Add Project" class="btn btn-success">
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection
