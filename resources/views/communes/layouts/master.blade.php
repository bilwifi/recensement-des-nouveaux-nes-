<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="ltr">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="Bil Wifi" content="{{ config('app.name') }} by KinDev">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href={{ asset('favicon.ico') }}>
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ !empty ($title) ? $title .' | '. config('app.name') : config('app.name') }}  </title>

    @yield('stylesheet1')
        <!-- Custom CSS -->
    <link href="{{ asset('bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    @yield('stylesheet')
    <!-- Coustom styleSheet--->
    @stack('stylesheets')


</head>

  <body>

@include('communes.layouts.partials._header')
{{-- @include('communes.layouts.partials._header_img') --}}
@include('communes.layouts.partials._nav')
<br>
    <div class="container-fluid clearfix">
        <div class="container">
            @include('partials._msgFlash')
        </div>
@yield('content')
    </div>
@include('communes.layouts.partials._footer')



    <script src={{ asset('backend/assets/libs/jquery/dist/jquery.min.js') }}></script>
    <script src={{ asset('backend/assets/libs/bootstrap/dist/js/bootstrap.min.js') }}></script>
    
  
    <!-- this page js -->

@stack('scripts')

  </body>

<!-- Mirrored from getbootstrap.com/docs/4.1/examples/pricing/ by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 07 Nov 2018 23:41:46 GMT -->
</html>
