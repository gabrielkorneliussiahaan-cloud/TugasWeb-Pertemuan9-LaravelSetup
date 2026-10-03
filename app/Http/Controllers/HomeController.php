<?php

// ====================================================================
// app/Http/Controllers/HomeController.php
// Dibuat dengan: php artisan make:controller HomeController
// REQUIREMENT 4 & 5: 3 route custom, masing-masing mengirim data
//                    dinamis (array) ke Blade view.
// ====================================================================

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use Illuminate\View\View;

class HomeController extends Controller
{
    /**
     * Route "/" -> halaman beranda.
     * REQUIREMENT 5: data dinamis berupa array dikirim dari route/controller.
     */
    public function index(): View
    {
        $profil = [
            'nama'    => 'Gabriel Kornelius Siahaan',
            'kelas'   => 'PSIK 25C',
            'matkul'  => 'Pemrograman Web',
            'tugas'   => 'Tugas Rutin 9 — Setup Laravel',
        ];

        $menu = [
            ['judul' => 'Beranda', 'url' => '/', 'deskripsi' => 'Halaman utama aplikasi'],
            ['judul' => 'Tentang', 'url' => '/about', 'deskripsi' => 'Informasi seputar tugas ini'],
            ['judul' => 'Kontak', 'url' => '/contact', 'deskripsi' => 'Cara menghubungi saya'],
        ];

        return view('home', [
            'profil' => $profil,
            'menu'   => $menu,
        ]);
    }

    /**
     * Route "/about".
     * REQUIREMENT 5: array data ditampilkan secara dinamis di view (foreach),
     * sekaligus REQUIREMENT 6: memanfaatkan Model (Eloquent) hasil
     * `php artisan make:model Mahasiswa -m`.
     */
    public function about(): View
    {
        $tentang = [
            'judul' => 'Tentang Tugas Ini',
            'isi'   => 'Project ini dibuat untuk memenuhi Tugas Rutin 9: Setup Laravel '
                . 'pada mata kuliah Pemrograman Web. Project di-generate dengan '
                . '"composer create-project", lalu ditambah route, controller, '
                . 'model + migration, dan view custom.',
        ];

        // Ambil data dari tabel mahasiswas (hasil make:model -m + seeder).
        // Dibungkus try/catch supaya halaman tetap jalan sebelum migrate dijalankan,
        // dan menunjukkan data tetap "dinamis" (bisa kosong / bisa berisi dari DB).
        try {
            $mahasiswaList = Mahasiswa::orderBy('nama')->get();
        } catch (\Throwable $e) {
            $mahasiswaList = collect();
        }

        return view('about', [
            'tentang'       => $tentang,
            'mahasiswaList' => $mahasiswaList,
        ]);
    }

    /**
     * Route "/contact".
     * REQUIREMENT 5: array data dinamis.
     */
    public function contact(): View
    {
        $kontak = [
            'nama'   => 'Gabriel Kornelius Siahaan',
            'email'  => 'gabrielkorneliussiahaan@gmail.com',
            'kelas'  => 'PSIK 25C',
            'sosial' => [
                ['label' => 'GitHub', 'nilai' => 'github.com/username'],
                ['label' => 'Instagram', 'nilai' => '@username'],
            ],
        ];

        return view('contact', [
            'kontak' => $kontak,
        ]);
    }

    /**
     * BONUS: route parameter -> /hello/{nama}
     */
    public function hello(string $nama): View
    {
        $sapaan = [
            'nama'  => ucwords($nama),
            'waktu' => now()->translatedFormat('l, d F Y H:i'),
        ];

        return view('hello', [
            'sapaan' => $sapaan,
        ]);
    }
}
