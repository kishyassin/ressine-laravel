<?php

namespace App\Http\Controllers;

use App\Models\Chef;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ChefController extends Controller
{
    public function showLogin()
    {
        return view('chef.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::guard('chef')->attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended('livreur');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }
    public function chefs(){
        $fourChefs = Chef::getFourChefs();
        return view('about', compact('fourChefs'));
    }
}
