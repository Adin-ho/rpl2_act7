<?php
namespace App\Http\Requests;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateUserRequest extends FormRequest
{
    public function authorize()
    {
        return auth()->check() && in_array(auth()->user()->role,['admin','hr']);
    }

    public function rules()
    {
        $userId = $this->route('user')?->id ?? null;
        return [
            'nik' => ['nullable','string', Rule::unique('users','nik')->ignore($userId)],
            'name' => 'required|string|max:255',
            'email' => ['required','email', Rule::unique('users','email')->ignore($userId)],
            'phone' => 'nullable|string|max:25',
            'position' => 'nullable|string|max:100',
            'status' => 'required|in:active,inactive',
            'role' => 'required|in:admin,hr,employee',
            'password' => 'nullable|string|min:6|confirmed',
        ];
    }
}
