<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Siswa extends Model
{
    use SoftDeletes;

    protected $table = 'siswa';

    protected $fillable = [
        'nisn',
        'nama_siswa',
        'slug',
        'kelas_id',
        'tempat_lahir',
        'tanggal_lahir',
        'alamat',
        'nama_wali',
        'kontak_wali',
        'status',
        'last_login_at'
    ];

    protected $casts = [
        'tanggal_lahir' => 'date',
        'last_login_at' => 'datetime',
        'deleted_at' => 'datetime'
    ];

    public function kelas(): BelongsTo
    {
        return $this->belongsTo(Kelas::class);
    }

    public function kehadiranSiswa(): HasMany
    {
        return $this->hasMany(KehadiranSiswa::class);
    }

    public function perizinan(): HasMany
    {
        return $this->hasMany(Perizinan::class);
    }

    public function tindakLanjut(): HasMany
    {
        return $this->hasMany(TindakLanjut::class);
    }
}
