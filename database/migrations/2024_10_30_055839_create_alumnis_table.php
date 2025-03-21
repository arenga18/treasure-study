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
        Schema::create('alumni', function (Blueprint $table) {
            $table->id();
            $table->text('nisn')->nullable();
            $table->text('nama_siswa')->nullable();
            $table->text('kelas')->nullable();
            $table->text('foto')->nullable();
            $table->text('perguruan_tinggi')->nullable();
            $table->text('jurusan')->nullable();
            $table->text('tahun_lulus')->nullable();
            $table->text('sistem_seleksi')->nullable();
            $table->text('jenis_seleksi')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('alumni');
    }
};
