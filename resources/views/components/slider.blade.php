{{-- {{dd($carousel_data)}} --}}
{{-- @foreach ($carousel_data as $data) 
< --}}
 <div id="default-carousel" class="relative w-full h-[500px] pt-8 pb-12 md:py-24 " data-carousel="slide"> 
    <!-- Carousel wrapper -->
    <div class="relative h-56 rounded-lg md:h-96"> 
         <!-- Item 1 -->
        <div class="hidden duration-700 ease-in-out" data-carousel-item>
            <div class="flex flex-col justify-around md:flex-row">
                <div class="text-[20px] md:text-[42px] gap-y-10 text-black ">
                    <h1 class="font-bold">{{$carousel_data[0]['title']}}</h1>
                    <p class="font-[400] my-10 text-[12px] md:text-[22px]">
                        {{$carousel_data[0]['description']}}
                    </p>
                    <button class="font-bold text-white text-[12px] md:text-[20px] py-2 px-14 rounded-md bg-[#89B53D] hidden md:block">
                        Beli
                    </button>
                </div>
                <div class="flex items-center justify-end gap-x-8">
                    <img src={{ url("https://api.andamantau.com/".$carousel_data[0]['image']) }} alt="product" class="w-[70px] h-[70px] object-contain md:w-[200px] md:h-[200px]">
                    <div class="text-black">
                        <h1 class="font-bold text-[20px] md:text-[24px] ">{{$carousel_data[0]['image_title']}}</h1>
                        <p class="font-[400] text-[12px] md:text-[20px]"> {{$carousel_data[0]['image_promo']}} </p>
                    </div>
                </div>
                <div class="flex justify-center pt-10 md:hidden">
                    <button class="font-bold text-white text-[12px] md:text-[20px] py-2 px-14 rounded-md bg-[#89B53D] ">
                        Beli
                    </button>
                </div>
            </div>
        </div> 

        <!-- Item 2 -->
        <div class="hidden duration-700 ease-in-out" data-carousel-item>
            <div class="flex flex-col justify-around md:flex-row">
                <div class="text-[20px] md:text-[42px] gap-y-10 text-black ">
                    <h1 class="font-bold">{{$carousel_data[1]['title']}}</h1>
                    <p class="font-[400] my-10 text-[12px] md:text-[22px]">
                        {{$carousel_data[1]['description']}}
                    </p>
                    <button class="font-bold text-white text-[12px] md:text-[20px] py-2 px-14 rounded-md bg-[#89B53D] hidden md:block">
                        Beli
                    </button>
                </div>
                <div class="flex items-center justify-end gap-x-8">
                    <img src={{ url("https://api.andamantau.com/".$carousel_data[1]['image']) }} alt="product" class="w-[70px] h-[70px] object-contain md:w-[200px] md:h-[200px]">
                    <div class="text-black">
                        <h1 class="font-bold text-[20px] md:text-[24px] ">{{$carousel_data[1]['image_title']}}</h1>
                        <p class="font-[400] text-[12px] md:text-[20px]"> {{$carousel_data[1]['image_promo']}} </p>
                    </div>
                </div>
                <div class="flex justify-center pt-10 md:hidden">
                    <button class="font-bold text-white text-[12px] md:text-[20px] py-2 px-14 rounded-md bg-[#89B53D] ">
                        Beli
                    </button>
                </div>
            </div>
        </div> 
        <!-- Item 3 -->
        <div class="hidden duration-700 ease-in-out" data-carousel-item>
            <div class="flex flex-col justify-around md:flex-row">
                <div class="text-[20px] md:text-[42px] gap-y-10 text-black ">
                    <h1 class="font-bold">{{$carousel_data[2]['title']}}</h1>
                    <p class="font-[400] my-10 text-[12px] md:text-[22px]">
                        {{$carousel_data[2]['description']}}
                    </p>
                    <button class="font-bold text-white text-[12px] md:text-[20px] py-2 px-14 rounded-md bg-[#89B53D] hidden md:block">
                        Beli
                    </button>
                </div>
                <div class="flex items-center justify-end gap-x-8">
                    <img src={{ url("https://api.andamantau.com/".$carousel_data[2]['image']) }} alt="product" class="w-[70px] h-[70px] object-contain md:w-[200px] md:h-[200px]">
                    <div class="text-black">
                        <h1 class="font-bold text-[20px] md:text-[24px] ">{{$carousel_data[2]['image_title']}}</h1>
                        <p class="font-[400] text-[12px] md:text-[20px]"> {{$carousel_data[2]['image_promo']}} </p>
                    </div>
                </div>
                <div class="flex justify-center pt-10 md:hidden">
                    <button class="font-bold text-white text-[12px] md:text-[20px] py-2 px-14 rounded-md bg-[#89B53D] ">
                        Beli
                    </button>
                </div>
            </div>
        </div> 
        <!-- Item 4 -->
        <div class="hidden duration-700 ease-in-out" data-carousel-item>
            <div class="flex flex-col justify-around md:flex-row">
                <div class="text-[20px] md:text-[42px] gap-y-10 text-black ">
                    <h1 class="font-bold">{{$carousel_data[3]['title']}}</h1>
                    <p class="font-[400] my-10 text-[12px] md:text-[22px]">
                        {{$carousel_data[3]['description']}}
                    </p>
                    <button class="font-bold text-white text-[12px] md:text-[20px] py-2 px-14 rounded-md bg-[#89B53D] hidden md:block">
                        Beli
                    </button>
                </div>
                <div class="flex items-center justify-end gap-x-8">
                    <img src={{ url("https://api.andamantau.com/".$carousel_data[3]['image']) }} alt="product" class="w-[70px] h-[70px] object-contain md:w-[200px] md:h-[200px]">
                    <div class="text-black">
                        <h1 class="font-bold text-[20px] md:text-[24px] ">{{$carousel_data[3]['image_title']}}</h1>
                        <p class="font-[400] text-[12px] md:text-[20px]"> {{$carousel_data[3]['image_promo']}} </p>
                    </div>
                </div>
                <div class="flex justify-center pt-10 md:hidden">
                    <button class="font-bold text-white text-[12px] md:text-[20px] py-2 px-14 rounded-md bg-[#89B53D] ">
                        Beli
                    </button>
                </div>
            </div>
        </div> 
        <!-- Item 5 -->
        <div class="hidden duration-700 ease-in-out" data-carousel-item>
            <div class="flex flex-col justify-around md:flex-row">
                <div class="text-[20px] md:text-[42px] gap-y-10 text-black ">
                    <h1 class="font-bold">{{$carousel_data[4]['title']}}</h1>
                    <p class="font-[400] my-10 text-[12px] md:text-[22px]">
                        {{$carousel_data[4]['description']}}
                    </p>
                    <button class="font-bold text-white text-[12px] md:text-[20px] py-2 px-14 rounded-md bg-[#89B53D] hidden md:block">
                        Beli
                    </button>
                </div>
                <div class="flex items-center justify-end gap-x-8">
                    <img src={{ url("https://api.andamantau.com/".$carousel_data[4]['image']) }} alt="product" class="w-[70px] h-[70px] object-contain md:w-[200px] md:h-[200px]">
                    <div class="text-black">
                        <h1 class="font-bold text-[20px] md:text-[24px] ">{{$carousel_data[4]['image_title']}}</h1>
                        <p class="font-[400] text-[12px] md:text-[20px]"> {{$carousel_data[4]['image_promo']}} </p>
                    </div>
                </div>
                <div class="flex justify-center pt-10 md:hidden">
                    <button class="font-bold text-white text-[12px] md:text-[20px] py-2 px-14 rounded-md bg-[#89B53D] ">
                        Beli
                    </button>
                </div>
            </div>
        </div> 
       
        
    <!-- Slider indicators -->
    <div class="absolute bottom-0 z-30 flex space-x-3 -translate-x-1/2 left-1/2">
        <button type="button" class="w-3 h-3 rounded-full " aria-current="true" aria-label="Slide 1" data-carousel-slide-to="0"></button>
        <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 2" data-carousel-slide-to="1"></button>
        <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 3" data-carousel-slide-to="2"></button>
        <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 4" data-carousel-slide-to="3"></button>
        <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 5" data-carousel-slide-to="4"></button>
    </div>
    <!-- Slider controls -->
    <button type="button" class="absolute top-0 left-0 z-30 items-center justify-center hidden h-full px-4 cursor-pointer md:flex group focus:outline-none" data-carousel-prev>
        <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-[#89B53D] group-focus:ring-4 group-focus:ring-gray-800/70 group-focus:outline-none">
            <svg width="20" height="27" viewBox="0 0 38 27" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M3 13.541L1.90673 14.568L0.94196 13.541L1.90673 12.514L3 13.541ZM35.5246 12.041C36.353 12.041 37.0246 12.7126 37.0246 13.541C37.0246 14.3694 36.353 15.041 35.5246 15.041L35.5246 12.041ZM12.7483 26.109L1.90673 14.568L4.09327 12.514L14.9348 24.055L12.7483 26.109ZM1.90673 12.514L12.7483 0.972984L14.9348 3.02701L4.09327 14.568L1.90673 12.514ZM3 12.041L35.5246 12.041L35.5246 15.041L3 15.041L3 12.041Z" fill="white"/>
            </svg>
            <span class="sr-only">Previous</span>
        </span>
    </button>
   

    <button type="button" class="absolute top-0 right-0 z-30 items-center justify-center hidden h-full px-4 cursor-pointer md:flex group focus:outline-none" data-carousel-next>
        <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-[#89B53D]  group-focus:ring-4 group-focus:ring-gray-800/70 group-focus:outline-none">
            <svg width="20" height="27" viewBox="0 0 37 27" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M34.2622 13.4754L35.3555 12.4484L36.3202 13.4754L35.3555 14.5024L34.2622 13.4754ZM1.73762 14.9754C0.909192 14.9754 0.237618 14.3038 0.237618 13.4754C0.237618 12.647 0.909192 11.9754 1.73762 11.9754L1.73762 14.9754ZM24.514 0.907402L35.3555 12.4484L33.1689 14.5024L22.3274 2.96143L24.514 0.907402ZM35.3555 14.5024L24.5139 26.0434L22.3274 23.9894L33.1689 12.4484L35.3555 14.5024ZM34.2622 14.9754L1.73762 14.9754L1.73762 11.9754L34.2622 11.9754L34.2622 14.9754Z" fill="white"/>
                </svg>
            <span class="sr-only">Next</span>
        </span>
    </button>
  

 </div>



