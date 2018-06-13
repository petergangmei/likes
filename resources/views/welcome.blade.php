<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Zianbam</title>

        <!-- Fonts -->
        <link href="{{ asset('css/custom.css') }}" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

            <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Raleway', sans-serif;
                /*font-weight: 100;*/
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }
            .links{

            }
            .m-b-md {
                margin-bottom: 40px;
            }
        </style>
    </head>
    <body>

        <div class="flex-center position-ref full-height">

            @if (Route::has('login'))
            @endif

            <div class="content">
                    @auth
                        <!--  -->
                        <br><br>
                        <a href="{{ url('/home') }}">
                            <button type="button" class="btn btn-dark">Profile</button>
                        </a>

                        <br>
                        <br>
                        <div id="reload">
                        <div  style="width: 100%; border:1px solid black; text-align: left; height: 150px; color: black !important; padding: 10px;">
                            <div style="text-align: center; border-bottom: 1px solid black"><b>Activity Analysis</b></div>
                            Total number of users registerd: <div style="float: right;">{{count($users)}}</div><br>
                            Total number of feed posted: <div style="float: right;">{{count($posts)}}</div><br>
                            Number of comments posted: <div style="float: right;">{{count($comments)}}</div><br>
                            Number of likes given to posts: <div style="float: right;">{{count($likes)}}</div><br>
                            Number of messages sent : <div style="float: right;">{{count($messages)}}</div><br>
                        </div>
                        </div>


                    @else

                <div class=" m-b-md">
                    <img src="/public/storage/default_image/icons/applogo.png" style="width: 50%; height: 50%; border:0px solid black; border-top-left-radius: 50px; border-bottom-right-radius: 50px; ">
                    <br><br>
                   <img src="/public/storage/default_image/icons/zianbam.png">
                </div>
                    
                    <a href="{{ route('register') }} "  style='text-decoration:none; '>
                    <button type="button" data-toggle="modal" data-target="#spinner" class="btn btn-block btn-lg btn-info" style="border: 0px solid black ; background-color: #13949B !important;">
                        Create a new Account 
                    </button>
                    </a>
                    <a href="{{ route('login') }}" data-toggle="modal" data-target="#spinner" style='text-decoration:none; '>
                    <button type="button" data-toggle="modal" data-target="#spinner" class="btn btn-block btn-lg btn-dark" id="login" style="border-top: 0px solid black !important; margin-top:1px;">
                       Sign in to existing account
                    </button></a>
                    @endauth
                    <br><br>
                    <br><br>
                <div class="links">
                    <a href="#">home</a>
                    <a href="#">likes</a>
                    <a href="#">News</a>
                </div>
            </div>
        </div>
        <!-- spinner/loader -->
<div class="modal fade" id="spinner" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered text-center" role="document">
    <div class="mx-auto">
    <i class="fa fa-spinner fa-spin" style="font-size:50px; color:white;"></i>
    </div>
  </div>
</div>
<!-- spinner/loader -->

        <script>
            setInterval(
            function()
                {
                 $('#reload').load(' #reload');
                     console.log('loaded');
                }, 1000);

        </script>

            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    </body>
</html>
