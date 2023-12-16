<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
        protected $table = 'posts';
        protected $guarded = [];

        //berelasi
        // function posting(){
            //return $this->hasMany(Admin::class,'id_admin)
        //}

        protected $fillable = [
            'image',
            'judul',
            'bidang_usaha',
            'persyaratan',
            'lowongan_pekerjaan',
            'tanggal_posting',
            'tanggal_deadline',
            'deskripsi',
            'lokasi',
        ];                        
}
