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
            $table->text('nisn');
            $table->text('nama_siswa');
            $table->text('kelas');
            $table->text('foto')->nullable();
            $table->text('perguruan_tinggi');
            $table->text('jurusan');
            $table->text('tahun_lulus');
            $table->text('sistem_seleksi');
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
