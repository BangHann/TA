@extends('layouts.user')
@section('judul', $detail_kopi->jenis_kopi)
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
            {{-- <a class="w-[40%] rounded-md py-3 bg-[#3d372b] border border-[#3d372b] text-[#FFE5B6] hover:bg-[#25211a] text-sm" href="/checkout">
                Order
            </a> --}}
            {{-- <div class="w-[40%]"> --}}
                {{-- @php
                    $tidakada_bukti_payment = \App\Models\Transaksi::where('id_user', auth()->id())
                        ->whereNull('bukti_payment')->first();
                @endphp --}}
                @if($tidakada_bukti_payment)
                    <div class="w-[40%]">
                        <form action="/addOrder_deletedItem" method="post">
                            @csrf
                            <input type="hidden" name="quantity" value="1">
                            <input type="hidden" name="kopi_id" value="{{ $detail_kopi->id }}">
                            <button type="submit" class="w-full rounded-md py-3 bg-[#3d372b] border border-[#3d372b] text-[#FFE5B6] hover:bg-[#25211a] text-sm">
                                Order
                            </button>
                        </form>
                    </div>
                @else
                    <div class="w-[40%]">
                        <form action="/add_order" method="post">
                            @csrf
                            <input type="hidden" name="quantity" value="1">
                            <input type="hidden" name="kopi_id" value="{{ $detail_kopi->id }}">
                            <button type="submit" class="w-full rounded-md py-3 bg-[#3d372b] border border-[#3d372b] text-[#FFE5B6] hover:bg-[#25211a] text-sm">
                                Order
                            </button>
                        </form>
                    </div>
                @endif
                {{-- <form action="/add_order" method="post">
                    @csrf
                    <input type="hidden" name="quantity" value="1">
                    <input type="hidden" name="kopi_id" value="{{ $detail_kopi->id }}"> <!-- Assuming $kopi->id contains the ID of the coffee -->
                    <button type="submit" class="w-full rounded-md py-3 bg-[#3d372b] border border-[#3d372b] text-[#FFE5B6] hover:bg-[#25211a] text-sm">
                        Order
                    </button>
                </form> --}}
            {{-- </div> --}}
            
            <div class="w-[40%]">
                <form action="/add_cart" method="post">
                    @csrf
                    <input type="hidden" name="quantity" value="1">
                    <input type="hidden" name="kopi_id" value="{{ $detail_kopi->id }}"> <!-- Assuming $kopi->id contains the ID of the coffee -->
                    <button type="submit" class="w-full rounded-md py-3 border border-black text-black hover:bg-[#dcc69e] text-sm">Add to Cart</button>
                </form>
                {{-- <a class="" href="/cart">
                    <button class="w-full rounded-md py-3 border border-black text-black hover:bg-[#dcc69e] text-sm">Add to Cart</button>
                </a> --}}
            </div>
            
        </div>
    </footer>

    
    
@endsection