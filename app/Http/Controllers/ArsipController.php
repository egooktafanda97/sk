<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Arsip;

class ArsipController extends Controller
{
    public function index()
    {
        $arsips = Arsip::all();
        return view('arsip.index', compact('arsips'));
    }

    public function create()
    {
        return view('arsip.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_arsip' => 'required',
            'jenis_arsip' => 'required',
            'path' => 'required',
            'mime_type' => 'required',
        ]);

        Arsip::create([
            'nama_arsip' => $request->input('nama_arsip'),
            'jenis_arsip' => $request->input('jenis_arsip'),
            'path' => $request->input('path'),
            'mime_type' => $request->input('mime_type'),
        ]);

        return redirect()->route('arsip.index')->with('success', 'Arsip telah ditambahkan.');
    }

    public function edit($id)
    {
        $arsip = Arsip::find($id);
        return view('arsip.edit', compact('arsip'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_arsip' => 'required',
            'jenis_arsip' => 'required',
            'path' => 'required',
            'mime_type' => 'required',
        ]);

        $arsip = Arsip::find($id);
        $arsip->update([
            'nama_arsip' => $request->input('nama_arsip'),
            'jenis_arsip' => $request->input('jenis_arsip'),
            'path' => $request->input('path'),
            'mime_type' => $request->input('mime_type'),
        ]);

        return redirect()->route('arsip.index')->with('success', 'Arsip telah diperbarui.');
    }

    public function destroy($id)
    {
        $arsip = Arsip::find($id);
        $arsip->delete();

        return redirect()->route('arsip.index')->with('success', 'Arsip telah dihapus.');
    }
}
