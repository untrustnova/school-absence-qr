<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('kehadiran_guru', function (Blueprint $table) {
            $table->id();
            $table->foreignId('jadwal_id')->constrained('jadwal_pembelajaran')->cascadeOnDelete();
            $table->foreignId('guru_id')->constrained('guru')->cascadeOnDelete();
            $table->foreignId('guru_pengganti_id')->nullable()->constrained('guru')->nullOnDelete();
            $table->datetime('waktu_pertemuan');
            $table->enum('status_kehadiran', ['Hadir', 'Izin', 'Sakit', 'Alpha', 'Cuti'])->default('Hadir');
            $table->text('keterangan')->nullable();
            $table->timestamps();

            $table->index('waktu_pertemuan');
            $table->index('status_kehadiran');
        });
    }

    public function down()
    {
        Schema::dropIfExists('kehadiran_guru');
    }
};
