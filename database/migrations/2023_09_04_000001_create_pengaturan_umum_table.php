<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('pengaturan_umum', function (Blueprint $table) {
            $table->id();
            $table->string('nama_sekolah');
            $table->time('jam_masuk');
            $table->time('jam_pulang');
            $table->unsignedInteger('toleransi_keterlambatan')->default(15)->comment('Dalam menit');
            $table->unsignedInteger('qr_code_duration')->default(60)->comment('Durasi aktif QR Code dalam detik');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('pengaturan_umum');
    }
};
