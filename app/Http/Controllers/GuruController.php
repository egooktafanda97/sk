<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Guru;
use App\Models\User;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Validator;

class GuruController extends Controller
{
    public function index()
    {
        $guru = Guru::query()->orderBy("id", "desc")->get();

        return view('Pages.Guru.indexGuru', compact('guru'));
    }

    public function create()
    {

        return view('Pages.Guru.create');
    }

    public function store(Request $request)
    {
        $user = new User;
        $user->name = $request->input('nama');
        $user->email = $request->input('email'); // Atur email sesuai kebutuhan
        $user->password = bcrypt($request->input('password')); // Anda dapat mengenkripsi password sesuai kebutuhan
        $user->role = 'guru';
        $user->save();

        // Membuat guru dan menghubungkannya dengan pengguna
        $guru = new Guru;
        $guru->user_id = $user->id;
        $guru->nama = $request->input('nama');
        $guru->nuptk = $request->input('nuptk');
        $guru->jabatan = $request->input('jabatan');
        $guru->alamat = $request->input('alamat');
        $guru->jenis_kelamin = $request->input('jenis_kelamin');
        $guru->agama = $request->input('agama');
        $guru->no_hp = $request->input('no_hp');
        $guru->tempat_lahir = $request->input('tempat_lahir');
        $guru->tanggal_lahir = Carbon::parse($request->input('tanggal_lahir'));
        $guru->masa_pensiun = $request->input('masa_pensiun');
        $guru->mulai_bertugas = $request->input('mulai_bertugas');
        $guru->gaji_pokok = $request->input('gaji_pokok');

        $guru->save();

        return redirect()->route('guru.index')->with('success', 'Guru telah ditambahkan.');
    }

    public function edit($id)
    {
        $guru = Guru::where('id', $id)->with('user')->first();
        return view('Pages.guru.edit', compact('guru'));
    }

    public function update(Request $request, $id)
    {
        // Find the existing Guru record to update
        $guru = Guru::findOrFail($id);

        // Update the User information
        $user = User::find($guru->user_id);
        $user->name = $request->input('nama');
        $user->email = $request->input('email');

        // Check if the password field is not empty, then update the password
        if ($request->filled('password')) {
            $user->password = bcrypt($request->input('password'));
        }

        $user->save();

        // Update the Guru information
        $guru->nama = $request->input('nama');
        $guru->nuptk = $request->input('nuptk');
        $guru->jabatan = $request->input('jabatan');
        $guru->alamat = $request->input('alamat');
        $guru->jenis_kelamin = $request->input('jenis_kelamin');
        $guru->agama = $request->input('agama');
        $guru->no_hp = $request->input('no_hp');
        $guru->tempat_lahir = $request->input('tempat_lahir');
        $guru->tanggal_lahir = $request->input('tanggal_lahir');
        $guru->masa_pensiun = $request->input('masa_pensiun');
        $guru->mulai_bertugas = $request->input('mulai_bertugas');
        $guru->gaji_pokok = $request->input('gaji_pokok');

        $guru->save();

        return redirect()->route('guru.index')->with('success', 'Guru telah diperbarui.');
    }

    public function destroy($id)
    {
        // Mendapatkan guru yang akan dihapus
        $guru = Guru::find($id);

        // Menghapus pengguna (user)
        $user = User::find($guru->user_id);
        $user->delete();

        // Menghapus guru
        $guru->delete();

        return redirect()->route('guru.index')->with('success', 'Guru telah dihapus.');
    }
}
