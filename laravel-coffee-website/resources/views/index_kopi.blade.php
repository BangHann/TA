<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Link ke file CSS -->
    <link rel="stylesheet" href="{{ asset('css/kopi.css') }}">

    <title>Kopi Index Page</title>
</head>
<body>
    <center>
        <h1>BangHan Coffee</h1>
    </center>
    
    <div class="grid-card">
        @foreach ($kopi as $item)
            <div class="card">
                <img src="{{ asset('images/' . $item->foto) }}" class="card-img-kopi" alt="{{ $item->jenis_kopi }}">
                <div class="card-body">
                    <h3 class="card-title">{{ $item->jenis_kopi }}</h3>
                    <p class="card-text" style="text-align: justify">{{ $item->deskripsi }}</p>
                    <b><p class="card-text">Rp {{ number_format($item->harga, 2) }}</p></b>
                    <p class="card-text">Stok: {{ $item->stok }}</p>
                    <!-- Tambahan informasi lainnya sesuai kebutuhan -->

                    <!-- Tombol untuk menuju detail jika diperlukan -->
                    {{-- <a href="{{ route('', $item->id) }}" class="btn btn-primary">Lihat Detail</a> --}}
                </div>
            </div>
        @endforeach
    </div>
</body>
</html>