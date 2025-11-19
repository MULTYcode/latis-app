<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
    /**
     * Show the user profile page.
     */
    public function show()
    {
        return view('profile');
    }
}