<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth as FacadesAuth;

class Auth extends Controller
{
    public function halamanlogin()
    {
        return view('auth.login');
    }
    public function postlogin(Request $request)
    {
        if (FacadesAuth::attempt($request->only('email', 'password'))) {
            return redirect('/home');
        }
        return redirect('/');
    }
    public function logout()
    {
        FacadesAuth::logout();
        return redirect('/');
    }
    }

