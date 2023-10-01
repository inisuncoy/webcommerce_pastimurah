@extends('layouts.main.index')

@section('pages')
    <div class="flex flex-col px-20 pt-10 gap-y-20">
        <div class="grid grid-cols-5 gap-10">
            <div class="flex flex-col col-span-1 gap-y-20">
                <div class="flex flex-col gap-y-7">
                    <h1 class="font-bold text-[20px]">Kategori Produk</h1>
                    <div class="flex flex-col gap-y-2">
                        @for ($x = 0; $x < 4; $x++)
                        <div class="text-[16px] font-[400] flex justify-between items-center">
                            <h2>Kebutuhan Pokok</h2>
                            <div class="bg-[#767676] rounded-lg w-10 h-5"></div>
                        </div>
                        @endfor
                    </div>
                </div>
                <div class="flex flex-col gap-y-7">
                    <h1 class="font-bold text-[20px]">Label Produk</h1>
                    <div class="flex gap-x-2">
                        <div class="bg-[#89B53D] rounded-lg w-12 h-5"></div>
                        <div class="bg-[#89B53D] rounded-lg w-12 h-5"></div>
                        <div class="bg-[#89B53D] rounded-lg w-12 h-5"></div>
                    </div>
                </div>
                <div class="flex flex-col gap-y-7">
                    <h1 class="font-bold text-[20px]">Terlaris</h1>
                    <div class="flex flex-col gap-y-4">
                        @foreach ($sellers as $seller)
                            @foreach ($seller['products'] as $product)

                            @endforeach
                        @endforeach
                        @for ($x = 0; $x < 3; $x++)
                        {{-- Item --}}
                        @component('components.product-card-2')
                            @slot('productImage')
                                {{ url("assets/images/product1.png") }}
                            @endslot
                            @slot('productUrl')
                                {{ url("/sellers/toko-cendrawasih/products/product") }}
                            @endslot
                            @slot('productTitle')
                                UMKM Beras Maknyuss
                            @endslot
                            @slot('productPrice')
                                Rp{{ $x * 2 * 8000 * $x + 10000 }}
                            @endslot
                            @slot('promo')
                                false
                            @endslot
                        @endcomponent
                    @endfor
                    </div>
                </div>
            </div>
            <div class="flex flex-col col-span-4 gap-y-3">
                <div class="flex justify-between">
                    <h1 class="font-bold text-[20px]">Beras</h1>
                    <div class="flex items-center gap-x-2">
                        <h1>Urutkan: </h1>
                        <button type="text" class="bg-[#D9D9D9] text-black rounded-md h-8 flex items-center pl-5 pr-10 border-none relative" placeholder="hello">
                            <h1 class="font-[400] text-[16px]">
                                Lokasi
                            </h1>
                            <div class="absolute right-2 top-1">
                                <svg width="20" viewBox="0 0 24 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M18 11.4375L12 18.5625L6 11.4375" stroke="black" stroke-width="2"/>
                                </svg>
                            </div>
                        </button>
                    </div>
                </div>

                <div class="grid grid-cols-4 gap-8">
                    @foreach ($sellers as $seller)
                        @foreach ($seller['products'] as $product)
                            @component('components.product-card')
                                @slot('productImage')
                                    {{ url($product['images'][0]) }}
                                @endslot
                                @slot('productUrl')
                                    /sellers/{{ $seller['slug'] }}/products/{{ $product['slug'] }}
                                @endslot
                                @slot('productTitle')
                                    {{ $product['name'] }}
                                @endslot
                                @slot('productLocation')
                                    {{ $seller['location'] }}
                                @endslot
                                @slot('productPrice')
                                    @currency($product['price'])
                                @endslot
                                @slot('productSeller')
                                    {{ $seller['name'] }}
                                @endslot
                                @slot('isPromo')
                                    false
                                @endslot
                            @endcomponent
                        @endforeach
                    @endforeach
                </div>
                <div class="flex justify-center pt-10">
                    @component('components.pagination')
                    @endcomponent
                </div>
            </div>
        </div>
        <div class="flex justify-center px-64 gap-x-10">
            <div class="flex flex-col items-center gap-y-5">
                <h1 class="font-bold text-[20px]">Terlaris</h1>
                <div class="flex flex-col gap-y-5">
                    @for ($x = 0; $x < 2; $x++)
                        {{-- Item --}}
                        @component('components.product-card-2')
                            @slot('productImage')
                                {{ url("assets/images/product1.png") }}
                            @endslot
                            @slot('productUrl')
                                {{ url("/sellers/toko-cendrawasih/products/product") }}
                            @endslot
                            @slot('productTitle')
                                UMKM Beras Maknyuss
                            @endslot
                            @slot('productPrice')
                                Rp{{ $x * 2 * 8000 * $x + 10000 }}
                            @endslot
                            @slot('promo')
                                false
                            @endslot
                        @endcomponent
                    @endfor
                </div>
            </div>
            <div class="flex flex-col items-center gap-y-5">
                <h1 class="font-bold text-[20px]">Promo</h1>
                <div class="flex flex-col gap-y-5">
                    @for ($x = 0; $x < 2; $x++)
                        {{-- Item --}}
                        @component('components.product-card-2')
                            @slot('productImage')
                                {{ url("assets/images/product1.png") }}
                            @endslot
                            @slot('productUrl')
                                {{ url("/sellers/toko-cendrawasih/products/product") }}
                            @endslot
                            @slot('productTitle')
                                UMKM Beras Maknyuss
                            @endslot
                            @slot('productPrice')
                                Rp{{ $x * 2 * 8000 * $x + 10000 }}
                            @endslot
                            @slot('promo')
                                false
                            @endslot
                        @endcomponent
                    @endfor
                </div>
            </div>
            <div class="flex flex-col items-center gap-y-5">
                <h1 class="font-bold text-[20px]">Produk Baru</h1>
                <div class="flex flex-col gap-y-5">
                    @for ($x = 0; $x < 2; $x++)
                        {{-- Item --}}
                        @component('components.product-card-2')
                            @slot('productImage')
                                {{ url("assets/images/product1.png") }}
                            @endslot
                            @slot('productUrl')
                                {{ url("/sellers/toko-cendrawasih/products/product") }}
                            @endslot
                            @slot('productTitle')
                                UMKM Beras Maknyuss
                            @endslot
                            @slot('productPrice')
                                Rp{{ $x * 2 * 8000 * $x + 10000 }}
                            @endslot
                            @slot('promo')
                                false
                            @endslot
                        @endcomponent
                    @endfor
                </div>
            </div>
        </div>
    </div>
@endsection