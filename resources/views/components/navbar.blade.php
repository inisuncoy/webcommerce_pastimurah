<nav class="fixed top-0 z-50 w-full">
    <div class="flex items-center justify-between w-full p-3 border px-5 md:px-14 border-1 bg-[#FAF8F3] drop-shadow-md ">
        <button type="button" class="block md:hidden" onclick="toggleNavbar()">
            <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 448 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M0 96C0 78.3 14.3 64 32 64H416c17.7 0 32 14.3 32 32s-14.3 32-32 32H32C14.3 128 0 113.7 0 96zM0 256c0-17.7 14.3-32 32-32H416c17.7 0 32 14.3 32 32s-14.3 32-32 32H32c-17.7 0-32-14.3-32-32zM448 416c0 17.7-14.3 32-32 32H32c-17.7 0-32-14.3-32-32s14.3-32 32-32H416c17.7 0 32 14.3 32 32z"/></svg>
        </button>
        <a href="/" class="h-[60px] w-[200px] justify-center items-center hidden md:flex">
            <img src={{ url('/assets/images/logo.png') }} alt="logo">
        </a>
        <div class="flex items-center justify-center gap-10 font-bold text-black text-md">
            <a href="/" class="hidden md:block {{ Request::is('/') ? 'text-[#89B53D]' : 'hover:text-[#89B53D]' }}">Beranda</a>
            <a href="/toko" class="hidden md:block {{ (Request::is('toko') or Request::is('toko/*') and !Request::is('toko/*/blogs/*')) ? 'text-[#89B53D]' : 'hover:text-[#89B53D]' }}">Toko</a>
            <a href="/blogs" class="hidden md:block {{ (Request::is('blogs') or Request::is('toko/*/blogs/*')) ? 'text-[#89B53D]' : 'hover:text-[#89B53D]' }}">Blog</a>
            {{-- <a href="/cart" class="flex items-center gap-2 text-sm font-bold text-white bg-[#89B53D] py-2 px-4 rounded-md"> --}}
                {{-- <img src={{ url('/assets/icons/cart.svg') }} alt="cart">
                0 Items --}}
            </a>
        </div>
    </div>
    <div class="hidden w-full h-screen bg-black bg-opacity-70" id="navbarModal">
        <div class="bg-white">
            <div class="flex flex-col font-bold text-black">
                </li>
                <a href="/" class="flex justify-center w-full py-2 border-y">
                    <p class="text-md">Beranda</p>
                </a>
                <a href="/blogs" class="flex justify-center w-full py-2 border-b">
                    <p class="text-md">Blog</p>
                </a>
                <a href="/toko" class="flex justify-center w-full py-2 border-b">
                    <p class="text-md">Toko</p>
                </a>
            </div>
        </div>

    </div>
</nav>

@push('scripts')
    <script>
        function toggleNavbar() {
            var navbarModal = document.getElementById('navbarModal');

            if (navbarModal.classList.contains("hidden")) {
                navbarModal.classList.remove('hidden');
            } else {
                navbarModal.classList.add('hidden');
            }
        }
    </script>
@endpush


