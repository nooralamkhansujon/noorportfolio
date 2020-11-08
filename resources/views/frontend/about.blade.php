@extends('frontend.layout')
@section('title','About')
@section('content')
<section class="s2">
    <div class="main-container">
           <div class="about-wrapper">
               <div class="grid-column-1">
                    <div class="about-image">
                        <img src="{{asset('images/'.$profileDetails->avater_lg)}}"  alt="">
                    </div>

                    <h4 >TOP EXPERTISE</h4>
                    <p>
                        FullStack Developer with primary focus on Laravel+vuejs: <a target="_blank" href="resume.pdf">Download Resume</a>
                    </p>
                    <div id="skills">
                        @foreach($skills->chunk(7) as $chunk_skills)
                            <ul>
                                @foreach($chunk_skills as $skill)
                                    <li>{{$skill->name}}</li>
                                @endforeach
                            </ul>
                       @endforeach
                    </div>
                </div>
                <div class="grid-column-2">
                    <h3 style="text-align:center;text-transform:capitalize;">Hi, I am
                        {{$profileDetails->job_title}}
                    </h3>
                    <div class="about-description">
                       <p> {{$profileDetails->about_more}}</p>
                    </div>
                </div>
            </div>
    </div>
</section>
@endsection
