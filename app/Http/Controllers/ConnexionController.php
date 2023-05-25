<?php

namespace App\Http\Controllers;

use App\Models\Orders;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
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
            $order = new Orders;
            $order->id = '2';
            $order->userId = Auth::user()->id;


            $response = redirect()->intended('/');
            $response->cookie('userId', Auth::user()->id, 10);
            $response->cookie('testOrder', $order->userId, 10);
            return $response;
        } else {
            // Invalid credentials
            return redirect()->route('login')->withErrors(['error' => 'Invalid login credentials.']);
        }
    }
}