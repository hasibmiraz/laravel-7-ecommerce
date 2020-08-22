<!DOCTYPE html>
<html lang="en">
<head>
	<title>@yield('title')</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="{{ asset('frontend/login/images/icons/favicon.ico') }}"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('frontend/login/vendor/bootstrap/css/bootstrap.min.css') }}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('frontend/login/fonts/font-awesome-4.7.0/css/font-awesome.min.css') }}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('frontend/login/fonts/iconic/css/material-design-iconic-font.min.css') }}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('frontend/login/vendor/animate/animate.css') }}">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="{{ asset('frontend/login/vendor/css-hamburgers/hamburgers.min.css') }}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('frontend/login/vendor/animsition/css/animsition.min.css') }}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('frontend/login/vendor/select2/select2.min.css') }}">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="{{ asset('frontend/login/vendor/daterangepicker/daterangepicker.css') }}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('frontend/login/css/util.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('frontend/login/css/main.css') }}">
<!--===============================================================================================-->
</head>
<body>

@yield('content')

    
    <!--===============================================================================================-->
	    <script src="{{ asset('frontend/loginvendor/jquery/jquery-3.2.1.min.js') }}"></script>
    <!--===============================================================================================-->
        <script src="{{ asset('frontend/loginvendor/animsition/js/animsition.min.js') }}"></script>
    <!--===============================================================================================-->
        <script src="{{ asset('frontend/loginvendor/bootstrap/js/popper.js') }}"></script>
        <script src="{{ asset('frontend/loginvendor/bootstrap/js/bootstrap.min.js') }}"></script>
    <!--===============================================================================================-->
        <script src="{{ asset('frontend/loginvendor/select2/select2.min.js') }}"></script>
    <!--===============================================================================================-->
        <script src="{{ asset('frontend/loginvendor/daterangepicker/moment.min.js') }}"></script>
        <script src="{{ asset('frontend/loginvendor/daterangepicker/daterangepicker.js') }}"></script>
    <!--===============================================================================================-->
        <script src="{{ asset('frontend/loginvendor/countdowntime/countdowntime.js') }}"></script>
    <!--===============================================================================================-->
        <script src="{{ asset('frontend/loginjs/main.js') }}"></script>
    
</body>
</html>