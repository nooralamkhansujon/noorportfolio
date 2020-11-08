@extends('frontend.layout')
@section('title','Contact')
@section('content')
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
                    <div class="alert alert-{{Session('type')}} text-light alert-block">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                        <strong>{!! session('message') !!}</strong>
                    </div>
                @endif
            </div>
       </div>
      <h3 style="text-align:center">Get In Touch</h3>
       <form id="contact-form"  action="{{route('contactEmail')}}" method="POST">
          @csrf
          <label>Name:</label>
          <input class="input-field" name="name" type="text" required>

          <label>Subject:</label>
          <input class="input-field" name="subject" type="text" required>

          <label>Email:</label>
          <input class="input-field" name="email" type="text" required>

          <label>Message:</label>
          <textarea class="input-field"name="message" type="text" required></textarea>
          <input id="submit-btn" type="submit" value="Send">
      </form>
    </div>
</section>

{{-- <section class="s1">
    <div class="main-container">
         <div class="comment-wrapper">
              <div id="comment-form">
                <h3 style="text-align:left;">Comment</h3>
                <form >
                    <textarea class="comment-field"
                     name="comment" placeholder="Enter Comment" ></textarea>
                    <input id="comment-btn" type="submit" value="comment">
                </form>
              </div>

              <div class="comment-list">
                <h3 style="text-align:left;">Comment List</h3>
                <div class="comment">
                    <div class="comment-image">
                    <img src="{{asset('images/noor.jpg')}}"   alt="">
                    </div>
                    <div class="comment-text">
                        <h5>Noor alam khan</h5>
                        <small>17 july,2019</small>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Officia a reiciendis inventore eveniet vel ab itaque vero quidem quod expedita.</p>
                    </div>
                </div>
                <div class="comment">
                    <div class="comment-image">
                    <img src="{{asset('images/noor.jpg')}}"   alt="">
                    </div>
                    <div class="comment-text">
                        <h5>Noor alam khan</h5>
                        <small>17 july,2019</small>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Officia a reiciendis inventore eveniet vel ab itaque vero quidem quod expedita.</p>
                    </div>
                </div>
                <div class="comment">
                    <div class="comment-image">
                    <img src="{{asset('images/noor.jpg')}}"   alt="">
                    </div>
                    <div class="comment-text">
                        <h5>Noor alam khan</h5>
                        <small>17 july,2019</small>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Officia a reiciendis inventore eveniet vel ab itaque vero quidem quod expedita.</p>
                    </div>
                </div>
              </div>
         </div>
    </div>
</section> --}}

@endsection
