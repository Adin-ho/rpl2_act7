@extends('layouts.app')
@section('title','Dashboard')
@section('content')
<div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-6">
  <div class="bg-white p-4 rounded shadow">
    <div class="text-sm">Total Karyawan</div>
    <div class="text-3xl font-bold">{{ $totalEmployees }}</div>
  </div>
  <div class="bg-white p-4 rounded shadow">
    <div class="text-sm">Hadir Hari Ini</div>
    <div class="text-3xl font-bold">{{ $todayPresent }}</div>
  </div>
  <div class="bg-white p-4 rounded shadow">
    <div class="text-sm">Izin/Sakit/Alpha</div>
    <div class="text-3xl font-bold">{{ $todayAbsent }}</div>
  </div>
</div>

<div class="bg-white p-4 rounded shadow">
  <h3 class="font-bold mb-3">Kehadiran Terbaru</h3>
  <table class="w-full">
    <thead><tr class="text-left"><th>Tanggal</th><th>Nama</th><th>Status</th><th>Note</th></tr></thead>
    <tbody>
      @foreach($recentAttendances as $a)
      <tr class="border-t">
        <td>{{ $a->date->format('Y-m-d') }}</td>
        <td>{{ $a->user->name }}</td>
        <td>{{ ucfirst($a->status) }}</td>
        <td>{{ $a->note }}</td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>
@endsection
