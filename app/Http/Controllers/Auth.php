<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth as FacadesAuth;

class Auth extends Controller
{
    public function login()
    {
        return view("auth.login");
    }
    public function proccess(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Attempt to log the user in
        if (FacadesAuth::attempt(['email' => $request->email, 'password' => $request->password])) {
            // If successful, redirect to a protected resource or home page
            return redirect('/dashboard');
        }

        // If login attempt fails, redirect back to the login form with an error message
        return redirect()->route('auth')->with('error', 'Invalid login credentials');
    }
}
