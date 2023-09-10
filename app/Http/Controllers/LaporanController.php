<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\Nilai;
use App\Models\Siswa;
use Illuminate\Http\Request;

class LaporanController extends Controller
{
    public function siswa(Request $request)
    {
        $kelas = $request->get('kelas');
        $status = $request->get('status');
        $nama = $request->get('nama');
        $siswa = Siswa::query()->where(function ($query) use ($kelas, $status, $nama) {
            if (!empty($kelas))
                $query->where("kelas_id", $kelas);
            if (!empty($status))
                $query->where("status", $status);
            if (!empty($nama))
                $query->where("nama_siswa", "LIKE", "%" . $nama . "%");
        })->get();
        $kelas = Kelas::all();
        return view('Pages.Laporan.rep-siswa', compact('siswa', 'kelas'));
    }
    public function print_siswa(Request $request)
    {
        $kelas = $request->get('kelas');
        $status = $request->get('status');
        $nama = $request->get('nama');
        $siswa = Siswa::query()->where(function ($query) use ($kelas, $status, $nama) {
            if (!empty($kelas))
                $query->where("kelas_id", $kelas);
            if (!empty($status))
                $query->where("status", $status);
            if (!empty($nama))
                $query->where("nama_siswa", "LIKE", "%" . $nama . "%");
        })->get();
        $kelas = Kelas::all();
        return view('Pages.Laporan.print-siswa', compact('siswa', 'kelas'));
    }
    public function siswa_nilai(Request $request)
    {
        $kelas = $request->get('kelas');
        $status = $request->get('status');
        $nama = $request->get('nama');
        $siswa = Siswa::query()->where(function ($query) use ($kelas, $status, $nama) {
            if (!empty($kelas))
                $query->where("kelas_id", $kelas);
            if (!empty($status))
                $query->where("status", $status);
            if (!empty($nama))
                $query->where("nama_siswa", "LIKE", "%" . $nama . "%");
        })->get();
        $kelas = Kelas::all();
        return view('Pages.Laporan.rep-nilai', compact('siswa', 'kelas'));
    }
    public function repNilai(Request $request, $siswa_id)
    {
        $kelas = $request->get('kelas');
        $semester = $request->get('semester');
        // Mengambil data siswa berdasarkan $siswa_id
        $siswa = Siswa::find($siswa_id);

        if (!$siswa) {
            return abort(404); // Tampilkan halaman 404 jika siswa tidak ditemukan
        }

        // Mengambil data nilai yang terkait dengan siswa
        $nilai = Nilai::where('siswa_id', $siswa_id)->where(function ($q) use ($kelas, $semester) {
            if (!empty($kelas))
                $q->where("kelas_id", $kelas);
            if (!empty($semester))
                $q->where("semester", $semester);
        })->get();
        $kelas = Kelas::all();
        return view('Pages.Laporan.rep-nilai-siswa', compact('siswa', 'nilai', 'kelas'));
    }
    public function printsNilai(Request $request, $siswa_id)
    {

        $kelas = $request->get('kelas');
        $semester = $request->get('semester');
        // Mengambil data siswa berdasarkan $siswa_id
        $siswa = Siswa::find($siswa_id);

        if (!$siswa) {
            return abort(404); // Tampilkan halaman 404 jika siswa tidak ditemukan
        }

        // Mengambil data nilai yang terkait dengan siswa
        $nilai = Nilai::where('siswa_id', $siswa_id)->where(function ($q) use ($kelas, $semester) {
            if (!empty($kelas))
                $q->where("kelas_id", $kelas);
            if (!empty($semester))
                $q->where("semester", $semester);
        })->get();
        return view('Pages.Laporan.prints-nilai-siswa', compact('siswa', 'nilai', 'kelas'));
    }
}
