<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('judul') | Seteguk Kopi</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('images/logo1.png') }}">
    <link rel="stylesheet" href="{{ asset('css/kopi.css') }}">
    @vite('resources/css/app.css')
</head>
<body>
    <nav class="">
        <div class="p-2">
            <a href="/index" class="flex items-center gap-3">
                <img class="w-12 pl-2" src="{{ asset('images/logo_icon_black.png') }}" alt="logo seteguk kopi">
                <p class="text-xl font-semibold">Seteguk Kopi</p>
            </a>
        </div>
        
        
    </nav>
    <div>
        {{-- <h2>Layout User</h2> --}}
        @yield('content')
    </div>
</body>
</html>
!