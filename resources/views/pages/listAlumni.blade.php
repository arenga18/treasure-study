@extends('layouts.app')

@section('title', 'Home Page | Labschool Cirendeu')

@section('content')
  <div class="mt-[93.63px] md:mt-28">
    <section class="py-14 bg-gray-100">
      <div class="container mx-auto px-4">
        <h1 id="judul" class="text-center font-bold text-2xl md:text-3xl mb-12 text-blue-600">Daftar Siswa-Siswi SMA
          Labschool
          Cirendeu Yang diterima di </br> Perguruan Tinggi Tahun Akademik</h1>

        <label for="tahunLulusFilter" class="block text-md text-gray-700 mb-3">Filter Tahun Lulus:</label>
        <select id="tahunLulusFilter"
          class="block w-full p-2 border text-md md:text-xl border-gray-300 rounded-md shadow-sm focus:outline-none focus:border-transparent md:mb-10">
          @foreach ($alumnis->pluck('tahun_lulus')->unique() as $tahun)
            <option value="{{ $tahun }}" class="text-gray-900">
              {{ $tahun }} -
            </option>
          @endforeach
        </select>

        <div id="tableLoading" class="flex items-center justify-center h-64">
          <div class="animate-spin rounded-full h-12 w-12 border-t-2 border-b-2 border-blue-500"></div>
        </div>

        <table id="myTable" class="display mt-20 hidden bg-white">
          <thead>
            <tr>
              <th class="text-sm md:text-lg">No</th>
              <th class="text-sm md:text-lg">NISN</th>
              <th class="text-sm md:text-lg">NAMA SISWA</th>
              <th class="text-sm md:text-lg">KELAS</th>
              <th class="text-sm md:text-lg">PERGURUAN TINGGI</th>
              <th class="text-sm md:text-lg">PRODI/JURUSAN</th>
              <th class="text-sm md:text-lg">TAHUN LULUS</th>
              <th class="text-sm md:text-lg">SISTEM SELEKSI</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($alumnis as $alumni)
              <tr>
                <td class="text-sm md:text-lg"></td>
                <td class="text-sm md:text-lg">{{ $alumni->nisn }}</td>
                <td class="text-sm md:text-lg">{{ $alumni->nama_siswa }}</td>
                <td class="text-sm md:text-lg">{{ $alumni->kelas }}</td>
                <td class="text-sm md:text-lg">{{ $alumni->perguruan_tinggi }}</td>
                <td class="text-sm md:text-lg">{{ $alumni->jurusan }}</td>
                <td class="text-sm md:text-lg">{{ $alumni->tahun_lulus }}</td>
                <td class="text-sm md:text-lg">{{ $alumni->sistem_seleksi }}</td>
              </tr>
            @endforeach
          </tbody>
        </table>

      </div>
    </section>
  </div>


@endsection
