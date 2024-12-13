<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ModeRequest extends FormRequest
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
            'mode' => 'required|string|max:255', // Validation for the 'mode' field
        ];
    }

 
    public function messages()
    {
        return [
            'mode.required' => 'Le mode est obligatoire.',
            'mode.string' => 'Le mode doit être une chaîne de caractères.',
            'mode.max' => 'Le mode ne doit pas dépasser 255 caractères.',
            'mode.unique' => 'Ce mode existe déjà.',
        ];
    }
}
