<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KinerjaSemester extends Model
{
    use HasFactory;

    protected $fillable = [
        'nisn',
        'semester',
        'ips_terakhir',
        'kendala',
        'kendala_lain',
        'matkul_disukai',
        'matkul_sulit'
    ];

    public function student()
    {
        return $this->belongsTo(Student::class, 'nisn', 'nisn');
    }

    public function alumni()
    {
        return $this->belongsTo(Alumni::class, 'nisn', 'nisn');
    }
}
