@extends('layouts.user')
@section('judul', 'Keranjang')
@section('content')
    @if(session('success'))
        {{-- <div class="alert alert-success">
            {{ session('success') }}
        </div> --}}
    @endif
    <div class="flex flex-col items-center lg:flex lg:justify-center h-screen my-4">
        @foreach ($cart_data as $cart)
        <div class="cart-item">
            <div class="flex justify-end m-1 mr-2">
                <a class="font-semibold text-[12px] text-red-500" href="/delete_cart/{{ $cart->id }}" onclick="return confirm('Anda yakin akan menghapus pesanan?')">
                Hapus
                </a>
            </div>
            
            <div class="flex flex-row mx-4 mb-8 gap-4 items-start">
                <img class="w-[81px] h-[84px] gap-0 opacity-[0px] rounded-xl object-cover" src="{{ asset('images/' . $cart->kopi->foto) }}" alt="foto pesanan">
                <div class="flex flex-col">
                    <p class="text-[12px]">{{ $cart->kopi->jenis_kopi }}</p>
                    <p class="font-bold text-[12px]">Rp. {{ $cart->kopi->harga }}</p>
                    <input class="rounded-[4px] w-[60px] h-[30px] border border-solid border-[#D9D9D9]" type="number" placeholder="{{ $cart->quantity }}"" value="qty">
                </div>
                
            </div>
            
            
        </div>
                {{-- <p>{{ $cart->id }}</p>
                <p>{{ $cart->kopi->jenis_kopi }}</p> <!-- Accessing related coffee data -->
                <p>{{ $cart->quantity }}</p>
                <p>{{ $cart->total }}</p> --}}
            
         @endforeach
    </div>
    
@endsection