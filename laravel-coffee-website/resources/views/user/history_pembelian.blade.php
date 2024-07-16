@extends('layouts.user')
@section('judul', 'Pembelian')
@section('content')
    <div class="pt-[60px] flex flex-col items-center lg:flex lg:justify-center h-screen my-4">
        @if($transaksi_data->isEmpty())
            <p class="text-gray-600">Anda belum memiliki riwayat pembelian.</p>
        @else
        <div class="flex flex-col gap-1 w-[90%]">
            @foreach ($transaksi_data as $key => $transaksi)
            <div class="mb-2 p-3 bg-white border rounded-[10px]">
                {{-- <div class="flex justify-end mr-2">
                    <a class="font-semibold text-[12px] text-red-500" href="/delete_cart/{{ $cart->id }}" onclick="return confirm('Anda yakin akan menghapus pesanan?')">
                    Hapus
                    </a>
                </div> --}}
                
                <div class="flex flex-row mx-2 mb-2 gap-4 items-start">
                    <img class="w-[81px] h-[84px] gap-0 opacity-[0px] rounded-xl object-cover" src="{{ asset('images/' . $transaksi->kopi->foto) }}" alt="foto pesanan">
                    <div class="flex flex-col">
                        <p class="text-xs">{{ $transaksi->transaksi_created_at }}</p>
                        <p class="text-xs font-semibold">{{ $transaksi->kopi->jenis_kopi }}</p>
                        <div class="flex flex-row gap-1">
                            <p class="text-xs">Total Belanja</p>
                            <p class="font-bold text-xs">Rp {{ number_format($transaksi->jumlah, 0, ',', '.') }}</p>
                        </div>
                        
                        
                        @if ($transaksi->order_telah_diantar == 'Belum diantar')
                            <p class="font-bold text-xs text-orange-400">Diproses</p>
                        @elseif ($transaksi->order_telah_diantar == 'Sudah diantar')
                            <p class="font-bold text-xs text-green-500">Selesai</p>
                        @else
                            <p class="font-bold text-xs">Status tidak diketahui</p>
                        @endif
                    </div>
                    
                </div>
            </div>
        @endforeach
        </div>
            
        @endif
    </div>
@endsection