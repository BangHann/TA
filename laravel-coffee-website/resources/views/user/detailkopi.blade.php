@extends('layouts.user')
@section('judul', $detail_kopi->jenis_kopi)
@section('content')
    <div class="flex justify-center">
        <div class="h-screen mb-[70px] pt-[80px] bg-white sm:w-[800px] sm:mb-0">
            {{-- mobile layout --}}
            <div class="px-6 flex flex-col sm:hidden bg-white">
                <img class="rounded-lg h-[300px] object-cover" src="{{ asset('images/' . $detail_kopi->foto) }}" alt="foto kopi">
                {{-- <p class="pt-2 text-md">{{ $detail_kopi->jenis_kopi }}</p> --}}
                <div class="flex items-center gap-2 pt-2 ">
                    @if ($detail_kopi->diskon > 0)
                        <p class="text-md">{{ $detail_kopi->jenis_kopi }}</p>
                        <p class="text-xs font-bold text-red-500">-{{ $detail_kopi->diskon }}%</p>
                    @else
                        <p class="text-md">{{ $detail_kopi->jenis_kopi }}</p>
                    @endif
                </div>
                <div class="flex items-center justify-between">
                    <div class="flex items-center gap-2">
                        {{-- Rp. <span id="total-price">{{ $detail_kopi->harga }}</span> --}}
                        @if($detail_kopi->diskon > 0)
                            <p class="font-semibold text-xl ">
                                Rp. {{ number_format($detail_kopi->harga * (1 - $detail_kopi->diskon / 100), 0, ',', '.') }}
                            </p>
                            <s class="text-xs text-gray-400">
                                Rp. {{ number_format($detail_kopi->harga, 0, ',', '.') }}
                            </s>
                        @else
                            <p class="font-semibold text-xl ">
                                Rp. {{ number_format($detail_kopi->harga, 0, ',', '.') }}
                            </p>
                        @endif
                    </div>
                    <div class="flex items-center ml-4">
                        <button id="decrease-qty" class="bg-primary text-secondary text-sm font-medium px-[9px] py-1 rounded-3xl">-</button>
                        <input type="text" id="quantity" name="quantity" value="1" class="font-medium w-12 h-8 text-center border-none" readonly>
                        <button id="increase-qty" class="bg-secondary text-primary text-sm font-medium px-[8px] py-1 rounded-3xl">+</button>
                    </div>
                </div>
                
                <div class="flex text-xs items-center gap-1 mt-2">
                    <p>Stok {{ $detail_kopi->stok }}</p>
                </div>
                @if($data_jeniskopi->isNotEmpty())
                    <p class="font-semibold pt-4">Jenis Kopi</p>
                    <div class="">
                        @foreach ($data_jeniskopi as $item)
                            <button data-id="{{ $item->id }}" type="button" class="jenis-button mr-1 mt-1 text-xs text-secondary bg-primary rounded-md p-2 hover:bg-primary_hover active:bg-secondary active:text-primary">
                                {{ $item->nama_jenis }}
                            </button>
                        @endforeach
                    </div>
                    <p id="jenis-error" class="text-red-500 text-sm hidden">Silakan pilih jenis kopi</p>
                @endif
                
                <p class="font-semibold pt-4">Deskripsi Produk</p>
                <p class="text-sm">
                    {{ $detail_kopi->deskripsi }}
                </p>

                <div class="my-1 bg-white text-white h-[80px]">
                    _
                </div>
            </div>
    
            {{-- Layout Web --}}
            <div class="hidden sm:flex flex-row gap-4 mx-4">
                <img class="rounded-lg h-[300px] w-[340px] object-cover" src="{{ asset('images/' . $detail_kopi->foto) }}" alt="foto kopi">
                <div class="flex flex-col">
                    <div class="flex items-center gap-2">
                        @if ($detail_kopi->diskon > 0)
                            <p class="text-2xl font-bold">{{ $detail_kopi->jenis_kopi }}</p>
                            <p class="text-sm font-bold text-red-500">-{{ $detail_kopi->diskon }}%</p>
                        @else
                            <p class="text-2xl font-bold">{{ $detail_kopi->jenis_kopi }}</p>
                        @endif
                    </div>
                    <div class="flex items-center">
                        <div class="flex items-center gap-2">
                            @if($detail_kopi->diskon > 0)
                                <p class="font-semibold text-xl ">
                                    Rp. {{ number_format($detail_kopi->harga * (1 - $detail_kopi->diskon / 100), 0, ',', '.') }}
                                </p>
                                <s class="text-xs text-gray-400">
                                    Rp. {{ number_format($detail_kopi->harga, 0, ',', '.') }}
                                </s>
                            @else
                                <p class="font-semibold text-xl ">
                                    Rp. {{ number_format($detail_kopi->harga, 0, ',', '.') }}
                                </p>
                            @endif
                        </div>
                    </div>
                    <div class="flex items-center mt-4">
                        <button id="min-qty" class="bg-primary text-secondary text-sm font-medium px-[9px] py-1 rounded-3xl">-</button>
                        <input type="text" id="kuantitas_kopi" name="quantity" value="1" class="font-medium w-12 h-8 text-sm text-center border-none" readonly>
                        <button id="add-qty" class="bg-secondary text-primary text-sm font-medium px-[8px] py-1 rounded-3xl">+</button>
                    </div>
                    
                    <div class="flex text-sm items-center gap-1 mt-2">
                        <p>Stok {{ $detail_kopi->stok }}</p>
                    </div>
                    @if($data_jeniskopi->isNotEmpty())
                        <p class="font-semibold pt-4">Jenis Kopi</p>
                        <div class="">
                            @foreach ($data_jeniskopi as $item)
                                <button data-idkopi="{{ $item->id }}" type="button" class="button-jenis mr-1 mt-1 text-xs text-secondary bg-primary rounded-md p-2 hover:bg-primary_hover active:bg-secondary active:text-primary">
                                    {{ $item->nama_jenis }}
                                </button>
                            @endforeach
                        </div>
                        <p id="jenis-eror-form" class="text-red-500 text-sm hidden">Silakan pilih jenis kopi</p>
                    @endif
            
                    {{-- tombol pesen & cart --}}
                    <div class="flex justify-center gap-2 pt-6">
                        <div class="">
                            @if ($tidakada_bukti_payment)
                                <form id="order-form-web" action="/addOrder_deletedItem" method="post">
                                    @csrf
                                    <input type="hidden" name="jeniskopi" id="jenis_kopi" value="">
                                    <input type="hidden" name="quantity" id="banyak_kopi" value="1">
                                    @if ($detail_kopi->diskon > 0)
                                        <input type="hidden" name="total" id="total_pesanan" value="{{ $detail_kopi->harga_diskon }}">
                                    @else
                                        <input type="hidden" name="total" id="total_pesanan" value="{{ $detail_kopi->harga }}">
                                    @endif
                                    {{-- <input type="hidden" name="total" id="order-total" value=""> --}}
                                    <input type="hidden" name="kopi_id" value="{{ $detail_kopi->id }}">
                                    <button type="submit" class="rounded-md px-8 py-2 bg-[#3d372b] border border-[#3d372b] text-[#FFE5B6] hover:bg-[#25211a] text-sm">
                                        Order
                                    </button>
                                </form>
                            @else
                                <form id="add-to-cart-form-web" action="/add_order" method="post">
                                    @csrf
                                    <input type="hidden" name="jeniskopi" id="jenis_kopi" value="">
                                    <input type="hidden" name="quantity" id="banyak_kopi" value="1">
                                    @if ($detail_kopi->diskon > 0)
                                        <input type="hidden" name="total" id="total_pesanan" value="{{ $detail_kopi->harga_diskon }}">
                                    @else
                                        <input type="hidden" name="total" id="total_pesanan" value="{{ $detail_kopi->harga }}">
                                    @endif
                                    {{-- <input type="hidden" name="total" id="order-total" value=""> --}}
                                    <input type="hidden" name="kopi_id" value="{{ $detail_kopi->id }}">
                                    <button type="submit" class="rounded-md px-8 py-2 bg-[#3d372b] border border-[#3d372b] text-[#FFE5B6] hover:bg-[#25211a] text-sm">
                                        Order
                                    </button>
                                </form>
                            @endif
                        </div>
                        
                        <div class="">
                            <form id="cart-form-web" action="/add_cart" method="post">
                                @csrf
                                <input type="hidden" name="jeniskopi" id="cart_jeniskopi" value="">
                                <input type="hidden" name="quantity" id="quantity_carts" value="1">
                                @if ($detail_kopi->diskon > 0)
                                    <input type="hidden" name="total" id="carts-total" value="{{ $detail_kopi->harga_diskon }}">
                                @else
                                    <input type="hidden" name="total" id="carts-total" value="{{ $detail_kopi->harga }}">
                                @endif
                                {{-- <input type="hidden" name="total" id="cart-total" value=""> --}}
                                <input type="hidden" name="kopi_id" value="{{ $detail_kopi->id }}">
                                <button type="submit" class="rounded-md py-2 px-3 border bg-primary border-black text-black hover:bg-[#dcc69e] text-sm">
                                    Add to Cart
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <p class="hidden sm:block font-semibold pt-4 mx-4">Deskripsi Produk</p>
            <p class="hidden sm:block text-sm mx-4">
                {{ $detail_kopi->deskripsi }}
            </p>
        </div>
    </div>
    
    <footer class="fixed w-full bg-[#FFE5B6] text-black text-center py-3 bottom-0 sm:hidden">
        <div class="flex justify-center gap-2 sm:hidden">
            @if($tidakada_bukti_payment)
                <div class="w-[40%]">
                    <form id="order-form" action="/addOrder_deletedItem" method="post">
                        @csrf
                        <input type="hidden" name="jeniskopi" id="jeniskopi" value="">
                        <input type="hidden" name="quantity" id="order-quantity" value="1">
                        @if ($detail_kopi->diskon > 0)
                            <input type="hidden" name="total" id="order-total" value="{{ $detail_kopi->harga_diskon }}">
                        @else
                            <input type="hidden" name="total" id="order-total" value="{{ $detail_kopi->harga }}">
                        @endif
                        {{-- <input type="hidden" name="total" id="order-total" value=""> --}}
                        <input type="hidden" name="kopi_id" value="{{ $detail_kopi->id }}">
                        <button type="submit" class="w-full rounded-md py-3 bg-[#3d372b] border border-[#3d372b] text-[#FFE5B6] hover:bg-[#25211a] text-sm">
                            Order
                        </button>
                    </form>
                </div>
            @else
                <div class="w-[40%]">
                    <form id="add-to-cart-form" action="/add_order" method="post">
                        @csrf
                        <input type="hidden" name="jeniskopi" id="jeniskopi" value="">
                        <input type="hidden" name="quantity" id="order-quantity" value="1">
                        @if ($detail_kopi->diskon > 0)
                            <input type="hidden" name="total" id="order-total" value="{{ $detail_kopi->harga_diskon }}">
                        @else
                            <input type="hidden" name="total" id="order-total" value="{{ $detail_kopi->harga }}">
                        @endif
                        {{-- <input type="hidden" name="total" id="order-total" value=""> --}}
                        <input type="hidden" name="kopi_id" value="{{ $detail_kopi->id }}">
                        <button type="submit" class="w-full rounded-md py-3 bg-[#3d372b] border border-[#3d372b] text-[#FFE5B6] hover:bg-[#25211a] text-sm">
                            Order
                        </button>
                    </form>
                </div>
            @endif
            
            <div class="w-[40%]">
                <form id="cart-form" action="/add_cart" method="post">
                    @csrf
                    <input type="hidden" name="jeniskopi" id="jeniskopi-cart" value="">
                    <input type="hidden" name="quantity" id="cart-quantity" value="1">
                    @if ($detail_kopi->diskon > 0)
                        <input type="hidden" name="total" id="cart-total" value="{{ $detail_kopi->harga_diskon }}">
                    @else
                        <input type="hidden" name="total" id="cart-total" value="{{ $detail_kopi->harga }}">
                    @endif
                    {{-- <input type="hidden" name="total" id="cart-total" value=""> --}}
                    <input type="hidden" name="kopi_id" value="{{ $detail_kopi->id }}">
                    <button type="submit" class="w-full rounded-md py-3 border border-black text-black hover:bg-[#dcc69e] text-sm">
                        Add to Cart
                    </button>
                </form>
            </div>
        </div>
    </footer>
    

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.jenis-button').click(function() {
                var jenisKopiId = $(this).data('id');
                $('#jeniskopi').val(jenisKopiId);
                $('#jeniskopi-cart').val(jenisKopiId);
                $('.jenis-button').removeClass('active border border-secondary font-semibold'); // Remove the active class from all buttons
                $(this).addClass('active border border-secondary font-semibold'); // Add the active class to the clicked button
                $('#jenis-error').addClass('hidden');
            });

            @if($data_jeniskopi->isNotEmpty())
                $('#order-form, #cart-form, #add-to-cart-form').submit(function(e) {
                    if (!$('#jeniskopi').val() && !$('#jeniskopi-cart').val()) {
                        e.preventDefault();
                        $('#jenis-error').removeClass('hidden');
                    }
                });
            @endif
            
            var pricePerUnit = {{ $detail_kopi->diskon > 0 ? $detail_kopi->harga_diskon : $detail_kopi->harga }};
            // var pricePerUnit = {{ $detail_kopi->harga_diskon }};
            //console.log(pricePerUnit);

            function updateQuantities(qty) {
                $('#quantity').val(qty);
                $('#order-quantity').val(qty);
                $('#cart-quantity').val(qty);
                updateTotalPrice(qty);
            }
            
            function updateTotalPrice(qty) {
                var totalPrice = qty * pricePerUnit;
                $('#total-price').text(totalPrice);
                $('#order-total').val(totalPrice);
                $('#cart-total').val(totalPrice);
            }

            $('#increase-qty').click(function() {
                var qty = parseInt($('#quantity').val());
                if (qty < {{ $detail_kopi->stok }}) {
                    updateQuantities(qty + 1);
                }
            });

            $('#decrease-qty').click(function() {
                var qty = parseInt($('#quantity').val());
                if (qty > 1) {
                    updateQuantities(qty - 1);
                }
            });
        });
    </script>

    {{-- web layout --}}
    <script>
        $(document).ready(function() {
            $('.button-jenis').click(function() {
                var id_jenis_kopi = $(this).data('idkopi');
                $('#jenis_kopi').val(id_jenis_kopi);
                $('#cart_jeniskopi').val(id_jenis_kopi);
                $('.button-jenis').removeClass('active border border-secondary font-semibold'); // Remove the active class from all buttons
                $(this).addClass('active border border-secondary font-semibold'); // Add the active class to the clicked button
                $('#jenis-eror-form').addClass('hidden');
            });

            @if($data_jeniskopi->isNotEmpty())
                $('#order-form-web, #cart-form-web, #add-to-cart-form-web').submit(function(e) {
                    if (!$('#jenis_kopi').val() && !$('#cart_jeniskopi').val()) {
                        e.preventDefault();
                        $('#jenis-eror-form').removeClass('hidden');
                    }
                });
            @endif
            
            var price_PerUnit = {{ $detail_kopi->diskon > 0 ? $detail_kopi->harga_diskon : $detail_kopi->harga }};
            // var price_PerUnit = {{ $detail_kopi->harga_diskon }};
            //console.log(price_PerUnit);

            function update_quantities(qty) {
                $('#kuantitas_kopi').val(qty);
                $('#banyak_kopi').val(qty);
                $('#quantity_carts').val(qty);
                update_total_price(qty);
            }
            
            function update_total_price(qty) {
                var totalPrice = qty * price_PerUnit;
                // $('#total-price').text(totalPrice);
                $('#total_pesanan').val(totalPrice);
                $('#carts-total').val(totalPrice);
            }

            $('#add-qty').click(function() {
                var qty = parseInt($('#kuantitas_kopi').val());
                if (qty < {{ $detail_kopi->stok }}) {
                    update_quantities(qty + 1);
                }
            });

            $('#min-qty').click(function() {
                var qty = parseInt($('#kuantitas_kopi').val());
                if (qty > 1) {
                    update_quantities(qty - 1);
                }
            });
        });
    </script>
@endsection