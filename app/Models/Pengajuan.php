<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengajuan extends Model
{
    use HasFactory;
    protected $fillable = [
    'nama_lengkap',
    'TTL',
    'tempat',
    'alamat',
    'no_telp',
    'email',
    'image',
    'dokumen',
    'tanggal_posting',
    ];
}
