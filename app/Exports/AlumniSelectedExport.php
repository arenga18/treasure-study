<?php

namespace App\Exports;

use app\Models\Alumni;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class AlumniSelectedExport implements FromCollection, WithMapping, WithHeadings
{
    /**
     * @return \Illuminate\Support\Collection
     */

    use Exportable;

    public function __construct(public $records)
    {
        $this->records = $records;
    }

    public function collection()
    {
        return $this->records;
    }

    public function headings(): array
    {
        return [
            'No',
            'Nama Siswa',
            'Kelas',
            'Foto',
            'Perguruan Tinggi',
            'Jurusan',
            'Tahun lulus',
            'Sistem Seleksi',
        ];
    }

    public function map($alumni): array
    {
        return [
            $alumni->nisn,
            $alumni->nama_siswa,
            $alumni->kelas,
            $alumni->foto,
            $alumni->perguruan_tinggi,
            $alumni->jurusan,
            $alumni->tahun_lulus,
            $alumni->sistem_seleksi,
        ];
    }
}
