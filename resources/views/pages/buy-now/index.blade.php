@extends('layouts.main.index')

@section('styles')
<style>
.selected {
  border: 2px solid blue;
}
</style>
@endsection

@section('pages')

<form method="GET" @if (empty(request()->nama_depan)) action="/buy-now" @else action="/billing" @endif class="flex flex-col px-3 md:px-10 pt-10 gap-y-5">
    {{-- Hidden Input --}}
    <div class="hidden">
        <input type="hidden" name="sellerSlug" value={{ $sellerData['slug'] }}>
        <input type="hidden" name="quantity" value={{ $quantity }}>
        <input type="hidden" name="productSlug" value={{ $productData['slug'] }}>
        <input type="hidden" name="catatan" value={{ $catatan }}>
    </div>
    @if (!empty(request()->nama_depan))
    <div class="hidden">
        <input type="hidden" name="nama_depan" value={{ $datas['nama_depan'] }}>
        <input type="hidden" name="nama_belakang" value={{ $datas['nama_belakang'] }}>
        <input type="hidden" name="email" value={{ $datas['email'] }}>
        <input type="hidden" name="no_handphone" value={{ $datas['no_handphone'] }}>
        <input type="hidden" name="alamat_pin_point" value={{ $datas['alamat_pin_point'] }}>
        <input type="hidden" name="provinsi" value={{ $datas['provinsi'] }}>
        <input type="hidden" name="kota_kabupaten" value={{ $datas['kota_kabupaten'] }}>
        <input type="hidden" name="kecamatan" value={{ $datas['kecamatan'] }}>
        <input type="hidden" name="kelurahan" value={{ $datas['kelurahan'] }}>
        <input type="hidden" name="kode_pos" value={{ $datas['kode_pos'] }}>
        <input type="hidden" name="pembayaran" value={{ $datas['pembayaran'] }}>
        <input type="hidden" name="pengiriman" value={{ $datas['pengiriman'] }}>
        <input type="hidden" name="kurir" value={{ $datas['kurir'] }}>
    </div>
    @endif
    <div class="text-[#89B441] text-[18px] pt-5 font-semibold flex items-center gap-x-2">
        <a href={{ url()->previous() }}>< Kembali</a>
    </div>
    <h1 class="text-[32px] font-bold">Beli Langsung</h1>
    <div class="flex flex-col mt-5 gap-y-5">
        <div class="flex flex-col md:flex-row justify-between gap-x-10 gap-y-5">
            @csrf
            <div class="flex flex-col grow gap-y-5 ">
                {{-- Barang Yang Dibeli --}}
                <h1 class="font-bold text-[22px]">Barang yang dibeli</h1>
                <div class="flex  md:flex-col lg:flex-row items-center md:items-start lg:items-center justify-between md:gap-y-3 lg:gap-y-0 px-5 pt-5 pb-10 bg-white rounded-lg shadow-lg">
                    <div>
                        <h1 class="pb-4 font-bold text-[18px]">{{ $sellerData['name'] }}</h1>
                        <div class="flex gap-x-4">
                            <div>
                                <img src={{ url($productData['images'][0]) }} class="object-cover w-20 h-20 rounded-lg" alt="">
                            </div>
                            <div class="flex flex-col justify-between">
                                <h1>{{ $productData['name'] }}</h1>
                                <p class="font-bold">@currency($productData['price'])</p>
                                <div class="flex">
                                    <p>Jantan</p>
                                    <button class="pl-5 text-[#89B53D] font-bold">Ubah</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="">
                        @component("components.input-plus-minus")
                            @slot("value")
                                {{ $quantity }}
                            @endslot
                            @slot("stock")
                                {{ $productData['stock'] }}
                            @endslot
                        @endcomponent
                    </div>
                </div>
                {{-- Separator --}}
                <div class="border-b-2 border-[#B1B1B1]"></div>
                {{-- Pengiriman dan pembayaran --}}
                @if (!empty(request()->nama_depan))
                <h1 class="font-bold text-[32px]">Pengiriman dan pembayaran</h1>
                <div class="flex flex-col bg-white rounded-lg shadow-lg gap-y-3">
                    <div class="flex flex-col p-5 gap-y-3">
                        <h1 class="font-bold text-[20px]">Alamat</h1>
                        <p>{{ $datas['nama_depan'] }} {{  $datas['nama_belakang'] }} ({{ $datas['no_handphone'] }})</p>
                        <p>{{ $datas['alamat'] }}, {{ $datas['kelurahan'] }}, {{ $datas['kecamatan'] }}, {{ $datas['kota_kabupaten'] }}, {{ $datas['provinsi'] }} , {{ $datas['kode_pos'] }}</p>
                    </div>

                    <div class="w-full border-b-2"></div>
                    <div class="flex flex-col lg:flex-row gap-y-5 p-5">
                        <div class="w-1/2">
                            <h1 class="font-bold text-[20px] pb-7">Pilih Pengiriman</h1>
                            <select name="pengiriman" id="" class="rounded-lg border-[#89B53D] border w-[250px]">
                                <option value="regular" @if($datas['pengiriman'] == "regular") selected @endif>Regular</option>
                                <option value="express" @if($datas['pengiriman'] == "express") selected @endif>Express</option>
                            </select>
                        </div>
                        <div class="w-1/2">
                            <h1 class="font-bold text-[20px] pb-7">Pilih Kurir</h1>
                            <select name="kurir" id="" class="rounded-lg border-[#89B53D] border w-[250px]">
                                <option value="ninja" @if($datas['kurir'] == "ninja") selected @endif>Ninja</option>
                                <option value="jnt" @if($datas['kurir'] == "jnt") selected @endif>J&T</option>
                            </select>
                        </div>
                    </div>
                    <div class="w-full border-b-2"></div>
                    <div class="">
                        <div class="flex justify-between px-5 pt-5">
                            <h1 class="font-bold text-[20px] pb-2">Metode Pembayaran</h1>
                            <p class="text-[#00000080]">Estimasi tiba  2-3hari</p>
                        </div>
                        <div>
                            @if ($datas['pembayaran'] == "atm")
                            <div class="flex items-center justify-between p-5 rounded-xl">
                                <div class="flex items-center font-normal gap-x-5">
                                    <div class="flex items-center justify-center w-32 h-14">
                                        <svg width="78" height="78" viewBox="0 0 78 78" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M9.75002 21.125V19C9.75002 16.1716 9.75002 14.7574 10.6287 13.8787C11.5074 13 12.9216 13 15.75 13L64 13C64.4714 13 64.7071 13 64.8536 13.1464C65 13.2929 65 13.5286 65 14L65 23.25C65 26.0784 65 27.4926 64.1213 28.3713C63.2426 29.25 61.8284 29.25 59 29.25H48.75M9.75002 21.125V23.25C9.75002 26.0784 9.75002 27.4926 10.6287 28.3713C11.5074 29.25 12.9216 29.25 15.75 29.25L66.25 29.25C67.1928 29.25 67.6642 29.25 67.9571 29.5429C68.25 29.8358 68.25 30.3072 68.25 31.25L68.25 42.25M9.75002 21.125L9.75002 64.25C9.75002 66.1356 9.75002 67.0784 10.3358 67.6642C10.9216 68.25 11.8644 68.25 13.75 68.25L66.25 68.25C67.1928 68.25 67.6642 68.25 67.9571 67.9571C68.25 67.6642 68.25 67.1928 68.25 66.25L68.25 55.25M68.25 55.25H50.75C49.8072 55.25 49.3358 55.25 49.0429 54.9571C48.75 54.6642 48.75 54.1928 48.75 53.25V44.25C48.75 43.3072 48.75 42.8358 49.0429 42.5429C49.3358 42.25 49.8072 42.25 50.75 42.25H68.25M68.25 55.25L68.25 42.25" stroke="black" stroke-width="4"/>
                                        </svg>
                                    </div>
                                    <h1>ATM (Automatic Teller Machine)</h1>
                                </div>
                                <button type="button" class="pr-20">
                                    <svg width="20" height="29" viewBox="0 0 20 29" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M3 3L17 14.5L3 26" stroke="black" stroke-width="5" stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg>
                                </button>
                            </div>
                            @elseif ($datas['pembayaran'] == 'qris')
                            <div class="flex items-center justify-between p-5 rounded-xl">
                                <div class="flex items-center font-normal gap-x-5">
                                    <div class="flex items-center justify-center w-32 h-14">
                                        <img src={{ url('assets/images/QRIS.png') }} alt="">
                                    </div>
                                    <h1>QRIS (Quick Response Code Indonesian Standard)</h1>
                                </div>
                                <button type="button" class="pr-20">
                                    <svg width="20" height="29" viewBox="0 0 20 29" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M3 3L17 14.5L3 26" stroke="black" stroke-width="5" stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg>
                                </button>
                            </div>
                            @elseif ($datas['pembayaran'] == 'tunai')
                            <div class="flex items-center justify-between p-5 rounded-xl">
                                <div class="flex items-center font-normal gap-x-5">
                                    <div class="flex items-center justify-center w-32 h-14">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-full" viewBox="0 0 512 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M64 32C28.7 32 0 60.7 0 96V416c0 35.3 28.7 64 64 64H448c35.3 0 64-28.7 64-64V192c0-35.3-28.7-64-64-64H80c-8.8 0-16-7.2-16-16s7.2-16 16-16H448c17.7 0 32-14.3 32-32s-14.3-32-32-32H64zM416 272a32 32 0 1 1 0 64 32 32 0 1 1 0-64z"/></svg>
                                    </div>
                                    <h1>Tunai</h1>
                                </div>
                                <button type="button" class="pr-20">
                                    <svg width="20" height="29" viewBox="0 0 20 29" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M3 3L17 14.5L3 26" stroke="black" stroke-width="5" stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg>
                                </button>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
                @else
                <h1 class="text-[32px] font-bold pb-10">Informasi Pengiriman</h1>
                @endif
            </div>
            <div class="w-full md:w-[300px] ">
                <div class="flex flex-col p-3 bg-white rounded-lg shadow-lg gap-y-3">
                    <h1 class="font-bold text-[18px]">Total Belanja</h1>
                    <div class="flex gap-x-14 text-[14px] justify-between">
                        <p>{{ $productData['name'] }} ({{ $quantity }})</p>
                        <p>@currency($productData['price'] * $quantity)</p>
                    </div>
                    <div class="flex gap-x-14 text-[14px] justify-between items-start">
                        @if (!empty(request()->kurir))
                        <div class="">
                            <p>Ongkos Kirim</p>
                            <p>({{ $datas['kurir'] }})</p>
                        </div>
                        <p>@currency(40000)</p>
                        @endif
                    </div>
                    <span class="w-full pt-10 border-b"></span>
                    <div class="flex flex-col pb-10 font-bold gap-y-1">
                        <div class="flex gap-x-14 text-[15px] justify-between">
                            <p>Total Harga</p>
                            <p>@currency((!empty(request()->kurir)) ?  $productData['price'] * $quantity + 40000 : $productData['price'] * $quantity )</p>
                        </div>
                    </div>
                    @if (empty(request()->nama_depan))
                    <button type="submit" class="bg-[#89B53D] py-2 rounded-md text-white font-bold">
                        Selanjutnya
                    </button>
                    @else
                    <button type="submit" class="bg-[#89B53D] py-2 rounded-md text-white font-bold">
                        Bayar Langsung
                    </button>
                    @endif

                </div>
            </div>
        </div>
    </div>
    <div class="">
        @if (empty(request()->nama_depan))
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-x-20 gap-y-10 lg:gap-y-0">
            <div class="flex flex-col w-full gap-y-5">
                <div class="flex md:flex-row flex-col justify-between gap-y-7 md:gap-y-0 md:gap-x-20">
                    <div class="flex flex-col gap-y-2 grow">
                        <label for="nama_depan" class="text-2xl font-bold">Nama Depan</label>
                        <input required type="text" class="h-12 rounded-md" placeholder="Rudy" name="nama_depan">
                    </div>
                    <div class="flex flex-col gap-y-2 grow">
                        <label for="nama_belakang" class="text-2xl font-bold">Nama Belakang</label>
                        <input required type="text" class="h-12 rounded-md" placeholder="Feni" name="nama_belakang">
                    </div>
                </div>
                <div class="flex flex-col gap-y-2">
                    <label for="Email" class="text-2xl font-bold">Email</label>
                    <input required type="email" class="h-12 rounded-md" placeholder="fendi_fendi@gmail.com" name="email">
                </div>
                <div class="flex flex-col gap-y-2">
                    <label for="no_handphone" class="text-2xl font-bold">No Handphone</label>
                    <input required type="text" class="h-12 rounded-md" placeholder="081234567890" name="no_handphone">
                </div>
                <div class="flex flex-col gap-y-2">
                    <label for="alamat" class="text-2xl font-bold">Alamat</label>
                    <input required type="text" class="h-12 rounded-md" placeholder="Jl. Pahlawan No. 123" name="alamat">
                </div>
                <div class="flex flex-col gap-y-2">
                    <label for="alamat_pin_point" class="text-2xl font-bold">Alamat Pin Point</label>
                    <input required type="text" class="h-12 rounded-md" placeholder="Jl. Pahlawan No. 123" name="alamat_pin_point">
                </div>
                <div class="flex flex-col gap-y-2">
                    <label for="alamat_pin_point" class="text-2xl font-bold">Metode Pembayaran</label>
                    <div class="relative">
                        <button type="button" id="pembayaranButton" class="w-full" onclick="openModalPembayaran()">
                            <div class="flex items-center justify-between h-16 px-5 py-2 bg-white border border-black rounded-md gap-x-5">
                                <div class="items-center hidden gap-x-5" id="transfer_bank">
                                    <div class="h-[30px] w-[70px] flex items-center justify-center">
                                        <svg width="41" height="41" viewBox="0 0 41 41" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M33.3125 30.75V20.5H35.875V17.9375H5.125V20.5H7.6875V30.75H2.5625V33.3125H38.4375V30.75H33.3125ZM15.375 30.75H10.25V20.5H15.375V30.75ZM17.9375 30.75V20.5H23.0625V30.75H17.9375ZM30.75 30.75H25.625V20.5H30.75V30.75Z" fill="black"/>
                                            <path d="M41 35.875H0V38.4375H41V35.875Z" fill="black"/>
                                            <path d="M40.3208 12.9662L21.102 2.71625C20.7304 2.51125 20.2692 2.51125 19.8976 2.71625L0.678881 12.9662C0.153568 13.2353 -0.102682 13.8375 0.0382557 14.4012C0.179193 14.9778 0.691693 15.375 1.28107 15.375H39.7186C40.3079 15.375 40.8204 14.9778 40.9614 14.4012C41.1023 13.8375 40.8461 13.2353 40.3208 12.9662ZM6.40607 12.8125L20.4998 5.29156L34.5936 12.8125H6.40607Z" fill="black"/>
                                        </svg>
                                    </div>
                                    <div class="text-left">
                                        <p class="text-[#00000080]">Estimasi tiba 2-3hari</p>
                                        <p>Transfer Bank</p>
                                    </div>
                                </div>
                                <div class="items-center hidden gap-x-5" id="qris">
                                    <img src={{ url("assets/images/QRIS.png") }} class="h-full w-[70px] " alt="">
                                    <div class="text-left">
                                        <p class="text-[#00000080]">Estimasi tiba 2-3hari</p>
                                        <p>QRIS (Quick Response Code Indonesian Standard)</p>
                                    </div>
                                </div>
                                <div class="items-center hidden gap-x-5" id="tunai">
                                    <div class="h-[30px] w-[70px] flex items-center justify-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-full" viewBox="0 0 512 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M64 32C28.7 32 0 60.7 0 96V416c0 35.3 28.7 64 64 64H448c35.3 0 64-28.7 64-64V192c0-35.3-28.7-64-64-64H80c-8.8 0-16-7.2-16-16s7.2-16 16-16H448c17.7 0 32-14.3 32-32s-14.3-32-32-32H64zM416 272a32 32 0 1 1 0 64 32 32 0 1 1 0-64z"/></svg>
                                    </div>
                                    <div class="text-left">
                                        <p class="text-[#00000080]">Estimasi tiba 2-3hari</p>
                                        <p>Tunai</p>
                                    </div>
                                </div>
                                <div class="items-center hidden gap-x-5" id="kartu_kredit">
                                    <div class="h-[30px] w-[70px] flex items-center justify-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-full" viewBox="0 0 576 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M64 32C28.7 32 0 60.7 0 96v32H576V96c0-35.3-28.7-64-64-64H64zM576 224H0V416c0 35.3 28.7 64 64 64H512c35.3 0 64-28.7 64-64V224zM112 352h64c8.8 0 16 7.2 16 16s-7.2 16-16 16H112c-8.8 0-16-7.2-16-16s7.2-16 16-16zm112 16c0-8.8 7.2-16 16-16H368c8.8 0 16 7.2 16 16s-7.2 16-16 16H240c-8.8 0-16-7.2-16-16z"/></svg>
                                    </div>
                                    <div class="text-left">
                                        <p class="text-[#00000080]">Estimasi tiba 2-3hari</p>
                                        <p>Kartu Kredit</p>
                                    </div>
                                </div>
                                <h1 id="noneContent">Silahkan Metode Pilih Pembayaran</h1>
                                <svg width="12" height="18" viewBox="0 0 12 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M1 1L11 9L1 17" stroke="black" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>

                            </div>
                        </button>
                        {{-- Pilih Pembayaran --}}
                        <div class="fixed top-28 left-[10%] md:left-[25%] lg:left-[50%] hidden" id="modalPembayaran">
                            <div class="flex flex-col px-6 py-4 bg-white border border-black rounded-xl gap-y-6">
                                <h1 class="font-bold text-[20px] text-left">Pilih Metode Pembayaran</h1>
                                <fieldset class="flex flex-col gap-y-5">
                                    <div class="flex items-center justify-between gap-x-20">
                                        <label for="transfer_bank" class="flex items-center gap-x-10">
                                            <div class="h-[30px] w-[70px] flex items-center">
                                                <svg width="41" height="41" viewBox="0 0 41 41" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M33.3125 30.75V20.5H35.875V17.9375H5.125V20.5H7.6875V30.75H2.5625V33.3125H38.4375V30.75H33.3125ZM15.375 30.75H10.25V20.5H15.375V30.75ZM17.9375 30.75V20.5H23.0625V30.75H17.9375ZM30.75 30.75H25.625V20.5H30.75V30.75Z" fill="black"/>
                                                    <path d="M41 35.875H0V38.4375H41V35.875Z" fill="black"/>
                                                    <path d="M40.3208 12.9662L21.102 2.71625C20.7304 2.51125 20.2692 2.51125 19.8976 2.71625L0.678881 12.9662C0.153568 13.2353 -0.102682 13.8375 0.0382557 14.4012C0.179193 14.9778 0.691693 15.375 1.28107 15.375H39.7186C40.3079 15.375 40.8204 14.9778 40.9614 14.4012C41.1023 13.8375 40.8461 13.2353 40.3208 12.9662ZM6.40607 12.8125L20.4998 5.29156L34.5936 12.8125H6.40607Z" fill="black"/>
                                                </svg>
                                            </div>
                                            <p>Transfer Bank</p>
                                        </label>
                                        <input type="radio" name="pembayaran" id="transfer_bank" value="transfer_bank">
                                    </div>
                                    <div class="flex items-center justify-between gap-x-20">
                                        <label for="qris" class="flex items-center gap-x-10">
                                            <div class="h-[30px] w-[70px] flex items-center">
                                                <svg width="71" height="26" viewBox="0 0 71 26" fill="none" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                                    <rect width="71" height="26" fill="url(#pattern0)"/>
                                                    <defs>
                                                    <pattern id="pattern0" patternContentUnits="objectBoundingBox" width="1" height="1">
                                                    <use xlink:href="#image0_996_1338" transform="matrix(0.00333333 0 0 0.00910256 0 -0.00519231)"/>
                                                    </pattern>
                                                    <image id="image0_996_1338" width="300" height="111" xlink:href="data:image/png;base64,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"/>
                                                    </defs>
                                                </svg>
                                            </div>
                                            <p>QRIS</p>
                                        </label>
                                        <input type="radio" name="pembayaran" id="qris" value="qris">
                                    </div>
                                    <div class="flex items-center justify-between gap-x-20">
                                        <label for="tunai" class="flex items-center gap-x-10">
                                            <div class="h-[30px] w-[70px] flex items-center">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-full" viewBox="0 0 512 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M64 32C28.7 32 0 60.7 0 96V416c0 35.3 28.7 64 64 64H448c35.3 0 64-28.7 64-64V192c0-35.3-28.7-64-64-64H80c-8.8 0-16-7.2-16-16s7.2-16 16-16H448c17.7 0 32-14.3 32-32s-14.3-32-32-32H64zM416 272a32 32 0 1 1 0 64 32 32 0 1 1 0-64z"/></svg>
                                            </div>
                                            <p>Tunai</p>
                                        </label>
                                        <input type="radio" name="pembayaran" id="tunai" value="tunai">
                                    </div>
                                    <div class="flex items-center justify-between gap-x-20">
                                        <label for="kartu_kredit" class="flex items-center gap-x-10">
                                            <div class="h-[30px] w-[70px] flex items-center">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-full" viewBox="0 0 576 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M64 32C28.7 32 0 60.7 0 96v32H576V96c0-35.3-28.7-64-64-64H64zM576 224H0V416c0 35.3 28.7 64 64 64H512c35.3 0 64-28.7 64-64V224zM112 352h64c8.8 0 16 7.2 16 16s-7.2 16-16 16H112c-8.8 0-16-7.2-16-16s7.2-16 16-16zm112 16c0-8.8 7.2-16 16-16H368c8.8 0 16 7.2 16 16s-7.2 16-16 16H240c-8.8 0-16-7.2-16-16z"/></svg>
                                            </div>
                                            <p>Kartu Kredit</p>
                                        </label>
                                        <input type="radio" name="pembayaran" id="kartu_kredit" value="kartu_kredit">
                                    </div>
                                    <div class="flex items-center justify-between gap-x-20">
                                        <label for="ovo" class="flex items-center gap-x-10">
                                            <div class="h-[30px] w-[70px] flex items-center">

                                            </div>
                                            <p>OVO</p>
                                        </label>
                                        <input type="radio" name="pembayaran" id="ovo" value="ovo">
                                    </div>
                                    <div class="flex items-center justify-between gap-x-20">
                                        <label for="gopay" class="flex items-center gap-x-10">
                                            <div class="h-[30px] w-[70px] flex items-center">

                                            </div>
                                            <p>GoPay</p>
                                        </label>
                                        <input type="radio" name="pembayaran" id="gopay" value="gopay">
                                    </div>
                                    <div class="flex items-center justify-between gap-x-20">
                                        <label for="shoppe_pay" class="flex items-center gap-x-10">
                                            <div class="h-[30px] w-[70px] flex items-center">

                                            </div>
                                            <p>Shoppe Pay</p>
                                        </label>
                                        <input type="radio" name="pembayaran" id="shoppe_pay" value="shoppe_pay">
                                    </div>
                                    <div class="flex items-center justify-between gap-x-20">
                                        <label for="dana" class="flex items-center gap-x-10">
                                            <div class="h-[30px] w-[70px] flex items-center">

                                            </div>
                                            <p>Dana</p>
                                        </label>
                                        <input type="radio" name="pembayaran" id="dana" value="dana">
                                    </div>
                                </fieldset>
                                <button type="button" onclick="selectPembayaran()" id="selectPembayaranButton" class="bg-[#88B53E] text-white py-3 rounded-md font-bold mt-10">PILIH</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="flex flex-col w-full gap-y-5">
                <div class="flex flex-col md:flex-row justify-between gap-y-7 md:gap-y-0 md:gap-x-20">
                    <div class="flex flex-col gap-y-2 grow">
                        <label for="provinsi" class="text-2xl font-bold">Provinsi</label>
                        <input required type="text" class="h-12 rounded-md" placeholder="Jawa Timur" name="provinsi">
                    </div>
                    <div class="flex flex-col gap-y-2 grow">
                        <label for="kota_kabupaten" class="text-2xl font-bold">Kota/Kabupaten</label>
                        <input required type="text" class="h-12 rounded-md" placeholder="Surabaya" name="kota_kabupaten">
                    </div>
                </div>
                <div class="flex flex-col md:flex-row justify-between gap-y-7 md:gap-y-0 md:gap-x-20">
                    <div class="flex flex-col gap-y-2 grow">
                        <label for="kecamatan" class="text-2xl font-bold">Kecamatan</label>
                        <input required type="text" class="h-12 rounded-md" placeholder="Purwantoro" name="kecamatan">
                    </div>
                    <div class="flex flex-col gap-y-2 grow">
                        <label for="kelurahan" class="text-2xl font-bold">Kelurahan</label>
                        <input required type="text" class="h-12 rounded-md" placeholder="Blimbing" name="kelurahan">
                    </div>
                </div>
                <div class="flex justify-between gap-x-20">
                    <div class="flex flex-col w-1/2 pr-10 gap-y-2">
                        <label for="kode_pos" class="text-2xl font-bold">Kode Pos</label>
                        <input required type="text" class="h-12 rounded-md" placeholder="12345" name="kode_pos">
                    </div>
                </div>
                <div class="flex flex-col justify-between gap-y-4">
                    <h1 class="text-2xl font-bold">Opsi Pengiriman</h1>
                    <div class="flex justify-between gap-x-5 lg:gap-x-20">
                        <div class="flex flex-col gap-y-2 grow">
                            <label for="pengiriman" class="text-lg font-bold">Pilih Pengiriman</label>
                            <select class="h-12 rounded-md" name="pengiriman">
                                <option value="" hidden disabled selected>Pilih salah satu</option>
                                <option value="regular">Regular</option>
                                <option value="express">Express</option>
                            </select>
                        </div>
                        <div class="flex flex-col gap-y-2 grow">
                            <label for="kurir" class="text-lg font-bold">Pilih Kurir</label>
                            <select required class="h-12 rounded-md" name="kurir">
                                <option value="" hidden disabled selected>Pilih salah satu</option>
                                <option value="jnt">J&T (Rp 40.000)</option>
                                <option value="ninja">Ninja (Rp 40.000)</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endif

    </div>
  </div>
</div>
@endsection

@push('scripts')
<script>
    function openModalPembayaran(){
        var button = document.getElementById('pembayaranButton');
        var modalPembayaran = document.getElementById('modalPembayaran');

        if (modalPembayaran.classList.contains("hidden")) {
            modalPembayaran.classList.remove('hidden');
        } else {
            modalPembayaran.classList.add('hidden');
        }
    }

    function selectPembayaran(){
        const radios = Array.from(document.querySelectorAll("input[type='radio'][name='pembayaran']"));
        const selectedRadio = radios.find((radio) => radio.checked);
        const modalPembayaran = document.getElementById('modalPembayaran');

        modalPembayaran.classList.add('hidden');

        if (selectedRadio) {
        const pembayaranId = `${selectedRadio.value}`;
        const pembayaranContent = document.getElementById(pembayaranId);
        const noneContent = document.getElementById('noneContent');

        noneContent.classList.add('hidden');
        pembayaranContent.classList.remove("hidden")
        pembayaranContent.classList.add("flex")
        modalPembayaran.classList.add('hidden');
        // Hide all other divs.
        radios.forEach((radio) => {
            const divId = `${radio.value}`;
            const div = document.getElementById(divId);
            if (divId !== pembayaranId) {
                div.classList.add("hidden")
            }
            console.log(radio);
        });
    }
}

</script>
@endpush
