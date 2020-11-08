@extends('backend.layout')
@section('title','Skill List')
@section('content')

<div id="content">
  <div id="content-header">
  <div id="breadcrumb">
      <a href="{{route('admin.dashboard')}}" title="Go to Dasbhoard" class="tip-bottom"><i class="icon-home"></i> Dasbhoard</a>
      <a class="current" disabled>Skills</a>
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
  <div class="container-fluid">
    <hr>
    <div class="row-fluid">
      <div class="span12">
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
            <h5>View Skills</h5>
          </div>
          <div class="widget-content nopadding">
            <table class="table table-bordered data-table">
              <thead>
                <tr>
                  <th>Name</th>
                  <th>Skill Range</th>
                  <th>Status</th>
                  <th>Actions</th>
                </tr>
              </thead>
              <tbody>
              	@foreach($skills as $skill)
                <tr class="gradeX">
                   <td>{{$skill->name}}</td>
                  <td>{{ $skill->skill_range }}</td>
                  <td>{{ $skill->status}}</td>
                  <td class="center">
                      <a href="{{ route('admin.skill.edit',$skill->id) }}" class="btn btn-primary btn-mini">Edit</a>

                      <a rel="{{$skill->id}}" rel1="skill" href="javascript:void(0)" class="btn btn-danger btn-mini deleteRecord">Delete</a>
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
