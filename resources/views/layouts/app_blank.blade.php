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
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <link rel="stylesheet" href="https://code.jquery.com/mobile/1.4.4/jquery.mobile-1.4.4.min.css">
<script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
<script src="https://code.jquery.com/mobile/1.4.4/jquery.mobile-1.4.4.min.js"></script>

    <!-- Styles -->
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">
    <link href="{{ asset('css/swipes.css') }}" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>

    <div id="app">
        
        <nav class="navbar navbar-expand-md navbar-light navbar-laravel"  id="custom-nav">
            <div class="container">
                <div class="mx-auto">
                <a class="navbar-brand" href="#">
               <b> <div id="custom-text"></div></b>
                </a>
                </div>

            </div>
        </nav>

        <main class="">
            @yield('content')

        <nav class="navbar fixed-bottom navbar-light"  data-toggle="modal" data-target="#spinner"  id="navibar" style="background-color: #F8F2F0;">
          <a class="navbar-brand" href="/feeds"><i class="fa fa-home" style="font-size:20px;  color: #CAC3C1;"></i></a>
          <a class="navbar-brand" href="/search"><i class="fa fa-search" style="font-size:20px;  color: #CAC3C1;"></i></a>
          <a class="navbar-brand" href="/swipes"><i class="fa fa-clone" style="font-size:23px;  color: #CAC3C1;"></i></a>
          
          <a class="navbar-brand" href="/notification"><i class="fa fa-globe" style="font-size:20px; color: #CAC3C1;" ></i>

          </a>
          <a class="navbar-brand" href="/home"><i class="fa fa-user" style="font-size:20px; color: #CAC3C1;"></i></a>
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
    <script>
        
    </script>
    <script src="{{ asset('js/custom.js') }}" ></script>
    <script src="{{ asset('js/ajax.js') }}" ></script>
    <script src="{{ asset('js/notification_check.js') }}" ></script>
    
</body>
</html>
