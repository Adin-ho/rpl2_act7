@extends('layouts.app')

@section('content')
<div class="max-w-md mx-auto bg-white p-6 rounded shadow">
  <h2 class="text-2xl font-semibold mb-4">Register</h2>

  <form method="POST" action="{{ route('register.post') }}">
    @csrf

    <div class="mb-3">
      <label class="block text-sm">Nama</label>
      <input type="text" name="name" value="{{ old('name') }}" required class="w-full border rounded px-3 py-2">
      @error('name') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
    </div>

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

    <div class="mb-3">
      <label class="block text-sm">Konfirmasi Password</label>
      <input type="password" name="password_confirmation" required class="w-full border rounded px-3 py-2">
    </div>

    <div class="mt-4">
      <button class="w-full px-4 py-2 bg-green-600 text-white rounded">Register</button>
    </div>
  </form>
</div>
@endsection
