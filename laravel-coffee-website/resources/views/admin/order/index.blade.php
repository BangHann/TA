@extends('layouts/admin')

@section('admin-content')
<div class="flex flex-col gap-4 mt-2">
    <p class="text-xl font-bold">Customer Order</p>
    <div class="flex justify-center">
        <table class=" w-4/5">
            <thead>
                <tr class="">
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
                    <td>{{ $item->order_telah_diantar }}</td>
                    <td><img class="w-20" src="{{ asset('images/' . $item->bukti_payment) }}" alt="gambar kopi"></td>
                    <td>
                        <a class="" href="/order-detail/{{ $item->id }}">Detail</a>
                        <form action="">
                            @csrf
                            <button type="submit" onclick="return confirm('Pesanan sudah lengkap?')">
                                Delivered
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection