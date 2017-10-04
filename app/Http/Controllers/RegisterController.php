<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RegisterController extends Controller
{
    /**
     * Show the form for creating a new registration.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Register';

        return view('register', compact('title'));
    }

    /**
     * Create new registration
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function register(Request $request)
    {
        $title = 'Home';

        return view('home', compact('title'));
    }
}
