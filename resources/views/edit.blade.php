@extends('layouts.app')

@section('content')
<div class="bg-white p-6 rounded shadow">
  <h2 class="text-2xl font-semibold mb-4">Edit Data: {{ $employee->name }}</h2>

  <form action="{{ route('employees.update', $employee) }}" method="POST" class="space-y-4">
    @csrf
    @method('PUT')

    <div>
      <label class="block text-sm font-medium">NIK</label>
      <input type="text" name="nik" value="{{ old('nik', $employee->nik) }}" class="w-full border rounded px-3 py-2">
      @error('nik') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
    </div>

    <div>
      <label class="block text-sm font-medium">Nama</label>
      <input type="text" name="name" value="{{ old('name', $employee->name) }}" class="w-full border rounded px-3 py-2">
      @error('name') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
    </div>

    <div>
      <label class="block text-sm font-medium">Jabatan</label>
      <input type="text" name="position" value="{{ old('position', $employee->position) }}" class="w-full border rounded px-3 py-2">
      @error('position') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
    </div>

    <div>
      <label class="block text-sm font-medium">Status</label>
      <select name="status" class="w-full border rounded px-3 py-2">
        <option value="Active" @selected(old('status', $employee->status) == 'Active')>Active</option>
        <option value="Non-Active" @selected(old('status', $employee->status) == 'Non-Active')>Non-Active</option>
      </select>
      @error('status') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
    </div>

    <div>
      <label class="block text-sm font-medium">Kontak</label>
      <input type="text" name="contact" value="{{ old('contact', $employee->contact) }}" class="w-full border rounded px-3 py-2">
      @error('contact') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
    </div>

    <div class="flex gap-3">
      <button class="px-4 py-2 bg-green-600 text-white rounded">Update</button>
      <a href="{{ route('employees.index') }}" class="px-4 py-2 bg-gray-200 rounded">Batal</a>
    </div>
  </form>
</div>
@endsection
