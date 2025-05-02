<?php

namespace App\Http\Controllers;

use App\Models\Alumni;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GrafikController extends Controller
{
    public function index()
    {
        $data = DB::table('alumni')
            ->join('perguruan_tinggi', function ($join) {
                $join->on(DB::raw('alumni.perguruan_tinggi COLLATE utf8mb4_general_ci'), '=', 'perguruan_tinggi.nama');
            })
            ->join('tahun_lulus', 'alumni.tahun_lulus', '=', 'tahun_lulus.tahun') // JOIN tambahan ke tahun_lulus
            ->select(
                'perguruan_tinggi.kategori_pt',
                'alumni.tahun_lulus',
                'tahun_lulus.nama_angkatan',
                DB::raw('count(*) as jumlah')
            )
            ->groupBy('perguruan_tinggi.kategori_pt', 'alumni.tahun_lulus', 'tahun_lulus.nama_angkatan')
            ->get();

        $groupedData = $data->groupBy('tahun_lulus');

        // dd($groupedData);

        return view('pages.grafik', compact('groupedData'));
    }
}
