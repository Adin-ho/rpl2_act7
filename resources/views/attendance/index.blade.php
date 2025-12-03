@extends('layouts.app')
@section('title','Kehadiran')
@section('content')
<div class="flex justify-between items-center mb-4">
  <h2 class="text-xl font-bold">Kehadiran</h2>
  <a href="{{ route('attendance.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded">Tambah Kehadiran</a>
</div>

<form class="mb-4 flex gap-2" method="GET">
  <select name="user_id" class="border p-2">
    <option value="">Semua</option>
    @foreach($users as $u)<option value="{{ $u->id }}" {{ request('user_id') == $u->id ? 'selected' : '' }}>{{ $u->name }}</option>@endforeach
  </select>
  <input type="month" name="month" value="{{ request('month') }}" class="border p-2">
  <button class="px-3 py-1 bg-gray-200">Filter</button>
</form>

<table class="w-full bg-white rounded shadow">
  <thead class="bg-gray-50"><tr><th>Tanggal</th><th>Nama</th><th>Status</th><th>Note</th><th>Aksi</th></tr></thead>
  <tbody>
    @foreach($attendances as $a)
    <tr class="border-t">
      <td>{{ $a->date->format('Y-m-d') }}</td>
      <td>{{ $a->user->name }}</td>
      <td>{{ $a->status }}</td>
      <td>{{ $a->note }}</td>
      <td>
        <form action="{{ route('attendance.destroy',$a) }}" method="POST" style="display:inline">@csrf @method('DELETE')<button onclick="return confirm('Hapus?')" class="text-red-600">Hapus</button></form>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>

<div class="mt-4">
  {{ $attendances->withQueryString()->links() }}
</div>
@endsection
