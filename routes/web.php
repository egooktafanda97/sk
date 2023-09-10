<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('Layout.main');
});


Route::get('/dashboard', function () {
    return view('Layout.main');
});

// Route::get('/operator', function () {
//     return view('Pages.Operator.indexOperator');
// });
// Route::get('/guru', function () {
//     return view('Pages.Guru.indexGuru');
// });
// Route::get('/siswa', function () {
//     return view('Pages.Siswa.indexSiswa');
// });

Route::get('/', [\App\Http\Controllers\WebsiteController::class, "index"]);
Route::get('/about', [\App\Http\Controllers\WebsiteController::class, 'about']);
Route::get('/kontak', [\App\Http\Controllers\WebsiteController::class, 'kontak']);
Route::get('/visimisi', [\App\Http\Controllers\WebsiteController::class, 'visimisi']);
Route::group([
    'prefix' => "berita"
], function ($router) {
    Route::get('/', [\App\Http\Controllers\BeritawebController::class, 'show']);
    Route::get('/get-all', [\App\Http\Controllers\BeritawebController::class, 'getAll']);
    Route::get('/beritaview/{id}', [\App\Http\Controllers\BeritawebController::class, 'getId']);
});



Route::get('/login', [\App\Http\Controllers\Auth::class, 'halamanlogin'])->name('login');
Route::get('/login/logout', [\App\Http\Controllers\Auth::class, 'logout'])->name('logout');
Route::post('/postlogin', [\App\Http\Controllers\Auth::class, 'postlogin'])->name('postlogin');
Route::get('/logout', [\App\Http\Controllers\Auth::class, 'logout'])->name('logout');

route::group(['middleware' => ['auth']], function () {
    Route::get('/home', [\App\Http\Controllers\homeController::class, 'index'])->name('home');
});

Route::group([
    'middleware' =>  ["auth"],
    'prefix' => "news"
], function ($router) {
    Route::get('/', [\App\Http\Controllers\BeritaController::class, 'index'])->name('berita.index');
    Route::get('/create', [\App\Http\Controllers\BeritaController::class, 'create'])->name('berita.create');
    Route::post('/store', [\App\Http\Controllers\BeritaController::class, 'store'])->name('berita.store');
    Route::get('/{id}/edit', [\App\Http\Controllers\BeritaController::class, 'edit'])->name('berita.edit');
    Route::put('/{id}/update', [\App\Http\Controllers\BeritaController::class, 'update'])->name('berita.update');
    Route::get('/{id}/destroy', [\App\Http\Controllers\BeritaController::class, 'destroy'])->name('berita.destroy');
    Route::get('/detail/{id}', [\App\Http\Controllers\BeritaController::class, 'getId']);
});

Route::group([
    'middleware' =>  ["auth"],
    'prefix' => "operator"
], function ($router) {
    Route::get('/', [\App\Http\Controllers\OperatorController::class, 'index'])->name('operator.index');
    Route::get('/create', [\App\Http\Controllers\OperatorController::class, 'create'])->name('operator.create');
    Route::post('/store', [\App\Http\Controllers\OperatorController::class, 'store'])->name('operator.store');
    Route::get('/{id}/edit', [\App\Http\Controllers\OperatorController::class, 'edit'])->name('operator.edit');
    Route::post('/{id}/update', [\App\Http\Controllers\OperatorController::class, 'update'])->name('operator.update');
    Route::get('/{id}/destroy', [\App\Http\Controllers\OperatorController::class, 'destroy'])->name('operator.destroy');
});

Route::group([
    'middleware' =>  ["auth"],
    'prefix' => "guru"
], function ($router) {
    Route::get('/', [\App\Http\Controllers\GuruController::class, 'index'])->name('guru.index');
    Route::get('/create', [\App\Http\Controllers\GuruController::class, 'create'])->name('guru.create');
    Route::post('/store', [\App\Http\Controllers\GuruController::class, 'store'])->name('guru.store');
    Route::get('/{id}/edit', [\App\Http\Controllers\GuruController::class, 'edit'])->name('guru.edit');
    Route::post('/{id}/update', [\App\Http\Controllers\GuruController::class, 'update'])->name('guru.update');
    Route::get('/{id}/destroy', [\App\Http\Controllers\GuruController::class, 'destroy'])->name('guru.destroy');
});

Route::group([
    'middleware' =>  ["auth"],
    'prefix' => "kelas"
], function ($router) {
    Route::get('/', [\App\Http\Controllers\KelasController::class, 'index'])->name('kelas.index');
    Route::get('/create', [\App\Http\Controllers\KelasController::class, 'create'])->name('kelas.create');
    Route::post('/store', [\App\Http\Controllers\KelasController::class, 'store'])->name('kelas.store');
    Route::get('/{id}/edit', [\App\Http\Controllers\KelasController::class, 'edit'])->name('kelas.edit');
    Route::put('/{id}/update', [\App\Http\Controllers\KelasController::class, 'update'])->name('kelas.update');
    Route::delete('/{id}/destroy', [\App\Http\Controllers\KelasController::class, 'destroy'])->name('kelas.destroy');
});

Route::group([
    'middleware' =>  ["auth"],
    'prefix' => "mata-pelajaran"
], function ($router) {

    Route::get('/', [\App\Http\Controllers\MataPelajaranController::class, 'index'])->name('mata_pelajaran.index');
    Route::get('/create', [\App\Http\Controllers\MataPelajaranController::class, 'create'])->name('mata_pelajaran.create');
    Route::post('/store', [\App\Http\Controllers\MataPelajaranController::class, 'store'])->name('mata_pelajaran.store');
    Route::get('/{id}/edit', [\App\Http\Controllers\MataPelajaranController::class, 'edit'])->name('mata_pelajaran.edit');
    Route::put('/{id}/update', [\App\Http\Controllers\MataPelajaranController::class, 'update'])->name('mata_pelajaran.update');
    Route::get('/{id}/destroy', [\App\Http\Controllers\MataPelajaranController::class, 'destroy'])->name('mata_pelajaran.destroy');
});

Route::group([
    'middleware' =>  ["auth"],
    'prefix' => "nilai"
], function ($router) {
    Route::get('/', [\App\Http\Controllers\NilaiController::class, 'index'])->name('nilai.index');
    Route::get('/{siswa_id}/show-nilai', [\App\Http\Controllers\NilaiController::class, 'showNilai'])->name('nilai-show.index');
    Route::get('/{siswa_id}/create', [\App\Http\Controllers\NilaiController::class, 'create'])->name('nilai.create');
    Route::post('/store', [\App\Http\Controllers\NilaiController::class, 'store'])->name('nilai.store');
    Route::get('/{id}/edit', [\App\Http\Controllers\NilaiController::class, 'edit'])->name('nilai.edit');
    Route::put('/{id}/update', [\App\Http\Controllers\NilaiController::class, 'update'])->name('nilai.update');
    Route::delete('/{id}/destroy', [\App\Http\Controllers\NilaiController::class, 'destroy'])->name('nilai.destroy');
});

Route::group([
    'middleware' =>  ["auth"],
    'prefix' => "arsip"
], function ($router) {
    Route::get('/', [\App\Http\Controllers\ArsipController::class, 'index'])->name('arsip.index');
    Route::get('/create', [\App\Http\Controllers\ArsipController::class, 'create'])->name('arsip.create');
    Route::post('/store', [\App\Http\Controllers\ArsipController::class, 'store'])->name('arsip.store');
    Route::get('/{id}/edit', [\App\Http\Controllers\ArsipController::class, 'edit'])->name('arsip.edit');
    Route::put('/{id}/update', [\App\Http\Controllers\ArsipController::class, 'update'])->name('arsip.update');
    Route::delete('/{id}/destroy', [\App\Http\Controllers\ArsipController::class, 'destroy'])->name('arsip.destroy');
});

Route::group([
    'middleware' =>  ["auth"],
    'prefix' => "siswa"
], function ($router) {
    Route::get('/', [\App\Http\Controllers\SiswaController::class, 'index'])->name('siswa.index');
    Route::get('/create', [\App\Http\Controllers\SiswaController::class, 'create'])->name('siswa.create');
    Route::post('/store', [\App\Http\Controllers\SiswaController::class, 'store'])->name('siswa.store');
    Route::get('/{id}/edit', [\App\Http\Controllers\SiswaController::class, 'edit'])->name('siswa.edit');
    Route::put('/{id}/update', [\App\Http\Controllers\SiswaController::class, 'update'])->name('siswa.update');
    Route::get('/{id}/destroy', [\App\Http\Controllers\SiswaController::class, 'destroy'])->name('siswa.destroy');
});

Route::group([
    'middleware' =>  ["auth"],
    'prefix' => "data-ijazah"
], function ($router) {
    Route::get('/', [\App\Http\Controllers\DataIjazah::class, 'index'])->name('data-ijazah.index');
    Route::get('/create', [\App\Http\Controllers\DataIjazah::class, 'create'])->name('data-ijazah.create');
    Route::post('/store', [\App\Http\Controllers\DataIjazah::class, 'store'])->name('data-ijazah.store');
    Route::get('/{id}/edit', [\App\Http\Controllers\DataIjazah::class, 'edit'])->name('data-ijazah.edit');
    Route::put('/{id}/update', [\App\Http\Controllers\DataIjazah::class, 'update'])->name('data-ijazah.update');
    Route::get('/{id}/destroy', [\App\Http\Controllers\DataIjazah::class, 'destroy'])->name('data-ijazah.destroy');
});


Route::group([
    'middleware' =>  ["auth"],
    'prefix' => "laporan"
], function ($router) {
    Route::get('/siswa', [\App\Http\Controllers\LaporanController::class, 'siswa']);
    Route::get('/print-siswa', [\App\Http\Controllers\LaporanController::class, 'print_siswa'])->name("print_siswa");
    Route::get('/siswa-nilai', [\App\Http\Controllers\LaporanController::class, 'siswa_nilai'])->name("nilai-siswa");
    Route::get('/{id}/nilai', [\App\Http\Controllers\LaporanController::class, 'repNilai'])->name("laporan-nilai");
    Route::get('/{id}/print-nilai', [\App\Http\Controllers\LaporanController::class, 'printsNilai'])->name("print-nilai");
});
