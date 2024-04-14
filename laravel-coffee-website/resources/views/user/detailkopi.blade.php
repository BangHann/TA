@extends('layouts.user')
@section('judul', 'Home')
@section('content')
    <div class="my-4 lg:flex justify-center h-screen">
        {{-- Detail Kopi {{ $detail_kopi->id }} --}}
        <div class="mx-6 flex flex-col">
            <img class="rounded-lg h-[300px] object-cover" src="{{ asset('images/' . $detail_kopi->foto) }}" alt="foto kopi">
            <p class="pt-2">{{ $detail_kopi->jenis_kopi }}</p>
            <p class="font-semibold text-xl">Rp. {{ $detail_kopi->harga }}</p>
            <div class="flex text-xs items-center gap-1">
                <i class="material-icons text-[18px] text-yellow-500">star</i> 
                <p> 4.9 Review | </p>
                <p>Stock {{ $detail_kopi->stok }} | </p>
                <p>20 Terjual</p>
            </div>
            <p class="font-semibold pt-4">Deskripsi Produk</p>
            <p>
                {{ $detail_kopi->deskripsi }}
            </p>
        </div>
        
    </div>
    
    <footer class="fixed w-full bg-[#FFE5B6] text-black text-center py-3 bottom-0">
        <div class="flex justify-center gap-2">
            <a class="w-[40%] rounded-md py-3 bg-[#3d372b] border border-[#3d372b] text-[#FFE5B6] hover:bg-[#25211a] text-sm" href="">
                Order
            </a>
            <div class="w-[40%]">
                <form action="">
                    <button class="w-full rounded-md py-3 border border-black text-black hover:bg-[#dcc69e] text-sm">Add to Cart</button>
                </form>
            </div>
            
        </div>
    </footer>

    
    
@endsection