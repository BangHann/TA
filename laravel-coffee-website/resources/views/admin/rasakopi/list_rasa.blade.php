@extends('layouts/admin')

@section('admin-content')
    <div class="admin-container">
        <p class="text-2xl font-semibold">Data Tabel Rasa Kopi</p>
        <div class="flex justify-center">
            <table class=" w-4/5">
                <thead>
                    <tr class="">
                        <th>No</th>
                        <th>Nama Rasa</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($rasakopi as $index => $item)
                    <tr>
                        <td class="text-center">{{ $index + 1 }}</td>
                        <td>{{ $item->nama_rasa }}</td>
                        <td>Action</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    
@endsection