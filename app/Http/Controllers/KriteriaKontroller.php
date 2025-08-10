<?php

namespace App\Http\Controllers;

use App\Models\Kriteria;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class KriteriaKontroller extends Controller
{
    public function index()
    {
        $kriteria = Kriteria::get();
        return view('pages.admin.kriteria', ['kriteria' => $kriteria]);
    }

    public function show($id)
    {
        $data = Kriteria::find($id);
        return response()->json(['data' => $data], 200);
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_kriteria' => 'required',
            'deskripsi' => 'required',
            'bobot' => 'required',
            'jenis' => 'required|in:benefit,cost'
        ]);

        Kriteria::create([
            'nama_kriteria' => $request->nama_kriteria,
            'deskripsi' => $request->deskripsi,
            'bobot' => $request->bobot,
            'jenis' => $request->jenis
        ]);

        return response()->json(['message' => 'Kriteria berhasil dibuat'], 201);
    }

    public function update(Request $request, $id)
    {
        $data = Kriteria::find($id);

        $request->validate([
            'nama_kriteria' => 'required',
            'deskripsi' => 'required',
            'bobot' => 'required',
            'jenis' => 'required|in:benefit,cost'
        ]);

        $data->update([
            'nama_kriteria' => $request->nama_kriteria,
            'deskripsi' => $request->deskripsi,
            'bobot' => $request->bobot,
            'jenis' => $request->jenis
        ]);

        return response()->json(['message' => 'Kriteria Berhasil diperbarui'], 200);
    }

    public function destroy($id)
    {
        $data = Kriteria::findOrFail($id);
        $data->delete();
        return response()->json(['message' => 'Kriteria berhasil dihapus']);
    }
}
