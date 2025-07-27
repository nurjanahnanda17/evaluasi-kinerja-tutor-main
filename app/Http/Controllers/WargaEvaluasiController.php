<?php

namespace App\Http\Controllers;

use App\Models\Tutor;
use App\Models\Evaluasi;
use App\Models\Kriteria;
use Illuminate\Http\Request;
use App\Models\EvaluasiDetail;
use Illuminate\Support\Facades\Auth;

class WargaEvaluasiController extends Controller
{
    public function index()
    {
        return view('pages.student.index', [
            'tutors' => Tutor::all(),
            'kriteria' => Kriteria::all()
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_tutor' => 'required',
            'nilai' => 'required|array',
        ]);

        $total = 1;
        foreach ($request->nilai as $id_kriteria => $nilai) {
            $bobot = Kriteria::find($id_kriteria)?->bobot ?? 0;
            $total *= pow($nilai, $bobot/100);
        }

        $evaluasi = Evaluasi::create([
            'id_user' => Auth::user()->id_user,
            'id_tutor' => $request->id_tutor,
            'total_nilai' => $total,
        ]);

        foreach ($request->nilai as $id_kriteria => $nilai) {
            EvaluasiDetail::create([
                'id_evaluasi' => $evaluasi->id_evaluasi,
                'id_kriteria' => $id_kriteria,
                'nilai' => $nilai,
            ]);
        }

        return response()->json(['message' => 'Evaluasi berhasil'], 201);
    }
}
