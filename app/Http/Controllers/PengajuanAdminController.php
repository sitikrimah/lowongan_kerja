<?php

namespace App\Http\Controllers;

use App\Models\Pengajuan;
use App\Models\Perusahaan;
use App\Models\Post;
use Illuminate\Http\Request;

class PengajuanAdminController extends Controller
{
    //
    function show(){
        $data['perusahaan'] = Perusahaan::all();
        $data['post'] = Post::all();
        $data['pengajuan'] = Pengajuan::all();
        // $data['ks'] = Ks::all();
            return view('halamanAdmin.pengajuan ',$data);
    }
}
