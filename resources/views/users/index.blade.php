@extends('layouts.app')
@section('title','Daftar Karyawan')
@section('content')
<div class="flex justify-between items-center mb-4">
  <h2 class="text-xl font-bold">Daftar Karyawan</h2>
  <a class="bg-blue-600 text-white px-4 py-2 rounded" href="{{ route('users.create') }}">Tambah</a>
</div>

<form class="mb-4 flex gap-2" method="GET">
  <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari..." class="border p-2">
  <select name="per_page" onchange="this.form.submit()" class="border p-2">
    <option value="10" {{ request('per_page')==10 ? 'selected':'' }}>10</option>
    <option value="20" {{ request('per_page')==20 ? 'selected':'' }}>20</option>
    <option value="50" {{ request('per_page')==50 ? 'selected':'' }}>50</option>
  </select>
  <button class="px-3 py-1 bg-gray-200">Cari</button>
</form>

<table class="w-full bg-white rounded shadow">
  <thead class="bg-gray-50"><tr><th>NIK</th><th>Nama</th><th>Posisi</th><th>Email</th><th>Role</th><th>Aksi</th></tr></thead>
  <tbody>
    @foreach($users as $u)
    <tr class="border-t">
      <td>{{ $u->nik }}</td>
      <td>{{ $u->name }}</td>
      <td>{{ $u->position }}</td>
      <td>{{ $u->email }}</td>
      <td>{{ $u->role }}</td>
      <td>
        <a href="{{ route('users.edit',$u) }}" class="text-blue-600">Edit</a>
        <form action="{{ route('users.destroy',$u) }}" method="POST" style="display:inline">@csrf @method('DELETE') <button onclick="return confirm('Hapus?')" class="text-red-600 ml-2">Hapus</button></form>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>

<div class="mt-4">
  {{ $users->withQueryString()->links() }}
</div>
@endsection
