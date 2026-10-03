<?php

// ====================================================================
// database/seeders/MahasiswaSeeder.php
// Seed data contoh untuk tabel mahasiswas (dipakai di halaman /about).
// Jalankan lewat: php artisan db:seed
// ====================================================================

namespace Database\Seeders;

use App\Models\Mahasiswa;
use Illuminate\Database\Seeder;

class MahasiswaSeeder extends Seeder
{
    public function run(): void
    {
        $data = [
            ['nama' => 'Gabriel Kornelius Siahaan', 'nim' => '2125010001', 'kelas' => 'PSIK 25C'],
            ['nama' => 'Andi Pratama',               'nim' => '2125010002', 'kelas' => 'PSIK 25C'],
            ['nama' => 'Siti Rahma',                 'nim' => '2125010003', 'kelas' => 'PSIK 25C'],
            ['nama' => 'Budi Santoso',               'nim' => '2125010004', 'kelas' => 'PSIK 25C'],
            ['nama' => 'Clara Angelina',             'nim' => '2125010005', 'kelas' => 'PSIK 25C'],
        ];

        foreach ($data as $row) {
            Mahasiswa::updateOrCreate(['nim' => $row['nim']], $row);
        }
    }
}
