<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login() {
        return view('pages.auth.login');
    }

    public function forgotPassword() {
        return view('pages.auth.forgot-password');
    }

    public function register() {
        return view('pages.auth.register');
    }
}
