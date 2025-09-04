<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('tindak_lanjut', function (Blueprint $table) {
            $table->id();
            $table->foreignId('siswa_id')->constrained('siswa')->cascadeOnDelete();
            $table->foreignId('guru_id')->constrained('guru')->cascadeOnDelete();
            $table->enum('jenis', ['Absensi', 'Perilaku', 'Akademik'])->default('Absensi');
            $table->text('deskripsi_masalah');
            $table->text('tindakan');
            $table->enum('status', ['Open', 'In Progress', 'Resolved', 'Closed'])->default('Open');
            $table->timestamps();

            $table->index('siswa_id');
            $table->index('status');
        });
    }

    public function down()
    {
        Schema::dropIfExists('tindak_lanjut');
    }
};
