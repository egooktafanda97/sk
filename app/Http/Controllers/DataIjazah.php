<?php

namespace App\Http\Controllers;

use App\Helper\helpers;
use App\Models\DataIjazah as ModelsDataIjazah;
use App\Models\Siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DataIjazah extends Controller
{
    public function index()
    {
        $siswa = Siswa::query()->with('ijazah')->get();
        return view('Pages.DataIjazah.index', compact('siswa'));
    }



    public function store(Request $request)
    {
        $up = helpers::Images($request, "files", "file");
        if ($up->status) {
            if ($files = ModelsDataIjazah::whereSiswaId($request->input('siswa_id'))->first()) {
                $inFilses = ModelsDataIjazah::find($files->id);
                $inFilses->nama_file = $up->name;
                $inFilses->path = $up->path;
                $inFilses->save();
            } else {
                ModelsDataIjazah::create([
                    'siswa_id' => $request->input('siswa_id'),
                    'nama_file' => $up->name,
                    'path' => $up->path,
                ]);
            }

            return redirect()->route('data-ijazah.index')->with('success', 'Data Ijazah telah ditambahkan.');
        }
        return redirect()->route('data-ijazah.index')->with('error', 'data gagal diupload.');
    }

    public function edit($id)
    {
        $dataIjazah = ModelsDataIjazah::findOrFail($id);
        $siswa = Siswa::all(); // Sesuaikan dengan model Siswa Anda
        return view('data-ijazah.edit', compact('dataIjazah', 'siswa'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'siswa_id' => 'required',
            'nama_file' => 'required',
        ]);

        $dataIjazah = ModelsDataIjazah::findOrFail($id);

        if ($request->hasFile('file')) {
            // Hapus file lama jika ada
            Storage::delete($dataIjazah->path);

            // Upload file baru
            $file = $request->file('file');
            $nama_file = $file->getClientOriginalName();
            $path = $file->store('path_ke_folder_anda'); // Sesuaikan dengan folder penyimpanan Anda
            $dataIjazah->update([
                'nama_file' => $nama_file,
                'path' => $path,
            ]);
        }

        $dataIjazah->update([
            'siswa_id' => $request->input('siswa_id'),
            'nama_file' => $request->input('nama_file'),
        ]);

        return redirect()->route('data-ijazah.index')->with('success', 'Data Ijazah telah diperbarui.');
    }

    public function destroy($id)
    {
        $dataIjazah = ModelsDataIjazah::findOrFail($id);

        // Hapus file terkait
        Storage::delete($dataIjazah->path);

        $dataIjazah->delete();

        return redirect()->route('data-ijazah.index')->with('success', 'Data Ijazah telah dihapus.');
    }
}
