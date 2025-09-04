<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('jadwal_pembelajaran', function (Blueprint $table) {
            $table->id();
            $table->foreignId('mata_pelajaran_id')->constrained('mata_pelajaran')->cascadeOnDelete();
            $table->foreignId('guru_id')->constrained('guru')->cascadeOnDelete();
            $table->foreignId('kelas_id')->constrained('kelas')->cascadeOnDelete();
            $table->enum('hari', ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu']);
            $table->time('waktu_mulai');
            $table->time('waktu_selesai');
            $table->string('ruangan', 50)->nullable();
            $table->enum('semester', ['Ganjil', 'Genap']);
            $table->string('tahun_ajaran', 9);
            $table->timestamps();

            $table->unique(['kelas_id', 'hari', 'waktu_mulai']);
            $table->index('guru_id');
            $table->index('hari');
        });
    }

    public function down()
    {
        Schema::dropIfExists('jadwal_pembelajaran');
    }
};
