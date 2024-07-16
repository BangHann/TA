<div class="w-[220px] h-screen bg-[#FFE5B6] fixed top-0 left-0 overflow-y-auto">
    <div class="flex items-center gap-2 p-2">
        <img class="w-14 pl-2" src="{{ asset('images/logo_icon_black.png') }}" alt="logo seteguk kopi">
        <p class="text-xl font-bold">{{ ucwords(Auth::user()->role) }}</p>
    </div>

    <div class="h-[1px] bg-black my-1 mx-2"></div>

    <div class="flex flex-col gap-1">
        @if (Auth::user()->role == 'pemilik')
            <a class="py-2 px-2 font-semibold hover:bg-primary_hover @if(Request::is('admin-dashboard')) bg-primary_hover @endif" href="/admin-dashboard">Dashboard</a>
            <a class="py-2 px-2 font-semibold hover:bg-primary_hover @if(Request::is('/order-list')) bg-primary_hover @endif" href="/order-list">
                <div class="flex items-center gap-2">
                    <p>Transaksi</p>
                    <p id="undelivered-count" class="hidden">-</p>
                </div>
            </a>
            <a class="py-2 px-2 font-semibold hover:bg-primary_hover @if(Request::is('admin-menukopi')) bg-primary_hover @endif" href="/admin-menukopi">Menu Kopi</a>
            <a class="py-2 px-2 font-semibold hover:bg-primary_hover @if(Request::is('admin-jeniskopi')) bg-primary_hover @endif" href="/admin-jeniskopi">Jenis Kopi</a>
            <a class="py-2 px-2 font-semibold hover:bg-primary_hover @if(Request::is('payment_method')) bg-primary_hover @endif" href="/payment_method">Payment Method</a>
            <a class="py-2 px-2 font-semibold hover:bg-primary_hover @if(Request::is('users')) bg-primary_hover @endif" href="/users">Users</a>
        @elseif(Auth::user()->role == 'admin')
            <a class="py-2 px-2 font-semibold hover:bg-primary_hover @if(Request::is('order-list')) bg-primary_hover @endif" href="/order-list">
                <div class="flex items-center gap-2">
                    <p>Transaksi</p>
                    <p id="undelivered-count" class="hidden">-</p>
                </div>
            </a>
            <a class="py-2 px-2 font-semibold hover:bg-primary_hover @if(Request::is('admin-menukopi')) bg-primary_hover @endif" href="/admin-menukopi">Menu Kopi</a>
            <a class="py-2 px-2 font-semibold hover:bg-primary_hover @if(Request::is('admin-jeniskopi')) bg-primary_hover @endif" href="/admin-jeniskopi">Jenis Kopi</a>
        @endif
        
        <form method="POST" action="{{ route('logout') }}" class="py-2 px-2 font-semibold">
            @csrf
            <button type="submit" class="w-full rounded-md py-2 bg-[#3d372b] border border-[#3d372b] text-primary hover:bg-[#25211a] font-medium text-sm">Logout</button>
        </form>
        {{-- <a class="pl-6 py-1 hover:bg-primary_hover @if(Request::is('admin-addrasakopi')) bg-primary_hover @endif" href="/admin-addrasakopi">Add Rasa</a> --}}
    </div>
</div>



<script>
    $(document).ready(function(){
        function fetchData() {
            $.ajax({
                url: "/undeliver/count",
                type: "GET",
                dataType: "json",
                success: function(response){
                    if(response.count > 0) {
                        $('#undelivered-count').removeClass('hidden').addClass(
                            'flex items-center justify-center text-[10px] h-[18px] font-semibold text-white w-[18px] bg-red-500 rounded-[100px]'
                        ).text(response.count);
                    } 
                    // else {
                    //     $('#undelivered-count').addClass('hidden');
                    // }
                },
                error: function(xhr, status, error){
                    console.error(error);
                    $('#undelivered-count').text('-');
                }
            });
        }

        // Initial data fetch
        fetchData();

        // Auto reload data 
        setInterval(fetchData, 15000);
    });
</script>