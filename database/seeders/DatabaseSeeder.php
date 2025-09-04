<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Call the RoleSeeder first
        $this->call(RoleSeeder::class);

        // Create admin user
        $admin = User::create([
            'name' => 'Administrator',
            'email' => 'admin@example.com',
            'username' => 'admin',
            'password' => Hash::make('password'),
        ]);
        $admin->assignRole('Administrator');

        // Create sample management users
        $waka = User::create([
            'name' => 'Waka Kurikulum',
            'email' => 'waka@example.com',
            'username' => 'waka',
            'password' => Hash::make('password'),
        ]);
        $waka->assignRole('Waka Kurikulum');

        $staff = User::create([
            'name' => 'Staff Kurikulum',
            'email' => 'staff@example.com',
            'username' => 'staff',
            'password' => Hash::make('password'),
        ]);
        $staff->assignRole('Staff Kurikulum');

        // Create sample guru
        $guru = User::create([
            'name' => 'Guru',
            'email' => 'guru@example.com',
            'username' => 'guru',
            'password' => Hash::make('password'),
        ]);
        $guru->assignRole('Guru');

        // Create sample wali kelas
        $waliKelas = User::create([
            'name' => 'Wali Kelas',
            'email' => 'walikelas@example.com',
            'username' => 'walikelas',
            'password' => Hash::make('password'),
        ]);
        $waliKelas->assignRole('Wali Kelas');

        // Create sample siswa
        $siswa = User::create([
            'name' => 'Siswa',
            'email' => 'siswa@example.com',
            'username' => 'siswa',
            'password' => Hash::make('password'),
        ]);
        $siswa->assignRole('Siswa');
    }
}
