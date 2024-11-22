@extends('layouts.app')

@section('title', 'Grafik Lulusan | Labschool Cirendeu')

@section('content')
  <div class="mt-28">
    <section class="py-14 bg-gray-100">
      <div class="container mx-auto px-4">
        <h1 id="judul" class="text-center font-bold text-2xl md:text-4xl mb-14 lg:mb-20 text-blue-600">Grafik Lulusan
          SMA
          Labschool Cirendeu</h1>
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-10">
          {{-- Grafik 2023 --}}
          <div class="relative group">
            <h2 class="text-xl mb-6 font-bold md:text-2xl text-center">
              Lulusan Angkatan 1 GANATARA <br>
              SMA Labschool Cirendeu 2023
            </h2>
            <img src="{{ asset('img/grafik/2023.png') }}"
              class="w-full h-[320px] lg:h-[460px] bg-auto bg-blend-color-burn object-contain">
          </div>

          {{-- Grafik 2024 --}}
          <div class="relative group">
            <h2 class="text-xl mb-6 font-bold md:text-2xl text-center">
              Lulusan Angkatan 2 DARTANARA <br>
              SMA Labschool Cirendeu 2024
            </h2>
            <img src="{{ asset('img/grafik/2024.png') }}"
              class="w-full h-[320px] lg:h-[460px] bg-auto bg-blend-color-burn object-contain">
          </div>
        </div>
      </div>
    </section>
  </div>


@endsection
