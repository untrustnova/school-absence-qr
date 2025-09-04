<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('log_aktivitas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->enum('user_type', ['Siswa', 'Guru', 'Admin']);
            $table->string('aktivitas')->comment('e.g., LOGIN, SCAN_QR, INPUT_ABSEN');
            $table->text('deskripsi')->nullable();
            $table->string('ip_address', 45)->nullable();
            $table->text('user_agent')->nullable();
            $table->timestamp('created_at')->useCurrent();

            $table->index(['user_id', 'user_type']);
            $table->index('created_at');
        });
    }

    public function down()
    {
        Schema::dropIfExists('log_aktivitas');
    }
};
