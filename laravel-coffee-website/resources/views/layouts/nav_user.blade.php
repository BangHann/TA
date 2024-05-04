<nav class="">
    <div class="p-2 flex justify-between items-center">
        <a href="/" class="flex items-center gap-3">
            <img class="w-14 pl-2" src="{{ asset('images/logo_icon_black.png') }}" alt="logo seteguk kopi">
            <p class="text-xl font-semibold">Seteguk Kopi</p>
        </a>
        <div class="flex items-center gap-2">
            @guest
                <a href="/login" class="rounded-md p-2 border border-black text-black hover:bg-[#dcc69e] text-sm">
                    Log in
                </a>
                <a href="/register" class="rounded-md p-2 bg-[#3d372b] border border-[#3d372b] text-[#FFE5B6] hover:bg-[#25211a] text-sm">
                    Register
                </a>
            @endguest
            @auth
                <a href="/cart" class="flex">
                    <i class="material-icons">shopping_cart</i>
                    @if ($cartCount > 0)
                        <div class="flex items-center justify-center text-[8px] h-4 font-semibold text-white w-[16px] bg-red-500 rounded-[100px]">
                            <p id="cartCount">{{ $cartCount }}</p>
                        </div>
                    @endif
                </a>
                <div class="bg-[#00000050] w-0.5 h-6 mx-3"></div>
                <a href="/profile" class="flex items-center gap-2 sm:hidden">
                    <img class="h-9 w-9 object-cover rounded-[50%]" src="{{ asset('images/pakbos1.jpg') }}" alt="">
                    {{-- <p class="hidden sm:block">Hello, {{ Auth::user()->name_user }}</p> --}}
                </a> 
                

                <div class="dropdown hidden sm:block">
                    <button class="dropbtn">
                        <div href="" class="flex items-center gap-2">
                            <img class="h-9 w-9 object-cover rounded-[50%]" src="{{ asset('images/pakbos1.jpg') }}" alt="">
                            <p class="hidden sm:block">Hello, {{ Auth::user()->name_user }}</p>
                        </div>
                    </button>
                    <div class="dropdown-content">
                        <a href="/profile">Profile</a>
                        <form method="POST" action="{{ route('logout') }}" class="py-1 px-4 hover:bg-[#ddd]">
                            @csrf
                            <button type="submit" class="w-full py-2 rounded-md flex justify-start">Logout</button>
                        </form>
                    </div>
                </div>

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
            @endauth
            
            
        </div>
    </div>
    
</nav>

