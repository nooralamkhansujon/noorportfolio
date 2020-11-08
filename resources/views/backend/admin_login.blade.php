<!DOCTYPE html>
<html lang="en">
<head>
        <title>Admin | Noor Portfolio </title>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link rel="stylesheet" href="{{ asset('css/admin/bootstrap.min.css') }}" />
        <link rel="stylesheet" href="{{ asset('css/admin/bootstrap-responsive.min.css') }}" />
        <link rel="stylesheet" href="{{ asset('css/admin/matrix-login.css') }}" />
        <link href="{{ asset('fonts/admin/css/font-awesome.css') }}" rel="stylesheet" />
        <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800' rel='stylesheet' type='text/css'>


    </head>
    <body>
        <div id="loginbox">
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
        <form class="form-vertical" role="form" method="POST" action="{{ url('admin') }}">
                @csrf
                <div class="control-group normal_text">
                    <h3>Noor Portfolio</h3>
                </div>
                <div class="control-group">
                    <div class="controls">
                        <div class="main_input_box">
                            <span class="add-on bg_lg"><i class="icon-user"> </i></span>
                            <input id="username" type="text" name="username" placeholder="Enter username" />
                        </div>
                    </div>
                </div>
                <div class="control-group">
                    <div class="controls">
                        <div class="main_input_box">
                            <span class="add-on bg_ly"><i class="icon-lock"></i></span>
                            <input id="password" type="password" name="password" placeholder="Password" />
                        </div>
                    </div>
                </div>
                <div class="form-actions">
                    <span class="pull-left"><a href="#" class="flip-link btn btn-info" id="to-recover">Lost password?</a></span>
                    <span class="pull-right"><input type="submit" class="btn btn-success" value="Login" /></span>
                </div>
        </form>
        <form id="recoverform" action="{{route('admin.recover.password.email')}}" method="POST" class="form-vertical">
            @csrf
            <p class="normal_text">Enter your e-mail address below and we will send you instructions how to recover a password.</p>

                <div class="controls">
                    <div class="main_input_box">
                        <span class="add-on bg_lo"><i class="icon-envelope"></i></span>
                        <input type="email" name="email" placeholder="E-mail address" required />
                    </div>
                </div>

            <div class="form-actions">
                <span class="pull-left"><a href="#" class="flip-link btn btn-success" id="to-login">&laquo; Back to login</a></span>
                <span class="pull-right"><button type="submit" class="btn btn-info">Reecover</button></span>
            </div>
        </form>
    </div>

    <script src="{{ asset('js/admin/jquery.min.js') }}"></script>
    <script src="{{ asset('js/admin/matrix.login.js') }}"></script>
    <script src="{{ asset('js/admin/bootstrap.min.js') }}"></script>
</body>
</html>
