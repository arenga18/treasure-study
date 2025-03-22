<?php

namespace App\Imports;

use App\Models\Alumni;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;

class AlumniImport implements ToCollection
{
    /**
     * @param Collection $collection
     */
    public function collection(Collection $collection)
    {
        // Lewati header pada baris pertama
        $collection->shift();

        foreach ($collection as $row) {
            Alumni::updateOrCreate(
                ['nisn' => $row[0]], // Kunci unik untuk pencocokan data
                [
                    'nama_siswa' => $row[1],
                    'kelas' => $row[2],
                    'foto' => $row[3],
                    'perguruan_tinggi' => $row[4],
                    'jurusan' => $row[5],
                    'tahun_lulus' => $row[6],
                    'sistem_seleksi' => $row[7],
                    'jenis_seleksi' => $row[8],
                ]
            );
        }
    }
}
