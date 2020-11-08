@extends('backend.layout')
@section('title','Profile')
@section('content')

<div id="content">
  <div id="content-header">
    <div id="breadcrumb">
        <a href="{{route('admin.dashboard')}}" title="Go to Dashboard" class="tip-bottom"><i class="icon-home"></i> Dashboard</a>
        <a href="#" class="current">Profile Details</a>
    </div>
    <h1>Profile Details</h1>
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
            <h5>Profile Details</h5>
          </div>
          <div class="widget-content nopadding">
            <form enctype="multipart/form-data" class="form-horizontal" method="post" action="{{route('admin.profile',$profileDetails->id ?? null)}}" name="profileDetails" id="profileDetails" novalidate="novalidate">
                @csrf
              <div class="control-group">
                <label class="control-label">Name</label>
                <div class="controls">
                  <input type="text" name="name" id="name"
                  value="{{ $profileDetails->name ?? '' }}">
                </div>
              </div>
              <div class="control-group">
                <label class="control-label mt-3">Avater Small</label>
                <div class="controls">
                  <input type="file" name="avater_sm" id="avater_sm">
                  @if(isset($profileDetails->avater_sm) && !empty($profileDetails->avater_sm))
                  <span>
                     <img src="{{asset('images/'.$profileDetails->avater_sm)}}" width="80px" height="80px" alt="">
                  </span>
                 @endif
                </div>

              </div>

              <div class="control-group">
                <label class="control-label">Avater Large</label>
                <div class="controls">
                  <input type="file" name="avater_lg" id="avater_lg">
                  @if(isset($profileDetails->avater_lg) && !empty($profileDetails->avater_lg))
                    <span>
                    <img src="{{asset('images/'.$profileDetails->avater_lg)}}" width="100px" height="100px" alt="">
                    </span>
                  @endif
                </div>
              </div>

              <div class="control-group">
                <label class="control-label">About</label>
                <div class="controls">
                  <input type="text" name="about_sm" id="about_sm" value="{{ $profileDetails->about_sm ?? ''}}">
                </div>
              </div>

              <div class="control-group">
                <label class="control-label">Description</label>
                <div class="controls">
                  <textarea name="about_more" rows="10" id="about_more">{{ $profileDetails->about_more ?? '' }}</textarea>
                </div>
              </div>

              <div class="control-group">
                <label class="control-label">Job Title</label>
                <div class="controls">
                  <input name="job_title" id="job_title"
                  value="{{ $profileDetails->job_title ?? ''}}">
                </div>
              </div>
              <div class="form-actions">
                <input type="submit" value="Update profileDetails" class="btn btn-success">
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection
