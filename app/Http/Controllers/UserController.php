<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {

        $users = User::latest()->get();
        return view("pages.admin.users", ['users' => $users]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'email' => 'required|email',
            'password' => 'required',
            'role' => 'required'
        ]);


        User::create([
            'nama' => $request->nama,
            'email' => $request->email,
            'password' => $request->password,
            'role' => $request->role,
        ]);

        return response()->json(['message' => 'User berhasil ditambahkan'], 201);
    }

    public function show($id)
    {
        $data = User::find($id);
        return response()->json(['data' => $data]);
    }

    public  function update(Request $request, $id)
    {
        $data = User::find($id);

        $request->validate([
            'nama' => 'required',
            'email' => 'required',
            'role' => 'required'
        ]);

        $data->update([
            'nama' => $request->nama,
            'email' => $request->email,
            'role' => $request->role,
        ]);

        return response()->json(['message' => 'User berhasil diupdate'], 200);
    }

    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();
        return response()->json(['message' => 'User berhasil dihapus'], 200);
    }
}
