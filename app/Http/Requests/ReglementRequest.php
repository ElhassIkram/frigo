<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ReglementRequest extends FormRequest
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
            'mode_id' => 'required|exists:modes,id',
            'montant' => 'required|numeric|min:0',
            'date' => 'required|date',
            'observation' => 'required|string|max:255', // Make observation required

        ];
    }

    public function messages()
{
    return [
        'mode_id.required' => 'Le mode de paiement est requis.',
        'mode_id.exists' => 'Le mode de paiement sélectionné est invalide.',
        'montant.required' => 'Le montant est requis.',
        'montant.numeric' => 'Le montant doit être un nombre.',
        'montant.min' => 'Le montant doit être supérieur ou égal à 0.',
        'date.required' => 'La date est requise.',
        'date.date' => 'La date doit être une date valide.',
        'observation.required' => 'L\'observation est requise.',  // Custom message for required observation
        'observation.max' => 'L\'observation ne peut pas dépasser 255 caractères.',
    ];
}

}
