<?php

use App\Http\Controllers\MonController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function(){
    return "Bienvenue " . Auth::user()->name;
})->middleware('check.login');

Route::get('/login-test', function(){
    Auth::loginUsingId(1); // connexion forcée
    return "Utilisateur connecté";
});

Route::get('/me', function(){
    return Auth::user();
});

Route::get('/logout-test', function(){
    Auth::logout();
    return "Déconnecté";
});

Route::get('/login', [MonController::class, 'login'])->name('login');

Route::post('/login', [MonController::class, 'login_post']);