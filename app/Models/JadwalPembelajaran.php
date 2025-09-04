<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class JadwalPembelajaran extends Model
{
    protected $table = 'jadwal_pembelajaran';

    protected $fillable = [
        'mata_pelajaran_id',
        'guru_id',
        'kelas_id',
        'hari',
        'waktu_mulai',
        'waktu_selesai',
        'ruangan',
        'semester',
        'tahun_ajaran'
    ];

    protected $casts = [
        'waktu_mulai' => 'datetime',
        'waktu_selesai' => 'datetime'
    ];

    public function mataPelajaran(): BelongsTo
    {
        return $this->belongsTo(MataPelajaran::class);
    }

    public function guru(): BelongsTo
    {
        return $this->belongsTo(Guru::class);
    }

    public function kelas(): BelongsTo
    {
        return $this->belongsTo(Kelas::class);
    }

    public function kehadiranGuru(): HasMany
    {
        return $this->hasMany(KehadiranGuru::class, 'jadwal_id');
    }

    public function kehadiranSiswa(): HasMany
    {
        return $this->hasMany(KehadiranSiswa::class, 'jadwal_id');
    }
}
