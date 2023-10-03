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
            'name' => 'required|min:3|max:255|regex:/^[\pL\s\-]+$/u',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048|nullable',
            'price' => 'numeric|min:1|max:99999',
            'author' => 'required|numeric|exists:authors,id',
            'category' => 'required|numeric|exists:categories,id',
            'stock' => 'numeric|min:1|max:999999',
            'rank' => 'numeric|min:1|max:5'
        ];
    }
}
