@extends('layouts/admin')

@section('admin-content')
<div class="flex flex-col gap-4 mt-2">
    <p class="text-xl font-bold">Customer Order</p>
    <div class="flex justify-center">
        <table class="text-secondary w-4/5 font-sans">
            <thead class="">
                <tr class="bg-primary">
                    <th>No</th>
                    <th>Nama Pemesan</th>
                    <th>Total Tagihan</th>
                    <th>Dine In</th>
                    <th>No. Meja</th>
                    <th>Status Order</th>
                    <th>Bukti Bayar</th>
                    <th>Acton</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($transaksi_data as $index => $item)
                <tr>
                    <td class="text-center">{{ $index + 1 }}</td>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->total_price }}</td>
                    <td>{{ $item->dine_in}}</td>
                    <td>{{ $item->no_meja }}</td>
                    <td>
                        @if ($item->order_telah_diantar == 'belum diantar')
                            <p class="text-red-600 font-medium">{{ $item->order_telah_diantar }}</p>
                        @else
                            <p class="text-lime-600 font-medium">{{ $item->order_telah_diantar }}</p>
                        @endif
                        {{-- {{ $item->order_telah_diantar }} --}}
                    </td>
                    <td>
                        @if($item->bukti_payment)
                            <img class="w-20" src="{{ asset('images/' . $item->bukti_payment) }}" alt="gambar kopi">
                        @else
                            <p>Belum Bayar</p>
                        @endif
                    </td>
                    <td class="w-[211px]">
                        <div class="flex gap-2">
                            @if ($item->bukti_payment)
                                <a class="p-2 bg-primary rounded-md text-sm text-secondary" href="/order-detail/{{ $item->id }}">
                                    Detail Order
                                </a>
                                @if ($item->order_telah_diantar == 'belum diantar')
                                    <form action="/delivered/{{ $item->id }}" method="POST">
                                        @csrf
                                        <button class=" text-sm rounded-md p-2 bg-secondary border border-secondary text-primary hover:bg-[#25211a]" type="submit" onclick="return confirm('Pesanan sudah lengkap?')">
                                            Delivered ?
                                        </button>
                                    </form>    
                                @else
                                    
                                @endif
                            @else
                                <p>-</p>
                            @endif
                        </div>
                        
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<script>
    setTimeout(function() {
        window.location.reload();
    }, 30000); // 30 detik
</script>
@endsection