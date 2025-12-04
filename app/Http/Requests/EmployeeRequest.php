<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmployeeRequest extends FormRequest
{
    public function authorize(): bool
    {
        // Atur true jika tidak ada pengecekan authorization khusus
        return true;
    }

    public function rules(): array
    {
        // Ketika update, id akan ada; gunakan route param 'employee'
        $employeeId = $this->route('employee') ? $this->route('employee')->id : null;

        return [
            'nik' => ['required', 'string', 'max:50', 'unique:employees,nik,' . $employeeId],
            'name' => ['required', 'string', 'max:255'],
            'position' => ['nullable', 'string', 'max:255'],
            'status' => ['required', 'in:Active,Non-Active'],
            'contact' => ['nullable', 'string', 'max:100'],
        ];
    }
}
