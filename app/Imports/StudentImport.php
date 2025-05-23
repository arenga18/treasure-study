<?php

namespace App\Imports;

use App\Models\Student;
use Carbon\Carbon;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToCollection;

class StudentImport implements ToCollection
{
    /**
     * @param Collection $collection
     */
    public function collection(Collection $collection)
    {
        // Menghapus baris pertama yang biasanya adalah header
        $collection->shift();

        foreach ($collection as $row) {
            $date_of_birth = $row[5];

            // Generate password berdasarkan tanggal lahir (format: ddMMyyyy)
            try {
                $date = Carbon::createFromFormat('Y-m-d', $date_of_birth);
                $password = Hash::make($date->format('dmY'));
            } catch (\Exception $e) {
                $password = Hash::make('defaultpassword');
            }

            // Update atau buat data siswa berdasarkan NISN
            Student::updateOrCreate(
                ['nisn' => $row[1]], // Kunci unik untuk pencocokan data
                [
                    'name' => $row[0],
                    'email' => $row[2],
                    'photo' => $row[3],
                    'gender' => $row[4],
                    'date_of_birth' => $date_of_birth,
                    'gen' => $row[6],
                    'password' => $password,   // Password yang sudah di-generate
                ]
            );
        }
    }
}
