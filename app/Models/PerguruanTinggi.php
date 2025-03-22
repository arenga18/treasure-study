<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PerguruanTinggi extends Model
{
    protected $table = 'perguruan_tinggi';

    protected $fillable = [
        'nama',
        'kategori_pt',
    ];

    public function KategoriPerguruanTinggi()
    {
        return $this->belongsTo(KategoriPerguruanTinggi::class, 'kategori_pt');
    }

    use HasFactory;
}
