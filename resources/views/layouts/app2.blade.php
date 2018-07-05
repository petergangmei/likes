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
    <style>
        .element {
  cursor: pointer;
  text-align: center;
  height: 40px;
  width: 40px;
  background-color: red;
  animation-name: stretch;
  animation-duration: 1.5s; 
  animation-timing-function: ease-out; 
  animation-delay: 0;
  animation-direction: alternate;
  animation-iteration-count: infinite;
  animation-fill-mode: none;
  animation-play-state: running;
}

@keyframes stretch {
  0% {
    transform: scale(.3);
    background-color: red;
    border-radius: 100%;
  }
  50% {
    background-color: orange;
  }
  100% {
    transform: scale(1.5);
    background-color: yellow;
  }
}




    </style>
</head>
<body>

    <div id="app">
        
        <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
            <div class="container">
                <a class="navbar-brand" href="#">
                    <b>Notification</b>
                </a>
                <a href="/news" style="text-decoration: none; color: black;"><div class="element"><div style="margin:0% 0px;">News</div></div></a>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li><a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a></li>
                            <li><a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a></li>
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">

                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="">
            @yield('content')

            <a href="/messageslist" style="text-decoration: none;">
            <div class="message-alert blink">
                New Message 
            </div>
            </a>

        <nav class="navbar fixed-bottom navbar-light "  id="navibar" style="background-color: #F8F2F0;">
          <a class="navbar-brand" href="/feeds"><i class="fa fa-home" data-toggle="modal" data-target="#spinner" style="font-size:20px; color: #CAC3C1;"></i></a>
          <a class="navbar-brand" href="/search"><i class="fa fa-search" data-toggle="modal" data-target="#spinner" style="font-size:20px;  color: #CAC3C1;"></i></a>
          <a class="navbar-brand" href="/swipes"><i class="fa fa-clone" data-toggle="modal" data-target="#spinner" style="font-size:23px;  color: #CAC3C1;"></i></a>
          <a class="navbar-brand" href="/notification" ><i class="fa fa-globe" data-toggle="modal" data-target="#spinner" style="font-size:20px;"></i>
            @if(count($unread)>0)
            <span class="badge badge-light">{{$unread->count()}}</span>
            @endif
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
    <script src="{{ asset('js/notification_check2.js') }}" ></script>

    
</body>
</html>
