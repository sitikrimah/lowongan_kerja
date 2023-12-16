<?php

namespace App\Http\Controllers;

use App\Models\Perusahaan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class PerusahaanController extends Controller
{
    //

    function index(){
        $data['perusahaan']=Perusahaan::all();
        return view('perusahaan.index',$data);
    }

    function add(){
        $data = [
            'action'=>url('perusahaan/create'),
            'tombol'=>'simpan',
            'perusahaan'=>(object)[
                'name'=>'',
                'deskripsi'=>'',
                'foto'=>'',
            ],
        ];
        return view ('perusahaan.create', $data);

    }
    function create (Request $req){
        Perusahaan::create([

            'name'=>$req->name,
            'deskripsi'=>$req->deskripsi,
            'foto' => $req->file('foto')->store('foto'),
        ]);
        // return redirect('project');
        return redirect('perusahaan');
    }
    function hapus($id){
        $perusahaan=Perusahaan::where('id',$id)->first();
        $perusahaan->delete();
        Perusahaan::delete($perusahaan->foto);
        return redirect('perusahaan');
    }
    
    function edit ($id) {
        $data['perusahaan']=Perusahaan::find($id);
        $data['action']= url('perusahaan/update').'/'.$data['perusahaan']->id;
        $data['tombol']='update';
        return view('perusahaan.edit',$data);
    }

    function update(Request $req){

        if($req->file('foto')){
            $perusahaan = Perusahaan::where('id',$req->id)->first();
            Storage::delete($perusahaan->foto);
            $file= $req->file('foto')->store('foto');
        }else{
            $file=DB::raw('foto');
        }
        Perusahaan::where('id',$req->id)->update([
            'name'=>$req->name,
            'deskripsi'=>$req->deskripsi,
            'foto' => $file
        ]);
        return redirect('perusahaan');
    }

    public function show($id){
        $data['perusahaan']=Perusahaan::find($id);


        // $project=Project::find($id);
        return view('perusahaan.show');
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

