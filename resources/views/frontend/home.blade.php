<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="author" content="Noor alam khan">
    <meta name="description" content="this is my portfolio site. I designed this using html,css,javascript,php/laravel framework and mysql">
    <meta name="keywords" content="portfolio,port,noor,alam,khan">
    <title>Noor Alam Khan | Home</title>
    <link rel="icon" href ="{{asset('images/icon.png')}}" type = "image/x-icon">
    <link href="https://fonts.googleapis.com/css2?family=Russo+One&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Mono:wght@500&family=Russo+One&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <link rel="stylesheet" href=""
    id="theme-style" type="text/css">

</head>
<body>
    <section class="s1">
        <div class="main-container">
            <div class="greeting-wrapper">
               <h1>HI, I am {{$profileDetails->name}}</h1>
            </div>

            <div class="intro-wrapper">
               @include('frontend.partial.nav')
                <div class="left-column">
                    <img id="profile_pic" src="{{asset('images/'.$profileDetails->avater_sm)}}" alt="">
                    <h5 style="text-align:center;">Personalize Theme</h5>
                    <div id="theme-options-wrapper">
                        <div data-mode="light" id="light-mode" class="theme-dot"></div>
                        <div data-mode="blue" id="blue-mode"
                        class="theme-dot"></div>
                        <div data-mode="green" id="green-mode" class="theme-dot"></div>
                        <div data-mode="purple" id="purple-mode" class="theme-dot"></div>
                    </div>
                     <p id="settings-note">Theme settings will be saved for<br/>your next vist</p>
                </div>
                <div class="right-column">
                    <div id="preview-shadow">
                        <div id="preview">
                            <div id="corner-tl" class="corner"></div>
                            <div id="corner-tr" class="corner"></div>
                            <h3>what I Do</h3>
                            <p>{{$profileDetails->about_sm}}</p>
                            <div id="corner-br" class="corner"></div>
                            <div id="corner-bl" class="corner"></div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>

    <section class="s2">
        <div class="main-container">
            <div class="about-wrapper">
                <div class="about-me">
                    <h4 style="text-transform: uppercase;">
                        More About me
                    </h4>
                     <p>{{$profileDetails->about_more}}</p>
                    <hr>
                    <h4>TOP EXPERTISE</h4>
                    <p>
                        FullStack Developer with primary focus on Laravel+vuejs: <a target="_blank" href="resume.pdf">Download Review</a>
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

                <div class="social-links">
                   <img id="social_img" src="{{asset('images/php.jpg')}}" alt="">
                   <h3>Find me on Facebook & LinkedIn</h3>
                   <a href="{{$facebook->url}}"
                   target="_blank">Facebook:@ {{$profileDetails->name}}</a>
                   <a href="{{$linkedIn->url}}"
                    target="_blank">LinkedIn:@ {{$profileDetails->name}}</a>
                </div>

            </div>
        </div>
    </section>

    <section class="s1">
        <div class="main-container">
            <h3 class="project-title">Some of my Past Projects</h3>
            <div class="post-wrapper">
                @foreach($projects as $project)
                <div>
                    <div class="post">
                        <img class="thumbnail" src="{{asset('images/projects/'.$project->image)}}" alt="">
                        <div class="post-preview">
                            <h4 class="post-title">{{$project->title}}</h4>
                             <p class="post-intro" style="text-transform: capitalize;">
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
    <section class="s2">
        <div class="main-container">
            <div class="row">
                <div class="col-sm-8 offset-sm-2">
                    @if(count($errors) > 0)
                    <ul class="alert alert-danger">
                      <button type="button" class="close" data-dismiss="alert">×</button>
                       @foreach($errors->all() as $error)
                          <li>{{$error}}</li>
                       @endforeach
                    </ul>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-sm-8 offset-sm-2">
                    @if(Session::has('message'))
                        <div class="alert alert-{{Session('type')}} alert-block">
                            <button type="button" class="close" data-dismiss="alert">×</button>
                            <strong>{!! session('message') !!}</strong>
                        </div>
                    @endif
                </div>
           </div>
          <h3 style="text-align:center">Get In Touch</h3>
          <form id="contact-form" action="{{route('contactEmail')}}" method="POST">
            @csrf
              <label>Name:</label>
              <input class="input-field" name="name" type="text" required>

              <label>Subject:</label>
              <input class="input-field" name="subject" type="text" required>

              <label>Email:</label>
              <input class="input-field" name="email" type="text" required>

              <label>Message:</label>
              <textarea class="input-field" name="message" type="text" required></textarea>

              <input id="submit-btn" type="submit" value="Send">
          </form>
        </div>
    </section>
    <script src="{{asset('js/main.js')}}"></script>
</body>
</html>
