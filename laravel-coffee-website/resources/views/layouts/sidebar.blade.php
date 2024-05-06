<div class="w-[220px] h-screen bg-[#FFE5B6]">
    <div class="flex items-center gap-2 p-2">
        <img class="w-14 pl-2" src="{{ asset('images/logo_icon_black.png') }}" alt="logo seteguk kopi">
        <p class="text-xl font-bold">Admin</p>
    </div>

    <div class="h-[1px] bg-black my-1 mx-2"></div>

    <div class="flex flex-col gap-1">
        <a class="py-2 px-2 font-semibold hover:bg-[#ddc79e] @if(Request::is('admin-dashboard')) bg-[#ddc79e] @endif" href="/admin-dashboard">Dashboard</a>
        <a class="py-2 px-2 font-semibold hover:bg-[#ddc79e] @if(Request::is('/order-list')) bg-[#ddc79e] @endif" href="/order-list">Customer Order List</a>
        <details>
            <summary class="cursor-pointer p-2 font-semibold hover:bg-[#ddc79e] focus:bg-[#ddc79e] @if(Request::is('p') || Request::is('admin-listrasakopi')) bg-[#ddc79e] @endif">Rasa Kopi</summary>
            <div class="flex flex-col">
                <a class="pl-6 py-1 hover:bg-[#ddc79e] @if(Request::is('admin-listrasakopi')) bg-[#ddc79e] @endif" href="/admin-listrasakopi">List Rasa</a>
                <a class="pl-6 py-1 hover:bg-[#ddc79e] @if(Request::is('admin-addrasakopi')) bg-[#ddc79e] @endif" href="/admin-addrasakopi">Add Rasa</a>
            </div>
        </details>
        <details>
            <summary class="cursor-pointer p-2 font-semibold hover:bg-[#ddc79e] focus:bg-[#ddc79e] @if(Request::is('admin-datakopi-add') || Request::is('admin-datakopi')) bg-[#ddc79e] @endif">Data Kopi</summary>
            <div class="flex flex-col">
                <a class="pl-6 py-1 hover:bg-[#ddc79e] @if(Request::is('admin-datakopi')) bg-[#ddc79e] @endif" href="/admin-datakopi">List Kopi</a>
                <a class="pl-6 py-1 hover:bg-[#ddc79e] @if(Request::is('admin-datakopi-add')) bg-[#ddc79e] @endif" href="/admin-datakopi-add">Add Kopi</a>
            </div>
        </details>
        <a class="py-2 px-2 font-semibold hover:bg-[#ddc79e] @if(Request::is('admin-keuangan')) bg-[#ddc79e] @endif" href="/admin-keuangan">Laporan Keuangan</a>
        <form method="POST" action="{{ route('logout') }}" class="py-2 px-2 font-semibold">
            @csrf

                {{-- <x-dropdown-link :href="route('logout')"
                        onclick="event.preventDefault();
                                    this.closest('form').submit();">
                    {{ __('Log Out') }}
                </x-dropdown-link> --}}
            <button type="submit" class="w-full py-2 bg-[#baa785] hover:bg-[#82755d] hover:text-[#FFE5B6] rounded-md">Logout</button>
        </form>
    </div>
</div>