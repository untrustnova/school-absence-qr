<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('template_pesan', function (Blueprint $table) {
            $table->id();
            $table->string('kode_template', 50)->unique()->comment('e.g., NOTIF_TELAT, NOTIF_ABSEN');
            $table->string('judul');
            $table->text('isi_pesan');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('template_pesan');
    }
};
