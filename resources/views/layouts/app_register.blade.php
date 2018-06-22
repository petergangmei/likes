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
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>

        <nav class="navbar navbar-expand-md navbar-light navbar-laravel fixed-top" style="background-color: #3355B9; top: 0px;">
                <a class="navbar-brand mx-auto" style=" color: white;"  href="{{ url('#') }}">
                    <span class="">
                   <b> Create a new account.</b>
                    </span>
                </a>
<div class="toast-body mx-auto"><i class="fa fa-exclamation-circle"></i> <span id="toast"></span></div>

        </nav>

        <main class="" style="background-color: #3355B9; margin-top: 35px;">
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
    <script>
        
    </script>
    <script src="{{ asset('js/locationajax.js') }}" ></script>
    <script src="{{ asset('js/calculate_zodiac.js') }}" ></script>
    <script src="{{ asset('js/register_.js') }}" ></script>
    
     <!-- <script src="https://code.jquery.com/jquery-1.12.4.js"></script> -->
     <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
</body>
</html>
