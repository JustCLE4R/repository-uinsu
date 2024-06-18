<?php

namespace Database\Seeders;

use App\Models\Archive;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

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

        for ($i = 0; $i < 1000; $i++) {
            Archive::create([
                "user_id" => fake()->numberBetween(1, 3),
                "type" => fake()->word(),
                "title" => fake()->word(),
                "abstract" => fake()->word(),
                "editor" => fake()->word(),
                "file" => "archives/op9UldzdnFNniThBhjNxUlmJ7wjOoFHWkP9OYonq.png",
                "penerbit" => fake()->word(),
                "tempat_terbit" => fake()->word(),
                "isbn_issn" => fake()->word(),
                "official_url" => fake()->url(),
                "date" => fake()->date('Y-m-d', 'now'),
                "volume" => fake()->numberBetween(1, 1000),
                "number" => fake()->numberBetween(1, 1000),
                "page" => fake()->numberBetween(1, 1000),
                "identification_number" => fake()->numberBetween(1, 1000),
                "journal_name" => fake()->word(),
                "subjek" => fake()->word(),
                "nomor_klasifikasi" => fake()->word(),
                "fakultas" => fake()->randomElement(['Ushuluddin dan Studi Islam', 'Sains dan Teknologi', 'Ekonomi dan Bisnis']),
                'program_studi' => fake()->randomElement(['AQIDAH DAN FILSAFAT ISLAM', 'ILMU KOMPUTER', 'MANAJEMEN', 'AKUNTANSI']),
                "status" => fake()->randomElement(['accepted', 'rejected', 'pending']),
                "reject_reason" => null,
                "accepted_at" => null,
            ]);
        }
    }
}
