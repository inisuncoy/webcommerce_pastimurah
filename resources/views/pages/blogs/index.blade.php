@extends('layouts.main.index')

@section('pages')
<div class="flex flex-col px-5 md:px-20 pt-14 gap-y-10">
    <div class="flex items-center justify-between pb-2 border-b border-black">
        <h1 class="font-bold text-[22px] md:text-[25px]">Blog UMKM Terkini</h1>
        <div class="flex items-center gap-x-2">
            <div class="items-center hidden gap-x-2 md:flex">
                <form id="sortingForm" method="GET" action=" /blogs/filter">
                <h1 class="font-bold">Urutkan: </h1>
                <select id="sortingSelect" name="sorting" class="bg-white text-black pl-4 rounded-md w-full border-[#89B53D] border font-[500]">
                    <option value="terbaru" selected>Semua</option>
                    <option value="terlama">Terlama</option>                 
                </select>
            </div>
        <input type="hidden" name="sorting_option" value="terlama">
        <button type="submit" style="display: none;"></button>
        </form>

            <div class="mr-3 md:hidden">
                <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M3.9 54.9C10.5 40.9 24.5 32 40 32H472c15.5 0 29.5 8.9 36.1 22.9s4.6 30.5-5.2 42.5L320 320.9V448c0 12.1-6.8 23.2-17.7 28.6s-23.8 4.3-33.5-3l-64-48c-8.1-6-12.8-15.5-12.8-25.6V320.9L9 97.3C-.7 85.4-2.8 68.8 3.9 54.9z"/></svg>
            </div>
        </div>
    </div>
    <div class="grid grid-cols-1 md:px-5 md:grid-cols-3 gap-x-5 gap-y-5 md:gap-y-20">
    @foreach ($news as $new)
    {{-- @foreach ($seller["news"] as $new) --}}
    <a href="/toko/{{ $new['slug-umkm'] }}/blogs/{{ $new["slug-title"] }}" class="p-4 bg-white rounded-xl drop-shadow-lg md:min-w-[400px]">
            <div class="flex flex-col justify-center">
                
            <img src={{ !empty($new["image"]) ? 'https://api.andamantau.com/' . $new["image"] : asset('assets/images/noimage.png') }} alt="product" class="object-cover w-full h-42 md:h-64">
                <div class="flex flex-col pt-4 gap-y-2">
                    <h1 class="font-[700] text-[18px]">{{ $new["title"] }}</h1>
                    <p class="font-[400] text-[14px] text-[#696969] line-clamp-1"> {{ $new["content"] }}</p>
                    <p class="font-[50c0] text-[14px] "> {{ \Carbon\Carbon::parse($new['date'])->format('d-M-Y') }}</p>
                    <div  class="flex items-center justify-end">
                        <p class="text-[#0645AD] mb-1 text-[16px] md:text-[18px]">Baca Selengkapnya</p>
                        <svg width="25" height="24" class="mb-0.5" viewBox="0 0 25 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M12.3105 18L18.1573 12L12.3105 6" stroke="#0645AD" stroke-width="2"/>
                            <path d="M6.46377 18L12.3105 12L6.46377 6" stroke="#0645AD" stroke-width="2"/>
                        </svg>
                    </div>
                </div>
            </div>
        </a>
        {{-- @endforeach --}}
        @endforeach
    </div>

</div>
@endsection
@push('scripts')
<script>

function saveSelectedOption(option) {
    localStorage.setItem('selectedOption', option);
}

// Function to load the selected option from local storage
function loadSelectedOption() {
    return localStorage.getItem('selectedOption') || 'terbaru'; // Default to 'terbaru' if not found
}

// Set the initial selected option based on local storage
document.getElementById('sortingSelect').value = loadSelectedOption();

// Add an event listener to the select element
document.getElementById('sortingSelect').addEventListener('change', function() {
    var selectedValue = this.value;
    document.querySelector('input[name="sorting_option"]').value = selectedValue;
    saveSelectedOption(selectedValue); // Save the selected option to local storage
    document.getElementById('sortingForm').submit();
});
    </script>
    @endpush
