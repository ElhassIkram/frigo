<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreBonSortRequest extends FormRequest
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
            'date' => 'required|date', // La date doit être une date valide
            'observation' => 'nullable|string|max:255', // Observation est optionnel et de type chaîne
            'vendeur_id' => 'required|exists:vendeurs,id', // L'ID du vendeur doit exister dans la table `vendeurs`
            'details' => 'required|array', // Les détails doivent être un tableau
            'details.*.conditionnement_id' => 'required|exists:conditionnements,id', // Chaque détail doit avoir un conditionnement valide
            'details.*.produit_id' => 'required|exists:produits,id', // Chaque détail doit avoir un produit valide
            'details.*.qte' => 'required|integer|min:1', // La quantité doit être un entier et supérieur ou égal à 1
        ];
    }

    public function messages()
    {
        return [
            'date.required' => 'La date est obligatoire.',
            'observation.string' => 'L\'observation doit être une chaîne de caractères.',
            'vendeur_id.exists' => 'Le vendeur sélectionné est invalide.',
            'details.required' => 'Les détails du bon de sortie sont obligatoires.',
            'details.array' => 'Les détails doivent être un tableau.',
            'details.*.conditionnement_id.exists' => 'Le conditionnement sélectionné est invalide.',
            'details.*.produit_id.exists' => 'Le produit sélectionné est invalide.',
            'details.*.qte.required' => 'La quantité est obligatoire.',
            'details.*.qte.integer' => 'La quantité doit être un entier.',
            'details.*.qte.min' => 'La quantité doit être supérieure ou égale à 1.',
        ];
    }
}
