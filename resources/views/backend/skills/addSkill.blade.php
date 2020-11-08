@extends('backend.layout')
@section('title','Add Skill')
@section('content')

<div id="content">
  <div id="content-header">
    <div id="breadcrumb">
       <a href="{{route('admin.dashboard')}}" title="Go to Dashboard" class="tip-bottom"><i class="icon-home"></i>Dashboard</a>
       <a href="{{route('admin.skills.index')}}">Skills</a>
        <a href="#" class="current">Add Skill</a>
    </div>
    <h1>Skills</h1>
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
    <div class="alert alert-{{session('type')}} alert-block">
        <button type="button" class="close" data-dismiss="alert">×</button>
        <strong>{!! session('message') !!}</strong>
    </div>
  @endif
  </div>
  <div class="container-fluid"><hr>
    <div class="row-fluid">
      <div class="span12">
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"> <i class="icon-info-sign"></i> </span>
            <h5>Add Skill</h5>
          </div>
          <div class="widget-content nopadding">
            <form class="form-horizontal" method="post" action="{{route('admin.skill.create')}}" name="add_skill" id="add_skill" novalidate="novalidate">
                @csrf
              <div class="control-group">
                <label class="control-label">Skill Name</label>
                <div class="controls">
                  <input type="text" name="name" id="name">
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">Skill Range</label>
                <div class="controls">
                  <input type="text" name="skill_range" id="skill_range">
                </div>
              </div>

              <div class="control-group">
                <label class="control-label">Status</label>
                <div class="controls">
                  <input type="checkbox" name="status"  id="status" value="1">
                </div>
              </div>

              <div class="form-actions">
                <input type="submit" value="Add Skill" class="btn btn-success">
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection
