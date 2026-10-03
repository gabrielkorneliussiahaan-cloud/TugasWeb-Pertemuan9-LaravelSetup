{{-- ==================================================================
     resources/views/home.blade.php
     REQUIREMENT 4: view untuk route "/"
     REQUIREMENT 5: menampilkan array data dinamis ($profil, $menu)
                    yang dikirim dari HomeController@index.
     ================================================================== --}}
@extends('layouts.app')

@section('title', 'Beranda - Tugas Rutin 9')

@section('content')
  <p class="text-pink-400 text-xs font-semibold tracking-widest uppercase mb-2">Tugas Pertemuan 9</p>
  <h1 class="text-3xl font-extrabold mb-6">
    Halo, saya <span class="text-lime-400">{{ $profil['nama'] }}</span> 👋
  </h1>

  <div class="rounded-xl border border-slate-800 bg-slate-900/60 p-6 mb-8">
    <dl class="grid grid-cols-1 sm:grid-cols-3 gap-4 text-sm">
      <div>
        <dt class="text-slate-500 uppercase text-xs mb-1">Kelas</dt>
        <dd class="font-semibold">{{ $profil['kelas'] }}</dd>
      </div>
      <div>
        <dt class="text-slate-500 uppercase text-xs mb-1">Mata Kuliah</dt>
        <dd class="font-semibold">{{ $profil['matkul'] }}</dd>
      </div>
      <div>
        <dt class="text-slate-500 uppercase text-xs mb-1">Tugas</dt>
        <dd class="font-semibold">{{ $profil['tugas'] }}</dd>
      </div>
    </dl>
  </div>

  <h2 class="text-lg font-bold mb-4">Menu Halaman</h2>
  {{-- REQUIREMENT 5: array $menu dirender dinamis dengan @foreach, bukan hardcode --}}
  <div class="grid gap-4 sm:grid-cols-3">
    @foreach ($menu as $item)
      <a href="{{ $item['url'] }}" class="block rounded-xl border border-slate-800 bg-slate-900/60 p-5 hover:border-pink-500 transition">
        <p class="font-bold mb-1">{{ $item['judul'] }}</p>
        <p class="text-sm text-slate-400">{{ $item['deskripsi'] }}</p>
      </a>
    @endforeach
  </div>

  <p class="mt-10 text-sm text-slate-500">
    Coba juga route bonus dengan parameter:
    <a href="{{ route('hello', ['nama' => 'budi']) }}" class="text-lime-400 underline">/hello/budi</a>
  </p>
@endsection
