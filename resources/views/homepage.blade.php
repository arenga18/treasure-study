@extends('layouts.app')

@section('title', 'Home Page | Labschool Cirendeu')

@section('content')

  {{-- HERO SECTION --}}
  <div id="home" class="relative z-10 header-hero min-h-screen"
    style="background-image: url('{{ asset('img/smp-bg.jpg') }}');">
    <div class="container">
      <div class="justify-center items-center row min-h-screen">
        <div class="w-full lg:w-5/6 xl:w-2/3">
          <div class="text-center header-content">
            <img src="{{ url('img/logo.png') }}" alt="Logo" class="w-[90px] md:w-[130px] mx-auto mb-5 ">
            <h1 class="text-3xl mb-4 font-extrabold leading-tight md:text-6xl md:mb-5">
              Selamat datang di SMP Labschool Cirendeu
            </h1>
            <ul class="flex flex-wrap justify-center mt-7">
              <li><a class="m-2 text-base md:m-3 md:text-lg main-btn gradient-btn"
                  href="https://labschool-unj.sch.id/labschool/psb-labschool-2024/#" target="_blank">PENERIMAAN
                  SISWA BARU</a></li>
              <li>
                <a class="m-2 text-base md:m-3 md:text-lg main-btn video-popup"
                  href="https://e-sma.labschoolcirendeu.sch.id/" target="_blank">
                  E-LEARNING</a>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
