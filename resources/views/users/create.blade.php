@extends('layouts.app')
@section('title','Tambah Karyawan')
@section('content')
<h2 class="mb-4 font-bold">Tambah Karyawan</h2>
<form action="{{ route('users.store') }}" method="POST" class="bg-white p-4 rounded shadow max-w-lg">
  @csrf
  <div class="mb-2"><label>NIK</label><input name="nik" class="w-full border p-2" value="{{ old('nik') }}"></div>
  <div class="mb-2"><label>Nama</label><input name="name" required class="w-full border p-2" value="{{ old('name') }}"></div>
  <div class="mb-2"><label>Email</label><input name="email" required class="w-full border p-2" value="{{ old('email') }}"></div>
  <div class="mb-2"><label>Phone</label><input name="phone" class="w-full border p-2" value="{{ old('phone') }}"></div>
  <div class="mb-2"><label>Posisi</label><input name="position" class="w-full border p-2" value="{{ old('position') }}"></div>
  <div class="mb-2"><label>Role</label><select name="role" class="w-full border p-2"><option value="employee">Employee</option><option value="hr">HR</option><option value="admin">Admin</option></select></div>
  <div class="mb-2"><label>Password</label><input type="password" name="password" required class="w-full border p-2"></div>
  <div class="mb-2"><label>Confirm Password</label><input type="password" name="password_confirmation" required class="w-full border p-2"></div>
  <div><button class="px-4 py-2 bg-blue-600 text-white rounded">Simpan</button></div>
</form>
@endsection
