@extends('layouts/admin')

@section('admin-content')
    <div class="admin-container">
        <p class="text-2xl font-semibold">Data Kopi</p>
        <div class="flex">
            <table class="">
                <thead>
                    <tr class="bg-primary">
                        <th class="w-5">No</th>
                        <th>Nama Rasa</th>
                        <th>Jenis Kopi</th>
                        <th>Gambar</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody class="bg-white">
                    @foreach ($kopi as $index => $item)
                    <tr>
                        <td class="text-center">{{ $index + 1 }}</td>
                        <td>Rasa</td>
                        <td>{{ $item->jenis_kopi }}</td>
                        <td><img class="w-20" src="{{ asset('images/' . $item->foto) }}" alt="gambar kopi"></td>
                        <td>Action</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    
@endsection