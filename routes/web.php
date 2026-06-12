<?php

use App\Http\Controllers\SiteController;
use Illuminate\Support\Facades\Route;


//MVC
//Model -> Database interaction
//View -> User interface
//Controller -> Business logic

Route::get('/', [SiteController::class, 'index']);