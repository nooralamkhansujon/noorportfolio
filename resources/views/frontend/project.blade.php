@extends('frontend.layout')
@section('title','Projects')
@section('content')
<section class="s1">
    <div class="main-container">
        <h3 class="project-title"
        style="text-transform: capitalize;">Some of my Past Projects</h3>
        <div class="post-wrapper">
            @foreach($projects as $project)
            <div>
                <div class="post">
                    <a href=""><img class="thumbnail" src="{{asset('images/projects/'.$project->image)}}" alt=""></a>
                    <div class="post-preview">
                        <h4 class="post-title">{{$project->title}}</h4>
                         <p class="post-intro">
                           {{$project->description}}
                         </p>
                        <a target="_blank" href="{{$project->url}}">Go to Site</a>
                    </div>
                </div>
            </div>
           @endforeach
        </div>
    </div>
</section>
@endsection
