<!-- meta tag -->
<meta charset="utf-8">
<title>{{ $title ? $title . ' | ' . config('app.name') : config('app.name') }}</title>
<meta name="csrf-token" content="{{ csrf_token() }}" />
<meta name="description" content="">
<!-- responsive tag -->
<meta http-equiv="x-ua-compatible" content="ie=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- favicon -->
<link rel="apple-touch-icon" href="apple-touch-icon.png">
<link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/images/fav-orange.png') }}">
<!-- Bootstrap v5.0.2 css -->
<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/bootstrap.min.css') }}">
<!-- font-awesome css -->
<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/font-awesome.min.css') }}">
<!-- animate css -->
<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/animate.css') }}">
<!-- owl.carousel css -->
<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/owl.carousel.css') }}">
<!-- slick css -->
<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/slick.css') }}">
<!-- off canvas css -->
<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/off-canvas.css') }}">
<!-- linea-font css -->
<link rel="stylesheet" type="text/css" href="{{ asset('assets/fonts/linea-fonts.css') }}">
<!-- flaticon css  -->
<link rel="stylesheet" type="text/css" href="{{ asset('assets/fonts/flaticon.css') }}">
<!-- magnific popup css -->
<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/magnific-popup.css') }}">
<!-- Main Menu css -->
<link rel="stylesheet" href="{{ asset('assets/css/rsmenu-main.css') }}">
<!-- spacing css -->
<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/rs-spacing.css') }}">
<!-- style css -->
<link rel="stylesheet" type="text/css" href="{{ asset('assets/style.css') }}">
<!-- This stylesheet dynamically changed from style.less -->
<!-- responsive css -->
<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/responsive.css') }}">
<!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
            <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->

<link rel="stylesheet" href="{{asset('helper/css/toastr.css')}}" type="text/css" />
<link rel="stylesheet" href="{{asset('helper/css/confirm.css')}}" type="text/css" />

