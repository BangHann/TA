@extends('layouts.user')
@section('judul', 'Keranjang')
@section('content')
    @if(session('success'))
        {{-- <div class="alert alert-success">
            {{ session('success') }}
        </div> --}}
    @endif

    Halaman Cart
@endsection