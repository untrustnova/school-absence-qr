<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Guru extends Model
{
    protected $table = 'guru';

    protected $fillable = [
        'kode_guru',
        'nama_guru',
        'slug',
        'mata_pelajaran',
        'kontak',
        'role',
        'password_hash',
        'password_plain',
        'last_login_at'
    ];

    protected $hidden = [
        'password_hash',
        'password_plain'
    ];

    protected $casts = [
        'last_login_at' => 'datetime'
    ];

    public function kelasWaliKelas(): HasMany
    {
        return $this->hasMany(Kelas::class, 'wali_kelas_id');
    }

    public function jadwalMengajar(): HasMany
    {
        return $this->hasMany(JadwalPembelajaran::class);
    }

    public function kehadiranGuru(): HasMany
    {
        return $this->hasMany(KehadiranGuru::class);
    }

    public function penggantianKelas(): HasMany
    {
        return $this->hasMany(KehadiranGuru::class, 'guru_pengganti_id');
    }

    public function kalenderAkademik(): HasMany
    {
        return $this->hasMany(KalenderAkademik::class, 'created_by');
    }

    public function notifikasiDikirim(): HasMany
    {
        return $this->hasMany(Notifikasi::class, 'pengirim_id');
    }
}
