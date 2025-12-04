@extends('layouts.app')

@section('content')
<div class="bg-white p-6 rounded shadow">
  <div class="flex justify-between items-center mb-4">
    <h2 class="text-2xl font-semibold">Dashboard Karyawan</h2>

    <form method="GET" action="{{ route('employees.index') }}" class="flex gap-2">
      <input name="search" value="{{ request('search') }}" placeholder="Cari NIK / Nama / Jabatan" class="border rounded px-3 py-2">
      <button class="px-3 py-2 bg-gray-200 rounded">Cari</button>
    </form>
  </div>

  @if($employees->isEmpty())
    <p class="text-gray-600">Tidak ada data karyawan.</p>
  @else
    <div class="overflow-x-auto">
      <table class="w-full table-auto">
        <thead>
          <tr class="text-left text-sm text-gray-600">
            <th class="px-3 py-2">#</th>
            <th class="px-3 py-2">NIK</th>
            <th class="px-3 py-2">Nama</th>
            <th class="px-3 py-2">Jabatan</th>
            <th class="px-3 py-2">Status</th>
            <th class="px-3 py-2">Kontak</th>
            <th class="px-3 py-2">Aksi</th>
          </tr>
        </thead>
        <tbody>
          @foreach($employees as $index => $emp)
            <tr class="border-t">
              <td class="px-3 py-2">{{ $employees->firstItem() + $index }}</td>
              <td class="px-3 py-2">{{ $emp->nik }}</td>
              <td class="px-3 py-2">{{ $emp->name }}</td>
              <td class="px-3 py-2">{{ $emp->position }}</td>
              <td class="px-3 py-2">{{ $emp->status }}</td>
              <td class="px-3 py-2">{{ $emp->contact }}</td>
              <td class="px-3 py-2">
                <a href="{{ route('employees.edit', $emp) }}" class="text-sm text-blue-600 mr-3">Edit</a>

                <form action="{{ route('employees.destroy', $emp) }}" method="POST" class="inline" onsubmit="return confirm('Hapus data karyawan ini?')">
                  @csrf
                  @method('DELETE')
                  <button class="text-sm text-red-600">Hapus</button>
                </form>
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>

    <div class="mt-4">
      {{ $employees->links() }}
    </div>
  @endif
</div>
@endsection
