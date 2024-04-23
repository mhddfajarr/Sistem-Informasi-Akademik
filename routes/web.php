<?php


use App\Models\Role;
use GuzzleHttp\Middleware;
use App\Http\Controllers\G_nilai;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\NilaiController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\ExportController;
use App\Http\Controllers\G_guruController;
use App\Http\Controllers\JadwalController;
use App\Http\Controllers\G_nilaiController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\S_siswaController;
use App\Http\Controllers\G_materiController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\G_profileController;

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

Route::get('/', [LoginController::class, 'index'])->middleware('guest');

Route::group(['middleware' => 'TU'], function () {
    Route::get('/profile', [ProfileController::class, 'index']);
    Route::patch('/editProfile', [ProfileController::class, 'update']);


    Route::get('/dataKelas', [SiswaController::class, 'kelas']);
    Route::get('/register', [RegisterController::class, 'index']);
    Route::get('registrasi', [RegisterController::class, 'index']);
    Route::post('registrasi', [RegisterController::class, 'prosesGuru']);
    Route::get('registrasi/siswa', [RegisterController::class, 'siswa']);
    Route::post('registrasi/siswa', [RegisterController::class, 'prosesSiswa']);
    Route::get('registrasi/TU', [RegisterController::class, 'TU']);
    Route::post('registrasi/TU', [RegisterController::class, 'prosesTU']);
    Route::get('/dataKelas/{kelas:id}', [SiswaController::class, 'index']);
    Route::get('/detailSiswa/{siswa:id}', [SiswaController::class, 'detailSiswa']);
    Route::get('/dataGuru', [GuruController::class, 'index']);
    Route::get('/detailGuru/{guru:id}', [GuruController::class, 'detailGuru']);

    Route::get('/kelasNilai', [NilaiController::class, 'index']);
    Route::get('/nilaiSiswa/{kelas:id}', [NilaiController::class, 'nilaiSiswa']);

    Route::get('/editSiswa/{siswa:id}', [SiswaController::class, 'editSiswa']);
    Route::put('/editDataSiswa/{siswa:id}', [SiswaController::class, 'update']);
    // Route::delete('/hapusSiswa/{id}', [SiswaController::class, 'delete']);

    Route::get('/editGuru/{guru:id}', [GuruController::class, 'editGuru']);
    Route::put('/editDataGuru/{guru:id}', [GuruController::class, 'update']);
    Route::delete('/hapusGuru/{guru:id}', [GuruController::class, 'delete']);

    Route::get('exportNilai_TU/{id}', [ExportController::class, 'exportNilai']);

    Route::get('/jadwal', [JadwalController::class, 'index']);
    Route::get('/jadwal/tambahJadwal', [JadwalController::class, 'tambahJadwal']);
    Route::post('/tambahJadwal', [JadwalController::class, 'store']);
    Route::patch('/editJadwal/{jadwal:id}', [JadwalController::class, 'update']);
    Route::get('/editJadwal/{jadwal:id}', [JadwalController::class, 'edit']);
    Route::delete('/hapusJadwal/{jadwal:id}', [JadwalController::class, 'destroy']);
    Route::get('/tambahKelas', [SiswaController::class, 'tambahKelas']);
    Route::post('/tambahKelas', [SiswaController::class, 'prosesKelas']);
});
Route::delete('/hapusSiswa/{id}', [SiswaController::class, 'delete'])->name('siswa.delete');
Route::post('editDataSiswa/{siswa:id}', [SiswaController::class, 'update']);


Route::get('editProfile/{data_login:id}', [ProfileController::class, 'edit']);

Route::group(['middleware' => 'Guru',], function () {
    Route::get('/G_profile', [G_profileController::class, 'index']);
    Route::get('/G_dataKelas', [G_guruController::class, 'kelas']);

    Route::get('/G_dataKelas/{kelas:id}', [G_guruController::class, 'siswa']);
    Route::get('/G_detailSiswa/{siswa:id}', [G_guruController::class, 'detailSiswa']);
    Route::get('/G_dataGuru', [G_guruController::class, 'dataGuru']);
    Route::get('/G_detailGuru/{guru:id}', [G_guruController::class, 'detailGuru']);
    Route::get('/G_jadwal', [G_guruController::class, 'jadwal']);
    Route::get('/G_kelasNilai', [G_nilaiController::class, 'index']);
    Route::get('/G_kelasNilai/{kelas:id}', [G_nilaiController::class, 'nilaiSiswa'])->name('G_kelasNilaiSiswa');

    Route::get('/inputNilai/{siswa:id}', [G_nilaiController::class, 'input']);
    Route::get('/editNilai/{siswa:id}', [G_nilaiController::class, 'edit']);
    Route::post('/addNilai', [G_nilaiController::class, 'store']);
    Route::delete('/hapusNilai/{siswa:id}', [G_nilaiController::class, 'destroy']);

    Route::get('G_editProfile', [G_profileController::class, 'edit']);
    Route::patch('G_editProfile', [G_profileController::class, 'update']);

    Route::get('/uploadMateri', [G_materiController::class, 'uploadMateri']);
    Route::get('/materi', [G_materiController::class, 'index']);
    Route::get('/downloadMateri/{materi:id}', [G_materiController::class, 'download']);
    Route::post('/uploadMateri', [G_materiController::class, 'store']);
    Route::delete('/hapusMateri/{materi:id}', [G_materiController::class, 'destroy']);
    Route::get('exportNilai/{id}', [ExportController::class, 'exportNilai']);
});

Route::group(['middleware' => 'Siswa',], function () {
    Route::get('/S_jadwal', [S_siswaController::class, 'index']);
    Route::get('/S_dataGuru', [s_siswaController::class, 'dataGuru']);
    Route::get('/S_detailGuru/{guru:id}', [S_siswaController::class, 'detailGuru']);
    Route::get('/S_kelasNilai', [S_siswaController::class, 'kelasNilai']);
    Route::get('/downloadMateri/{materi:id}', [S_siswaController::class, 'download']);
    Route::get('/S_nilaiSiswa/{kelas:id}', [S_siswaController::class, 'nilaiSiswa']);
    Route::get('/S_materi', [S_siswaController::class, 'materi']);
    Route::get('/S_profile', [S_siswaController::class, 'profile']);
    Route::get('S_editProfile', [S_siswaController::class, 'editProfile']);
    Route::patch('S_editProfile', [S_siswaController::class, 'updateProfile']);
});



Route::get('/login', [LoginController::class, 'index'])->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);

Route::get('logout', [LoginController::class, 'logout']);

//
