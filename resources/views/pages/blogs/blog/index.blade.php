@extends('layouts.main.index')

@section('pages')
<div class="flex mx-5 pt-5 gap-y-10 bg-[#FFFFFF] flex-col px-5 md:px-20 pb-20">
    <div class="text-[#89B441] text-[18px] pt-5 font-semibold flex items-center gap-x-2">
        <a href={{ url()->previous() }}>< Kembali</a>
    </div>
    <div class="flex flex-col md:flex-row md:gap-x-10">
        <div class="flex flex-col gap-y-5 w-[200px]">
            <div class="flex">
            {{-- <div class="bg-[#FAF8F3] border border-black flex flex-col p-2 text-center gap-y-2 rounded-lg">
                    <h1 class="pb-2 border-b border-black">{{ \Carbon\Carbon::createFromFormat('d/m/Y', $new['createdAt'])->format('j') }}</h1>
                    <h1>{{ \Carbon\Carbon::createFromFormat('d/m/Y', $new['createdAt'])->format('M') }}</h1>
                </div> --}}
            </div>
            <div class="text-md">
                <h1 class="font-bold">Penulis: </h1>
                <h1>{{ $news["author"] }}</h1>
            </div>
        </div>
        <div class="flex flex-col w-full gap-y-10">
            <div class="flex gap-x-5">
                <div class="grow">
            
                    <img src={{ "https://api.andamantau.com/".$news['image'] }} class="w-[800px] h-[411px] object-cover" alt="">
                </div>
                <div class="flex flex-col gap-y-5">
                {{-- <div class="">
                        <h1 class="text-[#89B53D] font-bold text-lg">Kategori</h1>
                        <p class="text-md">{{ $news['category'] }}</p>
                    </div> --}}
                    {{-- <div class="">
                        <h1 class="text-[#89B53D] font-bold text-lg pb-2">Label</h1>
                        <div class="flex flex-wrap w-64 text-white gap-x-2 gap-y-2">
                            @foreach ($new['tags'] as $tag)
                                <span class="bg-[#303030] py-2 pl-2 pr-4 text-md rounded-md flex gap-x-2 items-center">
                                    <svg width="8" height="8" viewBox="0 0 8 8" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <circle cx="4" cy="4" r="4" fill="#FAF8F3"/>
                                    </svg>
                                    {{ $tag }}
                                </span>
                            @endforeach --}}
                        </div>
                    </div>
                </div>
            </div>
            <div class="flex flex-col gap-y-5">
                <h1 class="text-3xl font-bold text-[#89B53D]">{{ $news['title'] }}</h1>
                <div class="">
                    {{ $news['content'] }}
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
