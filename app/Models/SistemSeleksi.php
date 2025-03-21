<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SistemSeleksi extends Model
{
    protected $table = 'sistem_seleksi';

    protected $fillable = [
        'jenis_seleksi'
    ];

    use HasFactory;
}
