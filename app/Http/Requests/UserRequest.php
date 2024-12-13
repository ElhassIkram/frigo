<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
{
    /**
     * Détermine si l'utilisateur est autorisé à effectuer cette requête.
     */
    public function authorize()
    {
        return true; // Autorisation accordée à tous les utilisateurs
    }

    /**
     * Définit les règles de validation pour la requête.
     */
    public function rules()
    {
        // Récupère l'ID de l'utilisateur si la route contient un paramètre "user".
        $userId = $this->route('user') ? $this->route('user')->id : null; 

        return [
            'name' => 'required|string|max:255', // Le champ nom est obligatoire et ne doit pas dépasser 255 caractères.
            'telephone' => 'required|nullable|regex:/^[0-9]{10}$/', // Valide uniquement les numéros de téléphone avec exactement 10 chiffres.
         
            'email' => 'required|email|unique:users,email,' . $userId, // Valide l'email et vérifie son unicité dans la table "users".
            'password' => $this->isMethod('post') ? 'required|min:6|confirmed' : 'nullable|min:6|confirmed', // Le mot de passe est requis pour la création et optionnel pour la mise à jour, avec confirmation.
              'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Vérifie que l'image est au bon format et taille maximale de 2 Mo.
        ];
    }

    /**
     * Définit les messages d'erreur personnalisés.
     */
    public function messages()
    {
        return [
            'name.required' => 'Le nom est obligatoire.', // Message d'erreur si le champ nom est vide.
            'telephone.required' => 'Le numéro de téléphone est obligatoire.', // Message ajouté pour le téléphone requis
            'telephone.regex' => 'Le numéro de téléphone doit contenir exactement 10 chiffres.', // Message si le format du téléphone est incorrect.            
            'email.required' => "L'adresse email est obligatoire.", // Message si l'email est vide.
            'email.email' => "L'adresse email doit être valide.", // Message si l'email a un format invalide.
            'email.unique' => "Cette adresse email est déjà utilisée.", // Message si l'email existe déjà.
            'password.required' => 'Le mot de passe est obligatoire.', // Message si le mot de passe est vide lors de la création.
            'password.min' => 'Le mot de passe doit contenir au moins 6 caractères.', // Message si le mot de passe est trop court.
            'password.confirmed' => 'La confirmation du mot de passe ne correspond pas.', // Message si la confirmation du mot de passe échoue.
            'image.required' => "L'image est obligatoire.", // Message ajouté pour l'image requise
            'image.image' => "Le fichier doit être une image (jpeg, png, jpg, gif).", // Message si le fichier n'est pas une image.
            'image.mimes' => "L'image doit être au format jpeg, png, jpg ou gif.", // Message si le format de l'image est invalide.
            'image.max' => "L'image ne doit pas dépasser 2 Mo.", // Message si l'image est trop volumineuse.
        ];
    }
}
