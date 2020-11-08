<!DOCTYPE html>
<html lang="en">
<head>
<title>Noor Alam | @yield("title")</title>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<meta name="csrf-token" content="{{ csrf_token() }}">
<link rel="icon" href ="{{asset('images/icon.png')}}" type = "image/x-icon">
<link rel="stylesheet" href="{{ asset('css/admin/bootstrap.min.css') }}" />
<link rel="stylesheet" href="{{ asset('css/admin/bootstrap-responsive.min.css') }}" />
<link rel="stylesheet" href="{{ asset('css/admin/matrix-style.css') }}" />
<link rel="stylesheet" href="{{ asset('css/admin/matrix-media.css') }}" />
<link href="{{ asset('fonts/admin/css/font-awesome.css') }}" rel="stylesheet" />
<link rel="stylesheet" href="{{ asset('css/admin/jquery.gritter.css') }}" />
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800' rel='stylesheet' type='text/css'>

<link rel="stylesheet" href="{{ asset('css/admin/jquery-ui.min.css') }}" />
<script src="{{ asset('js/admin/jquery.min.js') }}"></script>
<script src="{{ asset('js/admin/jquery-ui.min.js') }}"></script>

</head>
<body>

@include('backend.partial.admin_header')

@include('backend.partial.admin_sidebar')

@yield('content')

@include('backend.partial.admin_footer')


<script src="{{ asset('js/admin/sweetalert2.js') }}"></script>
<script src="{{ asset('js/admin/axios.min.js') }}"></script>
<script src="{{ asset('js/admin/jquery.ui.custom.js') }}"></script>
<script src="{{ asset('js/admin/bootstrap.min.js') }}"></script>
<script src="{{ asset('js/admin/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('js/admin/jquery.validate.js') }}"></script>
<script src="{{ asset('js/admin/matrix.js') }}"></script>
<script src="{{ asset('js/admin/matrix.form_validation.js') }}"></script>
<script src="{{ asset('js/admin/matrix.tables.js') }}"></script>
<script src="{{ asset('js/admin/matrix.popover.js') }}"></script>

</body>
</html>
