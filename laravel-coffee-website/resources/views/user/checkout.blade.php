@extends('layouts.user')
@section('judul', 'Checkout')
@section('content')

<div class="my-4 mx-6 flex flex-col">
    <div class="mb-4">
        <p class="text-xl font-semibold">Checkout</p>
        <div class="flex flex-row justify-between">
            <p class="text-xs">No. Transaksi</p>
            <p class="text-xs">{{ $transaksi->id }}</p>
        </div>
        
    </div>
    <form action="">
        <div class=" border opacity-[0px] rounded-[10px] border-solid border-[#D9D9D9] mb-4 p-3 flex flex-col gap-2">
            <p class="text-sm font-semibold ">{{ Auth::user()->name_user }}</p>
            <div class="flex flex-col gap-1">
                <select class="p-1 text-xs rounded-md mb-1" name="order" id="orderSelect" onchange="toggleTableInput()" >
                    <option value="" disabled selected hidden>Dine In/Takeaway</option>
                    <option value="dinein">Dine In</option>
                    <option value="takeaway">Takeaway</option>
                </select>
                <div class="flex flex-row items-center gap-2 hidden" id="tableNumberInput">
                    <label class="text-xs" for="tableNumberInput">Nomor Meja</label>
                    <input class="p-1 text-xs rounded-md " type="number" placeholder="" id="" min="1" max="50">
                </div>
            </div>
        </div>
    
        @foreach ($cart_data as $cart)
        <div class=" border opacity-[0px] rounded-[10px] border-solid border-[#D9D9D9] mb-4 p-3 flex flex-col gap-1">
            <div class="flex justify-end mr-2">
                <a class="font-semibold text-[12px] text-red-500" href="/delete_cart/{{ $cart->id }}" onclick="return confirm('Anda yakin akan menghapus pesanan?')">
                Hapus
                </a>
            </div>
            
            <div class="flex flex-row mx-2 mb-2 gap-4 items-start">
                <img class="w-[81px] h-[84px] gap-0 opacity-[0px] rounded-xl object-cover" src="{{ asset('images/' . $cart->kopi->foto) }}" alt="foto pesanan">
                <div class="flex flex-col">
                    <p class="text-[12px]">{{ $cart->kopi->jenis_kopi }}</p>
                    <p class="font-bold text-[12px]">Rp. {{ $cart->kopi->harga }}</p>
                    <input class="rounded-[4px] w-[60px] h-[30px] border border-solid border-[#D9D9D9]" type="number" placeholder="{{ $cart->quantity }}"" value="qty">
                </div>
                
            </div>
        </div>
        @endforeach
        <div class=" text-xs border opacity-[0px] rounded-[10px] border-solid border-[#D9D9D9] mb-4 p-3 flex flex-row justify-between">
            <p class="font-semibold">Total Harga</p>
            <p>{{ $total_amount }}</p>
        </div>
        
        {{-- <input class="p-2 text-xs rounded-md border border-[#D9D9D9] mb-2" type="file" placeholder="Bukti Pembayaran"> --}}
        <label for="fileInput" class="text-xs">
            Bukti Pembayaran
            <input id="fileInput" type="file" class="p-1 text-xs rounded-md border border-[#D9D9D9] mb-2">
        </label>
        <button class="flex justify-center rounded-md p-2 bg-[#3d372b] border border-[#3d372b] text-[#FFE5B6] hover:bg-[#25211a] text-sm" type="submit">
            Kirim Bukti Pembayaran
        </button>
    </form>
    
</div>

<script>
    function toggleTableInput() {
        var orderSelect = document.getElementById("orderSelect");
        var tableNumberInput = document.getElementById("tableNumberInput");
        
        // Jika Dine In dipilih, tampilkan input nomor meja; jika tidak, sembunyikan input nomor meja
        if (orderSelect.value === "dinein") {
            // tableNumberInput.style.display = "block";
            tableNumberInput.classList.remove('hidden')
        } else {
            tableNumberInput.classList.add('hidden')
            // tableNumberInput.style.display = "none";
        }
    }
</script>



@endsection