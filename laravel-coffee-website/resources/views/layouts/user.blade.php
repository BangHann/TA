<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('judul') | Seteguk Kopi</title>
    <link rel="stylesheet" href="{{ asset('css/kopi.css') }}">
    @vite('resources/css/app.css')
</head>
<body>
    <div>
        {{-- <h2>Layout User</h2> --}}
        @yield('content')
    </div>
</body>
</html>
!