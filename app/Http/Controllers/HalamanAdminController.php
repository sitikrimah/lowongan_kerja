<?php

namespace App\Http\Controllers;

use App\Models\Perusahaan;
use App\Models\Pengajuan;
use App\Models\Post;
use Illuminate\Http\Request;

// use App\Perusahaan;

class HalamanAdminController extends Controller
{
    //
public function index(){
    $jumlah_perusahaan = Perusahaan::count();
    $jumlah_pengajuan = Pengajuan::count();
    $jumlah_postingan = Post::count();
    return view('halamanAdmin.halaman_admin',[
        'jumlah_perusahaan'=>$jumlah_perusahaan,
        'jumlah_pengajuan'=>$jumlah_pengajuan,
        'jumlah_postingan'=>$jumlah_postingan,
    ]);
    // return view('halamanAdmin.halaman_admin')->with('jumlah_perusahaan', $jumlah_perusahaan, 'jumlah_pengajuan', $jumlah_pengajuan, 'jumlah_postingan', $jumlah_postingan);
 }
}
