@extends('backend.layout')
@section('title','Edit Summary')
@section('content')

<div id="content">
  <div id="content-header">
    <div id="breadcrumb">
       <a href="{{route('admin.dashboard')}}" title="Go to Dashboard" class="tip-bottom"><i class="icon-home"></i>Dashboard</a>
       <a href="{{route('admin.summary.index')}}">Summaries</a>
        <a href="#" class="current">Edit Summary</a>
    </div>
    <h1>Summaries</h1>
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
            <h5>Edit Summary</h5>
          </div>
          <div class="widget-content nopadding">
            <form class="form-horizontal" method="post"
            action="{{route('admin.summary.update',$summary->id)}}" name="update_skill" id="update_skill" novalidate="novalidate">
                @csrf
                @method('put')
              <div class="control-group">
                <label class="control-label">Summary</label>
                <div class="controls">
                  <textarea type="text" rows="5" name="summary" id="summary">{{ $summary->summary }}</textarea>
                </div>
              </div>

              <div class="form-actions">
                <input type="submit" value="Update Summary" class="btn btn-success">
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection
