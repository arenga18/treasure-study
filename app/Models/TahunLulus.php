<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TahunLulus extends Model
{
    protected $table = 'tahun_lulus';

    protected $fillable = [
        'tahun',
        'nama_angkatan'
    ];
    use HasFactory;
}
