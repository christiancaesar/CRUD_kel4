<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    public function create()
    {
        return view('mahasiswa.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nim'           => 'required|unique:mahasiswas,nim',
            'nama'          => 'required|string|max:255',
            'jenis_kelamin' => 'required|in:L,P',
            'jurusan'       => 'required|string|max:255',
            'alamat'        => 'required|string',
        ]);

        Mahasiswa::create($validated);

        return redirect()->route('mahasiswa.index')
                         ->with('success', 'Data mahasiswa berhasil ditambahkan');
    }

    public function index()
    {
        $mahasiswas = Mahasiswa::all();
        return view('mahasiswa.index', compact('mahasiswas'));
    }

    public function destroy($id)
    {
        $mahasiswa = Mahasiswa::findOrFail($id);

        $mahasiswa->delete();

        return redirect()->route('mahasiswa.index')->with('success', 'Data mahasiswa berhasil dihapus');
    }
}