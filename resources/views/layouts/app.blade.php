<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>@yield('title', 'Default Title')</title>
  <link rel="icon" href="{{ asset('img/logo icon.png') }}" type="image/x-icon">
  <link rel="stylesheet" href="https://cdn.datatables.net/2.1.8/css/dataTables.dataTables.min.css">
  <link href="https://fonts.googleapis.com/css2?family=Hanken+Grotesk:ital,wght@0,100..900;1,100..900&display=swap"
    rel="stylesheet">
  <link rel="stylesheet" href="{{ asset('css/lineicons.css') }}">
  @vite('resources/css/app.css')
</head>

<body>

  <!-- Include Header -->
  <header class="header-area">
    @include('partials.navbar')
  </header>

  {{-- Include Main Content --}}
  <div>
    @yield('content')
  </div>

  <!-- Include Footer -->
  @include('partials.footer')

  <script src="https://code.jquery.com/jquery-3.7.1.min.js"
    integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
  <script src="https://cdn.datatables.net/2.1.8/js/dataTables.min.js"></script>

  <script src="{{ asset('js/user-side/datatables.js') }}"></script>
  <script src="{{ asset('js/user-side/slick.min.js') }}"></script>
  <script src="{{ asset('js/user-side/scrolling-nav.js') }}"></script>
  <script src="{{ asset('js/user-side/vendor/modernizr-3.6.0.min.js') }}"></script>
  <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

</body>

</html>
