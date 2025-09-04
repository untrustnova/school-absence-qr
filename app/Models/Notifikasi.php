<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Notifikasi extends Model
{
    protected $table = 'notifikasi';

    protected $fillable = [
        'pengirim_id',
        'penerima_id',
        'jenis_penerima',
        'template_id',
        'judul',
        'isi',
        'dibaca',
        'terkirim'
    ];

    protected $casts = [
        'dibaca' => 'boolean',
        'terkirim' => 'boolean'
    ];

    public function pengirim(): BelongsTo
    {
        return $this->belongsTo(Guru::class, 'pengirim_id');
    }

    public function template(): BelongsTo
    {
        return $this->belongsTo(TemplatePesan::class, 'template_id');
    }
}
