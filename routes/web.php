<?php

use App\Http\Controllers\SiteController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;


//MVC
//Model -> Database interaction
//View -> User interface
//Controller -> Business logic

//SITE
Route::get('/', [SiteController::class, 'index'])->name('site.index');


//LOGIN
Route::get('/login', [LoginController::class, 'index'])->name('site.login');
Route::post('/login', [LoginController::class, 'authenticate'])->name('auth.login');

//AUTH
Route::middleware('auth')->group(function() {
    Route::get('/dashboard', [SiteController::class, 'dashboard'])->name('site.dashboard');
    Route::post('/logout', [LoginController::class, 'logout'])->name('auth.logout');
});
