<?php

use App\Http\Controllers\LandingController;
use App\Http\Controllers\PengajuanAdminController;
use App\Http\Controllers\PerusahaanAdminController;
use App\Http\Controllers\PerusahaanController;
use App\Http\Controllers\PostinganAdminController;
use App\Http\Controllers\TestimoniAdminController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/1', function () {
    return view('klik');
});

Route::get('/', function () {
    return view('landing');
});


Route::get('/a', function () {
    return view('halamanAdmin.halaman_admin');
});
Route::get('/ap', function () {
    return view('halamanAdmin.perusahaan');
});
Route::get('/angan', function () {
    return view('halamanAdmin.postingan');
});
Route::get('/awan', function () {
    return view('halamanAdmin.pengajuan');
});
Route::get('/testi', function () {
    return view('halamanAdmin.testimoni');
});


Route::get('perusahaan',[PerusahaanController::class, 'index'])->name('perusahaan.index');
Route::get('perusahaan/add',[PerusahaanController::class, 'add']);
Route::post('perusahaan/create',[PerusahaanController::class, 'create'])->name('perusahaan.create');
Route::get('perusahaan/show/{id}',[PerusahaanController::class, 'show'])->name('perusahaan.show');
Route::get('perusahaan/edit/{id}',[PerusahaanController::class, 'edit']);
Route::get('perusahaan/hapus/{id}',[PerusahaanController::class, 'hapus']);
Route::post('perusahaan/update/{id}',[PerusahaanController::class, 'update']);


//route resource
Route::resource('/a', \App\Http\Controllers\HalamanAdminController::class);

Route::resource('/posts', \App\Http\Controllers\PostController::class);
// Route::resource('/perusahaan', \App\Http\Controllers\PerusahaanController::class);
Route::resource('/pengajuan', \App\Http\Controllers\PengajuanController::class);
Route::resource('/testimoni', \App\Http\Controllers\TestimoniController::class);

// Route::resource('/ap', \App\Http\Controllers\PerusahaanAdminController::class);
Route::get('/ap', [PerusahaanAdminController::class, 'show']);
Route::get('/angan', [PostinganAdminController::class, 'show']);
Route::get('/awan', [PengajuanAdminController::class, 'show']);
Route::get('/testi', [TestimoniAdminController::class, 'show']);

Route::get('/', [LandingController::class, 'show']);

