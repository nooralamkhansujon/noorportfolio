@extends('frontend.layout')
@section('title','Resume')
@section('content')
<section class="s2">
    <div class="main-container">
        <div class="resume-wrapper">
              <div class="resume-column-1">
                    <div id="summery">
                        <h2>Summary</h2>
                        <ul>
                            @foreach($summeries as $summary)
                             <li>{{$summary->summary}}</li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="skills-wrapper">
                        <h2>Skills </h2>
                        <p style="text-transform: capitalize;">
                            FullStack Developer with primary focus on
                            Laravel+vuejs:
                            <a target="_blank" href="resume.pdf">
                                Download Resume
                            </a>
                        </p>
                        <div class="skills">
                            <ul class="skills-name">
                                @foreach($skills as $skill)
                                  <li>{{$skill->name}}</li>
                                @endforeach
                            </ul>
                            <ul>
                                @foreach($skills as $skill)
                                    <li class="circle-wrapper">
                                    <input type="range" class="form-control-range text-primary" disabled value="{{$skill->skill_range}}">
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    <div class="skills-wrapper">
                        <h2>Experiance</h2>
                        <div class="skills" style="text-align:center;padding:20px;">
                                <p>I have no Professional Experience Yet.
                                But I have Sound Knowledge on PHP.I am learning  php and Laravel about two Years.</p>
                        </div>
                    </div>
                    <div class="skills-wrapper">
                        <h2>Completed Projects</h2>
                            <div class="skills" style="justify-content:left;">
                                <ul style="list-style: circle; text-decoration:underline;" >
                                    @foreach($projects as $project)
                                <li><a target="_blank" href="{{$project->url}}" style="color:rgb(20, 174, 201);" >{{$project->url}}</a></li>
                                   @endforeach
                                </ul>
                            </div>
                    </div>
              </div>
            <div class="resume-column-2" >
                <div class="resume-user">
                    <div class="resume-user-image-wrapper">
                        {{-- <img class="resume-image"
                        src="{{asset('images/'.$profileDetails->avater_sm)}}"
                        alt=""> --}}
                        <img class="resume-image"
                        src="{{asset('images/noor.jpg')}}"
                        alt="">
                    </div>
                    <h3> {{$profileDetails->name}}</h3>
                    <p style="text-transform: capitalize;">
                       {{$profileDetails->job_title}}
                    </p>
                </div>
                <div class="resume-contact">
                    <h2>Contact</h2>
                    <div class="resume-contact-wrapper">
                        <div class="contact">
                            <h5>Address</h5>
                            <ul>
                                <li>Kulaura,Moulvibazr Sylhet</li>
                            </ul>
                        </div>
                        <div class="contact">
                            <h5>Mobile No.</h5>
                            <ul>
                                <li>01725760300</li>
                            </ul>
                        </div>
                        <div class="contact">
                            <h5>Email</h5>
                            <ul>
                                <li>nooralamkhansujon@gmail.com</li>
                                <li>jakirmpi227125@gmail.com</li>
                                <li>Fahimkhanmpi373950@gmail.com</li>
                            </ul>
                        </div>
                        <div class="contact">
                            <h5>Links</h5>
                            {{-- {{dd($facebook->url)}} --}}
                            <ul class="social_link">
                                @if(isset($twitter) && !empty($twitter))
                                  <li><a target="_blank"  href="{{$twitter->url}}"><i class="fab fa-twitter"></i></a></li>
                                @endif
                                <li><a  target="_blank" href="{{$facebook->url}}"><i class="fab fa-facebook"></i></a></li>
                                <li><a target="_blank"  href="{{$github->url}}"><i class="fab fa-github"></i></a></li>
                                <li><a  target="_blank" href="{{$linkedIn->url}}"><i class="fab fa-linkedin"></i></a></li>
                            </ul>
                        </div>
                        <div class="contact">
                            <h5>Education</h5>
                            <div style="text-align: left;" class="pl-2 mt-4">
                                <h6>Diploma Engineering Completed (computer Teachnology) </h6>
                                <small>Moulvibazar polytechnic institute</small><br/>
                                <small> Shamsher Nagar Road, Moulvibazar,sylhet</small>
                            </div>
                        </div>
                    </div>
               </div>
            </div>
        </div>
    </div>
</section>
@endsection
