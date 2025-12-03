<?php
namespace App\Http\Requests;
use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
{
    public function authorize()
    {
        return auth()->check() && in_array(auth()->user()->role,['admin','hr']);
    }

    public function rules()
    {
        return [
            'nik' => 'nullable|string|unique:users,nik',
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'phone' => 'nullable|string|max:25',
            'position' => 'nullable|string|max:100',
            'status' => 'required|in:active,inactive',
            'role' => 'required|in:admin,hr,employee',
            'password' => 'required|string|min:6|confirmed',
        ];
    }
}
