<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('kehadiran_siswa', function (Blueprint $table) {
            $table->id();
            $table->foreignId('siswa_id')->constrained('siswa')->cascadeOnDelete();
            $table->foreignId('jadwal_id')->constrained('jadwal_pembelajaran')->cascadeOnDelete();
            $table->datetime('waktu_pertemuan');
            $table->enum('status_kehadiran', ['Hadir', 'Terlambat', 'Izin', 'Sakit', 'Alpha'])->default('Hadir');
            $table->text('keterangan')->nullable();
            $table->enum('metode_catat', ['QR Scan', 'Manual Guru', 'Manual Wali', 'System'])->default('QR Scan');
            $table->timestamps();

            $table->unique(['siswa_id', 'jadwal_id', 'waktu_pertemuan']);
            $table->index('waktu_pertemuan');
            $table->index('status_kehadiran');
        });
    }

    public function down()
    {
        Schema::dropIfExists('kehadiran_siswa');
    }
};
