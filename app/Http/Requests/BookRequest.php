<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BookRequest extends FormRequest
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
            'name' => 'required|min:3|max:255|alpha',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048|nullable',
            'price' => 'numeric',
            'author' => 'numeric',
            'category' => 'numeric',
            'stock' => 'numeric',
            'rank' => 'floor|min:1|max:5'
        ];
    }
}
