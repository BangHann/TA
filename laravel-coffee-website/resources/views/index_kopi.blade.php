{{-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Link ke file CSS -->
    <link rel="stylesheet" href="{{ asset('css/kopi.css') }}">

    <title>Kopi Index Page</title>
</head>
<body> --}}
@extends('layouts.user')
@section('judul', 'Home')
@section('content')
    {{-- <center>
        <p class="text-2xl font-bold my-4">Seteguk Kopi</p>
    </center> --}}
    
    <div class="my-4 sm:flex justify-center pt-[80px]">
        <div class="grid-card mx-3 sm:mx-7 gap-4">
            @foreach ($kopi as $item)
                <a class="card" href="/kopi/{{ $item->id }}">
                    <img src="{{ asset('images/' . $item->foto) }}" class="card-img-kopi rounded-t-lg" alt="{{ $item->jenis_kopi }}">
                    <div class="card-body m-2">
                        <div class="flex items-center gap-1">
                            @if ($item->diskon > 0)
                                <h3 class="card-title text-sm leading-5">{{ $item->jenis_kopi }}</h3>
                                <p class="text-xs font-bold text-red-500">-{{ $item->diskon }}%</p>
                            @else
                                <h3 class="card-title text-sm leading-5">{{ $item->jenis_kopi }}</h3>
                            @endif
                        </div>
                        
                        {{-- <p class="card-text" style="text-align: justify">{{ $item->deskripsi }}</p> --}}
                        {{-- <b><p class="card-text text-sm">Rp {{ number_format($item->harga, 2) }}</p></b> --}}
                        @if($item->diskon > 0)
                            <div class="flex items-center gap-1">
                                <p class="card-text text-sm font-bold">
                                    Rp. {{ number_format($item->harga * (1 - $item->diskon / 100), 0, ',', '.') }}
                                </p>
                                <s class="text-xs text-gray-400">Rp. {{ number_format($item->harga, 0, ',', '.') }}</s>
                            </div>
                        @else
                            <b><p class="card-text text-sm"> Rp. {{ number_format($item->harga, 0, ',', '.') }}</p></b>
                        @endif
                        {{-- <p class="card-text text-[10px]">Stok: {{ $item->stok }}</p> --}}
                        <!-- Tambahan informasi lainnya sesuai kebutuhan -->

                        <!-- Tombol untuk menuju detail jika diperlukan -->
                        {{-- <a href="{{ route('', $item->id) }}" class="btn btn-primary">Lihat Detail</a> --}}
                    </div>
                </a>
            @endforeach
        </div>
    </div>
@endsection

{{-- </body>
</html> --}}