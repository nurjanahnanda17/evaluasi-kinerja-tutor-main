<?php

namespace App\Http\Controllers;

use App\Models\Tutor;
use App\Models\Evaluasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KepalaController extends Controller
{
    public function index()
    {
        $rekap = Evaluasi::with('tutor')
            ->select('id_tutor', DB::raw('count(*) as jumlah'), DB::raw('avg(total_nilai) as rata'))
            ->groupBy('id_tutor')->orderBy('rata', "DESC")
            ->get();

                // Hitung jumlah semua Sᵢ (total rata-rata dari seluruh tutor)
                $totalSi = $rekap->sum('rata');

                // Hitung Vᵢ = Sᵢ / total Sᵢ untuk tiap tutor
                foreach ($rekap as $row) {
                $row->vektor_v = $totalSi > 0 ? $row->rata / $totalSi : 0;
                }

        return view('pages.kepala.evaluasi', compact('rekap', ));
    }

    public function show(Tutor $tutor)
    {
        $evaluasi = Evaluasi::with('user', 'evaluasiDetail.kriteria')
            ->where('id_tutor', $tutor->id_tutor)->get();
        return view('pages.kepala.show', compact('tutor', 'evaluasi'));
    }
}
