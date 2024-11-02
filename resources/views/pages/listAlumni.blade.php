@extends('layouts.app')

@section('title', 'Home Page | Labschool Cirendeu')

@section('content')
  <div class="mt-28">
    <section class="py-14 bg-gray-100">
      <div class="container mx-auto px-4">
        <h1 id="judul" class="text-center font-bold text-3xl mb-10">Daftar Siswa-Siswi SMA Labschool Cirendeu Yang
          diterima di
          Perguruan Tinggi Tahun Akademik</h1>

        <label for="tahunLulusFilter" class="block text-md font-lg text-gray-700 mb-3">Filter Tahun Lulus:</label>
        <select id="tahunLulusFilter"
          class="block w-full p-2 border text-xl border-gray-300 rounded-md shadow-sm focus:outline-none focus:border-transparent">
          @foreach ($alumnis->pluck('tahun_lulus')->unique() as $tahun)
            <option value="{{ $tahun }}" class="text-gray-900">{{ $tahun }}</option>
          @endforeach
        </select>

        <div id="tableLoading" class="flex items-center justify-center h-64">
          <div class="animate-spin rounded-full h-12 w-12 border-t-2 border-b-2 border-blue-500"></div>
        </div>

        <table id="myTable" class="display mt-20 hidden">
          <thead>
            <tr>
              <th>No</th>
              <th>NISN</th>
              <th>NAMA SISWA</th>
              <th>KELAS</th>
              <th>PERGURUAN TINGGI</th>
              <th>PRODI/JURUSAN</th>
              <th>TAHUN LULUS</th>
              <th>SISTEM SELEKSI</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($alumnis as $alumni)
              <tr>
                <td></td>
                <td>{{ $alumni->nisn }}</td>
                <td>{{ $alumni->nama_siswa }}</td>
                <td>{{ $alumni->kelas }}</td>
                <td>{{ $alumni->perguruan_tinggi }}</td>
                <td>{{ $alumni->jurusan }}</td>
                <td>{{ $alumni->tahun_lulus }}</td>
                <td>{{ $alumni->sistem_seleksi }}</td>
              </tr>
            @endforeach
          </tbody>
        </table>


      </div>
    </section>
  </div>


@endsection
