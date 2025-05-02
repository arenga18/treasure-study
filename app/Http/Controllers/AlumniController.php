<?php

namespace App\Http\Controllers;

use App\Models\Alumni;
use Illuminate\Http\Request;

class AlumniController extends Controller
{
    public function index()
    {
        $alumnis = Alumni::with('angkatan')->get();

        $tahunAngkatan = $alumnis->groupBy('tahun_lulus')->map(function ($group) {
            return $group->first()->angkatan->nama_angkatan ?? '-';
        });
        return view('pages.listAlumni',  compact('alumnis', 'tahunAngkatan'));
    }
}
