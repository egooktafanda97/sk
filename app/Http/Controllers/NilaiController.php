<?php

namespace App\Http\Controllers;

use App\Models\AbsensiSiswa;
use App\Models\Guru;
use App\Models\Kelas;
use App\Models\MataPelajaran;
use Illuminate\Http\Request;
use App\Models\Nilai;
use App\Models\Siswa;

class NilaiController extends Controller
{
    public function index()
    {
        $siswa = Siswa::query()->get();
        return view('Pages.Nilai.indexSiswa', compact('siswa'));
    }

    public function create($siswa_id)
    {
        // Mengambil data yang dibutuhkan, seperti daftar mata pelajaran, guru, siswa, dan kelas
        $gurus = Guru::all();
        $findguru = "";
        if (!empty(auth()->user()->id)) {
            $guruChecks = Guru::whereUserId(auth()->user()->id)->first();
            if ($guruChecks) {
                $findguru = $guruChecks;
            }
        }

        $matapelajarans = MataPelajaran::all();

        $siswas = Siswa::find($siswa_id);
        $kelas = Kelas::all();

        return view('Pages.Nilai.store', compact('matapelajarans', 'gurus', 'findguru', 'siswas', 'kelas'));
    }
    public function showNilai($siswa_id)
    {
        // Mengambil data siswa berdasarkan $siswa_id
        $siswa = Siswa::find($siswa_id);

        if (!$siswa) {
            return abort(404); // Tampilkan halaman 404 jika siswa tidak ditemukan
        }

        // Mengambil data nilai yang terkait dengan siswa
        $nilai = Nilai::where('siswa_id', $siswa_id)->get();

        return view('Pages.Nilai.showNilai', compact('siswa', 'nilai'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'mata_pelajaran_id' => 'required',
            'guru_id' => 'required',
            'siswa_id' => 'required',
            'kelas_id' => 'required',
            'semester' => 'required',
            'nilai' => 'required',
        ]);

        $nilai =  Nilai::create([
            'mata_pelajaran_id' => $request->input('mata_pelajaran_id'),
            'guru_id' => $request->input('guru_id'),
            'siswa_id' => $request->input('siswa_id'),
            'kelas_id' => $request->input('kelas_id'),
            'semester' => $request->input('semester'),
            'nilai' => $request->input('nilai'),
        ]);

        $absensi = new AbsensiSiswa();
        $absensi->nilai_id = $nilai->id;
        $absensi->izin = $request->input('nilai');
        $absensi->sakit = $request->input('nilai');
        $absensi->tanpa_keterangan = $request->input('nilai');
        $absensi->keterangan = $request->input('nilai');

        $absensi->save();




        return redirect()->route('nilai-show.index', ['siswa_id' => $request->input('siswa_id')])->with('success', 'Data Nilai telah ditambahkan.');
    }

    public function edit($id)
    {
        $gurus = Guru::all();
        $findguru = "";
        if (!empty(auth()->user()->id)) {
            $guruChecks = Guru::whereUserId(auth()->user()->id)->first();
            if ($guruChecks) {
                $findguru = $guruChecks;
            }
        }

        $matapelajarans = MataPelajaran::all();
        $nilai = Nilai::find($id);
        $siswas = Siswa::find($nilai->siswa->id);
        $kelas = Kelas::all();

        return view('Pages.Nilai.edit', compact('nilai', 'matapelajarans', 'gurus', 'findguru', 'siswas', 'kelas'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'mata_pelajaran_id' => 'required',
            'guru_id' => 'required',
            'siswa_id' => 'required',
            'kelas_id' => 'required',
            'semester' => 'required',
            'nilai' => 'required',
        ]);

        // Cari data nilai yang akan diupdate
        $nilai = Nilai::find($id);

        if (!$nilai) {
            return redirect()->back()->with('error', 'Data Nilai tidak ditemukan.');
        }

        // Update data nilai
        $nilai->mata_pelajaran_id = $request->input('mata_pelajaran_id');
        $nilai->guru_id = $request->input('guru_id');
        $nilai->siswa_id = $request->input('siswa_id');
        $nilai->kelas_id = $request->input('kelas_id');
        $nilai->semester = $request->input('semester');
        $nilai->nilai = $request->input('nilai');
        $nilai->save();

        // Update data absensi
        $absensi = AbsensiSiswa::where('nilai_id', $nilai->id)->first();

        if ($absensi) {
            $absensi->izin = $request->input('izin');
            $absensi->sakit = $request->input('sakit');
            $absensi->tanpa_keterangan = $request->input('tanpa_keterangan');
            $absensi->keterangan = $request->input('keterangan');
            $absensi->save();
        }

        return redirect()->route('nilai-show.index', ['siswa_id' => $request->input('siswa_id')])->with('success', 'Data Nilai telah diperbarui.');
    }

    public function destroy($id)
    {
        $nilai = Nilai::find($id);
        if ($absen = AbsensiSiswa::whereNilaiId($nilai->id)->first())
            $absen->delete();
        $nilai->delete();
        return redirect()->route('nilai.index')->with('success', 'Data Nilai telah dihapus.');
    }
}
