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
            <img src="{{ asset('img/grafik/2023.png') }}" class="w-full bg-auto rounded-lg shadow">
          </div>

          {{-- Grafik 2024 --}}
          <div class="relative group">
            <img src="{{ asset('img/grafik/2024.png') }}" class="w-full bg-auto rounded-lg shadow">
          </div>
        </div>
      </div>
    </section>
  </div>


@endsection
