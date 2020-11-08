@extends('backend.layout')
@section('title','Deshboard')
@section('content')

<div id="content" style="height:80vh;">
  <div id="content-header">
  <div id="breadcrumb">

    <a class="current" disabled >Dasbhoard</a>
  </div>
    <h1>Dasboard</h1>
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
        <h1>Welcome to my website</h1>
    </div>
  </div>
</div>

@endsection
