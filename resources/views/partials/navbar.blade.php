<div class="navigation">
  <div class="container mx-auto px-4">
    <div class="row">
      <div class="w-full">
        <nav class="flex items-center justify-between navbar navbar-expand-md">
          <a class="mr-4 navbar-brand" href="{{ route('home') }}">
            <img src="{{ url('img/logo-nav.png') }}" alt="Logo" class="w-[150px] md:w-[200px]">
          </a>

          <!-- Tombol Hamburger untuk Mobile -->
          <button id="navbar-toggler" class="block navbar-toggler focus:outline-none md:hidden" type="button"
            aria-label="Toggle navigation">
            <span class="toggler-icon"></span>
            <span class="toggler-icon"></span>
            <span class="toggler-icon"></span>
          </button>

          <!-- Navbar -->
          <div id="navbarOne"
            class="absolute left-0 z-30 hidden w-full px-5 py-4 duration-300 bg-white shadow md:opacity-100 md:w-auto md:block top-100 mt-full md:static md:bg-transparent md:shadow-none">
            <ul
              class="flex flex-col gap-4 items-start md:flex-row md:gap-2 md:items-center mr-auto lg:justify-center md:justify-end navbar-nav">

              <!-- HOME -->
              <li class="nav-item {{ Route::is('home') ? 'active' : '' }}">
                <a class="page-scroll font-bold text-sm my-[10px] md:m-0" href="{{ route('home') }}">HOME</a>
              </li>

              <!-- TRACER STUDY -->
              <li class="nav-item {{ Route::is('alumni') ? 'active' : '' }}">
                <a class="page-scroll font-bold text-sm my-[10px] md:m-0" href="{{ route('alumni') }}">TRACER STUDY</a>
              </li>

              <!-- GRAFIK -->
              <li class="nav-item {{ Route::is('grafik') ? 'active' : '' }}">
                <a class="page-scroll font-bold text-sm my-[10px] md:m-0" href="{{ route('grafik') }}">Grafik</a>
              </li>

              <!-- LOGIN (dalam menu dropdown di mode mobile) -->
              <li class="nav-item md:hidden text-center w-full">
                <a href="/siswa"
                  class="block bg-blue-500 !text-white font-bold !px-6 !py-2 rounded mx-auto mb-4 md:m-0 hover:bg-blue-600">
                  LOGIN
                </a>
              </li>
            </ul>
          </div>

          <!-- LOGIN (di sebelah kanan navbar untuk mode desktop) -->
          <div class="hidden md:block md:ms-5">
            <a href="/siswa" class="bg-blue-500 text-white font-bold px-6 py-3 rounded hover:bg-blue-600">
              LOGIN
            </a>

          </div>
        </nav>
      </div>
    </div>
  </div>
</div>
