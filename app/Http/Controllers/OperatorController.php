<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Operator;
use App\Models\User;

class OperatorController extends Controller
{
    public function index()
    {
        $operators = Operator::all();
        return view('Pages.Operator.indexOperator', compact('operators'));
    }

    public function create()
    {
        return view('Pages.Operator.create');
    }

    public function store(Request $request)
    {
        // Membuat pengguna (user)
        $user = new User;
        $user->name = $request->input('nama');
        $user->email = $request->input('username').'@gmail.com'; // Atur email sesuai kebutuhan
        $user->password = bcrypt($request->input('username')); // Anda dapat mengenkripsi password sesuai kebutuhan
        $user->save();

        // Membuat operator dan menghubungkannya dengan pengguna
        $operator = new Operator;
        $operator->user_id = $user->id;
        $operator->nama = $request->input('nama');
        $operator->username = $request->input('username');
        $operator->jabatan = $request->input('jabatan');
        $operator->alamat = $request->input('alamat');
        $operator->jenis_kelamin = $request->input('jenis_kelamin');
        $operator->agama = $request->input('agama');
        $operator->save();

        return redirect()->route('operator.index')->with('success', 'Operator telah dibuat.');
    }

    public function edit($id)
    {
        $data['op'] = Operator::whereId($id)->with('user')->first();
        return view('Pages.Operator.update', $data);
    }

    public function update(Request $request, $id)
    {
        // Mendapatkan operator yang akan diperbarui
        $operator = Operator::find($id);

        // Memperbarui data pengguna (user)
        $user = User::find($operator->user_id);
        $user->name = $request->input('nama');
        // Anda dapat memperbarui email atau password sesuai kebutuhan
        $user->save();

        // Memperbarui data operator
        $operator->nama = $request->input('nama');
        $operator->jabatan = $request->input('jabatan');
        $operator->alamat = $request->input('alamat');
        $operator->jenis_kelamin = $request->input('jenis_kelamin');
        $operator->agama = $request->input('agama');
        $operator->save();

        return redirect()->route('operator.index')->with('success', 'Operator telah diperbarui.');
    }

    public function destroy($id)
    {
        // Mendapatkan operator yang akan dihapus
        $operator = Operator::find($id);

        // Menghapus pengguna (user)
        $user = User::find($operator->user_id);
        $user->delete();

        // Menghapus operator
        $operator->delete();

        return redirect()->route('operator.index')->with('success', 'Operator telah dihapus.');
    }
}
