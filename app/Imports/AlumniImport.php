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
            Alumni::create([
                'nisn' => $row[0],
                'nama_lengkap' => $row[1],
                'asal_kelas' => $row[2],
                'foto' => $row[3],
                'diterima_pada' => $row[4],
                'jurusan' => $row[5],
            ]);
        }
    }
}
