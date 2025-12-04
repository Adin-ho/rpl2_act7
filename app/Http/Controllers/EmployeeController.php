<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Http\Requests\EmployeeRequest;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    // Menampilkan home dengan form input (recent 5)
    public function home()
    {
        $recent = Employee::latest()->take(5)->get();
        return view('home', compact('recent'));
    }

    // Simpan data (dari Home form)
    public function store(EmployeeRequest $request)
    {
        Employee::create($request->validated());

        return redirect()->route('home')->with('success', 'Data karyawan berhasil ditambahkan.');
    }

    // Menampilkan Dashboard (semua data) - dengan pagination & search
    public function index(Request $request)
{
    $query = Employee::query();
    if ($search = $request->query('search')) {
        $query->where(function($q) use ($search) {
            $q->where('nik', 'like', "%{$search}%")
              ->orWhere('name', 'like', "%{$search}%")
              ->orWhere('position', 'like', "%{$search}%");
        });
    }
    $employees = $query->latest()->paginate(10)->withQueryString();

    return view('dashboard.index', compact('employees', 'search'));
}

    // Tampilkan form edit
    public function edit(Employee $employee)
    {
        return view('edit', compact('employee'));
    }

    // Update data
    public function update(EmployeeRequest $request, Employee $employee)
    {
        $employee->update($request->validated());

        return redirect()->route('employees.index')->with('success', 'Data karyawan berhasil diperbarui.');
    }

    // Hapus data
    public function destroy(Employee $employee)
    {
        $employee->delete();
        return redirect()->route('employees.index')->with('success', 'Data karyawan berhasil dihapus.');
    }
}
