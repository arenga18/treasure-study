<footer id="footer" class="footer-area">
  <div class="my-10 lg:my-12 footer-widget">
    <div class="container">
      {{-- Footer Header --}}
      <div class="row">
        <div class="w-full">
          <div class="items-center justify-between block mb-8 footer-logo-support md:flex">
            <div class="flex items-center gap-5 footer-logo lg:gap-10">
              <a href="index.html">
                <img src="{{ asset('img/home-logo.png') }}" alt="Logo" width="120">
              </a>
              <ul class="flex footer-social ">
                <li><a target="_blank" href="#"><i class="fa-brands fa-facebook-f"></i></a></li>
                <li><a href="https://www.youtube.com/@labschoolcirendeuofficial4329" target="_blank"><i
                      class="fa-brands fa-youtube"></i></a></li>
                <li><a href="https://www.instagram.com/labschoolcirendeu.official/" target="_blank"><i
                      class="fa-brands fa-instagram"></i></a></li>
                <li><a href="https://www.linkedin.com/company/labschool-cirendeu/" target="_blank"><i
                      class="fa-brands fa-linkedin"></i></a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
      {{-- Menu section --}}
      <div class="row gap-5 lg:gap-10">
        <!-- Informasi Dasar -->
        <div class="w-full sm:w-1/2 md:w-1/3 lg:w-1/4">
          <div class="mb-8 footer-info">
            <h6 class="footer-title">Informasi Dasar</h6>
            <ul>
              <li class="flex items-center mb-2">
                <i class="fa-solid fa-phone"></i>
                <span class="ml-2">0881-5668-006 (Sekretariat)</span>
              </li>
              <li class="flex items-center mb-2">
                <i class="fa-solid fa-envelope"></i>
                <span class="ml-2">info@labschool-unj.sch.id</span>
              </li>
              <li class="flex items-center mb-2">
                <i class="fa-solid fa-location-dot"></i>
                <span class="ml-2">Jl. Raya Cirendeu No.40, Pisangan, Kec. Ciputat Tim., Kota Tangerang Selatan,
                  Banten 15419</span>
              </li>
            </ul>
          </div>
        </div>

        <!-- Menu Navigasi -->
        <div class="w-full sm:w-1/2 md:w-1/3 lg:w-1/4">
          <div class="mb-8 footer-link">
            <h6 class="footer-title">Menu Navigasi</h6>
            <ul>
              <li><a href="{{ route('home') }}">Home</a></li>
              <li><a href="{{ route('alumni') }}">Alumni</a></li>
              <li><a href="{{ route('lokasi') }}">Grafik</a></li>
            </ul>
          </div>
        </div>

      </div>
    </div>
  </div>

  {{-- Footer Copyright --}}
  <div class="bg-blue-900 footer-copyright">
    <div class="container">
      <div class="row">
        <div class="w-full">
          <div class="py-6 text-center">
            <p class="text-white">
              Copyright @
              <a class="text-blue-500 duration-300 hover:text-blue-700" rel="nofollow"
                href="https://tailwindtemplates.co">Labschool UNJ. All rights reserved.</a>
            </p>
          </div>
        </div>
      </div>
    </div>
  </div>
</footer>
