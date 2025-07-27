<?php

namespace App\Http\Controllers;

use App\Models\Tutor;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class TutorController extends Controller
{
    public function index()
    {
        $tutors = Tutor::get();
        return view('pages.admin.tutor', ['tutors' => $tutors]);
    }

    public function show($id)
    {
        $data = Tutor::find($id);
        return response()->json(['data' => $data], 200);
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_tutor' => 'required',
            'nomor_induk' => 'required',
        ]);


        Tutor::create([
            'nama_tutor' => $request->nama_tutor,
            'nomor_induk' => $request->nomor_induk
        ]);

        return response()->json(['message' => 'Tutor berhasil ditambahkan'], 201);
    }

    public function update(Request $request, $id)
    {
        $tutor = Tutor::find($id);

        $request->validate([
            'nama_tutor' => 'required',
            'nomor_induk' => 'required'
        ]);

        $tutor->update([
            'nama_tutor' => $request->nama_tutor,
            'nomor_induk' => $request->nomor_induk
        ]);

        return response()->json(['message' => 'Tutor berhasil di update'], 200);
    }

    public function destroy($id)
    {
        $tutor = Tutor::findOrFail($id);
        $tutor->delete();

        return response()->json(['message' => 'Tutor Berhasil  dihapus']);
    }
}
