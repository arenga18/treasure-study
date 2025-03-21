<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KategoriPerguruanTinggi extends Model
{
    protected $table = 'kategori_perguruan_tinggi';

    protected $fillable = [
        'nama'
    ];

    use HasFactory;
}
