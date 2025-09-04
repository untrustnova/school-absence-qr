<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('perizinan', function (Blueprint $table) {
            $table->id();
            $table->foreignId('siswa_id')->constrained('siswa')->cascadeOnDelete();
            $table->foreignId('wali_kelas_id')->constrained('guru')->cascadeOnDelete();
            $table->enum('jenis_izin', ['Sakit', 'Izin', 'Dispensasi Masuk', 'Dispensasi Keluar']);
            $table->text('alasan');
            $table->string('dokumen')->nullable();
            $table->datetime('waktu_mulai');
            $table->datetime('waktu_selesai')->nullable();
            $table->enum('status', ['Pending', 'Disetujui', 'Ditolak'])->default('Pending');
            $table->timestamps();

            $table->index('siswa_id');
            $table->index('status');
            $table->index('waktu_mulai');
        });
    }

    public function down()
    {
        Schema::dropIfExists('perizinan');
    }
};
