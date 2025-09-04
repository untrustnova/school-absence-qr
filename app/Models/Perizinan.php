<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Perizinan extends Model
{
    protected $table = 'perizinan';

    protected $fillable = [
        'siswa_id',
        'wali_kelas_id',
        'jenis_izin',
        'alasan',
        'dokumen',
        'waktu_mulai',
        'waktu_selesai',
        'status'
    ];

    protected $casts = [
        'waktu_mulai' => 'datetime',
        'waktu_selesai' => 'datetime'
    ];

    public function siswa(): BelongsTo
    {
        return $this->belongsTo(Siswa::class);
    }

    public function waliKelas(): BelongsTo
    {
        return $this->belongsTo(Guru::class, 'wali_kelas_id');
    }
}
