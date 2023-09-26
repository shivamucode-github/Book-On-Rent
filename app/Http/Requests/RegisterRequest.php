<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255', 'regex:/^[\pL\s\-]+$/u'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email', 'regex:/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix'],
            'password' => ['required', 'confirmed'],
            'password_confirmation' => 'required|same:password',
            'address' => ['required', 'min:5', 'max:255'],
            'phone' => ['required', 'digits:10', 'numeric']
        ];
    }
}
