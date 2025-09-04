<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('qr_codes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('kelas_id')->constrained('kelas')->cascadeOnDelete();
            $table->foreignId('guru_id')->constrained('guru')->cascadeOnDelete();
            $table->string('token')->unique();
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('expires_at');

            $table->index('token');
            $table->index('expires_at');
        });
    }

    public function down()
    {
        Schema::dropIfExists('qr_codes');
    }
};
