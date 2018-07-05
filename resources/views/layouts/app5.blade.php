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
        
        <nav class="navbar navbar-light navbar-laravel fixed-top" style="border: 1px solid silver;" >

<!--   <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    D
  </a> -->

<i class="fa fa-filter  cursor-pointer" role="button" id="dropdownMenuLink" data-toggle="dropdown"   style="font-size: 20px;"></i>


  <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
    <a class="dropdown-item g1" href="feeds">Global feeds </a>
    <a class="dropdown-item g2" href="feeds">Global feeds <i class="fa fa-check-circle-o"></i></a>

    <a class="dropdown-item n1" href="/nationalpost">National feeds </a>
    <a class="dropdown-item n2" href="/nationalpost">National feeds 
        <i class="fa fa-check-circle-o"></i>
    </a>    
    
    <a class="dropdown-item l1" href="/localfeeds">Local feeds </a>
    <a class="dropdown-item l2" href="/localfeeds">Local feeds <i class="fa fa-check-circle-o"></i>
    </a>

    <a class="dropdown-item m1" href="/myfeeds">My feeds </a>
    <a class="dropdown-item m2" href="/myfeeds">My feeds <i class="fa fa-check-circle-o"></i></a>
    <a class="dropdown-item viewpost" href="/myfeeds" style="display: none;">View Post <i class="fa fa-eye"></i></a>
  </div>
  
  
            <div class="navbar-brand  mx-auto" >
                <b>
                <img src="public/storage/default_image/icons/zianbam.png" height="27">
                </b>
            </div>

        <div id="noti" data-toggle="modal" data-target="#spinner">
            @if(count($messages) == 0)
           <a href="/messageslist" style="color: black;"> 
            <i class="fa fa-envelope-o cursor-pointer" style="font-size: 20px;"></i> 
           </a>
            @endif

            @if(count($messages) == 1 )
            <a href="/messageslist" style="color: black;"> 
            <img src="public/storage/default_image/icons/1.png" class="noti-icons">
            @endif
            </a>
            @if(count($messages) == 2 )
            <a href="/messageslist" style="color: black;"> 
            <img src="public/storage/default_image/icons/2.png" class="noti-icons">
            </a>
            @endif            
            @if(count($messages) == 3 )
            <a href="/messageslist" style="color: black;"> 
            <img src="public/storage/default_image/icons/3.png" class="noti-icons">
            @endif 
            @if(count($messages) == 4 )
            <a href="/messageslist" style="color: black;"> 
            <img src="public/storage/default_image/icons/4.png" class="noti-icons">
            </a>
            @endif 
            @if(count($messages) == 5 )
            <a href="/messageslist" style="color: black;"> 
            <img src="public/storage/default_image/icons/5.png" class="noti-icons">
            </a>
            @endif 
            @if(count($messages) ==6 )
            <a href="/messageslist" style="color: black;"> 
            <img src="public/storage/default_image/icons/6.png" class="noti-icons">
            </a>
            @endif 
            @if(count($messages) ==7 )
            <a href="/messageslist" style="color: black;"> 
            <img src="public/storage/default_image/icons/7.png" class="noti-icons">
            </a>
            @endif 
            @if(count($messages) ==8 )
            <a href="/messageslist" style="color: black;"> 
            <img src="public/storage/default_image/icons/8.png" class="noti-icons">
            </a>
            @endif 
            @if(count($messages) ==9 )
            <a href="/messageslist" style="color: black;"> 
            <img src="public/storage/default_image/icons/9.png" class="noti-icons">
            </a>
            @endif 
            @if(count($messages) > 9 )
            <a href="/messageslist" style="color: black;"> 
            <img src="public/storage/default_image/icons/10.png" class="noti-icons">
            </a>
            @endif 
        </div>

        </nav>
        <br>

        <main class=''>
            <br><br>
            @yield('content')
            <a href="/messageslist" style="text-decoration: none;">
            <div class="message-alert blink">
                New Message 
            </div>
            </a>  
            
        <nav class="navbar fixed-bottom navbar-light"  id="navibar" style="background-color: #F8F2F0;">
          <a class="navbar-brand" href="/feeds"><i class="fa fa-home" data-toggle="modal" data-target="#spinner" style="font-size:20px; "></i></a>
          <a class="navbar-brand" href="/search"><i class="fa fa-search" data-toggle="modal" data-target="#spinner" style="font-size:20px; color: #CAC3C1;"></i></a>
          <a class="navbar-brand" href="/swipes"><i class="fa fa-clone" data-toggle="modal" data-target="#spinner" style="font-size:23px;  color: #CAC3C1;"></i></a>
          
          <a class="navbar-brand" href="/notification"><i class="fa fa-globe" data-toggle="modal" data-target="#spinner" style="font-size:20px;  color: #CAC3C1;"></i>
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
    <script src="{{ asset('js/check_msg_from_feed.js') }}" ></script>
    <script src="{{ asset('js/notification_check.js') }}" ></script>
    <script src="{{ asset('js/check_comments.js') }}" ></script>


    
    
</body>
</html>
