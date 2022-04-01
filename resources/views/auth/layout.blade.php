<!DOCTYPE html>
<html lang="en">
  <head>

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Meta -->
    <meta name="description" content="CRMS made with Laravel">
    <meta name="author" content="Devlomatix Solutions">
    <link rel="shortcut icon" href="{{setting('app_fevicon')}}">

    <!-- Favicon -->
    {{-- <link rel="icon" href="{{setting('app.fevicon')}}" type="image/ico" /> --}}

    <title> {{setting('app_name')}} | @yield('title')</title>

    <!-- vendor css -->
    <link href="{{asset('public/admin/fontawsome/css/font-awesome.min.css')}}" rel="stylesheet">
    <link href="{{asset('public/admin/lib/ionicons/css/ionicons.min.css')}}" rel="stylesheet">

    <!-- DashForge CSS -->
    <link rel="stylesheet" href="{{asset('public/auth/app.css')}}">
    <link rel="stylesheet" href="{{asset('public/auth/custom.css')}}">

  </head>
  <body>



    @yield('content')



    <script src="{{asset('public/admin/assets/js/jquery.min.js')}}"></script>
    <!-- <script src="../../lib/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../../lib/feather-icons/feather.min.js"></script>
    <script src="../../lib/perfect-scrollbar/perfect-scrollbar.min.js"></script>

    <script src="../../assets/js/dashforge.js"></script>

    append theme customizer
    <script src="../../lib/js-cookie/js.cookie.js"></script>
    <script src="../../assets/js/dashforge.settings.js"></script> -->

    @yield('javascript')

  </body>
</html>
