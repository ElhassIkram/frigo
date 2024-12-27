<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreVendeurRequest extends FormRequest
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
        $vendeurId = $this->route('vendeur') ? $this->route('vendeur')->id : null; // Récupère l'id du vendeur dans la route si disponible

        return [
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'adresse' => 'required|string|max:255',
            'ville' => 'required|string|max:255',
            'tell' => 'required|regex:/^\d{10}$/',
            'email' => 'required|email|max:255|unique:vendeurs,email,' . $vendeurId, // Vérifie l'unicité de l'email en excluant le vendeur actuel
            'password' => 'required|string|min:8|confirmed',
        ];
    }
    public function messages()
{
    return [
        'nom.required' => 'Le nom est obligatoire.',
        'nom.string' => 'Le nom doit être une chaîne de caractères valide.',
        'nom.max' => 'Le nom ne peut pas dépasser 255 caractères.',

        'prenom.required' => 'Le prénom est obligatoire.',
        'prenom.string' => 'Le prénom doit être une chaîne de caractères valide.',
        'prenom.max' => 'Le prénom ne peut pas dépasser 255 caractères.',

        'adresse.string' => 'L’adresse doit être une chaîne de caractères valide.',
        'adresse.max' => 'L’adresse ne peut pas dépasser 255 caractères.',

        'ville.string' => 'La ville doit être une chaîne de caractères valide.',
        'ville.max' => 'La ville ne peut pas dépasser 255 caractères.',

        'tell.required' => 'Le numéro de téléphone est obligatoire.',
        'tell.regex' => 'Le numéro de téléphone doit contenir exactement 10 chiffres.',

        'email.required' => 'L’adresse e-mail est obligatoire.',
        'email.email' => 'L’adresse e-mail doit être une adresse e-mail valide.',
        'email.max' => 'L’adresse e-mail ne peut pas dépasser 255 caractères.',
        'email.unique' => 'Cette adresse e-mail est déjà utilisée.',

        'password.required' => 'Le mot de passe est obligatoire.',
        'password.string' => 'Le mot de passe doit être une chaîne de caractères.',
        'password.min' => 'Le mot de passe doit contenir au moins 8 caractères.',
         'password.confirmed' => 'Les mots de passe ne correspondent pas.',
    ];
}

}
