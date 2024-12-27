<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ReglementClientRequest extends FormRequest
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
            'date' => 'required|date', // Ensure it's a valid date
            'montant' => 'required|numeric|min:0', // Must be a number >= 0
            'observation' => 'nullable|string|max:255', // Optional, max 255 characters
            'mode_id' => 'required|exists:modes,id', // Must exist in the 'modes' table
            'client_id' => 'required|exists:clients,id', // Must exist in the 'clients' table
     
        ];
    }

    public function messages(): array
    {
        return [
            'date.required' => 'La date est obligatoire.',
            'date.date' => 'La date doit être une date valide.',
            'montant.required' => 'Le montant est obligatoire.',
            'montant.numeric' => 'Le montant doit être un nombre.',
            'montant.min' => 'Le montant doit être supérieur ou égal à zéro.',
            'observation.string' => "L'observation doit être une chaîne de caractères.",
            'observation.max' => "L'observation ne doit pas dépasser 255 caractères.",
            'mode_id.required' => 'Le mode de règlement est obligatoire.',
            'mode_id.exists' => 'Le mode de règlement sélectionné est invalide.',
            'client_id.required' => 'Le client est obligatoire.',
            'client_id.exists' => 'Le client sélectionné est invalide.',
        ];
    }
}
