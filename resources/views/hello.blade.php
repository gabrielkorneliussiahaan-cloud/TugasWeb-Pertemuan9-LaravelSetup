{{-- ==================================================================
     resources/views/hello.blade.php
     BONUS: route parameter -> /hello/{nama}
     ================================================================== --}}
@extends('layouts.app')

@section('title', 'Hello - Tugas Rutin 9')

@section('content')
  <div class="text-center py-16">
    <p class="text-5xl mb-4">👋</p>
    <h1 class="text-3xl font-extrabold mb-2">
      Halo, <span class="text-lime-400">{{ $sapaan['nama'] }}</span>!
    </h1>
    <p class="text-slate-400">Sekarang: {{ $sapaan['waktu'] }}</p>
    <a href="{{ route('home') }}" class="inline-block mt-8 text-pink-400 underline text-sm">&larr; Kembali ke beranda</a>
  </div>
@endsection
