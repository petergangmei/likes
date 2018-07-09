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
        
        <nav class="navbar  fixed-top navbar-light navbar-laravel">
            <div class="container">
                

                <div class="" style="text-align: ;">
                
                <a class="" href="/profileid-{{$uid2}}" style="text-decoration: none; color: black;">
                    @if($userimg->profile_image == 'null')
                    <img src="/public/storage/default_image/avatar.png" style="border-radius: 100%; height: 50px; width: 50px; border:1px solid black;">
                    @else
                    <img src="/public/storage/profile_image/{{$userimg->id}}/{{$userimg->profile_image}}" style="border-radius: 100%; height: 50px; width: 50px; border:1px solid black;">
                    @endif

                    <b style="position: absolute; margin: -10.5% 13%; font-size: 16px;">{{$userimg->name}} </b>
                </a>

                <span id="activeness_box2"  style="font-size: 8px !important; background-color: white;  text-align: center; position: absolute; margin: -5% 13%;">
                
                <input type="hidden" id="user_active" value="{{Carbon\Carbon::createFromTimestamp(strtotime($userimg->activeness))->diffForHumans()}}">
              
              <span id="active_now" style="display: none;"><b>Active:</b> Now</span> 

              <span id="last_seen" style="display: none;"><b>Active:</b>{{Carbon\Carbon::createFromTimestamp(strtotime($userimg->activeness))->diffForHumans()}}</span>

                </span>

                </div>
        

                    <!-- <i class="fa fa-phone   color-black" style="font-size: 20px; "></i> -->
                    <i class="fa fa-info-circle   color-black" style="font-size: 20px; "></i>



                </div>
            </div>
        </nav>
        <br><br><br>
        <main class="">
            @yield('content')


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
<!-- spinner/loader -->

<!-- spinner/loader -->   




    </div>
    <script src="{{ asset('js/show_active.js') }}" ></script>
    <script src="{{ asset('js/activeness.js') }}" ></script>
    <script src="{{ asset('js/custom.js') }}" ></script>
    <script src="{{ asset('js/ajax.js') }}" ></script>
    <script src="{{ asset('js/chat.js') }}" ></script>
    <script src="{{ asset('js/message_privacy2.js') }}" ></script>
    
</body>
</html>
