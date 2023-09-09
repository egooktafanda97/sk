<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\Siswa;
use Illuminate\Http\Request;

class LaporanController extends Controller
{
    public function siswa(Request $request)
    {
        $kelas = $request->get('kelas');
        $status = $request->get('status');
        $siswa = Siswa::query()->where(function ($query) use ($kelas, $status) {
            if (!empty($kelas))
                $query->where("kelas_id", $kelas);
            if (!empty($status))
                $query->where("status", $status);
        })->get();
        $kelas = Kelas::all();
        return view('Pages.Laporan.rep-siswa', compact('siswa', 'kelas'));
    }
    public function print_siswa(Request $request)
    {
        $kelas = $request->get('kelas');
        $status = $request->get('status');
        $siswa = Siswa::query()->where(function ($query) use ($kelas, $status) {
            if (!empty($kelas))
                $query->where("kelas_id", $kelas);
            if (!empty($status))
                $query->where("status", $status);
        })->get();
        $kelas = Kelas::all();
        return view('Pages.Laporan.print-siswa', compact('siswa', 'kelas'));
    }
}
