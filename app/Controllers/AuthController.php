<?php

namespace App\Controllers;

use Illuminate\Routing\Controller;

class AuthController extends Controller
{

    public function getLoginForm()
    {
        return renderView('auth.login');
    }

    public function getRegisterForm()
    {
        return renderView('auth.register');
    }

    public function postRegister(Request $request)
    {

    }

    public function postLogin()
    {

    }
}