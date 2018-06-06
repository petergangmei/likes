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

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
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
                        <a href="{{ url('/home') }}">
                            <button type="button" class="btn btn-dark">Profile</button>
                        </a>
                    @else

                <div class=" m-b-md">
                    <img src="/public/storage/default_image/icons/applogo.png" style="width: 50%; height: 50%; border:0px solid black; border-top-left-radius: 50px; border-bottom-right-radius: 50px; ">
                    <br><br>
                   <img src="/public/storage/default_image/icons/zianbam.png">
                </div>
                    
                    <a href="{{ route('register') }} " style='text-decoration:none; '>
                    <button type="button" class="btn btn-block btn-lg btn-info" style="border: 0px solid black ; background-color: #13949B !important;">
                        Create a new Account 
                    </button>
                    </a>
                    <a href="{{ route('login') }}" style='text-decoration:none; '>
                    <button type="button" class="btn btn-block btn-lg btn-dark" id="login" style="border-top: 0px solid black !important; margin-top:1px;">
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
        <script>

        </script>
    </body>
</html>
