<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roles = [
            [
                'name' => 'Administrator',
                'description' => 'Super admin yang memiliki akses penuh ke sistem',
            ],
            [
                'name' => 'Waka Kurikulum',
                'description' => 'Wakil Kepala Sekolah bagian Kurikulum',
            ],
            [
                'name' => 'Staff Kurikulum',
                'description' => 'Staff bagian Kurikulum',
            ],
            [
                'name' => 'Kesiswaan',
                'description' => 'Petugas bagian Kesiswaan',
            ],
            [
                'name' => 'Pengurus Kelas',
                'description' => 'Pengurus/Admin Kelas',
            ],
            [
                'name' => 'Guru',
                'description' => 'Guru pengajar mata pelajaran',
            ],
            [
                'name' => 'Wali Kelas',
                'description' => 'Guru yang menjadi wali kelas',
            ],
            [
                'name' => 'Siswa',
                'description' => 'Siswa/Pelajar',
            ],
        ];

        foreach ($roles as $role) {
            Role::create([
                'name' => $role['name'],
                'slug' => Str::slug($role['name']),
                'description' => $role['description'],
            ]);
        }
    }
}
