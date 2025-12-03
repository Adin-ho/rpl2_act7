<!doctype html>
<html lang="id">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>{{ config('app.name','Capital HR') }} - @yield('title')</title>
  @vite(['resources/css/app.css','resources/js/app.js'])
</head>
<body class="bg-gray-100 min-h-screen">
  <nav class="bg-white shadow">
    <div class="container mx-auto px-4 py-3 flex justify-between items-center">
      <a href="{{ route('dashboard') }}" class="font-bold">{{ config('app.name','Capital HR') }}</a>
      <div class="space-x-4">
        @auth
          <a href="{{ route('users.index') }}">Karyawan</a>
          <a href="{{ route('attendance.index') }}">Kehadiran</a>
          <span>{{ auth()->user()->name }}</span>
          <form method="POST" action="{{ route('logout') }}" class="inline">@csrf <button type="submit">Logout</button></form>
        @else
          <a href="{{ route('login') }}">Login</a>
        @endauth
      </div>
    </div>
  </nav>
  <div class="container mx-auto py-6">
    @if(session('success')) <div class="mb-4 p-3 bg-green-100 text-green-700 rounded">{{ session('success') }}</div> @endif
    @yield('content')
  </div>
</body>
</html>
