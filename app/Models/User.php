<?php

namespace App\Models;

use App\Traits\HasRoles;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, HasRoles, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'username',
        'password',
        'avatar',
        'phone',
        'last_login_at',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
        'last_login_at' => 'datetime',
    ];

    /**
     * Check if the user is an administrator
     */
    public function isAdmin(): bool
    {
        return $this->hasRole('Administrator');
    }

    /**
     * Check if the user is part of school management (Waka, Staff, Kesiswaan)
     */
    public function isManagement(): bool
    {
        return $this->hasAnyRole(['Waka Kurikulum', 'Staff Kurikulum', 'Kesiswaan']);
    }

    /**
     * Check if the user is a class officer
     */
    public function isPengurusKelas(): bool
    {
        return $this->hasRole('Pengurus Kelas');
    }

    /**
     * Check if the user is a teacher
     */
    public function isGuru(): bool
    {
        return $this->hasRole('Guru');
    }

    /**
     * Check if the user is a class guardian
     */
    public function isWaliKelas(): bool
    {
        return $this->hasRole('Wali Kelas');
    }

    /**
     * Check if the user is a student
     */
    public function isSiswa(): bool
    {
        return $this->hasRole('Siswa');
    }
}
