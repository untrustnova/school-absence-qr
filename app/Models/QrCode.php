<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class QrCode extends Model
{
    protected $table = 'qr_codes';
    public $timestamps = false;

    protected $fillable = [
        'kelas_id',
        'guru_id',
        'token',
        'expires_at'
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'expires_at' => 'datetime'
    ];

    public function kelas(): BelongsTo
    {
        return $this->belongsTo(Kelas::class);
    }

    public function guru(): BelongsTo
    {
        return $this->belongsTo(Guru::class);
    }
}
