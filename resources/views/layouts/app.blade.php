<!doctype html>
{{-- ==================================================================
     resources/views/layouts/app.blade.php
     Layout bersama untuk semua Blade view.
     BONUS: styling pakai Tailwind CSS lewat CDN (tanpa perlu build step).
     ================================================================== --}}
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>@yield('title', 'Tugas Rutin 9 - Setup Laravel')</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-slate-950 text-slate-100 min-h-screen">
  <nav class="border-b border-slate-800 bg-slate-900/60 backdrop-blur">
    <div class="max-w-4xl mx-auto px-6 py-4 flex items-center justify-between">
      <a href="{{ route('home') }}" class="font-bold text-lg tracking-tight">
        <span class="text-pink-500">Tugas</span>Web<span class="text-lime-400">.</span>
      </a>
      <div class="flex gap-5 text-sm font-medium">
        <a href="{{ route('home') }}" class="hover:text-pink-400 {{ request()->routeIs('home') ? 'text-pink-400' : 'text-slate-300' }}">Beranda</a>
        <a href="{{ route('about') }}" class="hover:text-pink-400 {{ request()->routeIs('about') ? 'text-pink-400' : 'text-slate-300' }}">Tentang</a>
        <a href="{{ route('contact') }}" class="hover:text-pink-400 {{ request()->routeIs('contact') ? 'text-pink-400' : 'text-slate-300' }}">Kontak</a>
      </div>
    </div>
  </nav>

  <main class="max-w-4xl mx-auto px-6 py-10">
    @yield('content')
  </main>

  <footer class="max-w-4xl mx-auto px-6 py-8 text-center text-xs text-slate-500">
    Tugas Rutin 9 — Setup Laravel &middot; Pemrograman Web &middot; PSIK 25C
  </footer>
</body>
</html>
