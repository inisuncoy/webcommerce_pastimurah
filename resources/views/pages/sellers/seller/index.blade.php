@extends('layouts.main.index')

@section('pages')


{{-- Link --}}
<div class="text-[#89B441] text-[18px] px-5 md:px-20 pt-10 font-semibold flex items-center gap-x-2">
    <a href="/toko">Toko</a>
    <svg width="8" height="15" viewBox="0 0 8 15" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M1 1.32257L7 7.51612L1 13.7097" stroke="black" stroke-opacity="0.5"/>
    </svg>
    <a>{{ $umkm_all_detail['umkm']["umkm_name"] }}</a>
</div>
{{-- Content --}}
<div class="flex flex-col px-5 md:px-20 pt-5 gap-y-16">
    {{-- Profile --}}
    <div class="flex flex-col gap-y-10">
        <div class="md:grid items-center grid-cols-6 gap-x-10">
            <div class="col-span-3 lg:col-span-1">
                <img src={{ !empty($umkm_all_detail['umkm']['umkm_image']) ? 'https://api.andamantau.com/' . $umkm_all_detail['umkm']['umkm_image'] : asset('assets/images/noimage.png') }} alt="product" class="object-cover rounded-md w-96 aspect-square">
            </div>
            <div class="flex flex-col md:col-span-3 lg:col-span-5 gap-y-5">
                <h1 class="font-bold text-[30px]">{{ $umkm_all_detail['umkm']["umkm_name"] }}</h1>
                <p class="font-[400] text-[18px]">
                {{ $umkm_all_detail['umkm']["umkm_description"] }}
                </p>
                <div class="flex pt-4 gap-x-5">
                    <a href="https://www.facebook.com/{{ $umkm_all_detail['umkm']['facebook'] }}" target="_blank">
                        <img src={{ url("/assets/icons/facebook.svg") }} alt="facebook-icons" class="w-10 h-10">
                    </a>
                    <a href="https://www.instagram.com/{{ $umkm_all_detail['umkm']['instagram'] }}" target="_blank">
                        <img src={{ url("/assets/icons/instagram.svg") }} alt="instagram-icons" class="w-10 h-10">
                    </a>
                    <a href="https://wa.me/62{{$umkm_all_detail['umkm']['whatsapp'] }}" target="_blank">
                        <img src={{ url("/assets/icons/whatsapp.svg") }} alt="whatsapp-icons" class="w-10 h-10">
                    </a>
                </div>
            </div>
        </div>
        <div class="px-5">
            <div class="bg-[#DEF3BB] py-4 px-8">
                <div class="font-semibold gap-x-5">
                    <div class="flex flex-col gap-y-2">
                        <h1 class="font-bold text-[18px]">Kontak</h1>
                        <div class="text-[15px]">
                            <p>
                                {{ $umkm_all_detail['umkm']["umkm_name"] }}
                                </p>
                            <p>Alamat: {{ $umkm_all_detail['umkm']["address"] }}</p>
                            <p>No. Telp: {{ $umkm_all_detail['umkm']["phone_number"] }}</p>
                            <p class="italic">Email: {{ $umkm_all_detail['umkm']["email"] }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- Product --}}
    <div class="">
        <div class="flex items-center justify-between py-10">
            <h1 class="font-bold text-[30px]">Produk</h1>
            <div class="flex items-center gap-x-2">
                <h1 class="font-bold">Urutkan </h1>
                <select name="" class="bg-white text-black rounded-full w-full border-[#89B53D] border font-[500]" id="">
                    <option value="" selected>Harga terendah</option>
                    <option value="">Paling laris</option>
                    <option value="">Terbaru</option>
                    <option value="">Harga Tertinggi</option>
                    <option value="">Harga Terendah</option>
                    <option value="">Ulasan Terbanyak</option>
                </select>
            </div>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 gap-x-8 gap-y-20">
            @foreach ($umkm_all_detail['products'] as $product)
                @component('components.product-card')
                    @slot('productImage')
              
                    {{ !empty($product["product_image"]) ? 'https://api.andamantau.com/' . $product["product_image"] : asset('assets/images/noimage.png') }}
                    
                    @endslot
                    @slot('productUrl')
                        /toko/{{ $umkm_all_detail['slug'] }}/products/{{ $product['slug'] }}
                    @endslot
                    @slot('productTitle')
                        {{ $product['product_name'] }}
                    @endslot
                    {{-- @slot('productLocation')
                        {{ $product['location'] }}
                    @endslot --}}
                    @slot('productPrice')
                       Rp. {{$product["product_price"]}}
                    @endslot
                    @slot('productSeller')
                        {{ $umkm_all_detail['umkm']["umkm_name"] }}
                    @endslot
                    @slot('isPromo')
                        false
                    @endslot
                @endcomponent
            @endforeach
        </div>

    </div>
    {{-- Berita Terkini --}}
    <div class="">
        <div class="pb-8">
            <h1 class="font-bold text-[30px]">Berita terkini UMKM</h1>
        </div>
        <div class="flex gap-8 pb-10 overflow-x-scroll ">
        @foreach ($umkm_all_detail['news'] as $new)
                <div class="flex flex-col justify-center p-4 bg-white rounded-xl drop-shadow-lg min-w-[400px]">
                    
                <img src={{ !empty($new["image"]) ? 'https://api.andamantau.com/' . $new["image"]: asset('assets/images/noimage.png') }} alt="product" class="object-cover w-full h-42 md:h-64">
                    <div class="flex flex-col pt-4 gap-y-2">
                        <h1 class="font-[700] text-[18px]">{{ $new["title"] }}</h1>
                        <p class="font-[400] text-[14px] text-[#696969] line-clamp-3"> {{ $new["content"] }}</p>
                        {{-- <p class="font-[500] text-[14px] ">{{ \Carbon\Carbon::createFromFormat('d/m/Y', $new['createdAt'])->format('d F Y') }}</p> --}}
                        <div class="flex items-center justify-end">
                            <a href="/toko/{{ $umkm_all_detail['slug'] }}/blogs/{{ $new["title"] }}" class="text-[#0645AD] mb-1">Baca Selengkapnya</a>
                            <svg width="25" height="24" viewBox="0 0 25 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M12.3105 18L18.1573 12L12.3105 6" stroke="#0645AD" stroke-width="2"/>
                                <path d="M6.46377 18L12.3105 12L6.46377 6" stroke="#0645AD" stroke-width="2"/>
                            </svg>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    {{-- Lokasi --}}
    {{-- <div class="flex flex-col gap-y-5">
        <div class="relative flex items-center py-5">
            <div class="flex-grow border-t border-black"></div>
            <span class="flex-shrink mx-4 font-bold text-[20px]">Peta Lokasi</span>
            <div class="flex-grow border-t border-black"></div>
        </div>
        <div class="flex justify-center">
        {{-- <iframe src={{ $seller['maps_link'] }} class="w-full" height="600" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe> --}}
       {{-- </div>
        </div>
    </div> --}}
</div>

@endsection
