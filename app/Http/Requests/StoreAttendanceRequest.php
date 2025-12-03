<?php
namespace App\Http\Requests;
use Illuminate\Foundation\Http\FormRequest;

class StoreAttendanceRequest extends FormRequest
{
    public function authorize()
    {
        return auth()->check();
    }

    public function rules()
    {
        return [
            'user_id' => 'required|exists:users,id',
            'date' => 'required|date',
            'status' => 'required|in:hadir,izin,sakit,alpha',
            'note' => 'nullable|string|max:500',
        ];
    }
}
