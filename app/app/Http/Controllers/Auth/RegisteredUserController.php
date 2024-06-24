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
        $validatedData = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:clients'],
            'telephone' => ['required', 'string', 'max:20'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'adresseClient' => ['nullable', 'string', 'max:255'],
            'imageClient' => ['nullable', 'image', 'max:2048']
        ]);

        $imagePath = null;
        if ($request->hasFile('imageClient')) {
            $image = $request->file('imageClient');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('img'), $imageName);
            $imagePath = 'img/' . $imageName;
        }

        try {
            $client = Client::create([
                'name' => $validatedData['name'],
                'email' => $validatedData['email'],
                'telephone' => $validatedData['telephone'],
                'password' => Hash::make($validatedData['password']),
                'adresseClient' => $validatedData['adresseClient'],
                'imageClient' => $imagePath,
            ]);

            event(new Registered($client));

            Auth::login($client);

            return redirect(RouteServiceProvider::HOME);
        } catch (\Exception $e) {
            // Handle any database or other exceptions here
            // You can log the error or redirect back with an error message
            return back()->withInput()->withErrors(['error' => $e->getMessage()]);
        }
    }
}
