<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClientRequest extends FormRequest
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
        $clientId = $this->route('client') ? $this->route('client')->id : null;

        return [
            'nom' => 'required|string',
            'prenom' => 'required|string',
            'adresse' => 'required|string',
            'ville' => 'required|string',
            'tell' => 'required|nullable|regex:/^[0-9]{10}$/',
            'email' => 'required|email|unique:clients,email,' . $clientId, // Unicité de l'email en excluant le client actuel
            'password' => 'required | nullable|string', // Le mot de passe est facultatif lors de la mise à jour
            'vendeur_id' => 'required|exists:vendeurs,id',
        ];
    }

    public function messages()
    {
        return [
            'nom.required' => 'Le nom du client est obligatoire.',
            'prenom.required' => 'Le prénom du client est obligatoire.',
            'adresse.required' => 'L\'adresse du client est obligatoire.',
            'ville.required' => 'La ville du client est obligatoire.',
            'tell.required' => 'Le numéro de téléphone est obligatoire.',
            'tell.regex' => 'Le numéro de téléphone doit être composé de 10 chiffres.', // Custom error message for the regex rule
            'email.required' => 'L\'email du client est obligatoire.',
            'email.email' => 'L\'email doit être une adresse email valide.',
            'email.unique' => 'L\'email est déjà utilisé par un autre client.',
            'password.required' => 'Le mot de passe est obligatoire.',
            'password.string' => 'Le mot de passe doit être une chaîne de caractères.',
            'vendeur_id.required' => 'Le vendeur est obligatoire.',
            'vendeur_id.exists' => 'Le vendeur sélectionné est invalide.',
        ];
    }
}
