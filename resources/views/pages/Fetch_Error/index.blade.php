@extends('layouts.main.index')

@section('pages')
<div class="flex flex-col px-5 md:px-20 pt-10 gap-y-5">
  <div class="flex flex-col items-center justify-center gap-y-10">
    <img src="/assets/images/hero-404.png" alt="hero">
    <div >
      <h1 class="text-2xl md:text-4xl text-center">Maaf ada kesalahan saat mengambil data</h1>
      <p class="text-xl md:text-2xl text-center mt-2"> Coba lagi nanti </p>
    </div>
    <a href={{ url()->previous() }}><button class="px-20 py-5 bg-[#89B53D] rounded-lg text-xl font-semibold text-white">Kembali</button></a>
  </div>
</div>
@endsection