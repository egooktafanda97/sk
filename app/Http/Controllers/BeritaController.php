<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Berita;

class BeritaController extends Controller
{
    public function index()
    {
        $berita = Berita::all();
        return view('Pages.Berita.show', compact('berita'));
    }

    public function create()
    {
        return view('Pages.Berita.store');
    }

    public function store(Request $request)
    {
        Berita::create([
           
            'judul' => $request->input('judul'),
            'artikel' => $request->input('artikel'),
        ]);
        return redirect()->route('berita.index')->with('success', 'Berita telah ditambahkan.');
    }

    public function edit($id)
    {
        $berita = Berita::find($id);
       

        return view('Pages.Berita.edit', compact('berita'));
    }

    public function update(Request $request, $id)
    {
        $berita = Berita::findOrFail($id);

        
        $berita->judul = $request->input('judul');
        $berita->artikel = $request->input('artikel');

        $berita->save();
        return redirect()->route('berita.index')->with('success', 'Berita telah diperbarui.');
    }

    public function destroy($id)
    {
        $berita = Berita::find($id);
        $berita->delete();

        return redirect()->route('berita.index')->with('success', 'Mata Pelajaran telah dihapus.');
    }

    public function getId($id)
    {
        $dokter =  Berita::orderBy("id", "DESC")
            ->where("id", $id)
            ->first();
            return view("Pages.Berita.detail", $dokter);
        }

}
