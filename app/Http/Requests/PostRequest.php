<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            "text" => ["required", "max:15000"]
        ];
    }

    public function messages(): array
    {
        return [
            'text.required' => 'Enter text',
            'text.max' => 'Max number symbols is 15000'
        ];
    }
}


