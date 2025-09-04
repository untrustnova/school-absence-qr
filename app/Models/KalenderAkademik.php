<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class KalenderAkademik extends Model
{
    protected $table = 'kalender_akademik';

    protected $fillable = [
        'title',
        'start_date',
        'end_date',
        'jenis_acara',
        'keterangan',
        'created_by'
    ];

    protected $casts = [
        'start_date' => 'date',
        'end_date' => 'date'
    ];

    public function creator(): BelongsTo
    {
        return $this->belongsTo(Guru::class, 'created_by');
    }
}
