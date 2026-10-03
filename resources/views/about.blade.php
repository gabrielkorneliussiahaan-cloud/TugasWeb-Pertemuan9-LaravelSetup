{{-- ==================================================================
     resources/views/about.blade.php
     REQUIREMENT 4 & 5: view untuk route "/about", data dinamis ($tentang)
     REQUIREMENT 6: menampilkan data dari Model Mahasiswa (Eloquent).
     ================================================================== --}}
@extends('layouts.app')

@section('title', 'Tentang - Tugas Rutin 9')

@section('content')
  <p class="text-pink-400 text-xs font-semibold tracking-widest uppercase mb-2">Tentang</p>
  <h1 class="text-3xl font-extrabold mb-4">{{ $tentang['judul'] }}</h1>
  <p class="text-slate-300 leading-relaxed mb-10">{{ $tentang['isi'] }}</p>

  <h2 class="text-lg font-bold mb-4">Data Mahasiswa (dari database, via Eloquent Model)</h2>

  <div class="rounded-xl border border-slate-800 overflow-hidden">
    <table class="w-full text-sm">
      <thead class="bg-slate-900 text-slate-400 uppercase text-xs">
        <tr>
          <th class="text-left px-4 py-3">Nama</th>
          <th class="text-left px-4 py-3">NIM</th>
          <th class="text-left px-4 py-3">Kelas</th>
        </tr>
      </thead>
      <tbody>
        @forelse ($mahasiswaList as $mhs)
          <tr class="border-t border-slate-800">
            <td class="px-4 py-3 font-medium">{{ $mhs->nama }}</td>
            <td class="px-4 py-3 text-slate-400">{{ $mhs->nim }}</td>
            <td class="px-4 py-3 text-slate-400">{{ $mhs->kelas }}</td>
          </tr>
        @empty
          <tr>
            <td colspan="3" class="px-4 py-6 text-center text-slate-500">
              Belum ada data. Jalankan <code class="text-lime-400">php artisan migrate --seed</code> dulu.
            </td>
          </tr>
        @endforelse
      </tbody>
    </table>
  </div>
@endsection
