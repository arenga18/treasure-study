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
        Schema::create('kinerja_semesters', function (Blueprint $table) {
            $table->id();
            $table->string('nisn');
            $table->string('semester')->unique();
            $table->string('ips_terakhir')->nullable();
            $table->string('kendala')->nullable();
            $table->string('kendala_lain')->nullable();
            $table->string('matkul_disukai')->nullable();
            $table->string('matkul_sulit')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kinerja_semesters');
    }
};
