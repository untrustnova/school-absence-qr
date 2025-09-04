<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class TemplatePesan extends Model
{
    protected $table = 'template_pesan';

    protected $fillable = [
        'kode_template',
        'judul',
        'isi_pesan'
    ];

    public function notifikasi(): HasMany
    {
        return $this->hasMany(Notifikasi::class, 'template_id');
    }
}
