<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alumni extends Model
{

    protected $table = 'alumni';

    protected $fillable = [
        'nisn',
        'nama_lengkap',
        'asal_kelas',
        'foto',
        'diterima_pada',
        'jurusan'
    ];

    use HasFactory;
}
