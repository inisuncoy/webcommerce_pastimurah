@extends('layouts.main.index')

@section('pages')
    <div class="flex flex-col px-20 pt-10 gap-y-10">
        <h1 class="text-[32px] font-bold">Profil Akun</h1>
        <div class="flex px-20 gap-y-10">
            <div>
                <div class="relative">
                    <img src={{ url("assets/images/profile1.png") }} alt="" >
                    <button class="bg-[#89B53D] p-3 rounded-full absolute bottom-0 right-0">
                        <svg width="37" height="37" viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M6.58594 20.1153C6.58594 18.1006 8.2192 16.4673 10.2339 16.4673V16.4673C11.6157 16.4673 12.8789 15.6866 13.4968 14.4508L15.2747 10.895C15.8337 9.77702 16.1132 9.21802 16.6154 8.90762C17.1177 8.59721 17.7426 8.59721 18.9926 8.59721H29.5948C30.8447 8.59721 31.4697 8.59721 31.9719 8.90762C32.4742 9.21802 32.7537 9.77702 33.3127 10.895L35.0905 14.4508C35.7085 15.6866 36.9717 16.4673 38.3534 16.4673V16.4673C40.3681 16.4673 42.0014 18.1006 42.0014 20.1153V33.8425C42.0014 36.7818 42.0014 38.2514 41.0883 39.1645C40.1752 40.0776 38.7056 40.0776 35.7663 40.0776H12.8211C9.88179 40.0776 8.41216 40.0776 7.49905 39.1645C6.58594 38.2514 6.58594 36.7818 6.58594 33.8425V20.1153Z" stroke="white" stroke-width="4"/>
                            <circle cx="24.2939" cy="26.305" r="5.87011" stroke="white" stroke-width="4"/>
                        </svg>
                    </button>
                </div>
            </div>
            <div class="flex flex-col w-full px-64 gap-y-8">
                <div class="flex justify-between gap-x-20">
                    <div class="flex flex-col gap-y-2 grow">
                        <label for="nama-depan" class="text-2xl font-bold">Nama Depan</label>
                        <input type="text" class="h-12 rounded-md" placeholder="Rudy">
                    </div>
                    <div class="flex flex-col gap-y-2 grow">
                        <label for="nama-belakang" class="text-2xl font-bold">Nama Belakang</label>
                        <input type="text" class="h-12 rounded-md" placeholder="Feni">
                    </div>
                </div>
                <div class="flex flex-col gap-y-2">
                    <label for="Email" class="text-2xl font-bold">Email</label>
                    <input type="email" class="h-12 rounded-md" placeholder="fendi_fendi@gmail.com">
                </div>
                <div class="flex flex-col gap-y-2">
                    <label for="no-handphone" class="text-2xl font-bold">No Handphone</label>
                    <input type="number" class="h-12 rounded-md" placeholder="081234567890">
                </div>
                <div class="flex flex-col gap-y-2">
                    <label for="alamat" class="text-2xl font-bold">Alamat</label>
                    <input type="text" class="h-12 rounded-md" placeholder="Jl. Pahlawan No. 123">
                </div>
                <div class="flex justify-between gap-x-20">
                    <div class="flex flex-col gap-y-2 grow">
                        <label for="kota" class="text-2xl font-bold">Kota</label>
                        <input type="text" class="h-12 rounded-md" placeholder="Surabaya">
                    </div>
                    <div class="flex flex-col gap-y-2 grow">
                        <label for="provinsi" class="text-2xl font-bold">Provinsi</label>
                        <input type="text" class="h-12 rounded-md" placeholder="Jawa Timur">
                    </div>
                </div>
                <button class="bg-[#89B53D] rounded-lg py-3 text-lg font-semibold text-white">
                    Simpan
                </button>
                <div class="flex justify-between gap-x-20">
                    <button class="bg-[#89B53D] rounded-lg py-3 grow text-lg font-semibold text-white">
                        PIN ANDA-MANTAU
                    </button>
                    <button class="bg-[#89B53D] rounded-lg py-3 grow text-lg font-semibold text-white">
                        Verifikasi Instant
                    </button>
                </div>
            </div>
        </div>
    </div>
@endsection
