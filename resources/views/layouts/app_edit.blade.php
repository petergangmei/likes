<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" ></script>

  <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <!-- Styles -->
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">
    <link href="{{ asset('css/pomelo-toast.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>

    <div id="app">

<nav class="navbar navbar-expand-md navbar-light navbar-laravel fixed-top"  id="custom-nav">
    <div class="container">

    <i class="fa fa-close cursor-pointer" id="close-btn" data-toggle="modal" data-target="#spinner" style="font-size: 23px; color: #807D70;"></i>
        <div class="mx-auto">
        <a class="navbar-brand" href="#">
       <b> <div id="custom-text"></div></b>
        </a>
        </div>


    
    <i class="fa fa-check cursor-pointer edit-nav" id="ok-btn-update-profile" data-toggle="modal" data-target="#spinner" style="font-size: 23px; color: #807D70;"></i>
    <i class="fa fa-check cursor-pointer edit-nav" id="ok-btn-update-account-setting" data-toggle="modal" data-target="#spinner" style="font-size: 23px; color: #807D70;"></i>
   
    <i class="fa fa-check cursor-pointer edit-nav" id="ok-btn-update-preferance"  style="font-size: 23px; color: #807D70;"></i>

    </div>
<div class="toast-body mx-auto"><i class="fa fa-exclamation-circle"></i> <span id="toast"></span></div>

</nav>

        <main class="" style="margin-top: 40px;">
            @yield('content')

        
        <nav class="navbar fixed-bottom navbar-light"     id="navibar" style="background-color: #F8F2F0;">

          

          <a class="navbar-brand" href="/feeds"><i class="fa fa-home" data-toggle="modal" data-target="#spinner" style="font-size:20px;  color: #CAC3C1;"></i></a>
          <a class="navbar-brand" href="/search"><i class="fa fa-search" data-toggle="modal" data-target="#spinner" style="font-size:20px;  color: #CAC3C1;"></i></a>
          <a class="navbar-brand" href="/swipes"><i class="fa fa-clone" data-toggle="modal" data-target="#spinner" style="font-size:23px;  color: #CAC3C1;"></i></a>
          
          <a class="navbar-brand" href="/notification"><i class="fa fa-globe" data-toggle="modal" data-target="#spinner" style="font-size:20px; color: #CAC3C1;" ></i>

          </a>
          <a class="navbar-brand" href="/home"><i class="fa fa-user" data-toggle="modal" data-target="#spinner" style="font-size:20px; color: #CAC3C1;"></i></a>
        </nav>

        </main>
<!-- spinner/loader -->
<div class="modal fade" id="spinner" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered text-center" role="document">
    <div class="mx-auto">
    <i class="fa fa-spinner fa-spin" style="font-size:50px; color:white;"></i>
    </div>
  </div>
</div>
<!-- spinner/loader -->        
    </div>
    <script src="{{ asset('js/activeness.js') }}" ></script>
    <script src="{{ asset('js/custom.js') }}" ></script>
    <script src="{{ asset('js/ajax.js') }}" ></script>
    <script src="{{ asset('js/update_profile_ajax.js') }}"></script>
    <script src="{{ asset('js/locationajax.js') }}"></script>
    <script src="{{ asset('js/pomelo-toast.min.js') }}"></script>
     <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

    
</body>
</html>
