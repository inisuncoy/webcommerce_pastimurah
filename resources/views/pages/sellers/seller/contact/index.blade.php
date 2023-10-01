@extends('layouts.main.index')

@section('pages')
    <div class="flex flex-col px-20 pt-10 gap-y-10">
        <div class="bg-[#DEF3BB] flex px-14 py-7">
            <div class="pr-14">
                <div class="relative p-24 bg-white rounded-md">
                    <img src={{ url("assets/images/toko-cendrawasih.png") }} alt="" class="absolute -translate-x-1/2 -translate-y-1/2 w-36 top-1/2 left-1/2">
                </div>
            </div>
            <div class="grid w-full grid-cols-2 gap-3">
                <div class="flex flex-col gap-y-4">
                    <h1 class="font-bold text-[24px]">Kontak</h1>
                    <p class="font-[400] text-[16px]">
                        Toko Cendrawasih
                        Alamat: Jl. Desa Purwabakti 1 <br/>
                        Pamijahan<br/>
                        Bogor 16810<br/>
                        Jawa Barat<br/>
                        No. Telp: <b>081234567890</b><br/>
                        Email: <b>toko.cendrawasih@gmail.com</b><br/>
                    </p>
                </div>
                <div class="flex flex-col justify-center gap-y-3">
                    <div class="flex items-center gap-x-3">
                        <img src={{ url('assets/icons/instagram.svg') }} class="w-8 h-8" alt="">
                        <h1 class="font-bold text-[17px]">@cendrawasih.birdshop</h1>
                    </div>
                   
                    <div class="flex items-center gap-x-3">
                        <img src={{ url('assets/icons/whatsapp.svg') }} class="w-8 h-8" alt="">
                        <h1 class="font-bold text-[17px]">08217428277</h1>
                    </div>
                    <div class="flex items-center gap-x-3">
                        <img src={{ url('assets/icons/facebook.svg') }} class="w-8 h-8" alt="">
                        <h1 class="font-bold text-[17px]">Toko Cendrawasih</h1>
                    </div>
                </div>
            </div>
        </div>
        <div class="flex flex-col gap-y-5">
            <div class="relative flex items-center py-5">
                <div class="flex-grow border-t border-black"></div>
                <span class="flex-shrink mx-4 font-bold text-[20px]">Peta Lokasi</span>
                <div class="flex-grow border-t border-black"></div>
            </div>
            <div class="flex justify-center">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3949.8440766471144!2d112.54887407791588!3d-8.117353660352672!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e789ee8c8d8bedf%3A0xebbda2ab5e052eb3!2sTB.%20Bintang%20Jaya!5e0!3m2!1sid!2sid!4v1692797597194!5m2!1sid!2sid" class="w-full" height="600" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </div>
    </div>
@endsection
