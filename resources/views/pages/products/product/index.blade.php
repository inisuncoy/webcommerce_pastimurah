@extends('layouts.main.index')

@section('pages')

    <div class="px-5 md:px-20 pt-10">
        {{-- Link --}}
        <div class="text-[#89B441] text-[18px] pt-20 font-normal flex items-center gap-x-2">
            <a href="/toko">Toko</a>
            <svg width="8" height="15" viewBox="0 0 8 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M1 1.32257L7 7.51612L1 13.7097" stroke="black" stroke-opacity="0.5"/>
            </svg>
            <a href="/toko/{{ $umkm_all_detail['slug-umkm'] }}">{{ $umkm_all_detail['product']['name'] }}</a>
            <svg width="8" height="15" viewBox="0 0 8 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M1 1.32257L7 7.51612L1 13.7097" stroke="black" stroke-opacity="0.5"/>
            </svg>
            <a>{{ $umkm_all_detail['umkm']['umkm_name'] }}</a>
        </div>
        <div class="flex flex-col pt-5 gap-y-20">
            {{-- Produk Detail --}}
            <div class="flex flex-col gap-y-10">
                <h1 class="font-bold text-[32px]">Halaman Produk</h1>
                <div class="grid md:grid-cols-1 lg:grid-cols-3 gap-x-14 gap-y-14 ">
                    <div class="col-span-2">
                        <div class="lg:flex gap-x-10">
                            <div class="flex flex-col md:w-full lg:w-2/6 gap-y-4 ">
                                {{-- Image Preview --}}
                                <div class="flex justify-center">
                                    
                                  <img src={{ !empty($umkm_all_detail['product']['image']) ? 'https://api.andamantau.com/' . $umkm_all_detail['product']['image'] : asset('assets/images/noimage.png') }} alt=""class="object-cover rounded-md md:w-full lg:w-72 h-72">
                                </div>
                                <div class="flex justify-center px-2 gap-x-2">
                                {{-- @foreach ($umkm_all_details['images'] as $image)
                                        <img src={{ url($image) }} alt="" class="w-[47px] h-[47px] rounded-sm object-cover">
                                    @endforeach --}}
                                </div>
                                <div class="flex pt-2 gap-x-4">
                                    <div class="w-14 h-14">
                                        
                                    <img src={{ !empty($umkm_all_detail['umkm']['umkm_image']) ? 'https://api.andamantau.com/' . $umkm_all_detail['umkm']['umkm_image'] : asset('assets/images/noimage.png') }} alt="">
                                    </div>
                                    <div class="flex flex-col justify-between">
                                    <h1 class="font-bold text-[18px]">{{ $umkm_all_detail['umkm']['umkm_name'] }}</h1>
                                        {{-- <p class="font-semibold text-[16px]">{{ $umkm_detail["city"].  ", " . $umkm_detail['province'] }}</p> --}}
                                    </div>
                                </div>
                            </div>
                            <div class="flex flex-col md:w-full lg:w-4/6 gap-y-3">
                            <h1 class="font-bold text-[34px]">{{ $umkm_all_detail['product']['name'] }}</h1>
                                <h2 class="font-bold text-[24px]">Rp.{{($umkm_all_detail['product']['price'])}}</h2>
                                <div class="font-[400] text-[16px] flex flex-col gap-y-1">
                                    <h3>Deskripsi Produk :</h3>
                                    <p>
                                    {{ $umkm_all_detail['product']['description'] }}
                                    </p>
                                </div>
                                <div class="flex flex-col justify-center pt-4 gap-y-3">
                                <a href="https://www.instagram.com/{{ $umkm_all_detail['umkm']['instagram'] }}" target="_blank" class="flex items-center gap-x-3">
                                        <img src={{ url("/assets/icons/instagram.svg") }} alt="instagram-icons" class="w-10 h-10">
                                        <h1 class="font-bold text-[17px]">{{ $umkm_all_detail['umkm']['instagram'] }}</h1>
                                        </a>
                                <a href="https://wa.me/62{{$umkm_all_detail['umkm']['whatsapp'] }}" target="_blank" class="flex items-center gap-x-3">
                                        <img src={{ url("/assets/icons/whatsapp.svg") }} alt="whatsapp-icons" class="w-10 h-10">
                                        <h1 class="font-bold text-[17px]">{{ $umkm_all_detail['umkm']['whatsapp'] }}</h1>
                                        </a>
                                <a href="https://www.facebook.com/{{ $umkm_all_detail['umkm']['facebook'] }}" target="_blank" class="flex items-center gap-x-3">
                                        <img src={{ url("/assets/icons/facebook.svg") }} alt="facebook-icons" class="w-10 h-10">
                                        <h1 class="font-bold text-[17px]">{{ $umkm_all_detail['umkm']['facebook'] }}</h1>
                                        </a>
                                </div>
                            </div>
                        </div> 
                    </div>
                    <div class="col-span-2 lg:col-span-1 ">
                        <div class="w-full h-full bg-white border-2 rounded-lg">
                            <form action="/buy-now" method="GET" class="flex flex-col w-full h-full py-4 px-7 gap-y-5">
                                @csrf
                                <h1 class="text-[24px] font-bold">Atur Jumlah dan catatan</h1>
                                <div class="flex flex-col justify-between h-full gap-y-5">
                                    <div class="flex flex-col gap-y-5">
                                        <div class="">
                                            @component("components.input-plus-minus")
                                                @slot("value")
                                                    0
                                                @endslot
                                                @slot("stock")
                                                {{ $umkm_all_detail['product']['stock'] }}
                                                @endslot
                                            @endcomponent
                                        </div>
                                        <input type="hidden" name="sellerSlug" value={{ $umkm_all_detail['slug-umkm'] }}>
                                        <input type="hidden" name="productSlug" value={{ $umkm_all_detail['slug-product'] }}>
                                        <h2 class="font-[400] text-[18px]">Stok Total Sisa: {{ $umkm_all_detail['product']['stock'] }}</h2>
                                        <div>
                                            <button type="button" class="flex" id="showCatatanButton" onclick="showCatatanInput()">
                                                {{-- < width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M5.92971 19.283L5.92972 19.283L5.95149 19.2775L5.95151 19.2775L8.58384 18.6194C8.59896 18.6156 8.61396 18.6119 8.62885 18.6082C8.85159 18.5528 9.04877 18.5037 9.2278 18.4023C9.40683 18.301 9.55035 18.1571 9.71248 17.9947C9.72332 17.9838 9.73425 17.9729 9.74527 17.9618L16.9393 10.7678L16.9393 10.7678L16.9626 10.7445C17.2761 10.4311 17.5461 10.1611 17.7333 9.91573C17.9339 9.65281 18.0858 9.36038 18.0858 9C18.0858 8.63961 17.9339 8.34719 17.7333 8.08427C17.5461 7.83894 17.276 7.5689 16.9626 7.2555L16.9393 7.23223L16.5858 7.58579L16.9393 7.23223L16.7678 7.06066L16.7445 7.03738C16.4311 6.72395 16.1611 6.45388 15.9157 6.2667C15.6528 6.0661 15.3604 5.91421 15 5.91421C14.6396 5.91421 14.3472 6.0661 14.0843 6.2667C13.8389 6.45388 13.5689 6.72395 13.2555 7.03739L13.2322 7.06066L6.03816 14.2547C6.02714 14.2658 6.01619 14.2767 6.00533 14.2875C5.84286 14.4496 5.69903 14.5932 5.59766 14.7722C5.4963 14.9512 5.44723 15.1484 5.39179 15.3711C5.38809 15.386 5.38435 15.401 5.38057 15.4162L4.71704 18.0703C4.71483 18.0791 4.7126 18.088 4.71036 18.097C4.67112 18.2537 4.62921 18.421 4.61546 18.5615C4.60032 18.7163 4.60385 18.9773 4.81326 19.1867C5.02267 19.3961 5.28373 19.3997 5.43846 19.3845C5.57899 19.3708 5.74633 19.3289 5.90301 19.2896C5.91195 19.2874 5.92085 19.2852 5.92971 19.283Z" stroke="#89B53D"/>
                                                    <path d="M12.5 7.5L15.5 5.5L18.5 8.5L16.5 11.5L12.5 7.5Z" fill="#89B53D"/> --}}
                                                
                                                {{-- <h3 class="text-[#89B53D] ml-2">Tambahkan Catatan</h3>
                                            </button>
                                            <div id="catatanInputText" class="hidden">
                                                <textarea name="catatan" class="w-full rounded-lg border-[#89B53D] border" placeholder="Contoh: Yang beratnya lebih dari 2kg ya"></textarea>
                                                <button type="button" onclick="hideCatatanInput()" class="font-bold text-[#89B53D] mt-2">
                                                    Batalkan Catatan
                                                </button> --}}
                                            </div>
                                        </div>
                                    </div>
                                    {{-- <div class="flex flex-col gap-y-6">
                                        <div class="flex justify-between font-bold">
                                            <h1>SubTotal</h1>
                                            <p class="mr-5">@currency(0)</p>
                                        </div>
                                        <div class="flex flex-col gap-y-2">

                                            @livewire('cart-button-component', [
                                                'sellerSlug' => "421",
                                                'productSlug'=> "ikan arwana",
                                                'quantity' => "1",
                                                'price' => "10000"
                                            ]) --}}
                                            {{-- <livewire:cart-button-component :sellerSlug="{{ $seller['slug'] }}" :productSlug="{{ $productData['slug'] }}" :quantity="2" /> --}}
                                            {{-- <button type="submit" class="p-2 bg-white text-center border-[#89B53D] border font-bold text-[#89B53D] rounded-md">
                                                <span>Beli Langsung</span>
                                            </button>
                                        </div>
                                        <div class="flex items-center justify-center gap-x-2">
                                            <div class="flex items-center font-bold gap-x-1">
                                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M4.82698 7.13803L5.27248 7.36502L4.82698 7.13803ZM5.2682 18.7318L5.62175 19.0854H5.62175L5.2682 18.7318ZM17.862 16.173L17.635 15.7275L17.862 16.173ZM19.173 14.862L18.7275 14.635L19.173 14.862ZM19.173 7.13803L18.7275 7.36502V7.36502L19.173 7.13803ZM17.862 5.82698L18.089 5.38148V5.38148L17.862 5.82698ZM6.13803 5.82698L6.36502 6.27248L6.13803 5.82698ZM7.20711 16.7929L7.56066 17.1464L7.20711 16.7929ZM5 10.3C5 9.45167 5.00039 8.84549 5.03921 8.37032C5.07756 7.90099 5.15089 7.60366 5.27248 7.36502L4.38148 6.91103C4.17609 7.31413 4.08593 7.75771 4.04253 8.28889C3.99961 8.81423 4 9.46817 4 10.3H5ZM5 11.5V10.3H4V11.5H5ZM4 11.5V16.5H5V11.5H4ZM4 16.5V18.4136H5V16.5H4ZM4 18.4136C4 19.26 5.02329 19.6838 5.62175 19.0854L4.91465 18.3782C4.91754 18.3753 4.92812 18.368 4.94323 18.3654C4.9556 18.3632 4.96421 18.3654 4.96913 18.3674C4.97406 18.3695 4.98164 18.374 4.98888 18.3843C4.99771 18.3968 5 18.4095 5 18.4136H4ZM5.62175 19.0854L7.56066 17.1464L6.85355 16.4393L4.91465 18.3782L5.62175 19.0854ZM14.7 16H7.91421V17H14.7V16ZM17.635 15.7275C17.3963 15.8491 17.099 15.9224 16.6297 15.9608C16.1545 15.9996 15.5483 16 14.7 16V17C15.5318 17 16.1858 17.0004 16.7111 16.9575C17.2423 16.9141 17.6859 16.8239 18.089 16.6185L17.635 15.7275ZM18.7275 14.635C18.4878 15.1054 18.1054 15.4878 17.635 15.7275L18.089 16.6185C18.7475 16.283 19.283 15.7475 19.6185 15.089L18.7275 14.635ZM19 11.7C19 12.5483 18.9996 13.1545 18.9608 13.6297C18.9224 14.099 18.8491 14.3963 18.7275 14.635L19.6185 15.089C19.8239 14.6859 19.9141 14.2423 19.9575 13.7111C20.0004 13.1858 20 12.5318 20 11.7H19ZM19 10.3V11.7H20V10.3H19ZM18.7275 7.36502C18.8491 7.60366 18.9224 7.90099 18.9608 8.37032C18.9996 8.84549 19 9.45167 19 10.3H20C20 9.46817 20.0004 8.81423 19.9575 8.28889C19.9141 7.75771 19.8239 7.31413 19.6185 6.91103L18.7275 7.36502ZM17.635 6.27248C18.1054 6.51217 18.4878 6.89462 18.7275 7.36502L19.6185 6.91103C19.283 6.25247 18.7475 5.71703 18.089 5.38148L17.635 6.27248ZM14.7 6C15.5483 6 16.1545 6.00039 16.6297 6.03921C17.099 6.07756 17.3963 6.15089 17.635 6.27248L18.089 5.38148C17.6859 5.17609 17.2423 5.08593 16.7111 5.04253C16.1858 4.99961 15.5318 5 14.7 5V6ZM9.3 6H14.7V5H9.3V6ZM6.36502 6.27248C6.60366 6.15089 6.90099 6.07756 7.37032 6.03921C7.84549 6.00039 8.45167 6 9.3 6V5C8.46817 5 7.81423 4.99961 7.28889 5.04253C6.75771 5.08593 6.31413 5.17609 5.91103 5.38148L6.36502 6.27248ZM5.27248 7.36502C5.51217 6.89462 5.89462 6.51217 6.36502 6.27248L5.91103 5.38148C5.25247 5.71703 4.71703 6.25247 4.38148 6.91103L5.27248 7.36502ZM7.56066 17.1464C7.65443 17.0527 7.78161 17 7.91421 17V16C7.51639 16 7.13486 16.158 6.85355 16.4393L7.56066 17.1464Z" fill="#222222"/>
                                                    <path d="M8.5 9.5L15.5 9.5" stroke="#222222" stroke-linecap="round" stroke-linejoin="round"/>
                                                    <path d="M8.5 12.5L13.5 12.5" stroke="#222222" stroke-linecap="round" stroke-linejoin="round"/>
                                                </svg>
                                                <h1>Pesan</h1>
                                            </div>
                                            <span class="">|</span>
                                            <div class="flex items-center font-bold gap-x-1">
                                                <svg width="21" height="21" viewBox="0 0 21 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <rect x="16.5001" y="15.3462" width="3.23077" height="3.00002" rx="1.50001" transform="rotate(90 16.5001 15.3462)" fill="white" stroke="black"/>
                                                    <rect x="13.5" y="7.26923" width="3.23077" height="3.00002" rx="1.50001" transform="rotate(-90 13.5 7.26923)" fill="white" stroke="black"/>
                                                    <path d="M13.5625 6.46155L6 11.274L13.5625 16.0866" stroke="black"/>
                                                    <rect x="4.5" y="12.9231" width="3.23077" height="3.00002" rx="1.50001" transform="rotate(-90 4.5 12.9231)" fill="white" stroke="black"/>
                                                </svg>
                                                <h1>Bagikan</h1>
                                            </div>
                                        </div>
                                    </div> --}}
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            {{-- Produk Lainnya --}}
            <div class="flex flex-col gap-y-10">
                <h2 class="font-bold text-[20px]">Produk Lainnya</h2>
                <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-x-8 gap-y-16">
                @foreach ($umkm_all_detail['otherProducts'] as $product)
                        {{-- @foreach ($seller['products'] as $product) --}}
                            {{-- @if ($product['slug'] !== $productData['slug']) --}}
                                @component('components.product-card')
                                    @slot('productImage')
                                    {{ !empty($product['image']) ? 'https://api.andamantau.com/' . $product['image'] : asset('assets/images/noimage.png') }}
                                    @endslot
                                    @slot('productUrl')
                                        /toko/{{ $umkm_all_detail['slug-umkm'] }}/products/{{$umkm_all_detail['slug-product'] }}
                                    @endslot
                                    @slot('productTitle')
                                        {{ $product['name'] }}
                                    @endslot
                                    {{-- @slot('productLocation')
                                        {{ $seller['location'] }}
                                    @endslot --}}
                                    @slot('productPrice')
                                    @currency($product['price'])
                                    @endslot
                                    @slot('productSeller')
                                        {{ $umkm_all_detail['umkm']["umkm_name"] }}
                                    @endslot
                                    @slot('isPromo')
                                        false
                                    @endslot
                                @endcomponent
                            {{-- @endif --}}

                        {{-- @endforeach --}}
                        @endforeach
                </div>
            </div>
        </div>
    </div>

@push('scripts')
<script>

    function updateMainImage(index){
        // Get references to the main image and thumbnail images
        const mainImage = document.getElementById('mainImage');
        const thumbnailImages = document.querySelectorAll('.thumbnail-image');

        let tempMainImage = mainImage.src;

        // Update the main image source with the clicked thumbnail's source
        mainImage.src = thumbnailImages[index].src;

        thumbnailImages[index].addEventListener('click', () => {
            tempMainImage = mainImage.src;
        });

        thumbnailImages[index].addEventListener('mouseout', () => {
            mainImage.src = tempMainImage;
        });
    }

    function showCatatanInput() {
        const showCatatanButton = document.getElementById('showCatatanButton');
        const catatanInputText = document.getElementById('catatanInputText');

        showCatatanButton.classList.add('hidden');
        catatanInputText.classList.remove('hidden');
    }

    function hideCatatanInput() {
        const showCatatanButton = document.getElementById('showCatatanButton');
        const catatanInputText = document.getElementById('catatanInputText');

        showCatatanButton.classList.remove('hidden');
        catatanInputText.classList.add('hidden');
    }

    const input = document.getElementById('quantity');
    const buyNowButton = document.getElementById('buyNowButton');

</script>
@endpush
