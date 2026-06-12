<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SiteController extends Controller
{
    public function index()
    {
        $name = 'Roberto';
        $habits = ['Exercise', 'Read', 'Meditate'];

        return view('home', compact('name', 'habits'));
    }
}

