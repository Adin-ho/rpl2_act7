@extends('layouts.app')

@section('content')
<div class="bg-white p-6 rounded shadow">
  <h2 class="text-2xl font-semibold mb-4">Tambah Data Karyawan</h2>

  <form action="{{ route('employees.store') }}" method="POST" class="space-y-4">
    @csrf

    <div>
      <label class="block text-sm font-medium">NIK</label>
      <input type="text" name="nik" value="{{ old('nik') }}" class="w-full border rounded px-3 py-2">
      @error('nik') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
    </div>

    <div>
      <label class="block text-sm font-medium">Nama</label>
      <input type="text" name="name" value="{{ old('name') }}" class="w-full border rounded px-3 py-2">
      @error('name') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
    </div>

    <div>
      <label class="block text-sm font-medium">Jabatan</label>
      <input type="text" name="position" value="{{ old('position') }}" class="w-full border rounded px-3 py-2">
      @error('position') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
    </div>

    <div>
      <label class="block text-sm font-medium">Status</label>
      <select name="status" class="w-full border rounded px-3 py-2">
        <option value="Active" @selected(old('status') == 'Active')>Active</option>
        <option value="Non-Active" @selected(old('status') == 'Non-Active')>Non-Active</option>
      </select>
      @error('status') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
    </div>

    <div>
      <label class="block text-sm font-medium">Kontak</label>
      <input type="text" name="contact" value="{{ old('contact') }}" class="w-full border rounded px-3 py-2">
      @error('contact') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
    </div>

    <div class="flex items-center gap-3">
      <button class="px-4 py-2 bg-blue-600 text-white rounded">Simpan</button>
      <a href="{{ route('employees.index') }}" class="text-sm text-gray-600">Lihat Dashboard</a>
    </div>
  </form>
</div>

<div class="mt-6">
  <h3 class="text-xl font-semibold mb-2">Data Terbaru</h3>
  <div class="bg-white p-4 rounded shadow">
    @if($recent->isEmpty())
      <p class="text-gray-600">Belum ada data karyawan.</p>
    @else
      <ul class="space-y-2">
        @foreach($recent as $e)
          <li class="border-b pb-2">
            <div class="flex justify-between">
              <div>
                <div class="font-medium">{{ $e->name }} <span class="text-sm text-gray-500">({{ $e->nik }})</span></div>
                <div class="text-sm text-gray-600">{{ $e->position }} — {{ $e->status }}</div>
              </div>
              <div class="text-sm text-gray-500">{{ $e->created_at->format('d M Y') }}</div>
            </div>
          </li>
        @endforeach
      </ul>
    @endif
  </div>
</div>
@endsection
