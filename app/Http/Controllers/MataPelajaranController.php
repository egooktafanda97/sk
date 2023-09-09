<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use App\Models\Kelas;
use Illuminate\Http\Request;
use App\Models\MataPelajaran;

class MataPelajaranController extends Controller
{
    public function index()
    {
        $matapelajaran = MataPelajaran::all();
        return view('Pages.MataPel.show', compact('matapelajaran'));
    }

    public function create()
    {
        $data = [
            "guru" => Guru::all(),
            "kelas" => Kelas::all()
        ];
        return view('Pages.MataPel.store', $data);
    }

    public function store(Request $request)
    {
        MataPelajaran::create([
            'guru_id' => $request->input('guru_id'),
            'kelas_id' => $request->input('kelas_id'), // Anda harus menambahkan kelas_id sesuai dengan data yang diinginkan
            'tahun_ajaran' => $request->input('tahun_ajaran'), // Anda harus menambahkan tahun_ajaran sesuai dengan data yang diinginkan
            'semester' => $request->input('semester'), // Anda harus menambahkan semester sesuai dengan data yang diinginkan
            'nama_matapel' => $request->input('nama_matapel'),
            'alias' => $request->input('alias'), // Anda harus menambahkan alias sesuai dengan data yang diinginkan
            'deskripsi' => $request->input('deskripsi'),
            'status' => $request->input('status'), // Anda harus menambahkan status sesuai dengan data yang diinginkan
        ]);
        return redirect()->route('mata_pelajaran.index')->with('success', 'Mata Pelajaran telah ditambahkan.');
    }

    public function edit($id)
    {
        $matapelajaran = Matapelajaran::find($id);
        $guru = Guru::all();
        $kelas = Kelas::all();

        return view('Pages.MataPel.edit', compact('matapelajaran', 'guru', 'kelas'));
    }

    public function update(Request $request, $id)
    {
        $matapelajaran = Matapelajaran::findOrFail($id);

        $matapelajaran->guru_id = $request->input('guru_id');
        $matapelajaran->kelas_id = $request->input('kelas_id');
        $matapelajaran->tahun_ajaran = $request->input('tahun_ajaran');
        $matapelajaran->semester = $request->input('semester');
        $matapelajaran->nama_matapel = $request->input('nama_matapel');
        $matapelajaran->alias = $request->input('alias');
        $matapelajaran->deskripsi = $request->input('deskripsi');
        $matapelajaran->status = $request->input('status');

        $matapelajaran->save();
        return redirect()->route('mata_pelajaran.index')->with('success', 'Mata Pelajaran telah diperbarui.');
    }

    public function destroy($id)
    {
        $mataPelajaran = MataPelajaran::find($id);
        $mataPelajaran->delete();

        return redirect()->route('mata_pelajaran.index')->with('success', 'Mata Pelajaran telah dihapus.');
    }
}
