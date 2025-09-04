<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class KehadiranGuru extends Model
{
    protected $table = 'kehadiran_guru';

    protected $fillable = [
        'jadwal_id',
        'guru_id',
        'guru_pengganti_id',
        'waktu_pertemuan',
        'status_kehadiran',
        'keterangan'
    ];

    protected $casts = [
        'waktu_pertemuan' => 'datetime'
    ];

    public function jadwalPembelajaran(): BelongsTo
    {
        return $this->belongsTo(JadwalPembelajaran::class, 'jadwal_id');
    }

    public function guru(): BelongsTo
    {
        return $this->belongsTo(Guru::class);
    }

    public function guruPengganti(): BelongsTo
    {
        return $this->belongsTo(Guru::class, 'guru_pengganti_id');
    }
}
