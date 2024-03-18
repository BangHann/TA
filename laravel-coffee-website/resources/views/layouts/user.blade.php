<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('judul') | Seteguk Kopi</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="icon" type="image/x-icon" href="{{ asset('images/logo1.png') }}">
    <link rel="stylesheet" href="{{ asset('css/kopi.css') }}">
    @vite('resources/css/app.css')
</head>
<body>
    @include('layouts.nav_user')
    
    <div>
        {{-- <h2>Layout User</h2> --}}
        @yield('content')
    </div>
</body>
</html>
!