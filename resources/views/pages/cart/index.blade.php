@extends('layouts.main.index')

@section('pages')
<div class="flex flex-col px-5 md:px-20 pt-10 gap-y-5">
    <h1 class="font-bold text-[40px]">Keranjang</h1>

    <div class="flex flex-col lg:flex-row gap-x-20 gap-y-10 ">
        <div class="grow">
            <div class="flex items-center font-normal gap-x-5">
                <input type="checkbox" class="rounded-[4px] border-[#89B53D] border-2 checked:bg-[#89B53D] focus:ring-transparent w-5 h-5">
                <label for="">Semua</label>
            </div>
            <div class="flex flex-col pt-14 gap-y-10">
                {{-- Toko 1 --}}
                <div class="flex flex-col gap-y-7">
                    <h1 class="font-bold text-[18px]">Toko Cendrawasih</h1>
                    <div class="flex flex-col gap-y-4">
                        <div class="flex flex-col gap-y-7">
                            <div class="flex items-center font-normal gap-x-7 ">
                                <input type="checkbox" class="rounded-[4px] border-[#89B53D] border-2 checked:bg-[#89B53D] focus:ring-transparent w-5 h-5">
                                <div class="flex flex-col gap-y-2 md:gap-y-0 md:flex-row md:items-start lg:items-center  justify-start gap-x-7 w-full ">
                                    <img src={{ url('assets/images/products/ikan-arwana-1.jpg') }} class="object-cover w-24 h-24 rounded-lg" alt="">
                                    <div class="flex flex-col w-full gap-y-3">
                                        <h1>Ikan Arwana</h1>
                                        <p class="font-bold">@currency(5000000)</p>
                                        <div class="flex justify-between w-full">
                                            <div class="flex gap-x-5">
                                                <p>Catatan:  Jantan</p>
                                                <a href="" class="text-[#89B53D] font-bold">Ubah</a>
                                            </div>
                                            <div class="flex items-center">
                                                <button class="flex items-center">
                                                    <svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M13.333 20L13.333 16" stroke="#33363F" stroke-width="2" stroke-linecap="round"/>
                                                        <path d="M18.667 20L18.667 16" stroke="#33363F" stroke-width="2" stroke-linecap="round"/>
                                                        <path d="M4 9.33334H28V9.33334C26.1144 9.33334 25.1716 9.33334 24.5858 9.91912C24 10.5049 24 11.4477 24 13.3333V22.6667C24 24.5523 24 25.4951 23.4142 26.0809C22.8284 26.6667 21.8856 26.6667 20 26.6667H12C10.1144 26.6667 9.17157 26.6667 8.58579 26.0809C8 25.4951 8 24.5523 8 22.6667V13.3333C8 11.4477 8 10.5049 7.41421 9.91912C6.82843 9.33334 5.88562 9.33334 4 9.33334V9.33334Z" stroke="#33363F" stroke-width="2" stroke-linecap="round"/>
                                                        <path d="M13.4245 4.49412C13.5765 4.35237 13.9112 4.2271 14.377 4.13776C14.8427 4.04843 15.4133 4 16.0003 4C16.5873 4 17.158 4.04842 17.6237 4.13776C18.0894 4.2271 18.4242 4.35236 18.5761 4.49412" stroke="#33363F" stroke-width="2" stroke-linecap="round"/>
                                                    </svg>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="flex items-center font-normal gap-x-7 ">
                                <input type="checkbox" class="rounded-[4px] border-[#89B53D] border-2 checked:bg-[#89B53D] focus:ring-transparent w-5 h-5">
                                <div class="flex flex-col gap-y-2 md:gap-y-0 md:flex-row md:items-start lg:items-center  justify-start gap-x-7 w-full ">
                                    <img src={{ url('assets/images/products/ikan-arwana-1.jpg') }} class="object-cover w-24 h-24 rounded-lg" alt="">
                                    <div class="flex flex-col w-full gap-y-3">
                                        <h1>Ikan Arwana</h1>
                                        <p class="font-bold">@currency(5000000)</p>
                                        <div class="flex justify-between w-full">
                                            <div class="flex gap-x-5">
                                                <p>Catatan:  Jantan</p>
                                                <a href="" class="text-[#89B53D] font-bold">Ubah</a>
                                            </div>
                                            <div class="flex items-center">
                                                <button class="flex items-center">
                                                    <svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M13.333 20L13.333 16" stroke="#33363F" stroke-width="2" stroke-linecap="round"/>
                                                        <path d="M18.667 20L18.667 16" stroke="#33363F" stroke-width="2" stroke-linecap="round"/>
                                                        <path d="M4 9.33334H28V9.33334C26.1144 9.33334 25.1716 9.33334 24.5858 9.91912C24 10.5049 24 11.4477 24 13.3333V22.6667C24 24.5523 24 25.4951 23.4142 26.0809C22.8284 26.6667 21.8856 26.6667 20 26.6667H12C10.1144 26.6667 9.17157 26.6667 8.58579 26.0809C8 25.4951 8 24.5523 8 22.6667V13.3333C8 11.4477 8 10.5049 7.41421 9.91912C6.82843 9.33334 5.88562 9.33334 4 9.33334V9.33334Z" stroke="#33363F" stroke-width="2" stroke-linecap="round"/>
                                                        <path d="M13.4245 4.49412C13.5765 4.35237 13.9112 4.2271 14.377 4.13776C14.8427 4.04843 15.4133 4 16.0003 4C16.5873 4 17.158 4.04842 17.6237 4.13776C18.0894 4.2271 18.4242 4.35236 18.5761 4.49412" stroke="#33363F" stroke-width="2" stroke-linecap="round"/>
                                                    </svg>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- Separator --}}
                <div class="w-full border-b-[5px] border-[#D7D7D7]"></div>
                {{-- Toko 2 --}}
                <div class="flex flex-col gap-y-7">
                    <h1 class="font-bold text-[18px]">Toko Cendrawasih</h1>
                    <div class="flex flex-col gap-y-4">
                        <div class="flex flex-col gap-y-7">
                            <div class="flex items-center font-normal gap-x-7 ">
                                <input type="checkbox" class="rounded-[4px] border-[#89B53D] border-2 checked:bg-[#89B53D] focus:ring-transparent w-5 h-5">
                                <div class="flex flex-col gap-y-2 md:gap-y-0 md:flex-row md:items-start lg:items-center  justify-start gap-x-7 w-full ">
                                    <img src={{ url('assets/images/products/ikan-arwana-1.jpg') }} class="object-cover w-24 h-24 rounded-lg" alt="">
                                    <div class="flex flex-col w-full gap-y-3">
                                        <h1>Ikan Arwana</h1>
                                        <p class="font-bold">@currency(5000000)</p>
                                        <div class="flex justify-between w-full">
                                            <div class="flex gap-x-5">
                                                <p>Catatan:  Jantan</p>
                                                <a href="" class="text-[#89B53D] font-bold">Ubah</a>
                                            </div>
                                            <div class="flex items-center">
                                                <button class="flex items-center">
                                                    <svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M13.333 20L13.333 16" stroke="#33363F" stroke-width="2" stroke-linecap="round"/>
                                                        <path d="M18.667 20L18.667 16" stroke="#33363F" stroke-width="2" stroke-linecap="round"/>
                                                        <path d="M4 9.33334H28V9.33334C26.1144 9.33334 25.1716 9.33334 24.5858 9.91912C24 10.5049 24 11.4477 24 13.3333V22.6667C24 24.5523 24 25.4951 23.4142 26.0809C22.8284 26.6667 21.8856 26.6667 20 26.6667H12C10.1144 26.6667 9.17157 26.6667 8.58579 26.0809C8 25.4951 8 24.5523 8 22.6667V13.3333C8 11.4477 8 10.5049 7.41421 9.91912C6.82843 9.33334 5.88562 9.33334 4 9.33334V9.33334Z" stroke="#33363F" stroke-width="2" stroke-linecap="round"/>
                                                        <path d="M13.4245 4.49412C13.5765 4.35237 13.9112 4.2271 14.377 4.13776C14.8427 4.04843 15.4133 4 16.0003 4C16.5873 4 17.158 4.04842 17.6237 4.13776C18.0894 4.2271 18.4242 4.35236 18.5761 4.49412" stroke="#33363F" stroke-width="2" stroke-linecap="round"/>
                                                    </svg>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="flex items-center font-normal gap-x-7 ">
                                <input type="checkbox" class="rounded-[4px] border-[#89B53D] border-2 checked:bg-[#89B53D] focus:ring-transparent w-5 h-5">
                                <div class="flex flex-col gap-y-2 md:gap-y-0 md:flex-row md:items-start lg:items-center  justify-start gap-x-7 w-full ">
                                    <img src={{ url('assets/images/products/ikan-arwana-1.jpg') }} class="object-cover w-24 h-24 rounded-lg" alt="">
                                    <div class="flex flex-col w-full gap-y-3">
                                        <h1>Ikan Arwana</h1>
                                        <p class="font-bold">@currency(5000000)</p>
                                        <div class="flex justify-between w-full">
                                            <div class="flex gap-x-5">
                                                <p>Catatan:  Jantan</p>
                                                <a href="" class="text-[#89B53D] font-bold">Ubah</a>
                                            </div>
                                            <div class="flex items-center">
                                                <button class="flex items-center">
                                                    <svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M13.333 20L13.333 16" stroke="#33363F" stroke-width="2" stroke-linecap="round"/>
                                                        <path d="M18.667 20L18.667 16" stroke="#33363F" stroke-width="2" stroke-linecap="round"/>
                                                        <path d="M4 9.33334H28V9.33334C26.1144 9.33334 25.1716 9.33334 24.5858 9.91912C24 10.5049 24 11.4477 24 13.3333V22.6667C24 24.5523 24 25.4951 23.4142 26.0809C22.8284 26.6667 21.8856 26.6667 20 26.6667H12C10.1144 26.6667 9.17157 26.6667 8.58579 26.0809C8 25.4951 8 24.5523 8 22.6667V13.3333C8 11.4477 8 10.5049 7.41421 9.91912C6.82843 9.33334 5.88562 9.33334 4 9.33334V9.33334Z" stroke="#33363F" stroke-width="2" stroke-linecap="round"/>
                                                        <path d="M13.4245 4.49412C13.5765 4.35237 13.9112 4.2271 14.377 4.13776C14.8427 4.04843 15.4133 4 16.0003 4C16.5873 4 17.158 4.04842 17.6237 4.13776C18.0894 4.2271 18.4242 4.35236 18.5761 4.49412" stroke="#33363F" stroke-width="2" stroke-linecap="round"/>
                                                    </svg>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="">
            <div class="w-full lg:w-[300px] bg-white">
                <div class="flex flex-col p-3 bg-white rounded-lg shadow-lg gap-y-3">
                    <h1 class="font-bold text-[18px]">Total Belanja</h1>
                    <div class="flex gap-x-14 text-[14px] justify-between">
                        <p>Ayam Cemani (5)</p>
                        <p>@currency(5000000)</p>
                    </div>
                    <div class="flex gap-x-14 text-[14px] justify-between">
                        <p>Burung Unta (3)</p>
                        <p>@currency(15900000)</p>
                    </div>
                    <div class="flex gap-x-14 text-[14px] justify-between">
                        <p>Beras Basila Pr...(10)</p>
                        <p>@currency(695000)</p>
                    </div>
                    <div class="flex gap-x-14 text-[14px] justify-between">
                        <p>Beras Maknyuss...(7)</p>
                        <p>@currency(486000)</p>
                    </div>
                    <div class="flex gap-x-14 text-[14px] justify-between items-center">
                        <p>Ongkos Kirim</p>
                        <p>@currency(40000)</p>
                    </div>
                    <span class="w-full pt-10 border-b"></span>
                    <div class="flex flex-col pb-10 font-bold gap-y-1">
                        <div class="flex gap-x-14 text-[15px] justify-between">
                            <p>Total Harga</p>
                            <p>@currency(21643500)</p>
                        </div>
                    </div>
                    <button type="submit" class="bg-[#89B53D] py-2 rounded-md text-white font-bold">
                        Bayar Sekarang
                    </button>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection
