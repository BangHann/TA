@extends('layouts/admin')

@section('admin-content')
    <div class="flex flex-col gap-4 mt-2">
        <p class="text-xl font-bold">Data Kopi</p>
        <div class="flex justify-center">
            <table class=" w-4/5">
                <thead>
                    <tr class="">
                        <th>No</th>
                        <th>Nama Rasa</th>
                        <th>Jenis Kopi</th>
                        <th>Gambar</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
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