@extends('layouts.main.index')
@section('pages')
    <div class="-mt-4 md:pt-2 relative z-0">
        {{-- <img src={{ url("assets/images/billboard.png") }} alt="billboard" class="absolute w-full h-[500px] md:h-[300px] lg:h-[500px]  "> --}}
        <div class="px-5">
            
            @include("components.slider")
        </div>
    </div>

    
    <div class="px-5 pt-0 md:px-20 relative w-full">
        <h1 class="font-bold text-[25px] md:text-[30px] pb-8 text-center md:text-left">Popular List UMKM</h1>
        <div class="grid grid-cols-2 gap-4 md:gap-8 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5">
        @foreach ($umkm_data as $umkm)
            <a href="/toko/{{ $umkm["slug"] }}" class="bg-white rounded-lg drop-shadow-lg">
                <div class="flex flex-col items-center justify-center pb-10 gap-y-4">
                    <div class="flex items-center justify-center">
                       
                        <img src= {{ !empty($umkm['umkm_image']) && @getimagesize('https://api.andamantau.com/' . $umkm['umkm_image']) ? 'https://api.andamantau.com/' . $umkm['umkm_image']:  asset('assets/images/noimage.png') }} alt="product" class="object-cover w-96 aspect-square"/>
                    </div>
                    <div class="text-center">
                        <h1 class="text-[20px] font-[400]">{{ $umkm["umkm_name"] }}</h1>
                       
                        <p class="font-[400] text-[14px]">{{ $umkm["city"].  ", " . $umkm['province'] }}</p>
                    </div>
                </div>
            </a>
            @endforeach
        </div>
    </div>
    <div class="pt-28">
        <div class="pb-8 text-center md:px-20 md:text-left">
            <h1 class="font-bold text-[30px]">Berita terkini UMKM</h1>
        </div>
        <div class="flex flex-wrap gap-8 px-10 pb-10 md:overflow-x-scroll md:px-20 md:flex-nowrap ">
            @foreach ($news as $new)
            <a href="/toko/{{ $new['slug-umkm'] }}/blogs/{{ $new["slug-title"] }}" class="  p-4 bg-white rounded-xl drop-shadow-lg md:min-w-[400px]">
                <div class="flex flex-col justify-center  ">
                    <div class="">
                    <img src={{"https://api.andamantau.com/". $new["image"] }} alt="product" class="object-cover w-full h-42 md:h-64">
                    </div>

                    <div class="flex flex-col pt-4 gap-y-2">
                        <h1 class="font-[700] text-[18px] line-clamp-2 h-[54px]">{{ $new["title"] }}</h1>
                        <p class="font-[400] text-[14px] text-[#696969] line-clamp-1 leading-7 my-4">
                            {{ Str::limit($new["content"], 100) }}
                        </p>
                        <p class="font-[500] text-[14px] ">
                            {{ \Carbon\Carbon::parse($new['date'])->format('d-M-Y') }}
                        </p>
                        <div class="flex items-center justify-end mr-3">
                            <div  class="text-[#0645AD] mb-1">Baca Selengkapnya</div>
                            <svg width="25" height="24" viewBox="0 0 25 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M12.3105 18L18.1573 12L12.3105 6" stroke="#0645AD" stroke-width="2"/>
                                <path d="M6.46377 18L12.3105 12L6.46377 6" stroke="#0645AD" stroke-width="2"/>
                            </svg>
                        </div>
                    </div>
                </div>
            </a>
            @endforeach
        </div>
    </div>

@endsection