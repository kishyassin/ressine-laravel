<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Client; // Use Client model instead of User
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'nom' => ['required', 'string', 'max:255'],
            'prenom' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:clients'],
            'login' => ['required', 'string', 'max:255', 'unique:clients'],
            'telephone' => ['required', 'string', 'max:20'], // Validation rules for telephone
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'adresseClient' => ['nullable', 'string', 'max:255'], // Validation rules for adresseClient
            'imageClient' => ['nullable', 'image', 'max:2048'] // Optional image validation
        ]);

        // Handle image upload if provided
        $imagePath = null;
        if ($request->hasFile('imageClient')) {
            $imagePath = $request->file('imageClient')->store('clients'); // Adjust storage path as needed
        }

        $client = Client::create([
            'nom' => $request->nom,
            'prenom' => $request->prenom,
            'email' => $request->email,
            'login' => $request->login,
            'telephone' => $request->telephone, // Store telephone number
            'password' => Hash::make($request->password),
            'adresseClient' => $request->adresseClient, // Store adresseClient if provided
            'imageClient' => $imagePath, // Store the image path in the database
        ]);

        event(new Registered($client));

        Auth::login($client);

        return redirect(RouteServiceProvider::HOME);
    }
}
