<nav class="">
    <div class="p-2 flex justify-between items-center">
        <a href="/index" class="flex items-center gap-3">
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
                <i class="material-icons">shopping_cart</i>
                <div class="bg-[#00000050] w-0.5 h-6 mx-3"></div>
                {{-- <a href="/admin-dashboard" class="flex items-center gap-2">
                    <img class="h-9 w-9 object-cover rounded-[50%]" src="{{ asset('images/pakbos1.jpg') }}" alt="">
                    <p>Hello, BangHan</p>
                </a>  --}}

                <div class="dropdown">
                    <button class="dropbtn">
                        <div href="" class="flex items-center gap-2">
                            <img class="h-9 w-9 object-cover rounded-[50%]" src="{{ asset('images/pakbos1.jpg') }}" alt="">
                            <p>Hello, BangHan</p>
                        </div>
                    </button>
                    <div class="dropdown-content">
                        <a href="#">Profile</a>
                        <form method="POST" action="{{ route('logout') }}" class="py-1 px-4 hover:bg-[#ddd]">
                            @csrf
                            <button type="submit" class="w-full py-2 rounded-md flex justify-start">Logout</button>
                        </form>
                    </div>
                </div>
            @endauth
            
            
        </div>
    </div>
    
</nav>