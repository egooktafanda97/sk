<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use App\Models\Siswa;
use Illuminate\Http\Request;

class homeController extends Controller
{

    public function index()
    {
        $guru = Guru::query()->get()->count();
        $siswa = Siswa::query()->where("status", "aktif")->get()->count();
        $alumni = Siswa::query()->where("status", "alumni")->get()->count();
        return view('Pages.dashboard.index', compact("guru", "siswa", "alumni"));
    }
}
