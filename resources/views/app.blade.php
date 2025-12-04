<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width,initial-scale=1" />
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>{{ config('app.name', 'Capital HR') }}</title>

  {{-- Tailwind CDN (untuk development cepat). Untuk produksi gunakan build asset --}}
  <link href="https://unpkg.com/tailwindcss@^3/dist/tailwind.min.css" rel="stylesheet">

  @stack('styles')
</head>
<body class="bg-gray-100 min-h-screen font-sans text-gray-800">

  {{-- Navbar --}}
  <nav class="bg-white border-b shadow-sm">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <div class="flex justify-between h-16 items-center">
        <div class="flex items-center gap-4">
          <a href="{{ route('home') }}" class="flex items-center gap-3">
            <svg class="w-8 h-8 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 11c0 3.866-3.582 7-8 7v2h16v-2c-4.418 0-8-3.134-8-7zM12 11a4 4 0 100-8 4 4 0 000 8z" />
            </svg>
            <span class="font-semibold text-lg">{{ config('app.name', 'Capital HR') }}</span>
          </a>
        </div>

        <div class="hidden md:flex items-center space-x-6">
          <a href="{{ route('home') }}" class="text-sm hover:text-blue-600">Home</a>

          @auth
            @if (auth()->user()->role === 'admin')
              <a href="{{ route('employees.index') }}" class="text-sm hover:text-blue-600">Dashboard</a>
            @endif

            <span class="text-sm text-gray-500">|</span>

            <div class="flex items-center space-x-3">
              <span class="text-sm text-gray-600">Hi, <span class="font-medium">{{ auth()->user()->name }}</span></span>

              <form action="{{ route('logout') }}" method="POST" class="inline">
                @csrf
                <button type="submit" class="text-sm px-3 py-1 border rounded hover:bg-gray-50">Logout</button>
              </form>
            </div>
          @endauth

          @guest
            <a href="{{ route('login') }}" class="text-sm px-3 py-1 border rounded hover:bg-gray-50">Login</a>
            {{-- Jika ada route register --}}
            @if (Route::has('register'))
              <a href="{{ route('register') }}" class="text-sm px-3 py-1 bg-blue-600 text-white rounded hover:opacity-90">Register</a>
            @endif
          @endguest
        </div>

        {{-- Mobile menu button --}}
        <div class="md:hidden">
          <button id="mobile-menu-button" class="p-2 rounded focus:outline-none focus:ring">
            <svg id="menu-open" class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M4 6h16M4 12h16M4 18h16" />
            </svg>
            <svg id="menu-close" class="w-6 h-6 hidden" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M6 18L18 6M6 6l12 12" />
            </svg>
          </button>
        </div>

      </div>
    </div>

    {{-- Mobile menu content --}}
    <div id="mobile-menu" class="md:hidden hidden border-t bg-white">
      <div class="px-4 py-3 space-y-2">
        <a href="{{ route('home') }}" class="block text-sm">Home</a>

        @auth
          @if (auth()->user()->role === 'admin')
            <a href="{{ route('employees.index') }}" class="block text-sm">Dashboard</a>
          @endif

          <div class="pt-2 border-t">
            <div class="text-sm text-gray-600">Hi, {{ auth()->user()->name }}</div>
            <form action="{{ route('logout') }}" method="POST" class="mt-2">
              @csrf
              <button type="submit" class="w-full text-left text-sm px-3 py-2 border rounded">Logout</button>
            </form>
          </div>
        @endauth

        @guest
          <a href="{{ route('login') }}" class="block text-sm">Login</a>
          @if (Route::has('register'))
            <a href="{{ route('register') }}" class="block text-sm">Register</a>
          @endif
        @endguest
      </div>
    </div>
  </nav>

  {{-- Main container --}}
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6">

    {{-- Flash messages --}}
    @if (session('success'))
      <div class="mb-4 bg-green-50 border border-green-200 text-green-800 px-4 py-3 rounded">
        {{ session('success') }}
      </div>
    @endif

    @if (session('error'))
      <div class="mb-4 bg-red-50 border border-red-200 text-red-800 px-4 py-3 rounded">
        {{ session('error') }}
      </div>
    @endif

    {{-- Validation errors --}}
    @if ($errors->any())
      <div class="mb-4 bg-yellow-50 border border-yellow-200 text-yellow-800 px-4 py-3 rounded">
        <div class="font-medium">Terjadi kesalahan:</div>
        <ul class="mt-2 list-disc list-inside text-sm">
          @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
    @endif

    {{-- Page content --}}
    @yield('content')
  </div>

  {{-- Footer --}}
  <footer class="mt-10">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6 text-sm text-gray-500">
      <div class="flex justify-between items-center">
        <div>© {{ date('Y') }} {{ config('app.name', 'Capital HR') }}. All rights reserved.</div>
        <div class="hidden sm:block">Built with Laravel & Tailwind</div>
      </div>
    </div>
  </footer>

  @stack('scripts')

  <script>
    // Mobile menu toggle
    const btn = document.getElementById('mobile-menu-button')
    const menu = document.getElementById('mobile-menu')
    const openIcon = document.getElementById('menu-open')
    const closeIcon = document.getElementById('menu-close')

    if (btn) {
      btn.addEventListener('click', () => {
        menu.classList.toggle('hidden')
        openIcon.classList.toggle('hidden')
        closeIcon.classList.toggle('hidden')
      })
    }
  </script>
</body>
</html>
