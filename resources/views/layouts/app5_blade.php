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
    <!-- Styles -->
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>

    <div id="app">
        
        <nav class="navbar navbar-light navbar-laravel" style="border: 1px solid silver;" >

<div class="dropdown">
<!--   <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    D
  </a> -->

<i class="fa fa-filter  cursor-pointer" role="button" id="dropdownMenuLink" data-toggle="dropdown"   style="font-size: 20px;"></i>


  <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
    <a class="dropdown-item g1" href="feeds">Global feeds </a>
    <a class="dropdown-item g2" href="feeds">Global feeds <i class="fa fa-check-circle-o"></i></a>
    <a class="dropdown-item l1" href="localfeeds">Local feeds </a>
    <a class="dropdown-item l2" href="localfeeds">Local feeds <i class="fa fa-check-circle-o"></i></a>
    <a class="dropdown-item f1" href="friendsfeeds">Friends feeds </a>
    <a class="dropdown-item f2" href="friendsfeeds">Friends feeds <i class="fa fa-check-circle-o"></i></a>
    <a class="dropdown-item m1" href="/myfeeds">My feeds </a>
    <a class="dropdown-item m2" href="/myfeeds">My feeds <i class="fa fa-check-circle-o"></i></a>
  </div>
</div>
  
  
            <div class="navbar-brand  mx-auto" >
                <b>Wafe - Find me!</b>
            </div>



        </nav>
        <br>

        <main class="">
            @yield('content')

        <nav class="navbar fixed-bottom navbar-light" style="background-color: #F8F2F0;">
          <a class="navbar-brand" href="/feeds"><i class="fa fa-home" style="font-size:20px; "></i></a>
          <a class="navbar-brand" href="/search"><i class="fa fa-search" style="font-size:20px; color: #CAC3C1;"></i></a>
          <a class="navbar-brand" href="/addfeed"><i class="fa fa-plus-square" style="font-size:23px;  color: #CAC3C1;"></i></a>
          <a class="navbar-brand" href="/notification"><i class="fa fa-globe" style="font-size:20px;  color: #CAC3C1;"></i>
            @if(count($unread)>0)
            <span class="badge badge-light">{{$unread->count()}}</span>
            @endif
          </a>
          <a class="navbar-brand" href="/home"><i class="fa fa-user" style="font-size:20px; color: #CAC3C1;"></i></a>
        </nav>

        </main>
    </div>
    <script src="{{ asset('js/custom.js') }}" ></script>
    <script src="{{ asset('js/ajax.js') }}" ></script>
    <script src="{{ asset('js/check_msg_from_feed.js') }}" ></script>

    
    
</body>
</html>