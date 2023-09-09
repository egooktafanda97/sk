<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kelas;

class KelasController extends Controller
{
    public function index()
    {
        $kelas = Kelas::all();
        return view('kelas.index', compact('kelas'));
    }

    public function create()
    {
        return view('kelas.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'wali_user_id' => 'required',
            'nama_kelas' => 'required',
        ]);

        Kelas::create([
            'wali_user_id' => $request->input('wali_user_id'),
            'nama_kelas' => $request->input('nama_kelas'),
        ]);

        return redirect()->route('kelas.index')->with('success', 'Kelas telah ditambahkan.');
    }

    public function edit($id)
    {
        $kelas = Kelas::find($id);
        return view('kelas.edit', compact('kelas'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'wali_user_id' => 'required',
            'nama_kelas' => 'required',
        ]);

        $kelas = Kelas::find($id);
        $kelas->update([
            'wali_user_id' => $request->input('wali_user_id'),
            'nama_kelas' => $request->input('nama_kelas'),
        ]);

        return redirect()->route('kelas.index')->with('success', 'Kelas telah diperbarui.');
    }

    public function destroy($id)
    {
        $kelas = Kelas::find($id);
        $kelas->delete();

        return redirect()->route('kelas.index')->with('success', 'Kelas telah dihapus.');
    }
}
