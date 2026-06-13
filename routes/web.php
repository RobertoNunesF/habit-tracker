<?php

use App\Http\Controllers\SiteController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;


//MVC
//Model -> Database interaction
//View -> User interface
//Controller -> Business logic

Route::get('/', [SiteController::class, 'index']);

Route::get('/login', [LoginController::class, 'index']);