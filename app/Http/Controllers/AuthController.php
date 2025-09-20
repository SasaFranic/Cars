<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function index()
    {
        $user = '';
        if (Auth::check()) {
            $user = Auth::user()->name;
        }
        return view('prijava.login', compact('user'));
    }

    public function obrada(Request $request)
    {
        $credentials = $request->validate(
            [
                'email' => 'required|email',
                'password' => 'required|min:4',
            ],
            [
                'email.required' => 'Molimo unesite Email.',
                'email.email' => 'Molimo unesite validnu email adresu.',
                'password.required' => 'Molimo unesite lozinku.',
                'password.min' => 'Lozinka mora imati minimalno 4 znaka.',

            ]
        );

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('/prijava');

        } else {
            return back()->withErrors('Molimo pokušajte ponovno.')->onlyInput('email');
        }

    }


}


