<a href={{ $productUrl }} class="relative grid w-full grid-cols-3 bg-white rounded-l-lg drop-shadow-md">
    <div class="col-span-1 p-4 bg-[#DEF4BB] rounded-l-lg">
        <img src={{ $productImage }} alt="">
    </div>
    <div class="flex flex-col justify-between col-span-2 px-4 py-2">
        <h1 class="font-[400] text-[16px]">{{ $productTitle }}</h1>
        <div class="text-right font-bold text-[16px]">
            <p>{{ $productPrice }}</p>
        </div>
    </div>
    @if ($promo == "true")
        <span class="absolute left-0 top-0 border-b-[40px] border border-l-[#89B53D] rounded-tl-lg border-l-[40px] border-b-transparent"></span>
        <p class="absolute top-2 left-0 text-white -rotate-45 text-[9px] font-bold">Promo</p>
    @endif
</a>
