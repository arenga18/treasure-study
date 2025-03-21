<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JenisSeleksi extends Model
{
    protected $table = 'jenis_seleksi';

    protected $fillable = [
        'nama'
    ];
    use HasFactory;
}
