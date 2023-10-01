@extends('layouts.main.index')

@section('pages')
{{-- Link --}}
<div class="text-[#89B441] text-[18px] px-5 md:px-20  md:pt-10 font-semibold flex items-center gap-x-2">
    <h1>Toko</h1>
</div>
{{-- Content --}}
<div class="grid grid-cols-1 px-5 pt-5 md:px-20 md:grid-cols-5 gap-x-10">
    <div class="flex-col hidden md:flex md:cols-span-1 gap-y-5">
        <h1 class="font-bold text-[24px]">Filter Lokasi</h1>
        <div class="flex flex-col p-5 bg-white rounded-lg shadow-lg gap-y-7">
            <div class="flex items-center font-normal gap-x-5">
                <input type="checkbox" class="rounded-[4px] border-[#89B53D] border-2 checked:bg-[#89B53D] focus:ring-transparent w-5 h-5">
                <label for="">Semua</label>
            </div>
            <div class="flex flex-col font-normal gap-y-2">
                <div class="flex items-center gap-x-5">
                    <input type="checkbox" class="rounded-[4px] border-[#89B53D] border-2 checked:bg-[#89B53D] focus:ring-transparent w-5 h-5">
                    <label for="">Bogor</label>
                </div>
                <div class="flex items-center gap-x-5">
                    <input type="checkbox" class="rounded-[4px] border-[#89B53D] border-2 checked:bg-[#89B53D] focus:ring-transparent w-5 h-5">
                    <label for="">Padang</label>
                </div>
                <div class="flex items-center gap-x-5">
                    <input type="checkbox" class="rounded-[4px] border-[#89B53D] border-2 checked:bg-[#89B53D] focus:ring-transparent w-5 h-5">
                    <label for="">Medan</label>
                </div>
                <div class="flex items-center gap-x-5">
                    <input type="checkbox" class="rounded-[4px] border-[#89B53D] border-2 checked:bg-[#89B53D] focus:ring-transparent w-5 h-5">
                    <label for="">Pekanbaru</label>
                </div>
                <div class="font-normal text-[#89B53D] pt-3">
                    <button id="openModalButton" onclick="openModal()" data-modal-data='https://drive.google.com/file/d/1jIYUGnLryU_yGtTn7qI-Nt6EnW2mVFwp/preview'>Lihat Selengkapnya</button>
                </div>
            </div>
        </div>
    </div>
    <div class="flex flex-col md:col-span-4 gap-y-6">
        <div class="relative flex md:justify-end">
            
        <form action="/sellers/search" method="POST" class="w-full"> 
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
        <div class="flex flex-wrap gap-4">
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
                <h1>Kota Malang</h1>
                <span class="border-2 border-[#89B53D] rounded-full p-1 cursor-pointer">
                    <svg width="8" height="8" viewBox="0 0 8 8" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M7 1L1 7" stroke="black" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M1 1L7 7" stroke="black" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </span>
            </div>
            <div class="flex items-center">
                <button type="button" class="text-[#89B53D] font-bold hidden md:block">Hapus Semua</button>
            </div>
        </div>
        <div class="grid grid-cols-2 gap-5 md:grid-cols-3 lg:grid-cols-4 lg:gap-x-12 lg:gap-y-14">
            @foreach ($umkm_data as $seller)
            <a href="/sellers/{{ $seller["slug"] }}" class="bg-white rounded-lg drop-shadow-lg">
                <div class="flex flex-col items-center justify-center pb-10 gap-y-4">
                    <div class="flex items-center justify-center">
                    <img src={{ ("https://api.andamantau.com/".$seller["umkm_image"]) }} alt="product" class="object-cover w-96 aspect-square"/>
                    </div>
                    <div class="text-center">
                        <h1 class="text-[20px] font-[400]">{{ $seller["umkm_name"] }}</h1>
                        <p class="font-[400] text-[14px]">{{ $seller["province"] }}</p>
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
                <div class="grid w-full grid-cols-3 p-5">
                    <div class="flex flex-col gap-y-3">
                        {{-- A --}}
                        <div class="flex flex-col">
                            <h1 class="ml-6">A</h1>
                            <div>
                                <div class="flex items-center gap-x-2">
                                    <input type="checkbox" name="kota" id="aceh" value="aceh" class="rounded-[4px] border-[#89B53D] border-2 checked:bg-[#89B53D] focus:ring-transparent w-5 h-5">
                                    <label for="aceh">Aceh</label>
                                </div>
                            </div>
                        </div>
                        {{-- B --}}
                        <div class="flex flex-col">
                            <h1 class="ml-6">B</h1>
                            <div>
                                <div class="flex items-center gap-x-2">
                                    <input type="checkbox" name="kota" id="bali" value="bali" class="rounded-[4px] border-[#89B53D] border-2 checked:bg-[#89B53D] focus:ring-transparent w-5 h-5">
                                    <label for="bali">Bali</label>
                                </div>
                                <div class="flex items-center gap-x-2">
                                    <input type="checkbox" name="kota" id="bangka_belitung" value="bangka_belitung" class="rounded-[4px] border-[#89B53D] border-2 checked:bg-[#89B53D] focus:ring-transparent w-5 h-5">
                                    <label for="bangka_belitung">Bangka Belitung</label>
                                </div>
                                <div class="flex items-center gap-x-2">
                                    <input type="checkbox" name="kota" id="banten" value="banten" class="rounded-[4px] border-[#89B53D] border-2 checked:bg-[#89B53D] focus:ring-transparent w-5 h-5">
                                    <label for="banten">Banten</label>
                                </div>
                                <div class="flex items-center gap-x-2">
                                    <input type="checkbox" name="kota" id="bengkulu" value="bengkulu" class="rounded-[4px] border-[#89B53D] border-2 checked:bg-[#89B53D] focus:ring-transparent w-5 h-5">
                                    <label for="bengkulu">Bengkulu</label>
                                </div>
                            </div>
                        </div>
                        {{-- D --}}
                        <div class="flex flex-col">
                            <h1 class="ml-6">D</h1>
                            <div>
                                <div class="flex items-center gap-x-2">
                                    <input type="checkbox" name="kota" id="daerah_istimewa_yogyakarta" value="daerah_istimewa_yogyakarta" class="rounded-[4px] border-[#89B53D] border-2 checked:bg-[#89B53D] focus:ring-transparent w-5 h-5">
                                    <label for="daerah_istimewa_yogyakarta">Daerah Istimewa Yogyakarta</label>
                                </div>
                                <div class="flex items-center gap-x-2">
                                    <input type="checkbox" name="kota" id="dki_jakarta" value="dki_jakarta" class="rounded-[4px] border-[#89B53D] border-2 checked:bg-[#89B53D] focus:ring-transparent w-5 h-5">
                                    <label for="dki_jakarta">DKI Jakarta</label>
                                </div>
                            </div>
                        </div>
                        {{-- G --}}
                        <div class="flex flex-col">
                            <h1 class="ml-6">G</h1>
                            <div>
                                <div class="flex items-center gap-x-2">
                                    <input type="checkbox" name="kota" id="gorontalo" value="gorontalo" class="rounded-[4px] border-[#89B53D] border-2 checked:bg-[#89B53D] focus:ring-transparent w-5 h-5">
                                    <label for="gorontalo">Gorontalo</label>
                                </div>
                            </div>
                        </div>
                        {{-- J --}}
                        <div class="flex flex-col">
                            <h1 class="ml-6">J</h1>
                            <div>
                                <div class="flex items-center gap-x-2">
                                    <input type="checkbox" name="kota" id="jambi" value="jambi" class="rounded-[4px] border-[#89B53D] border-2 checked:bg-[#89B53D] focus:ring-transparent w-5 h-5">
                                    <label for="jambi">Jambi</label>
                                </div>
                                <div class="flex items-center gap-x-2">
                                    <input type="checkbox" name="kota" id="jawa_barat" value="jawa_barat" class="rounded-[4px] border-[#89B53D] border-2 checked:bg-[#89B53D] focus:ring-transparent w-5 h-5">
                                    <label for="jawa_barat">Jawa Barat</label>
                                </div>
                                <div class="flex items-center gap-x-2">
                                    <input type="checkbox" name="kota" id="jawa_tengah" value="jawa_tengah" class="rounded-[4px] border-[#89B53D] border-2 checked:bg-[#89B53D] focus:ring-transparent w-5 h-5">
                                    <label for="jawa_tengah">Jawa Tengah</label>
                                </div>
                                <div class="flex items-center gap-x-2">
                                    <input type="checkbox" name="kota" id="jawa_timur" value="jawa_timur" class="rounded-[4px] border-[#89B53D] border-2 checked:bg-[#89B53D] focus:ring-transparent w-5 h-5">
                                    <label for="jawa_timur">Jawa Timur</label>
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
                                    <input type="checkbox" name="kota" id="kalimantan_barat" value="kalimantan_barat" class="rounded-[4px] border-[#89B53D] border-2 checked:bg-[#89B53D] focus:ring-transparent w-5 h-5">
                                    <label for="kalimantan_barat">Kalimantan Barat</label>
                                </div>
                                <div class="flex items-center gap-x-2">
                                    <input type="checkbox" name="kota" id="kalimantan_selatan" value="kalimantan_selatan" class="rounded-[4px] border-[#89B53D] border-2 checked:bg-[#89B53D] focus:ring-transparent w-5 h-5">
                                    <label for="kalimantan_selatan">Kalimantan Selatan</label>
                                </div>
                                <div class="flex items-center gap-x-2">
                                    <input type="checkbox" name="kota" id="kalimantan_tengah" value="kalimantan_tengah" class="rounded-[4px] border-[#89B53D] border-2 checked:bg-[#89B53D] focus:ring-transparent w-5 h-5">
                                    <label for="kalimantan_tengah">Kalimantan Tengah</label>
                                </div>
                                <div class="flex items-center gap-x-2">
                                    <input type="checkbox" name="kota" id="kalimantan_timur" value="kalimantan_timur" class="rounded-[4px] border-[#89B53D] border-2 checked:bg-[#89B53D] focus:ring-transparent w-5 h-5">
                                    <label for="kalimantan_timur">Kalimantan Timur</label>
                                </div>
                                <div class="flex items-center gap-x-2">
                                    <input type="checkbox" name="kota" id="kalimantan_utara" value="kalimantan_utara" class="rounded-[4px] border-[#89B53D] border-2 checked:bg-[#89B53D] focus:ring-transparent w-5 h-5">
                                    <label for="kalimantan_utara">Kalimantan Utara</label>
                                </div>
                                <div class="flex items-center gap-x-2">
                                    <input type="checkbox" name="kota" id="kepulauan_riau" value="kepulauan_riau" class="rounded-[4px] border-[#89B53D] border-2 checked:bg-[#89B53D] focus:ring-transparent w-5 h-5">
                                    <label for="kepulauan_riau">Kepulauan Riau</label>
                                </div>
                            </div>
                        </div>
                        {{-- L --}}
                        <div class="flex flex-col">
                            <h1 class="ml-6">L</h1>
                            <div>
                                <div class="flex items-center gap-x-2">
                                    <input type="checkbox" name="kota" id="lampung" value="lampung" class="rounded-[4px] border-[#89B53D] border-2 checked:bg-[#89B53D] focus:ring-transparent w-5 h-5">
                                    <label for="lampung">Lampung</label>
                                </div>
                            </div>
                        </div>
                        {{-- M --}}
                        <div class="flex flex-col">
                            <h1 class="ml-6">M</h1>
                            <div>
                                <div class="flex items-center gap-x-2">
                                    <input type="checkbox" name="kota" id="maluku" value="maluku" class="rounded-[4px] border-[#89B53D] border-2 checked:bg-[#89B53D] focus:ring-transparent w-5 h-5">
                                    <label for="maluku">Maluku</label>
                                </div>
                                <div class="flex items-center gap-x-2">
                                    <input type="checkbox" name="kota" id="maluku_utara" value="maluku_utara" class="rounded-[4px] border-[#89B53D] border-2 checked:bg-[#89B53D] focus:ring-transparent w-5 h-5">
                                    <label for="maluku_utara">Maluku Utara</label>
                                </div>
                            </div>
                        </div>
                        {{-- N --}}
                        <div class="flex flex-col">
                            <h1 class="ml-6">N</h1>
                            <div>
                                <div class="flex items-center gap-x-2">
                                    <input type="checkbox" name="kota" id="nusa_tenggara_barat" value="nusa_tenggara_barat" class="rounded-[4px] border-[#89B53D] border-2 checked:bg-[#89B53D] focus:ring-transparent w-5 h-5">
                                    <label for="nusa_tenggara_barat">Nusa Tenggara Barat</label>
                                </div>
                                <div class="flex items-center gap-x-2">
                                    <input type="checkbox" name="kota" id="nusa_tenggara_timur" value="nusa_tenggara_timur" class="rounded-[4px] border-[#89B53D] border-2 checked:bg-[#89B53D] focus:ring-transparent w-5 h-5">
                                    <label for="nusa_tenggara_timur">Nusa Tenggara Timur</label>
                                </div>
                            </div>
                        </div>
                        {{-- R --}}
                        <div class="flex flex-col">
                            <h1 class="ml-6">R</h1>
                            <div>
                                <div class="flex items-center gap-x-2">
                                    <input type="checkbox" name="kota" id="riau" value="riau" class="rounded-[4px] border-[#89B53D] border-2 checked:bg-[#89B53D] focus:ring-transparent w-5 h-5">
                                    <label for="riau">Riau</label>
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
                                    <input type="checkbox" name="kota" id="sulawesi_barat" value="sulawesi_barat" class="rounded-[4px] border-[#89B53D] border-2 checked:bg-[#89B53D] focus:ring-transparent w-5 h-5">
                                    <label for="sulawesi_barat">Sulawesi Barat</label>
                                </div>
                                <div class="flex items-center gap-x-2">
                                    <input type="checkbox" name="kota" id="sulawesi_selatan" value="sulawesi_selatan" class="rounded-[4px] border-[#89B53D] border-2 checked:bg-[#89B53D] focus:ring-transparent w-5 h-5">
                                    <label for="sulawesi_selatan">Sulawesi Selatan</label>
                                </div>
                                <div class="flex items-center gap-x-2">
                                    <input type="checkbox" name="kota" id="sulawesi_tengah" value="sulawesi_tengah" class="rounded-[4px] border-[#89B53D] border-2 checked:bg-[#89B53D] focus:ring-transparent w-5 h-5">
                                    <label for="sulawesi_tengah">Sulawesi Tengah</label>
                                </div>
                                <div class="flex items-center gap-x-2">
                                    <input type="checkbox" name="kota" id="sulawesi_tenggara" value="sulawesi_tenggara" class="rounded-[4px] border-[#89B53D] border-2 checked:bg-[#89B53D] focus:ring-transparent w-5 h-5">
                                    <label for="sulawesi_tenggara">Sulawesi Tenggara</label>
                                </div>
                                <div class="flex items-center gap-x-2">
                                    <input type="checkbox" name="kota" id="sulawesi_utara" value="sulawesi_utara" class="rounded-[4px] border-[#89B53D] border-2 checked:bg-[#89B53D] focus:ring-transparent w-5 h-5">
                                    <label for="sulawesi_utara">Sulawesi Utara</label>
                                </div>
                                <div class="flex items-center gap-x-2">
                                    <input type="checkbox" name="kota" id="sumatera_barat" value="sumatera_barat" class="rounded-[4px] border-[#89B53D] border-2 checked:bg-[#89B53D] focus:ring-transparent w-5 h-5">
                                    <label for="sumatera_barat">Sumatera Barat</label>
                                </div>
                                <div class="flex items-center gap-x-2">
                                    <input type="checkbox" name="kota" id="sumatera_selatan" value="sumatera_selatan" class="rounded-[4px] border-[#89B53D] border-2 checked:bg-[#89B53D] focus:ring-transparent w-5 h-5">
                                    <label for="sumatera_selatan">Sumatera Selatan</label>
                                </div>
                                <div class="flex items-center gap-x-2">
                                    <input type="checkbox" name="kota" id="sumatera_utara" value="sumatera_utara" class="rounded-[4px] border-[#89B53D] border-2 checked:bg-[#89B53D] focus:ring-transparent w-5 h-5">
                                    <label for="sumatera_utara">Sumatera Utara</label>
                                </div>
                            </div>
                        </div>
                        {{-- P --}}
                        <div class="flex flex-col">
                            <h1 class="ml-6">P</h1>
                            <div>
                                <div class="flex items-center gap-x-2">
                                    <input type="checkbox" name="kota" id="papua" value="papua" class="rounded-[4px] border-[#89B53D] border-2 checked:bg-[#89B53D] focus:ring-transparent w-5 h-5">
                                    <label for="papua">Papua</label>
                                </div>
                                <div class="flex items-center gap-x-2">
                                    <input type="checkbox" name="kota" id="papua_barat" value="papua_barat" class="rounded-[4px] border-[#89B53D] border-2 checked:bg-[#89B53D] focus:ring-transparent w-5 h-5">
                                    <label for="papua_barat">Papua Barat</label>
                                </div>
                                <div class="flex items-center gap-x-2">
                                    <input type="checkbox" name="kota" id="papua_barat_daya" value="papua_barat_daya" class="rounded-[4px] border-[#89B53D] border-2 checked:bg-[#89B53D] focus:ring-transparent w-5 h-5">
                                    <label for="papua_barat_daya">Papua Barat Daya</label>
                                </div>
                                <div class="flex items-center gap-x-2">
                                    <input type="checkbox" name="kota" id="papua_pegunungan" value="papua_pegunungan" class="rounded-[4px] border-[#89B53D] border-2 checked:bg-[#89B53D] focus:ring-transparent w-5 h-5">
                                    <label for="papua_pegunungan">Papua Pegunungan</label>
                                </div>
                                <div class="flex items-center gap-x-2">
                                    <input type="checkbox" name="kota" id="papua_selatan" value="papua_selatan" class="rounded-[4px] border-[#89B53D] border-2 checked:bg-[#89B53D] focus:ring-transparent w-5 h-5">
                                    <label for="papua_selatan">Papua Selatan</label>
                                </div>
                                <div class="flex items-center gap-x-2">
                                    <input type="checkbox" name="kota" id="papua_tengah" value="papua_tengah" class="rounded-[4px] border-[#89B53D] border-2 checked:bg-[#89B53D] focus:ring-transparent w-5 h-5">
                                    <label for="papua_tengah">Papua Tengah</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
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
</script>
@endpush
