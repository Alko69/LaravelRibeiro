<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ConnexionController extends Controller
{
    public function showLoginForm()
    {
        return view('connexion');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            // Authentication successful
            return redirect()->intended('/');
        } else {
            // Invalid credentials
            return redirect()->route('login')->withErrors(['error' => 'Invalid login credentials.']);
        }
    }
}