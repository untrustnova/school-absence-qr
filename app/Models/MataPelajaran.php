<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class MataPelajaran extends Model
{
    protected $table = 'mata_pelajaran';
    public $timestamps = false;

    protected $fillable = [
        'kode_mapel',
        'nama_mapel',
        'slug'
    ];

    public function jadwalPembelajaran(): HasMany
    {
        return $this->hasMany(JadwalPembelajaran::class);
    }
}
