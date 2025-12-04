@extends('layouts.app')

@section('content')
<div class="max-w-md mx-auto bg-white p-6 rounded shadow">
  <h2 class="text-2xl font-semibold mb-4">Login</h2>

  <form method="POST" action="{{ route('login.post') }}">
    @csrf

    <div class="mb-3">
      <label class="block text-sm">Email</label>
      <input type="email" name="email" value="{{ old('email') }}" required class="w-full border rounded px-3 py-2">
      @error('email') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
    </div>

    <div class="mb-3">
      <label class="block text-sm">Password</label>
      <input type="password" name="password" required class="w-full border rounded px-3 py-2">
      @error('password') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
    </div>

    <div class="flex items-center justify-between">
      <div>
        <label class="inline-flex items-center">
          <input type="checkbox" name="remember" class="mr-2"> Remember me
        </label>
      </div>

      <div>
        <a href="{{ route('register') }}" class="text-sm text-blue-600">Register</a>
      </div>
    </div>

    <div class="mt-4">
      <button class="w-full px-4 py-2 bg-blue-600 text-white rounded">Login</button>
    </div>
  </form>
</div>
@endsection
