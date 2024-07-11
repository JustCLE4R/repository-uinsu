<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Archive;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Database\Seeders\SubjectsSeeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            SubjectsSeeder::class,
        ]);

        User::create([
            'nim' => '0000000000',
            'password' => Hash::make(md5('123')),
            'nama' => 'Admin A',
            'jenis_kelamin' => 'L',
            'email' => 'admin@example.com',
            'telepon' => '081234567890',
            'program_studi' => '-',
            'fakultas' => '-',
            'strata' => '-',
            'foto' => 'admin.png',
            'tahun_masuk' => 2000,
            'role' => 'admin'
        ]);

        User::create([
            'nim' => '123123',
            'password' => Hash::make(md5('123')),
            'nama' => 'Admin B',
            'jenis_kelamin' => 'L',
            'email' => '123123@example.com',
            'telepon' => '081234567890',
            'program_studi' => '-',
            'fakultas' => '-',
            'strata' => '-',
            'foto' => 'admin.png',
            'tahun_masuk' => 2000,
            'role' => 'admin'
        ]);

        User::create([
            'nim' => '12345',
            'password' => Hash::make(md5('123')),
            'nama' => 'Admin C',
            'jenis_kelamin' => 'L',
            'email' => '12345@example.com',
            'telepon' => '081234567890',
            'program_studi' => '-',
            'fakultas' => '-',
            'strata' => '-',
            'foto' => 'admin.png',
            'tahun_masuk' => 2000,
            'role' => 'admin'
        ]);

        Archive::factory(1000)->create();
    }
}
