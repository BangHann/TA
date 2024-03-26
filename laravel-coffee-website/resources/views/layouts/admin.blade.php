<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin Seteguk Kopi</title>

    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="icon" type="image/x-icon" href="{{ asset('images/logo1.png') }}">
    <link rel="stylesheet" href="{{ asset('css/adminkopi.css') }}">
    @vite('resources/css/app.css')
</head>
<body>
    <div class="flex gap-2">
        @include('layouts.sidebar')
        <div>
            @yield('admin-content')
        </div>
    </div>
    
</body>
</html>