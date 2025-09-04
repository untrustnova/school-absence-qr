<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('notifikasi', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pengirim_id')->nullable()->constrained('guru')->nullOnDelete();
            $table->unsignedBigInteger('penerima_id');
            $table->enum('jenis_penerima', ['Siswa', 'Guru']);
            $table->foreignId('template_id')->nullable()->constrained('template_pesan')->nullOnDelete();
            $table->string('judul');
            $table->text('isi');
            $table->boolean('dibaca')->default(false);
            $table->boolean('terkirim')->default(false)->comment('Flag untuk integrasi WhatsApp/Email');
            $table->timestamps();

            $table->index(['penerima_id', 'jenis_penerima']);
            $table->index('dibaca');
        });
    }

    public function down()
    {
        Schema::dropIfExists('notifikasi');
    }
};
