<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('kalender_akademik', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->date('start_date');
            $table->date('end_date')->nullable();
            $table->enum('jenis_acara', ['Libur Nasional', 'Ujian', 'Kegiatan Sekolah', 'Rapat', 'Lainnya']);
            $table->text('keterangan')->nullable();
            $table->foreignId('created_by')->constrained('guru')->cascadeOnDelete();
            $table->timestamps();

            $table->index(['start_date', 'end_date']);
        });
    }

    public function down()
    {
        Schema::dropIfExists('kalender_akademik');
    }
};
