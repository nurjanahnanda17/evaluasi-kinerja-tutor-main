<?php

namespace App\Http\Controllers;

use App\Exports\EvaluasiExport;
use App\Models\evaluasi;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class EvaluasiController extends Controller
{
    public function index()
    {
        $evaluasi = Evaluasi::with('user', 'tutor')->latest()->get();
        return view('pages.admin.evaluasi.index', ['evaluasi' => $evaluasi]);
    }

    public function show($id)
    {
        $evaluasi = Evaluasi::with('user', 'tutor', 'evaluasiDetail.kriteria')->findOrFail($id);
        return view('pages.admin.evaluasi.show', ['evaluasi' => $evaluasi]);
    }

    public function export()
    {
        return Excel::download(new EvaluasiExport, 'data_evaluasi_tutor.xlsx');
    }
}
