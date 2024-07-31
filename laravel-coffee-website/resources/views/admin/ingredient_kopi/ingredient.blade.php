@extends('layouts/admin')

@section('admin-content')

    <div class="admin-container">
        <p class="text-2xl font-semibold">Manajemen Ingredient Kopi</p>

        <div class="flex justify-end">
            <button id="openModalButton" class="rounded-md text-secondary border-secondary border font-medium text-xs bg-primary p-2 px-4 hover:bg-[#ddc79e]">
                + Tambah Ingredient
            </button>
        </div>

        <table class="w-[300px] border-none">
            <tbody class=" border-none">
                <tr>
                    <td class="font-bold border-none">Stok Gula</td>
                    <td class="border-none">
                        <div class="flex flex-row items-center gap-1">
                            <button id="activateGulaButton" class="rounded-md text-sm text-white bg-green-500 py-1 px-2 hover:bg-green-600">
                                Tersedia
                            </button>
                            <button id="deactivateGulaButton" class="rounded-md text-sm text-white bg-red-500 py-1 px-5 hover:bg-red-600">
                                Habis
                            </button>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td class="font-bold border-none">Stok Susu</td>
                    <td class="border-none">
                        <div class="flex flex-row items-center gap-1">
                            <button id="activateSusuButton" class="rounded-md text-sm text-white bg-green-500 py-1 px-2 hover:bg-green-600">
                                Tersedia
                            </button>
                            <button id="deactivateSusuButton" class="rounded-md text-sm text-white bg-red-500 py-1 px-5 hover:bg-red-600">
                                Habis
                            </button>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td class="font-bold border-none">Stok Krimer</td>
                    <td class="border-none">
                        <div class="flex flex-row items-center gap-1">
                            <button id="activateKrimerButton" class="rounded-md text-sm text-white bg-green-500 py-1 px-2 hover:bg-green-600">
                                Tersedia
                            </button>
                            <button id="deactivateKrimerButton" class="rounded-md text-sm text-white bg-red-500 py-1 px-5 hover:bg-red-600">
                                Habis
                            </button>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
        

        <div class="flex mt-4">
            <table>
                <thead>
                    <tr class="bg-primary">
                        <th class="w-5">No</th>
                        <th>Ingredients</th>
                        <th>Menu Kopi</th>
                        <th class="w-24">Stok</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody class="bg-white">
                    @foreach ($bahan_bahan as $index => $item)
                        <tr>
                            <td class="text-center">{{ $index + 1 }}</td>
                            <td>{{ $item->nama_bahan }}</td>
                            <td>{{ $item->kopi->jenis_kopi }}</td>
                            <td>{{ $item->available == 1 ? 'Tersedia' : 'Habis' }}</td>
                            <td class="w-8">
                                <div class="flex gap-2">
                                    <a class="rounded-md text-white text-xs bg-yellow-500 p-2 px-4 edit-bahan-button" href="" data-id_bahan="{{ $item->id }}" data-nama_bahan="{{ $item->nama_bahan }}" data-nama_kopi="{{ $item->kopi->id }}">
                                        Edit
                                    </a>
                                    <form action="/delete-ingredient/{{ $item->id }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button class="rounded-md text-white text-xs bg-red-500 p-2" 
                                                onclick="return confirm('Anda yakin akan menghapus Ingredient {{ $item->nama_bahan }} pada Menu {{ $item->kopi->jenis_kopi }}?')">
                                            Delete
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    @include('admin.ingredient_kopi.modal_ingredient')

    <script>
        document.getElementById('activateGulaButton').addEventListener('click', function() {
            fetch('/update_stok_ingredient', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                },
                body: JSON.stringify({ nama_bahan: 'Gula', status: 1 })
            }).then(response => {
                if (response.ok) {
                    window.location.reload();
                }
            });
        });

        document.getElementById('deactivateGulaButton').addEventListener('click', function() {
            fetch('/update_stok_ingredient', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                },
                body: JSON.stringify({ nama_bahan: 'Gula', status: 2 })
            }).then(response => {
                if (response.ok) {
                    window.location.reload();
                }
            });
        });
    </script>

    <script>
        document.getElementById('activateSusuButton').addEventListener('click', function() {
            fetch('/update_stok_ingredient', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                },
                body: JSON.stringify({ nama_bahan: 'Susu', status: 1 })
            }).then(response => {
                if (response.ok) {
                    window.location.reload();
                }
            });
        });

        document.getElementById('deactivateSusuButton').addEventListener('click', function() {
            fetch('/update_stok_ingredient', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                },
                body: JSON.stringify({ nama_bahan: 'Susu', status: 2 })
            }).then(response => {
                if (response.ok) {
                    window.location.reload();
                }
            });
        });
    </script>

    <script>
        document.getElementById('activateKrimerButton').addEventListener('click', function() {
            fetch('/update_stok_ingredient', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                },
                body: JSON.stringify({ nama_bahan: 'Krimer', status: 1 })
            }).then(response => {
                if (response.ok) {
                    window.location.reload();
                }
            });
        });

        document.getElementById('deactivateKrimerButton').addEventListener('click', function() {
            fetch('/update_stok_ingredient', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                },
                body: JSON.stringify({ nama_bahan: 'Krimer', status: 2 })
            }).then(response => {
                if (response.ok) {
                    window.location.reload();
                }
            });
        });
    </script>
@endsection