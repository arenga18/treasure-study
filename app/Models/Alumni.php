<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\PerguruanTinggi;
use App\Models\JenisSeleksi;
use App\Models\Jurusan;

class Alumni extends Model
{

    protected $table = 'alumni';

    protected $fillable = [
        'nisn',
        'nama_siswa',
        'kelas',
        'foto',
        'perguruan_tinggi',
        'jurusan',
        'tahun_lulus',
        'sistem_seleksi',
        'jenis_seleksi'
    ];

    public function student()
    {
        return $this->belongsTo(Student::class, 'nisn', 'nisn');
    }

    public function perguruanTinggi()
    {
        return $this->belongsTo(PerguruanTinggi::class, 'perguruan_tinggi');
    }

    public function jenisSeleksi()
    {
        return $this->belongsTo(JenisSeleksi::class, 'jenis_seleksi');
    }



    use HasFactory;
}
