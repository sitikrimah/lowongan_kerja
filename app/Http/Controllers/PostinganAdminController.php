<?php

namespace App\Http\Controllers;

use App\Models\Pengajuan;
use App\Models\Perusahaan;
use App\Models\Post;
use App\Models\Testimoni;
use Illuminate\Http\Request;

class PostinganAdminController extends Controller
{
    //
    function show(){
        $data['perusahaan'] = Perusahaan::all();
        $data['posts'] = Post::all();
        $data['pengajuan'] = Pengajuan::all();
        $data['testimoni'] = Testimoni::all();
        // $data['ks'] = Ks::all();
            return view('halamanAdmin.postingan ',$data);
    }
}
