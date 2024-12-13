<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FamilleRequest extends FormRequest
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
        'famille' => 'required|string|max:255',
    ];
    }

    public function messages()
    {
        return [
            'famille.required' => 'Le nom de la famille est obligatoire.',
            'famille.string' => 'Le nom de la famille doit être une chaîne de caractères.',
            'famille.max' => 'Le nom de la famille ne doit pas dépasser 255 caractères.',
        ];
    }
}
