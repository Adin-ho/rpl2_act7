@extends('layouts.app')
@section('title','Tambah Kehadiran')
@section('content')
<h2 class="mb-4 font-bold">Tambah Kehadiran</h2>
<form action="{{ route('attendance.store') }}" method="POST" class="bg-white p-4 rounded shadow max-w-md">
  @csrf
  <div class="mb-2"><label>User</label>
    <select name="user_id" class="w-full border p-2">
      @foreach($users as $u)<option value="{{ $u->id }}">{{ $u->name }}</option>@endforeach
    </select>
  </div>
  <div class="mb-2"><label>Tanggal</label><input type="date" name="date" class="w-full border p-2" value="{{ old('date', now()->toDateString()) }}"></div>
  <div class="mb-2"><label>Status</label>
    <select name="status" class="w-full border p-2">
      <option value="hadir">Hadir</option>
      <option value="izin">Izin</option>
      <option value="sakit">Sakit</option>
      <option value="alpha">Alpha</option>
    </select>
  </div>
  <div class="mb-2"><label>Note</label><textarea name="note" class="w-full border p-2">{{ old('note') }}</textarea></div>
  <div><button class="px-4 py-2 bg-blue-600 text-white rounded">Simpan</button></div>
</form>
@endsection
