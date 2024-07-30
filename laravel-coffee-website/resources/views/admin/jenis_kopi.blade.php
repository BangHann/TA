@extends('layouts/admin')

@section('admin-content')
    <div class="admin-container">
        <p class="text-2xl font-semibold">Manajemen Jenis Kopi</p>

        <div class="flex justify-end">
            <button id="openModalButton" class="rounded-md text-secondary border-secondary border font-medium text-xs bg-primary p-2 px-4 hover:bg-[#ddc79e]">
                + Tambah Jenis Kopi
            </button>
        </div>

        {{-- <div class="flex justify-end mt-4">
            <button id="activateAllButton" class="rounded-md text-white bg-green-500 p-2 px-4 hover:bg-green-600">
                Aktifkan Semua
            </button>
            <button id="deactivateAllButton" class="rounded-md text-white bg-red-500 p-2 px-4 hover:bg-red-600 ml-2">
                Nonaktifkan Semua
            </button>
        </div> --}}

        <div class="flex flex-col mt-4 gap-2">
            <div class="flex flex-row items-center gap-1">
                <p class="font-bold text-lg mr-2">Stok Robusta</p>
                <button id="activateRobustaButton" class="rounded-md text-sm text-white bg-green-500 py-1 px-4 hover:bg-green-600">
                    Tersedia
                </button>
                <button id="deactivateRobustaButton" class="rounded-md text-sm text-white bg-red-500 py-1 px-4 hover:bg-red-600">
                    Habis
                </button>
            </div>

            <div class="flex flex-row items-center gap-1">
                <p class="font-bold text-lg mr-3">Stok Arabica</p>

                <button id="activateArabicaButton" class="rounded-md text-sm text-white bg-green-500 py-1 px-4 hover:bg-green-600">
                    Tersedia
                </button>
                <button id="deactivateArabicaButton" class="rounded-md text-sm text-white bg-red-500 py-1 px-4 hover:bg-red-600">
                    Habis
                </button>
            </div>
            
            {{-- <div class="flex flex-row items-center gap-1">
                <p class="font-bold text-lg mr-2">Stok Robusta</p>
                @if($jeniskopi->first()->nama_jenis == 'Robusta')
                    <button id="activateRobustaButton" class="rounded-md text-sm text-white {{ $jeniskopi->first()->ready == 1 ? 'bg-green-500 hover:bg-green-600' : 'bg-green-400' }} py-1 px-4">
                        Tersedia
                    </button>
                    <button id="deactivateRobustaButton" class="rounded-md text-sm text-white  py-1 px-4 {{ $jeniskopi->first()->ready != 1 ? 'bg-red-500 hover:bg-red-600' : 'bg-red-300' }}">
                        Habis
                    </button>
                @endif
            </div> --}}
            
        </div>    


        <div class="flex mt-4">
            <table>
                <thead>
                    <tr class="bg-primary">
                        <th class="w-5">No</th>
                        <th>Jenis Kopi</th>
                        <th>Menu Kopi</th>
                        <th class="w-24">Stok</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody class="bg-white">
                    @foreach ($jeniskopi as $index => $item)
                    <tr>
                        <td class="text-center">{{ $index + 1 }}</td>
                        <td>{{ $item->nama_jenis }}</td>
                        <td>{{ $item->kopi->jenis_kopi }}</td>
                        <td>{{ $item->ready == 1 ? 'Tersedia' : 'Habis' }}</td>
                        <td class="w-8">
                            <div class="flex gap-2">
                                <a class="rounded-md text-white text-xs bg-yellow-500 p-2 px-4 edit-button" href="" data-id="{{ $item->id }}" data-nama="{{ $item->nama_jenis }}" data-kopi="{{ $item->kopi->id }}">
                                    Edit
                                </a>
                                <form action="/delete_jenis/{{ $item->id }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="rounded-md text-white text-xs bg-red-500 p-2" 
                                            onclick="return confirm('Anda yakin akan menghapus Jenis Kopi {{ $item->nama_jenis }} pada Menu {{ $item->kopi->jenis_kopi }}?')">
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

    <!-- Modal -->
    @include('admin.modal_jeniskopi')
    

<script>
    document.getElementById('activateRobustaButton').addEventListener('click', function() {
        fetch('/update_jenis_kopi_status', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            },
            body: JSON.stringify({ nama_jenis: 'Robusta', status: 1 })
        }).then(response => {
            if (response.ok) {
                window.location.reload();
            }
        });
    });

    document.getElementById('deactivateRobustaButton').addEventListener('click', function() {
        fetch('/update_jenis_kopi_status', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            },
            body: JSON.stringify({ nama_jenis: 'Robusta', status: 2 })
        }).then(response => {
            if (response.ok) {
                window.location.reload();
            }
        });
    });

    document.getElementById('activateArabicaButton').addEventListener('click', function() {
        fetch('/update_jenis_kopi_status', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            },
            body: JSON.stringify({ nama_jenis: 'Arabica', status: 1 })
        }).then(response => {
            if (response.ok) {
                window.location.reload();
            }
        });
    });

    document.getElementById('deactivateArabicaButton').addEventListener('click', function() {
        fetch('/update_jenis_kopi_status', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            },
            body: JSON.stringify({ nama_jenis: 'Arabica', status: 2 })
        }).then(response => {
            if (response.ok) {
                window.location.reload();
            }
        });
    });
    // document.getElementById('activateAllButton').addEventListener('click', function() {
    //     fetch('/update_jenis_kopi_status', {
    //         method: 'POST',
    //         headers: {
    //             'Content-Type': 'application/json',
    //             'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
    //         },
    //         body: JSON.stringify({ status: 1 })
    //     }).then(response => {
    //         if (response.ok) {
    //             window.location.reload();
    //         }
    //     });
    // });

    // document.getElementById('deactivateAllButton').addEventListener('click', function() {
    //     fetch('/update_jenis_kopi_status', {
    //         method: 'POST',
    //         headers: {
    //             'Content-Type': 'application/json',
    //             'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
    //         },
    //         body: JSON.stringify({ status: 0 })
    //     }).then(response => {
    //         if (response.ok) {
    //             window.location.reload();
    //         }
    //     });
    // });
</script>
@endsection