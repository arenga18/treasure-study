<div class="navigation">
  <div class="container">
    <div class="row">
      <div class="w-full">
        <nav class="flex items-center justify-between navbar navbar-expand-md">
          <a class="mr-4 navbar-brand" href="#">
            <img src="{{ url('img/logo-nav.png') }}" alt="Logo" width="200" height="90">
          </a>

          <!-- Tombol Hamburger untuk Mobile -->
          <button id="navbar-toggler" class="block navbar-toggler focus:outline-none md:hidden" type="button"
            aria-label="Toggle navigation">
            <span class="toggler-icon"></span>
            <span class="toggler-icon"></span>
            <span class="toggler-icon"></span>
          </button>

          <!------------------------------Navbar---------------------------------->
          <div id="navbarOne"
            class="absolute left-0 z-30 hidden w-full px-5 py-3 duration-300 bg-white shadow md:opacity-100 md:w-auto md:block top-100 mt-full md:static md:bg-transparent md:shadow-none">
            <ul class="items-center content-start mr-auto lg:justify-center md:justify-end navbar-nav md:flex">

              <!-- HOME -->
              <li class="nav-item {{ Route::is('home') ? 'active' : '' }}">
                <a class="page-scroll font-bold" href="{{ route('home') }}">HOME</a>
              </li>

              <!-- TRACER STUDY -->
              <li class="nav-item {{ Route::is('alumni') ? 'active' : '' }}">
                <a class="page-scroll font-bold" href="{{ route('alumni') }}">TRACER STUDY</a>
              </li>

              <!-- GRAFIK -->
              <li class="nav-item {{ Route::is('grafik') ? 'active' : '' }}">
                <a class="page-scroll font-bold" href="{{ route('grafik') }}">GRAFIK</a>
              </li>

            </ul>
          </div>

          {{-- SOCIAL MEDIA --}}
          <div class="items-center justify-end hidden navbar-social lg:flex">
            <ul class="flex footer-social">
              <li><a target="_blank" href="#"><i class="lni-facebook-filled"></i></a></li>
              <li><a href="https://www.youtube.com/@labschoolcirendeuofficial4329" target="_blank"><i
                    class="lni-youtube"></i></a></li>
              <li><a href="https://www.instagram.com/labschoolcirendeu.official/" target="_blank"><i
                    class="lni-instagram-original"></i></a></li>
              <li><a href="https://www.linkedin.com/company/labschool-cirendeu/" target="_blank"><i
                    class="lni-linkedin-original"></i></a></li>
            </ul>
          </div>
        </nav>
      </div>
    </div>
  </div>
</div>
