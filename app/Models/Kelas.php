<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Kelas extends Model
{
    protected $table = 'kelas';

    protected $fillable = [
        'nama_kelas',
        'slug',
        'jurusan_id',
        'tahun_ajaran',
        'kapasitas',
        'wali_kelas_id'
    ];

    protected $casts = [
        'kapasitas' => 'integer'
    ];

    public function jurusan(): BelongsTo
    {
        return $this->belongsTo(Jurusan::class);
    }

    public function waliKelas(): BelongsTo
    {
        return $this->belongsTo(Guru::class, 'wali_kelas_id');
    }

    public function siswa(): HasMany
    {
        return $this->hasMany(Siswa::class);
    }

    public function jadwalPembelajaran(): HasMany
    {
        return $this->hasMany(JadwalPembelajaran::class);
    }

    public function qrCodes(): HasMany
    {
        return $this->hasMany(QrCode::class);
    }
}
