<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('siswa', function (Blueprint $table) {
            $table->id();
            $table->string('nisn', 10)->unique();
            $table->string('nama_siswa', 100);
            $table->string('slug', 120)->unique();
            $table->foreignId('kelas_id')->constrained('kelas')->restrictOnDelete();
            $table->string('tempat_lahir', 100)->nullable();
            $table->date('tanggal_lahir')->nullable();
            $table->text('alamat')->nullable();
            $table->string('nama_wali', 100)->nullable();
            $table->string('kontak_wali', 20)->nullable();
            $table->enum('status', ['Aktif', 'Lulus', 'Pindah', 'Drop Out'])->default('Aktif');
            $table->datetime('last_login_at')->nullable();
            $table->softDeletes();
            $table->timestamps();

            $table->index('kelas_id');
            $table->index('status');
            $table->index('nisn');
        });
    }

    public function down()
    {
        Schema::dropIfExists('siswa');
    }
};
