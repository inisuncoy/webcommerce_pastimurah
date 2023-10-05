@extends('layouts.main.index')

@section('pages')

{{-- Link --}}
<div class="text-[#89B441] text-[18px] px-5 md:px-20  md:pt-10 font-semibold flex items-center gap-x-2">
    <h1>Toko</h1>
</div>
{{-- Content --}}
<div class="grid grid-cols-1 px-5 pt-5 md:px-20 md:grid-cols-5 gap-x-10">
    <form id="myForm" action="/toko/filters" method="GET">
        @csrf
    <div class="flex-col hidden md:flex md:cols-span-1 gap-y-5">
        <h1 class="font-bold text-[24px]"></h1>
        <div class="flex flex-col p-5 bg-white rounded-lg shadow-lg gap-y-7">
            <div class="flex items-center font-normal gap-x-5">
                <input type="checkbox" class="rounded-[4px] border-[#89B53D] border-2 checked:bg-[#89B53D] focus:ring-transparent w-5 h-5">
                <label for="">Semua</label>
            </div> 
            <div class="flex flex-col font-normal gap-y-2">
                <div class="flex items-center gap-x-5">
                    <input type="checkbox" name="province[]" id="DKI Jakarta" value="DKI-Jakarta" class="rounded-[4px] border-[#89B53D] border-2 checked:bg-[#89B53D] focus:ring-transparent w-5 h-5">
                    <label for="DKI Jakarta">DKI Jakarta</label>
                </div> 
                <div class="flex items-center gap-x-5">
                    <input type="checkbox" name="province[]" id="Sulawesi Selatan" value="Sulawesi-Selatan" class="rounded-[4px] border-[#89B53D] border-2 checked:bg-[#89B53D] focus:ring-transparent w-5 h-5">
                    <label for="Sulawesi Selatan">Sulawesi Selatan</label>
                </div> 
                 <div class="font-normal text-[#89B53D] pt-3">
                    <button id="openModalButton" onclick="openModal()" data-modal-data='https://drive.google.com/file/d/1jIYUGnLryU_yGtTn7qI-Nt6EnW2mVFwp/preview' type="button">Lihat Selengkapnya</button>
                </div>
            </div>
        </div>
    </div>

</form>
    <div class="flex flex-col md:col-span-4 gap-y-6">
        <div class="relative flex md:justify-end">
            
        <form action="/toko/search" method="POST" class="w-full"> 
            @csrf
            <input type="text"name="query" id="query" class="w-full rounded-lg text-[15px] md:text-[17px] py-2.5 pl-12 md:pl-14 md:py-3" placeholder="Cari Nama UMKM" value="{{ old('query') }}">
        </form> 
            <span class="absolute left-3 top-[10px] md:top-2.5">
                <svg class="w-[24px] h-[24px] md:w-[30px] md:h-[30px]" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <circle cx="11" cy="11" r="6" stroke="#222222" stroke-opacity="0.5"/>
                    <path d="M20 20L17 17" stroke="#222222" stroke-opacity="0.5" stroke-linecap="round"/>
                </svg>
            </span>
            </div>
            <div class="flex items-center justify-between md:hidden">
                <div class="flex items-center gap-x-2">
                <p>Filter</p>
                <button onclick="openModal()" class="mt-1">
                    <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M3.9 54.9C10.5 40.9 24.5 32 40 32H472c15.5 0 29.5 8.9 36.1 22.9s4.6 30.5-5.2 42.5L320 320.9V448c0 12.1-6.8 23.2-17.7 28.6s-23.8 4.3-33.5-3l-64-48c-8.1-6-12.8-15.5-12.8-25.6V320.9L9 97.3C-.7 85.4-2.8 68.8 3.9 54.9z"/></svg>
                </button>
            </div>

            <button type="button" class="text-[#89B53D] font-bold md:hidden block">Hapus Semua</button>
        </div>
        {{-- <div class="flex flex-wrap gap-4">
            <div class="rounded-lg border-2 border-[#89B53D] bg-white py-1 px-2 text-[14px] flex gap-x-2 items-center">
                <h1>Kota Bogor</h1>
                <span class="border-2 border-[#89B53D] rounded-full p-1 cursor-pointer">
                    <svg width="8" height="8" viewBox="0 0 8 8" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M7 1L1 7" stroke="black" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M1 1L7 7" stroke="black" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </span>
            </div>
            <div class="rounded-lg border-2 border-[#89B53D] bg-white py-1 px-2 text-[14px] flex gap-x-2 items-center">
                <h1>Kota Medan</h1>
                <span class="border-2 border-[#89B53D] rounded-full p-1 cursor-pointer">
                    <svg width="8" height="8" viewBox="0 0 8 8" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M7 1L1 7" stroke="black" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M1 1L7 7" stroke="black" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </span>
            </div>
            <div class="rounded-lg border-2 border-[#89B53D] bg-white py-1 px-2 text-[14px] flex gap-x-2 items-center">
                <h1>Kota Ma</h1>
                <span class="border-2 border-[#89B53D] rounded-full p-1 cursor-pointer">
                    <svg width="8" height="8" viewBox="0 0 8 8" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M7 1L1 7" stroke="black" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M1 1L7 7" stroke="black" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </span>
            </div>  --}}
            {{-- <div class="flex items-center">
                <button type="button" class="text-[#89B53D] font-bold hidden md:block">Hapus Semua</button>
            </div>
        </div> --}}
        <div class="grid grid-cols-2 gap-5 md:grid-cols-3 lg:grid-cols-4 lg:gap-x-12 lg:gap-y-14">
            @foreach ($umkm_data as $seller)
            <a href="/toko/{{ $seller["slug"] }}" class="bg-white rounded-lg drop-shadow-lg">
                <div class="flex flex-col items-center justify-center pb-10 gap-y-4">
                    <div class="flex items-center justify-center">
                    <img src={{ !empty($seller['umkm_image']) && @getimagesize('https://api.andamantau.com/' . $seller['umkm_image']) ? 'https://api.andamantau.com/' . $seller['umkm_image'] :  asset('assets/images/noimage.png') }} alt="product" class="object-cover w-96 aspect-square"/>
                    </div>
                    <div class="text-center">
                        <h1 class="text-[20px] font-[400]">{{ $seller["umkm_name"] }}</h1>
                        <p class="font-[400] text-[14px]">{{ $seller["city"].  ", " . $seller['province']}}</p>
                    </div>
                </div>
            </a>
        @endforeach
        </div>
    </div>
</div>

@endsection



@section('modal')
{{-- Modal --}}
<div class="fixed top-0 bottom-0 left-0 hidden w-full h-full overflow-auto" id="modal">
    <div class="flex items-center h-screen pt-20 md:ml-20">
        <div class="bg-[#F0F3F7] w-[900px] flex p-3">
            <div class="w-full bg-white">
                <div class="flex items-center px-5 py-2 border-b-2 gap-x-5">
                    <label for="lokasi" class="font-bold text-[20px]">Lokasi</label>
                    <div class="relative flex-grow">
                        <input type="text" class="w-full pl-12 rounded-md" placeholder="Cari Lokasi">
                        <span class="absolute left-3 top-2">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <circle cx="11" cy="11" r="6" stroke="#222222" stroke-opacity="0.5"/>
                                <path d="M20 20L17 17" stroke="#222222" stroke-opacity="0.5" stroke-linecap="round"/>
                            </svg>
                        </span>
                    </div>
                    <div class="w-10 h-10 cursor-pointer font-normal text-[50px] text-[#89B53D] flex justify-center items-center" id="closeModal" onclick="closeModal()">
                        <span class="mb-1">&times;</span>
                    </div>
                </div>
                <form id="myForm1" action="/toko/filter" method="GET">
                    @csrf
                <div class="grid w-full grid-cols-3 p-5">
                    <div class="flex flex-col gap-y-3">

                        <div class="flex flex-col">
                            <h1 class="ml-6 font-extrabold">Semua Lokasi</h1>
                            <div>
                                <div class="flex items-center gap-x-2">
                                    <input type="checkbox" name="province[]" id="All" value="All" class="rounded-[4px] border-[#89B53D] border-2 checked:bg-[#89B53D] focus:ring-transparent w-5 h-5">
                                    <label for="All">Semua</label>
                                </div>
                            </div>
                        </div>
                        {{-- A --}}
                        <div class="flex flex-col">
                            <h1 class="ml-6">A</h1>
                            <div>
                                <div class="flex items-center gap-x-2">
                                    <input type="checkbox" name="province[]" id="Aceh" value="Aceh" class="rounded-[4px] border-[#89B53D] border-2 checked:bg-[#89B53D] focus:ring-transparent w-5 h-5">
                                    <label for="Aceh">Aceh</label>
                                </div>
                            </div>
                        </div>
                        {{-- B --}}
                        <div class="flex flex-col">
                            <h1 class="ml-6">B</h1>
                            <div>
                                <div class="flex items-center gap-x-2">
                                    <input type="checkbox" name="province[]" id="Bali" value="Bali" class="rounded-[4px] border-[#89B53D] border-2 checked:bg-[#89B53D] focus:ring-transparent w-5 h-5">
                                    <label for="Bali">Bali</label>
                                </div>
                                <div class="flex items-center gap-x-2">
                                    <input type="checkbox" name="province[]" id="Bangka Belitung" value="Bangka-Belitung" class="rounded-[4px] border-[#89B53D] border-2 checked:bg-[#89B53D] focus:ring-transparent w-5 h-5">
                                    <label for="Bangka Belitung">Bangka Belitung</label>
                                </div>
                                <div class="flex items-center gap-x-2">
                                    <input type="checkbox" name="province[]" id="Banten" value="Banten" class="rounded-[4px] border-[#89B53D] border-2 checked:bg-[#89B53D] focus:ring-transparent w-5 h-5">
                                    <label for="Banten">Banten</label>
                                </div>
                                <div class="flex items-center gap-x-2">
                                    <input type="checkbox" name="province[]" id="Bengkulu" value="Bengkulu" class="rounded-[4px] border-[#89B53D] border-2 checked:bg-[#89B53D] focus:ring-transparent w-5 h-5">
                                    <label for="Bengkulu">Bengkulu</label>
                                </div>
                            </div>
                        </div>
                        {{-- D --}}
                        <div class="flex flex-col">
                            <h1 class="ml-6">D</h1>
                            <div>
                                <div class="flex items-center gap-x-2">
                                    <input type="checkbox" name="province[]" id="Daerah-Istimewa-Yogyakarta" value="Daerah Istimewa Yogyakarta" class="rounded-[4px] border-[#89B53D] border-2 checked:bg-[#89B53D] focus:ring-transparent w-5 h-5">
                                    <label for="Daerah Istimewa Yogyakarta">Daerah Istimewa Yogyakarta</label>
                                </div>
                                <div class="flex items-center gap-x-2">
                                    <input type="checkbox" name="province[]" id="DKI Jakarta" value="DKI-Jakarta" class="rounded-[4px] border-[#89B53D] border-2 checked:bg-[#89B53D] focus:ring-transparent w-5 h-5">
                                    <label for="DKI Jakarta">DKI Jakarta</label>
                                </div>
                            </div>
                        </div>
                        {{-- G --}}
                        <div class="flex flex-col">
                            <h1 class="ml-6">G</h1>
                            <div>
                                <div class="flex items-center gap-x-2">
                                    <input type="checkbox" name="province[]" id="Gorontalo" value="Gorontalo" class="rounded-[4px] border-[#89B53D] border-2 checked:bg-[#89B53D] focus:ring-transparent w-5 h-5">
                                    <label for="Gorontalo">Gorontalo</label>
                                </div>
                            </div>
                        </div>
                        {{-- J --}}
                        <div class="flex flex-col">
                            <h1 class="ml-6">J</h1>
                            <div>
                                <div class="flex items-center gap-x-2">
                                    <input type="checkbox" name="province[]" id="Jambi" value="Jambi" class="rounded-[4px] border-[#89B53D] border-2 checked:bg-[#89B53D] focus:ring-transparent w-5 h-5">
                                    <label for="Jambi">Jambi</label>
                                </div>
                                <div class="flex items-center gap-x-2">
                                    <input type="checkbox" name="province[]" id="Jawa Barat" value="Jawa-Barat" class="rounded-[4px] border-[#89B53D] border-2 checked:bg-[#89B53D] focus:ring-transparent w-5 h-5">
                                    <label for="Jawa Barat">Jawa Barat</label>
                                </div>
                                <div class="flex items-center gap-x-2">
                                    <input type="checkbox" name="province[]" id="Jawa Tengah" value="Jawa-Tengah" class="rounded-[4px] border-[#89B53D] border-2 checked:bg-[#89B53D] focus:ring-transparent w-5 h-5">
                                    <label for="Jawa Tengah">Jawa Tengah</label>
                                </div>
                                <div class="flex items-center gap-x-2">
                                    <input type="checkbox" name="province[]" id="Jawa Timur" value="Jawa-Timur" class="rounded-[4px] border-[#89B53D] border-2 checked:bg-[#89B53D] focus:ring-transparent w-5 h-5">
                                    <label for="Jawa Timur">Jawa Timur</label>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="flex flex-col gap-y-3">
                        {{-- K --}}
                        <div class="flex flex-col">
                            <h1 class="ml-6">K</h1>
                            <div>
                                <div class="flex items-center gap-x-2">
                                    <input type="checkbox" name="province[]" id="Kalimantan Barat" value="Kalimantan-Barat" class="rounded-[4px] border-[#89B53D] border-2 checked:bg-[#89B53D] focus:ring-transparent w-5 h-5">
                                    <label for="Kalimantan Barat">Kalimantan Barat</label>
                                </div>
                                <div class="flex items-center gap-x-2">
                                    <input type="checkbox" name="province[]" id="Kalimantan Selatan" value="Kalimantan-Selatan" class="rounded-[4px] border-[#89B53D] border-2 checked:bg-[#89B53D] focus:ring-transparent w-5 h-5">
                                    <label for="Kalimantan Selatan">Kalimantan Selatan</label>
                                </div>
                                <div class="flex items-center gap-x-2">
                                    <input type="checkbox" name="province[]" id="Kalimantan Tengah" value="Kalimantan-Tengah" class="rounded-[4px] border-[#89B53D] border-2 checked:bg-[#89B53D] focus:ring-transparent w-5 h-5">
                                    <label for="Kalimantan Tengah">Kalimantan Tengah</label>
                                </div>
                                <div class="flex items-center gap-x-2">
                                    <input type="checkbox" name="province[]" id="Kalimantan Timur" value="Kalimantan-Timur" class="rounded-[4px] border-[#89B53D] border-2 checked:bg-[#89B53D] focus:ring-transparent w-5 h-5">
                                    <label for="Kalimantan Timur">Kalimantan Timur</label>
                                </div>
                                <div class="flex items-center gap-x-2">
                                    <input type="checkbox" name="province[]" id="Kalimantan Utara" value="Kalimantan-Utara" class="rounded-[4px] border-[#89B53D] border-2 checked:bg-[#89B53D] focus:ring-transparent w-5 h-5">
                                    <label for="Kalimantan Utara">Kalimantan Utara</label>
                                </div>
                                <div class="flex items-center gap-x-2">
                                    <input type="checkbox" name="province[]" id="Kepulauan Riau" value="Kepulauan-Riau" class="rounded-[4px] border-[#89B53D] border-2 checked:bg-[#89B53D] focus:ring-transparent w-5 h-5">
                                    <label for="Kepulauan Riau">Kepulauan Riau</label>
                                </div>
                            </div>
                        </div>
                        {{-- L --}}
                        <div class="flex flex-col">
                            <h1 class="ml-6">L</h1>
                            <div>
                                <div class="flex items-center gap-x-2">
                                    <input type="checkbox" name="province[]" id="Lampung" value="Lampung" class="rounded-[4px] border-[#89B53D] border-2 checked:bg-[#89B53D] focus:ring-transparent w-5 h-5">
                                    <label for="Lampung">Lampung</label>
                                </div>
                            </div>
                        </div>
                        {{-- M --}}
                        <div class="flex flex-col">
                            <h1 class="ml-6">M</h1>
                            <div>
                                <div class="flex items-center gap-x-2">
                                    <input type="checkbox" name="province[]" id="Maluku" value="Maluku" class="rounded-[4px] border-[#89B53D] border-2 checked:bg-[#89B53D] focus:ring-transparent w-5 h-5">
                                    <label for="aluku">Maluku</label>
                                </div>
                                <div class="flex items-center gap-x-2">
                                    <input type="checkbox" name="province[]" id="Maluku Utara" value="Maluku-Utara" class="rounded-[4px] border-[#89B53D] border-2 checked:bg-[#89B53D] focus:ring-transparent w-5 h-5">
                                    <label for="Maluku Utara">Maluku Utara</label>
                                </div>
                            </div>
                        </div>
                        {{-- N --}}
                        <div class="flex flex-col">
                            <h1 class="ml-6">N</h1>
                            <div>
                                <div class="flex items-center gap-x-2">
                                    <input type="checkbox" name="province[]" id="Nusa Tenggara Barat" value="Nusa-Tenggara-Barat" class="rounded-[4px] border-[#89B53D] border-2 checked:bg-[#89B53D] focus:ring-transparent w-5 h-5">
                                    <label for="Nusa Tenggara Barat">Nusa Tenggara Barat</label>
                                </div>
                                <div class="flex items-center gap-x-2">
                                    <input type="checkbox" name="province[]" id="Nusa Tenggara Timur" value="Nusa-Tenggara-Timur" class="rounded-[4px] border-[#89B53D] border-2 checked:bg-[#89B53D] focus:ring-transparent w-5 h-5">
                                    <label for="Nusa Tenggara Timur">Nusa Tenggara Timur</label>
                                </div>
                            </div>
                        </div>
                        {{-- R --}}
                        <div class="flex flex-col">
                            <h1 class="ml-6">R</h1>
                            <div>
                                <div class="flex items-center gap-x-2">
                                    <input type="checkbox" name="province[]" id="Riau" value="Riau" class="rounded-[4px] border-[#89B53D] border-2 checked:bg-[#89B53D] focus:ring-transparent w-5 h-5">
                                    <label for="Riau">Riau</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="flex flex-col gap-y-3">
                        {{-- S --}}
                        <div class="flex flex-col">
                            <h1 class="ml-6">S</h1>
                            <div>
                                <div class="flex items-center gap-x-2">
                                    <input type="checkbox" name="province[]" id="Sulawesi Barat" value="Sulawesi-Barat" class="rounded-[4px] border-[#89B53D] border-2 checked:bg-[#89B53D] focus:ring-transparent w-5 h-5">
                                    <label for="Sulawesi Barat">Sulawesi Barat</label>
                                </div>
                                <div class="flex items-center gap-x-2">
                                    <input type="checkbox" name="province[]" id="Sulawesi Selatan" value="Sulawesi-Selatan" class="rounded-[4px] border-[#89B53D] border-2 checked:bg-[#89B53D] focus:ring-transparent w-5 h-5">
                                    <label for="Sulawesi Selatan">Sulawesi Selatan</label>
                                </div>
                                <div class="flex items-center gap-x-2">
                                    <input type="checkbox" name="province[]" id="Sulawesi Tengah" value="Sulawesi-Tengah" class="rounded-[4px] border-[#89B53D] border-2 checked:bg-[#89B53D] focus:ring-transparent w-5 h-5">
                                    <label for="Sulawesi Tengah">Sulawesi Tengah</label>
                                </div>
                                <div class="flex items-center gap-x-2">
                                    <input type="checkbox" name="province[]" id="Sulawesi Tenggara" value="Sulawesi-Tenggara" class="rounded-[4px] border-[#89B53D] border-2 checked:bg-[#89B53D] focus:ring-transparent w-5 h-5">
                                    <label for="Sulawesi Tenggara">Sulawesi Tenggara</label>
                                </div>
                                <div class="flex items-center gap-x-2">
                                    <input type="checkbox" name="province[]" id="Sulawesi Utara" value="Sulawesi-Utara" class="rounded-[4px] border-[#89B53D] border-2 checked:bg-[#89B53D] focus:ring-transparent w-5 h-5">
                                    <label for="Sulawesi Utara">Sulawesi Utara</label>
                                </div>
                                <div class="flex items-center gap-x-2">
                                    <input type="checkbox" name="province[]" id="Sumatera Barat" value="Sumatera-Barat" class="rounded-[4px] border-[#89B53D] border-2 checked:bg-[#89B53D] focus:ring-transparent w-5 h-5">
                                    <label for="Sumatera Barat">Sumatera Barat</label>
                                </div>
                                <div class="flex items-center gap-x-2">
                                    <input type="checkbox" name="province[]" id="Sumatera Selatan" value="Sumatera-Selatan" class="rounded-[4px] border-[#89B53D] border-2 checked:bg-[#89B53D] focus:ring-transparent w-5 h-5">
                                    <label for="Sumatera Selatan">Sumatera Selatan</label>
                                </div>
                                <div class="flex items-center gap-x-2">
                                    <input type="checkbox" name="province[]" id="Sumatera Utara" value="Sumatera-Utara" class="rounded-[4px] border-[#89B53D] border-2 checked:bg-[#89B53D] focus:ring-transparent w-5 h-5">
                                    <label for="Sumatera Utara">Sumatera Utara</label>
                                </div>
                            </div>
                        </div>
                        {{-- P --}}
                        <div class="flex flex-col">
                            <h1 class="ml-6">P</h1>
                            <div>
                                <div class="flex items-center gap-x-2">
                                    <input type="checkbox" name="province[]" id="Papua" value="Papua" class="rounded-[4px] border-[#89B53D] border-2 checked:bg-[#89B53D] focus:ring-transparent w-5 h-5">
                                    <label for="Papua">Papua</label>
                                </div>
                                <div class="flex items-center gap-x-2">
                                    <input type="checkbox" name="province[]" id="Papua Barat" value="Papua-Barat" class="rounded-[4px] border-[#89B53D] border-2 checked:bg-[#89B53D] focus:ring-transparent w-5 h-5">
                                    <label for="Papua Barat">Papua Barat</label>
                                </div>
                                <div class="flex items-center gap-x-2">
                                    <input type="checkbox" name="province[]" id="Papua Barat Daya" value="Papua-Barat-Daya" class="rounded-[4px] border-[#89B53D] border-2 checked:bg-[#89B53D] focus:ring-transparent w-5 h-5">
                                    <label for="Papua Barat Daya">Papua Barat Daya</label>
                                </div>
                                <div class="flex items-center gap-x-2">
                                    <input type="checkbox" name="province[]" id="Papua Pegunungan" value="Papua-Pegunungan" class="rounded-[4px] border-[#89B53D] border-2 checked:bg-[#89B53D] focus:ring-transparent w-5 h-5">
                                    <label for="Papua Pegunungan">Papua Pegunungan</label>
                                </div>
                                <div class="flex items-center gap-x-2">
                                    <input type="checkbox" name="province[]" id="Papua Selatan" value="Papua-Selatan" class="rounded-[4px] border-[#89B53D] border-2 checked:bg-[#89B53D] focus:ring-transparent w-5 h-5">
                                    <label for="Papua Selatan">Papua Selatan</label>
                                </div>
                                <div class="flex items-center gap-x-2">
                                    <input type="checkbox" name="province[]" id="Papua Tengah" value="Papua-Tengah" class="rounded-[4px] border-[#89B53D] border-2 checked:bg-[#89B53D] focus:ring-transparent w-5 h-5">
                                    <label for="Papua Tengah">Papua Tengah</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
{{-- Modal Script --}}
<script>
    const modal = document.getElementById("modal");

    function openModal() {
        modal.style.display = "block";
    }

    function closeModal() {
        modal.style.display = "none";
    }

    window.addEventListener("click", (event) => {
        if (event.target == modal) {
            closeModal();
        }
    });
    function setupFormHandling(formId) {
  const checkboxes = document.querySelectorAll(`#${formId} input[type="checkbox"]`);
  const myForm = document.getElementById(formId);

  function saveCheckboxStates() {
    const checkboxData = {};
    checkboxes.forEach(checkbox => {
      checkboxData[checkbox.name] = checkbox.checked;
    });
    localStorage.setItem(`checkboxData_${formId}`, JSON.stringify(checkboxData));
  }

  function loadCheckboxStates() {
    const savedData = localStorage.getItem(`checkboxData_${formId}`);
    if (savedData) {
      const checkboxData = JSON.parse(savedData);
      checkboxes.forEach(checkbox => {
        if (checkboxData.hasOwnProperty(checkbox.name)) {
          checkbox.checked = checkboxData[checkbox.name];
        } else {
          checkbox.checked = false;
        }
      });
    }
  }

  checkboxes.forEach(checkbox => {
    checkbox.addEventListener('click', () => {
      saveCheckboxStates();
      myForm.submit(); 
    });
  });


  loadCheckboxStates();
}

window.onload = () => {
  setupFormHandling('myForm1');
  setupFormHandling('myForm'); 
};

</script>
@endpush
