<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreDetailBonSortRequest extends FormRequest
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
            'bon_sort_id' => 'required|exists:bon_sorts,id',
            'conditionnement_id' => 'required|exists:conditionnements,id',
            'produit_id' => 'required|exists:produits,id',
            'qte' => 'required|integer|min:1', // La quantité doit être un entier positif
        ];
    }
    public function messages()
    {
        return [
            'bon_sort_id.required' => 'Le bon de sortie est obligatoire.',
            'bon_sort_id.exists' => 'Le bon de sortie sélectionné est invalide.',
            'conditionnement_id.required' => 'Le conditionnement est obligatoire.',
            'conditionnement_id.exists' => 'Le conditionnement sélectionné est invalide.',
            'produit_id.required' => 'Le produit est obligatoire.',
            'produit_id.exists' => 'Le produit sélectionné est invalide.',
            'qte.required' => 'La quantité est obligatoire.',
            'qte.integer' => 'La quantité doit être un nombre entier.',
            'qte.min' => 'La quantité doit être supérieure ou égale à 1.',
        ];
    }
}
