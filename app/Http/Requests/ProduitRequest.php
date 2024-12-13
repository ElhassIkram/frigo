<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProduitRequest extends FormRequest
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
          // Vérifier si c'est une méthode POST (création) ou PUT/PATCH (mise à jour)
          $rules = [
            'designation' => 'required|string',
            'famille_id' => 'required|exists:familles,id',
        ];

        // Si c'est une méthode POST, l'image est requise
        if ($this->isMethod('post')) {
            $rules['image'] = 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048';
        }

        // Si c'est une méthode PUT/PATCH, l'image est facultative
        if ($this->isMethod('put') || $this->isMethod('patch')) {
            $rules['image'] = 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048';
        }

        return $rules;
    }

    public function messages()
    {
        return [
            'designation.required' => 'Le champ désignation est obligatoire.',
            'designation.string' => 'La désignation doit être une chaîne de caractères.',
            'famille_id.required' => 'Le champ famille est obligatoire.',
            'famille_id.exists' => 'La famille sélectionnée est invalide.',
            'image.required' => 'Une image est obligatoire pour ce produit.',
            'image.image' => 'Le fichier doit être une image.',
            'image.mimes' => 'L\'image doit être au format jpeg, png, jpg, gif ou svg.',
            'image.max' => 'La taille de l\'image ne doit pas dépasser 2 Mo.',
        ];
    }
}
