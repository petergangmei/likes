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
        
        <nav class="navbar navbar-expand-md navbar-light navbar-laravel" >
            <div class="container" >

                <a class="navbar-brand" href="{{ url('/') }}" >
                    <div style="text-align: center; width: 100%;">
                    {{$data->name}}
                    </div>
                     
                </a>

                    <i class="fa fa-ellipsis-v cursor-pointer color-black" style="font-size: 20px;" data-toggle="modal" data-target="#Model2"></i>

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

        <nav class="navbar fixed-bottom navbar-light" style="background-color: #F8F2F0;">
          <a class="navbar-brand" href="/feeds"><i class="fa fa-home" style="font-size:20px; color: #CAC3C1;"></i></a>
          <a class="navbar-brand" href="/search"><i class="fa fa-search" style="font-size:20px;  color: ;"></i></a>
          <a class="navbar-brand" href="#"><i class="fa fa-plus-square" style="font-size:23px;  color: #CAC3C1;"></i></a>
          <a class="navbar-brand" href="/notification"><i class="fa fa-globe" style="font-size:20px;  color: #CAC3C1;"></i>
            @if(count($unread)>0)
            <span class="badge badge-light">{{$unread->count()}}</span>
            @endif
          </a>
          <a class="navbar-brand" href="/home"><i class="fa fa-user" style="font-size:20px; color: #CAC3C1; "></i></a>
        </nav>

        </main>
    </div>
    <script src="{{ asset('js/custom.js') }}" defer></script>
    <script src="{{ asset('js/ajax.js') }}" defer></script>
    
</body>
</html>
