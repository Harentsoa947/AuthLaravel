<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MonController extends Controller
{
    public function login()
    {
        return '
        <form method="POST" action="/login">
            <input type="hidden" name="_token" value="'.csrf_token(). '">
            <input type="email" name="email" placeholder="email"><br>
            <input type="password" name="password" placeholder="password"><br>
            <button type="submit">Login</button>
        </form>
    ';
    }

    public function login_post(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if(Auth::attempt($credentials)){
            return redirect('/me');
        }
        
        return "Email ou mots de passe incorrect";

    }

}
