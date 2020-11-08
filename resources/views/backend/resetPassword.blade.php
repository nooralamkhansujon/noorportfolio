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
        <form class="form-vertical" role="form" method="POST" action="{{ route('admin.reset.password') }}">
                @csrf
                <div class="control-group normal_text">
                    <h3>Noor Portfolio</h3>
                </div>
                <div class="control-group">
                    <div class="controls">
                        <div class="main_input_box">
                            <span class="add-on bg_lg"><i class="icon-user"> </i></span>
                            <input id="email"  contenteditable="false" type="email" name="email" value="{{$admin->email}}" />
                        </div>
                    </div>
                </div>
                <div class="control-group">
                    <div class="controls">
                        <div class="main_input_box">
                            <span class="add-on bg_ly"><i class="icon-lock"></i></span>
                            <input id="password" type="password" name="password" placeholder="Enter New Password" />
                        </div>
                    </div>
                </div>
                <div class="control-group">
                    <div class="controls">
                        <div class="main_input_box">
                            <span class="add-on bg_ly"><i class="icon-lock"></i></span>
                            <input type="password" name="password_confirmation" placeholder="Confirm Password" />
                        </div>
                    </div>
                </div>
                <div class="form-actions">
                    <span class="pull-right"><input type="submit" class="btn btn-success" value="Reset Password" /></span>
                </div>
        </form>
    </div>

    <script src="{{ asset('js/admin/jquery.min.js') }}"></script>
    <script src="{{ asset('js/admin/matrix.login.js') }}"></script>
    <script src="{{ asset('js/admin/bootstrap.min.js') }}"></script>
</body>
</html>
