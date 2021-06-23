<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>APLIKASI PENCATATAN KEUANGAN</title>

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/auth.css')}}">
</head>
<body>
    <div id="root">
        <div class="background"></div>
        <div class="auth-card">
           @yield('content')
        </div>
    </div>
</body>
</html>
