@extends('layouts.app')

@section('title', 'Home Page | Labschool Cirendeu')

@section('content')

  {{-- HERO SECTION --}}
  <div id="home" class="relative z-10 header-hero min-h-screen">
    <section class="relative flex items-center bg-gray-100 h-screen">
      <!-- Hero Shapes -->
      <div class="absolute inset-0">
        <img src="{{ asset('img/shape/hero/hero-1-circle.png') }}" alt=""
          class="absolute top-[100px] md:top-[180px] lg:top-[150px] left-[40px] md:left-[150px] lg:left-[200px] w-10 sm:w-14 md:w-16 lg:w-20">
        <img src="{{ asset('img/shape/hero/hero-1-circle-2.png') }}" alt=""
          class="absolute bottom-20 md:bottom-40 left-0 w-10 sm:w-14 md:w-16 lg:w-20">
        <img src="{{ asset('img/shape/hero/hero-1-dot-2.png') }}" alt=""
          class="absolute top-20 md:top-40 right-0 w-10 sm:w-12 md:w-14 lg:w-16">
      </div>

      <div
        class="container mx-auto flex flex-col md:flex-row items-center justify-between mt-10 md:mt-20 px-4 sm:px-6 lg:px-24 gap-8 md:gap-10 lg:gap-16">

        <!-- Content Section -->
        <div class="md:w-1/2 text-center md:text-left z-10 md:pr-8 lg:pr-12">
          <h1 class="text-3xl sm:text-4xl md:text-4xl lg:text-5xl text-gray-800">TRACER STUDY</h1>
          <h3 class="text-4xl sm:text-5xl md:text-4xl lg:text-5xl font-bold text-gray-800 mt-4">Informasi Berita dan
            Profile
            Alumni
          </h3>
          <p class="mt-4 sm:mt-6 text-base sm:text-lg md:text-lg text-gray-600">
            Jadilah Bagian dari Cerita Sukses dan Warisan Kami di Labschool Cirendeu
          </p>
          <div class="mt-4 sm:mt-6">
            <a href="{{ route('alumni') }}"
              class="bg-blue-500 text-white px-3 sm:px-4 py-2 rounded hover:bg-blue-600">Lihat Alumni</a>
          </div>
        </div>

        <!-- Image Section -->
        <div class="md:w-1/2 flex justify-center md:justify-end relative z-10 mt-10 md:mt-0">
          <div class="relative flex items-center md:pl-8 lg:pl-12">

            <!-- Decorative Shapes -->
            <img src="{{ asset('img/shape/hero/hero-1-dot.png') }}" alt=""
              class="absolute top-[5rem] sm:top-[8rem] md:top-[11rem] -z-2 w-10 sm:w-14 md:w-16 lg:w-20 hero-1-dot -z-20">
            <img src="{{ asset('img/shape/hero/hero-1-circle-3.png') }}" alt=""
              class="absolute -top-4 sm:top-16 md:top-20 right-8 sm:right-12 md:right-16 w-48 sm:w-60 md:w-[350px] lg:w-[400px] -z-20">
            <img src="{{ asset('img/shape/hero/hero-1-circle-4.png') }}" alt=""
              class="absolute bottom-10 sm:bottom-16 left-8 sm:left-12 w-12 sm:w-14 md:w-16">

            <!-- Main Image -->
            <div
              class="w-[15rem] sm:w-[18rem] md:w-[20rem] lg:w-[25rem] h-40 sm:h-52 md:h-48 lg:h-64 mr-0 sm:mr-8 md:mr-12 lg:mr-16">
              <img src="{{ asset('img/banner/wisudawan.jpeg') }}" alt="Wisudawan"
                class="w-full h-full object-cover rounded-lg shadow-lg z-50">
            </div>

            <!-- Small Image -->
            <div
              class="hidden sm:block lg:block -z-10 -ms-40 -mb-10 w-28 sm:w-36 md:w-44 lg:w-56 h-40 sm:h-56 md:h-[490px] lg:h-[550px] mt-8 sm:mt-12 md:mt-14 lg:mt-16">
              <img src="{{ asset('img/banner/wisudawan2.png') }}" alt="Wisudawan 2"
                class="w-full object-cover rounded-lg shadow-lg">
            </div>

          </div>
        </div>

      </div>
    </section>
  </div>

@endsection
