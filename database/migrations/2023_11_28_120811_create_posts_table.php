<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->text('image');
            $table->string('judul');
            $table->string('bidang_usaha');
            $table->string('persyaratan');
            $table->string('lowongan_pekerjaan');
            $table->date('tanggal_posting');
            $table->date('tanggal_deadline');
            $table->text('deskripsi');
            $table->string('lokasi') ;
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};
