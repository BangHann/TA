@extends('layouts/admin')

@section('admin-content')
    <div class="admin-container">
        <p class="text-2xl font-semibold">Manajemen Nama dan Stok Jenis Kopi</p>

        <div class="flex justify-end">
            <button id="openModalButton" class="rounded-md text-secondary border-secondary border font-medium text-xs bg-primary p-2 px-4 hover:bg-[#ddc79e]">
                + Tambah Jenis Kopi
            </button>
        </div>


        {{-- <div class="flex flex-col mt-4 gap-2">
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
        </div>     --}}

        <div class="flex mt-4">
            <table>
                <thead>
                    <tr class="bg-primary">
                        <th class="w-5">No</th>
                        <th>Nama Jenis Kopi</th>
                        <th class="w-24">Stok</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody class="bg-white">
                    @foreach ($raw_jenis_kopi as $index => $item)
                        <tr>
                            <td class="text-center">{{ $index + 1 }}</td>
                            <td>{{ $item->nama }}</td>
                            <td>{{ $item->stok }}</td>
                            <td class="w-8">
                                <div class="flex gap-2">
                                    <a class="rounded-md text-white text-xs bg-yellow-500 p-2 px-4 edit-button" href="" data-id="{{ $item->id }}" data-nama="{{ $item->nama }}" data-stokjeniskopi="{{ $item->stok }}">
                                        Edit
                                    </a>
                                    <form action="/delete-rawjeniskopi/{{ $item->id }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button class="rounded-md text-white text-xs bg-red-500 p-2" 
                                                onclick="return confirm('Anda yakin akan menghapus Jenis Kopi {{ $item->nama }}?')">
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
    @include('admin.jenis_kopi.modal_rawjeniskopi')
@endsection