<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class KehadiranSiswa extends Model
{
    protected $table = 'kehadiran_siswa';

    protected $fillable = [
        'siswa_id',
        'jadwal_id',
        'waktu_pertemuan',
        'status_kehadiran',
        'keterangan',
        'metode_catat'
    ];

    protected $casts = [
        'waktu_pertemuan' => 'datetime'
    ];

    public function siswa(): BelongsTo
    {
        return $this->belongsTo(Siswa::class);
    }

    public function jadwalPembelajaran(): BelongsTo
    {
        return $this->belongsTo(JadwalPembelajaran::class, 'jadwal_id');
    }
}
