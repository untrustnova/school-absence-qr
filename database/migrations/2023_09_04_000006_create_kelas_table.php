<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('kelas', function (Blueprint $table) {
            $table->id();
            $table->string('nama_kelas', 50);
            $table->string('slug', 70)->unique();
            $table->foreignId('jurusan_id')->constrained('jurusan')->restrictOnDelete();
            $table->string('tahun_ajaran', 9);
            $table->unsignedInteger('kapasitas')->default(0);
            $table->foreignId('wali_kelas_id')->nullable()->constrained('guru')->nullOnDelete();
            $table->timestamps();

            $table->index('jurusan_id');
            $table->index('wali_kelas_id');
        });
    }

    public function down()
    {
        Schema::dropIfExists('kelas');
    }
};
