<?php

namespace App\Http\Controllers;

use App\Models\Pengajuan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class PengajuanController extends Controller
{
    //
    function index(){
        $data['pengajuan']=Pengajuan::all();
        return view('pengajuan.index',$data);
    }

    function add(){
        $data = [
            'action'=>url('pengajuan/create'),
            'tombol'=>'simpan',
            'pengajuan' => (object) [
                'nama_lengkap' => '',
                'TTL' => '',
                'tempat' => '',
                'alamat' => '',
                'no_telp' => '',
                'email' => '',
                'deskripsi' =>'',
                // 'foto' => '',
                'dokumen' => '',
                'tanggal_posting' => '',
            ],            
        ];
        return view ('pengajuan.create', $data);

    }
    function create (Request $req){

        Pengajuan::create([

            'nama_lengkap'=>$req->nama_lengkap,
            'TTL'=>$req->TTL,
            'tempat'=>$req->tempat,
            'alamat'=>$req->alamat,
            'no_telp'=>$req->no_telp,
            'email'=>$req->email,
            'deskripsi'=>$req->deskripsi,
            // 'foto' => $req->file('foto')->store('foto'),
            'dokumen'=>$req->dokumen,
            'tanggal_posting'=>$req->tanggal_posting,

        ]);
        return redirect('pengajuan');
    }
    function hapus($id){
        $pengajuan=Pengajuan::where('id',$id)->first();
        $pengajuan->delete();
        // Pengajuan::delete($pengajuan->foto);
        return redirect('pengajuan');
    }
    
    function edit ($id) {
        $data['pengajuan']=Pengajuan::find($id);
        $data['action']= url('pengajuan/update').'/'.$data['pengajuan']->id;
        $data['tombol']='update';
        return view('pengajuan.edit',$data);
    }

    function update(Request $req){

        // if($req->file('foto')){
        //     $pengajuan = Pengajuan::where('id',$req->id)->first();
        //     Storage::delete($pengajuan->foto);
        //     $file= $req->file('foto')->store('foto');
        // }else{
        //     $file=DB::raw('foto');
        // }
        Pengajuan::where('id',$req->id)->update([
            'nama_lengkap'=>$req->nama_lengkap,
            'TTL'=>$req->TTL,
            'tempat'=>$req->tempat,
            'alamat'=>$req->alamat,
            'no_telp'=>$req->no_telp,
            'email'=>$req->email,
            // 'foto' => $file,
            'dokumen'=>$req->dokumen,
            'tanggal_posting'=>$req->tanggal_posting,

        ]);
        return redirect('pengajuan');
    }

    public function show($id){
        $data['pengajuan']=Pengajuan::find($id);


        // $project=Project::find($id);
        return view('pengajuan.show');
    }

    // public function destroy($id){
    //     // dd($id);
    //     // $project=
    //     $hapus = Project::where('id',$id)->first();

    //     $file = public_path('/storage/foto/').$hapus->foto;
    //     //cek gambar jika ada
    //     if(file_exists($file)){
    //         //maka hapus file di polder storage -> foto
    //         @unlink($file);
    //     }
    //     //hapus data di database
    //     $hapus->delete();
    //     return back();

    // }
}
