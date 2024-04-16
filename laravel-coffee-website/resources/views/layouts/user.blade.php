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
    <link rel="stylesheet" href="{{ asset('css/dropdown.css') }}">
    @vite('resources/css/app.css')

    <!-- PWA  -->
    <meta name="theme-color" content="#6777ef"/>
    <link rel="apple-touch-icon" href="{{ asset('images/logo1.png') }}">
    <link rel="manifest" href="{{ asset('/manifest.json') }}">
</head>
<body>
    @include('layouts.nav_user')
    
    <div>
        {{-- <h2>Layout User</h2> --}}
        @yield('content')
    </div>

    <script src="{{ asset('/sw.js') }}"></script>
    <script>
    if ("serviceWorker" in navigator) {
        // Register a service worker hosted at the root of the
        // site using the default scope.
        navigator.serviceWorker.register("/sw.js").then(
        (registration) => {
            console.log("Service worker registration succeeded:", registration);
        },
        (error) => {
            console.error(`Service worker registration failed: ${error}`);
        },
        );
    } else {
        console.error("Service workers are not supported.");
    }
    </script>

<script>
    // Fungsi untuk memperbarui nomor keranjang
    function updateCartCount() {
        // Kirim permintaan AJAX ke backend untuk mendapatkan jumlah item dalam keranjang
        fetch('/cart/count')
            .then(response => response.json())
            .then(data => {
                // Perbarui nomor keranjang dengan jumlah yang diterima
                document.getElementById('cartCount').textContent = data.count;
            })
            .catch(error => {
                console.error('Error updating cart count:', error);
            });
    }

    // Panggil fungsi updateCartCount saat halaman dimuat
    window.addEventListener('load', updateCartCount);
</script>
</body>
</html>