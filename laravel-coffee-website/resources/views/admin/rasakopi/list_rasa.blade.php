@extends('layouts/admin')

@section('admin-content')
    <div class="flex flex-col gap-4 mt-2">
        <p class="text-xl font-bold">Data Tabel Rasa Kopi</p>
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