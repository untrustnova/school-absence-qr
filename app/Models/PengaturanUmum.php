<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PengaturanUmum extends Model
{
    protected $table = 'pengaturan_umum';

    protected $fillable = [
        'nama_sekolah',
        'jam_masuk',
        'jam_pulang',
        'toleransi_keterlambatan',
        'qr_code_duration'
    ];

    protected $casts = [
        'jam_masuk' => 'datetime',
        'jam_pulang' => 'datetime',
        'toleransi_keterlambatan' => 'integer',
        'qr_code_duration' => 'integer'
    ];
}
