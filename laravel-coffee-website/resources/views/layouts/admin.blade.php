<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="icon" type="image/x-icon" href="{{ asset('images/logo1.png') }}">
    <link rel="stylesheet" href="{{ asset('css/kopi.css') }}">
    @vite('resources/css/app.css')
</head>
<body>
    <div class="w-[20%] h-screen bg-[#FFE5B6]">
        <div class="flex items-center gap-2 p-2">
            <img class="w-14 pl-2" src="{{ asset('images/logo_icon_black.png') }}" alt="logo seteguk kopi">
            <p class="text-xl font-bold">Admin</p>
        </div>
        <div class="h-[1px] bg-black my-1 mx-2 mb-4"></div>
        <div class="py-2 px-2 border-y-[black] border-t border-solid border-b font-semibold">Dashboard</div>
        <div class="py-2 px-2 font-semibold">Rasa Kopi</div>
        <div class="py-2 px-2 border-y-[black] border-t border-solid border-b font-semibold">Data Kopi</div>
    </div>
</body>
</html>