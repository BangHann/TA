@extends('layouts.user')
@section('judul', $detail_kopi->jenis_kopi)
@section('content')
    <div class="my-4 lg:flex justify-center h-screen">
        {{-- Detail Kopi {{ $detail_kopi->id }} --}}
        <div class="mx-6 flex flex-col">
            <img class="rounded-lg h-[300px] object-cover" src="{{ asset('images/' . $detail_kopi->foto) }}" alt="foto kopi">
            <p class="pt-2 text-md">{{ $detail_kopi->jenis_kopi }}</p>
            {{-- <p class="font-semibold text-xl">Rp. {{ $detail_kopi->harga }}</p> --}}
            <div class="flex items-center justify-between">
                <p class="font-semibold text-xl">Rp. <span id="total-price">{{ $detail_kopi->harga }}</span></p>
                <div class="flex items-center ml-4">
                    <button id="decrease-qty" class="bg-gray-200 px-2 py-1">-</button>
                    <input type="text" id="quantity" name="quantity" value="1" class="w-10 h-8 text-center mx-2 border rounded" readonly>
                    <button id="increase-qty" class="bg-gray-200 px-2 py-1">+</button>
                </div>
            </div>
            
            <div class="flex text-xs items-center gap-1 mt-2">
                {{-- <i class="material-icons text-[18px] text-yellow-500">star</i> 
                <p> 4.9 Review | </p> --}}
                <p>Stock {{ $detail_kopi->stok }}</p>
                {{-- <p>20 Terjual</p> --}}
            </div>
            @if($data_rasa->isNotEmpty())
                <p class="font-semibold pt-4">Rasa</p>
                <div>
                    @foreach ($data_rasa as $item)
                        <button class="rasa-button mr-1 text-xs text-secondary bg-primary rounded-md p-2 hover:bg-primary_hover ">
                            {{ $item }}
                        </button>
                    @endforeach
                </div>
            @endif
            
            
            <p class="font-semibold pt-4">Deskripsi Produk</p>
            <p class="text-sm">
                {{ $detail_kopi->deskripsi }}
            </p>
        </div>
        
    </div>
    
    <footer class="fixed w-full bg-[#FFE5B6] text-black text-center py-3 bottom-0">
        <div class="flex justify-center gap-2">
            @if($tidakada_bukti_payment)
                <div class="w-[40%]">
                    <form action="/addOrder_deletedItem" method="post">
                        @csrf
                        <input type="hidden" name="rasakopi" id='rasakopi' value="">
                        <input type="hidden" name="quantity" value="1">
                        <input type="hidden" name="total" id="total" value="{{ $detail_kopi->harga }}">
                        <input type="hidden" name="kopi_id" value="{{ $detail_kopi->id }}">
                        <button type="submit" class="w-full rounded-md py-3 bg-[#3d372b] border border-[#3d372b] text-[#FFE5B6] hover:bg-[#25211a] text-sm">
                            Order
                        </button>
                    </form>
                </div>
            @else
                <div class="w-[40%]">
                    <form action="/add_order" method="post">
                        @csrf
                        <input type="hidden" name="rasakopi" id='rasakopi' value="">
                        <input type="hidden" name="quantity" value="1">
                        <input type="hidden" name="total" id="total" value="{{ $detail_kopi->harga }}">
                        <input type="hidden" name="kopi_id" value="{{ $detail_kopi->id }}">
                        <button type="submit" class="w-full rounded-md py-3 bg-[#3d372b] border border-[#3d372b] text-[#FFE5B6] hover:bg-[#25211a] text-sm">
                            Order
                        </button>
                    </form>
                </div>
            @endif
            
            <div class="w-[40%]">
                <form action="/add_cart" method="post">
                    @csrf
                    <input type="hidden" name="rasakopi" id='rasakopi' value="">
                    <input type="hidden" name="quantity" value="1">
                    <input type="hidden" name="total" id="total" value="{{ $detail_kopi->harga }}">
                    <input type="hidden" name="kopi_id" value="{{ $detail_kopi->id }}"> <!-- Assuming $kopi->id contains the ID of the coffee -->
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
            $('.rasa-button').click(function() {
                var rasa = $(this).text();
                $('#rasakopi').val(rasa);
                $('.rasa-button').removeClass('active border border-secondary font-semibold'); // Remove the active class from all buttons
                $(this).addClass('active border border-secondary font-semibold'); // Add the active class to the clicked button
            });

            var pricePerUnit = {{ $detail_kopi->harga }};
            
            $('#increase-qty').click(function() {
                var qty = parseInt($('#quantity').val());
                $('#quantity').val(qty + 1);
                updateTotalPrice(qty + 1);
            });

            $('#decrease-qty').click(function() {
                var qty = parseInt($('#quantity').val());
                if (qty > 1) {
                    $('#quantity').val(qty - 1);
                    updateTotalPrice(qty - 1);
                }
            });

            function updateTotalPrice(qty) {
                var totalPrice = qty * pricePerUnit;
                $('#total-price').text(totalPrice);
                $('#total').val(totalPrice);
            }
        });
    </script>
@endsection