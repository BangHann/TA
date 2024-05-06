@extends('layouts/admin')

@section('admin-content')
<div class="flex flex-col gap-2 mt-2">
    <p class="text-xl font-bold">{{ $transaksi_detail->name }} Order Detail </p>
    <p>Dine In: {{ $transaksi_detail->dine_in }}</p>
    <p>No. Table: {{ $transaksi_detail->no_meja}}</p>
    <div class="flex justify-center">
        <table class=" w-4/5">
            <thead>
                <tr class="">
                    <th>No</th>
                    <th>Nama Minuman</th>
                    <th>Jumlah</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($order_items as $index => $item)
                <tr>
                    <td class="text-center">{{ $index + 1 }}</td>
                    <td>{{ $item->kopi->jenis_kopi }}</td>
                    <td>{{ $item->quantity }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection