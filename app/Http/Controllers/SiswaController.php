<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use Illuminate\Http\Request;
use App\Models\Siswa;
use App\Models\User;

class SiswaController extends Controller
{
    public function index()
    {
        $siswa = Siswa::query()->get();
        return view('Pages.Siswa.indexSiswa', compact('siswa'));
    }

    public function create()
    {
        $data['kelas'] = Kelas::query()->get();
        return view('Pages.Siswa.store', $data);
    }

    public function store(Request $request)
    {
        $siswa = new Siswa([
            'kelas_id' => $request->kelas_id,
            'nama_siswa' => $request->nama_siswa,
            'nomor_induk' => $request->nomor_induk,
            'panggilan' => $request->panggilan,
            'tempat_lahir' => $request->tempat_lahir,
            'tanggal_lahir' => $request->tanggal_lahir,
            'kelamin' => $request->kelamin,
            'agama' => $request->agama,
            'tk' => $request->tk,
            'alamat' => $request->alamat,
            'nama_ayah' => $request->nama_ayah,
            'nama_ibu' => $request->nama_ibu,
            'pekerjaan_ayah' => $request->pekerjaan_ayah,
            'pekerjaan_ibu' => $request->pekerjaan_ibu,
            'tanggal_masuk' => $request->tanggal_masuk,
            'kepala_sekolah' => $request->kepala_sekolah,
            'status' => $request->status,
        ]);

        // Simpan objek Siswa ke dalam basis data
        $siswa->save();

        // Redirect ke halaman yang sesuai dengan kebutuhan Anda
        return redirect()->route('siswa.index')->with('success', 'Data siswa berhasil disimpan.');
    }

    public function edit($id)
    {
        $siswa = Siswa::findOrFail($id);
        $kelas = Kelas::all();

        return view('Pages.Siswa.edit', compact('siswa', 'kelas'));
    }

    public function update(Request $request, $id)
    {
        // Temukan siswa yang akan diperbarui berdasarkan ID
        $siswa = Siswa::find($id);
        // Perbarui data siswa dengan data baru dari form
        $siswa->kelas_id = $request->kelas_id;
        $siswa->nama_siswa = $request->nama_siswa;
        $siswa->nomor_induk = $request->nomor_induk;
        $siswa->panggilan = $request->panggilan;
        $siswa->tempat_lahir = $request->tempat_lahir;
        $siswa->tanggal_lahir = $request->tanggal_lahir;
        $siswa->kelamin = $request->kelamin;
        $siswa->agama = $request->agama;
        $siswa->tk = $request->tk;
        $siswa->alamat = $request->alamat;
        $siswa->nama_ayah = $request->nama_ayah;
        $siswa->nama_ibu = $request->nama_ibu;
        $siswa->pekerjaan_ayah = $request->pekerjaan_ayah;
        $siswa->pekerjaan_ibu = $request->pekerjaan_ibu;
        $siswa->tanggal_masuk = $request->tanggal_masuk;
        $siswa->kepala_sekolah = $request->kepala_sekolah;
        $siswa->status = $request->status;

        // Simpan perubahan ke dalam basis data
        $siswa->save();

        // Redirect ke halaman yang sesuai dengan kebutuhan Anda
        return redirect()->route('siswa.index')->with('success', 'Data siswa berhasil diperbarui.');
    }

    public function destroy($id)
    {
        // Mendapatkan siswa yang akan dihapus
        $siswa = Siswa::find($id);


        // Menghapus siswa
        $siswa->delete();

        return redirect()->route('siswa.index')->with('success', 'Siswa telah dihapus.');
    }
}
