<a href={{ $productUrl }} class="relative bg-white drop-shadow-lg rounded-t-xl">
    <div class="bg-[#DEF4BB] flex justify-center rounded-t-xl">
        <img src={{ $productImage }} alt="product" class="w-full h-[180px] object-cover rounded-t-xl">
    </div>
    <div class="flex flex-col px-3 pt-2 pb-6 bg-white rounded-b-xl gap-y-8">
        <div class="flex flex-col">
            <h1 class="font-[400] text-[18px]">{{ $productTitle }}</h1>
        </div>
        <div class="flex flex-col gap-y-1">
            <h1 class="text-black text-[19px] font-bold">{{ $productPrice }}</h1>
            <p class="text-[#696969] text-[14px] font-[400]">{{ $productSeller }}</p>
        </div>
    </div>
    @if ($isPromo == "true")
        <span class="absolute right-0 top-0 border-b-[60px] border border-b-[#89B53D] rotate-180 rounded-bl-lg border-r-[60px] border-r-transparent"></span>
        <p class="absolute top-3 right-0 text-white rotate-45 text-[13px] font-bold">Promo</p>
    @endif
</a>

