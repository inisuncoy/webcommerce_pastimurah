<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Anda Mantau</title>

    {{-- Google Font PT Sans --}}
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=PT+Sans:wght@400;700&display=swap" rel="stylesheet">
    

    {{-- For <style><style/> --}}
    @yield('styles')

    {{-- Livewire --}}
    @livewireStyles
    {{-- Vite --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    <div class="h-full">
        {{-- Include Navbar --}}
        @include('components.navbar')
        <main class="my-[80px]">
            {{-- Content --}}
            @yield('pages')
        </main>
        {{-- Include Footer --}}
        @include('components.footer')
    </div>
</div>
    @yield('modal')

    {{-- For <script></script> --}}
    @stack('scripts')

    @livewireScripts
</body>
</html>
