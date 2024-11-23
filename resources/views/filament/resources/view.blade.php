<x-filament::page>
  <x-filament::card>
    <x-slot name="header">
      <h2 class="text-xl font-semibold text-gray-800">Detail Kinerja Semester</h2>
    </x-slot>

    <div class="space-y-4">
      <p><strong>NISN:</strong> {{ $record['nisn'] }}</p>
      <p><strong>Nama Mahasiswa:</strong> {{ $record['student_name'] }}</p>
      <p><strong>Semester:</strong> {{ $record['semester'] }}</p>
      <p><strong>Progress Semester:</strong> {{ $record['progress'] }} / 8</p>
    </div>
  </x-filament::card>
</x-filament::page>
