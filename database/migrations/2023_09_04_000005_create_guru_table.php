<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('guru', function (Blueprint $table) {
            $table->id();
            $table->string('kode_guru', 10)->unique();
            $table->string('nama_guru', 100);
            $table->string('slug', 120)->unique();
            $table->string('mata_pelajaran', 100)->nullable();
            $table->string('kontak', 20)->nullable();
            $table->enum('role', ['Guru', 'Wali Kelas', 'Waka', 'Staf Kurikulum'])->default('Guru');
            $table->string('password_hash');
            $table->string('password_plain', 12)->nullable()->comment('Password random untuk login awal (ABCD1234)');
            $table->datetime('last_login_at')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('guru');
    }
};
