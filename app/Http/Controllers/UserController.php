<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Intervention\Image\Facades\Image;
use App\Http\Requests\UserRequest;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;



class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('users.index', compact('users'));
    }

    public function create()
    {
        return view('users.create');
    }

    public function store(UserRequest $request)
    {
        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'telephone' => $request->telephone, // Store phone number
            'password' => bcrypt($request->password),
        ];
    
        // Handle image upload
        if ($request->hasFile('image')) {
            $data['image'] = $this->handleImageUpload($request->file('image'));
        }
    
        User::create($data);
    
        return redirect()->route('users.index')->with('success', 'User created successfully.');
    }
    
    public function show(User $user)
    {
        return view('users.show', compact('user'));
    }

    public function edit(User $user)
    {
        return view('users.edit', compact('user'));
    }

   
public function update(UserRequest $request, User $user)
{
    $user->name = $request->name;
    $user->email = $request->email;
    $user->telephone = $request->telephone; // Update phone number

    if ($request->filled('password')) {
        $user->password = bcrypt($request->password);
    }

    // Handle image update
    if ($request->hasFile('image')) {
        // Delete old image
        if ($user->image && file_exists(public_path('storage/' . $user->image))) {
            unlink(public_path('storage/' . $user->image));
        }
        $user->image = $this->handleImageUpload($request->file('image'));
    }

    $user->save();

    return redirect()->route('users.index')->with('success', 'User updated successfully.');
}
    public function destroy(User $user)
    {
        if ($user->image && file_exists(public_path('storage/' . $user->image))) {
            unlink(public_path('storage/' . $user->image));
        }
        $user->delete();

        return redirect()->route('users.index')->with('success', 'User deleted successfully.');
    }

    private function handleImageUpload($image)
    {
        $imagePath = 'images/users/' . uniqid() . '.' . $image->getClientOriginalExtension();
        $imageDirectory = public_path('storage/images/users');

        if (!file_exists($imageDirectory)) {
            mkdir($imageDirectory, 0755, true);
        }

        $img = Image::make($image)->fit(650, 350, function ($constraint) {
            $constraint->upsize();
        });

        $img->save(public_path('storage/' . $imagePath));

        return $imagePath;
    }

    // Update profile 
    

    // Update user password
    public function changePassword(Request $request)
{
    // Validation des champs du formulaire
    $request->validate([
        'current_password' => 'required',
        'new_password' => 'required|min:8|confirmed', // Vérifie que les deux mots de passe correspondent
    ]);

    $user = Auth::user(); // Récupérer l'utilisateur connecté

    // Vérifier si le mot de passe actuel est correct
    if (!Hash::check($request->current_password, $user->password)) {
        return redirect()->back()->withErrors(['current_password' => 'Le mot de passe actuel est incorrect.']);
    }

    // Mettre à jour le mot de passe avec le nouveau
    $user->password = Hash::make($request->new_password);
    $user->save();

    // Rediriger avec un message de succès
    return redirect()->back()->with('success', 'Mot de passe mis à jour avec succès.');
}

}
