<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\PerguruanTinggi;

class Jurusan extends Model
{

    protected $table = 'jurusan';

    protected $fillable = [
        'nama',
        'perguruan_tinggi',
    ];

    public function perguruanTinggi()
    {
        return $this->belongsTo(PerguruanTinggi::class, 'perguruan_tinggi');
    }

    use HasFactory;
}
