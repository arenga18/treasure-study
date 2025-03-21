<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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

    use HasFactory;
}
