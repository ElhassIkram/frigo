<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ReglementVendeurRequest extends FormRequest
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
            'date' => 'required|date', // La date doit être valide
            'montant' => 'required|numeric|min:0.01', // Montant doit être numérique et supérieur à 0
            'observation' => 'nullable|string|max:255', // Observation est optionnelle, mais si présente, c'est une chaîne
            'mode_id' => 'required|exists:modes,id', // Le mode de paiement doit exister dans la table modes
            'vendeur_id' => 'required|exists:vendeurs,id', // Le vendeur doit exister dans la table vendeurs
        ];
    }

    public function messages(): array
    {
        return [
            'date.required' => 'La date du règlement est obligatoire.',
            'date.date' => 'La date doit être une date valide.',
            'montant.required' => 'Le montant est obligatoire.',
            'montant.numeric' => 'Le montant doit être un nombre valide.',
            'montant.min' => 'Le montant doit être supérieur ou égal à zéro.',
            'observation.string' => "L'observation doit être une chaîne de caractères.",
            'observation.max' => "L'observation ne peut pas dépasser 255 caractères.",
            'mode_id.required' => 'Le mode de règlement est obligatoire.',
            'mode_id.exists' => 'Le mode de règlement sélectionné est invalide.',
            'vendeur_id.required' => 'Le vendeur est obligatoire.',
            'vendeur_id.exists' => 'Le vendeur sélectionné est invalide.',
        ];
    }
}
