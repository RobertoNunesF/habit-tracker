<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use illuminate\Contracts\View\View;

class SiteController extends Controller
{
    public function index(): View
    {
        return view('home');
    }

}

