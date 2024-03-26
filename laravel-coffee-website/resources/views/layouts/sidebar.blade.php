<div class="w-[220px] h-screen bg-[#FFE5B6]">
    <div class="flex items-center gap-2 p-2">
        <img class="w-14 pl-2" src="{{ asset('images/logo_icon_black.png') }}" alt="logo seteguk kopi">
        <p class="text-xl font-bold">Admin</p>
    </div>

    <div class="h-[1px] bg-black my-1 mx-2"></div>

    <div class="flex flex-col gap-1">
        <a class="py-2 px-2 font-semibold hover:bg-[#ddc79e]" href="">Dashboard</a>
        <a class="py-2 px-2 font-semibold hover:bg-[#ddc79e]" href="">Rasa Kopi</a>
        <details>
            <summary class="cursor-pointer p-2 font-semibold hover:bg-[#ddc79e] focus:bg-[#ddc79e]">Data Kopi</summary>
            <div class="flex flex-col">
                <a class="pl-6 py-1 hover:bg-[#ddc79e]" href="#">Index</a>
                <a class="pl-6 py-1 hover:bg-[#ddc79e]" href="#">Add</a>
            </div>
        </details>
        <a class="py-2 px-2 font-semibold hover:bg-[#ddc79e]" href="">Laporan Transaksi</a>
    </div>
</div>