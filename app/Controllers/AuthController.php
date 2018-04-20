<?php

namespace App\Controllers;

use Illuminate\Routing\Controller;
use PDC\Request;
use App\Repositories\UserRepository as UserRepo;

class AuthController extends Controller
{
    protected $userepo;

    public function __construct(UserRepo $userepo)
    {
        $this->userepo = $userepo;
    }

    public function getLoginForm()
    {
        return renderView('auth.login');
    }

    public function getRegisterForm()
    {
        return renderView('auth.register');
    }

    public function postRegister(Request $pdcRequest)
    {
        $user = $this->userepo->create($pdcRequest->request->all());

        if (!empty($user->toArray())) {
            return redirectTo('auth/login');
        }

        return redirectTo('auth/register');
    }

    public function postLogin(Request $pdcRequest)
    {
        $login = $this->userepo->loginUser($pdcRequest->request->all());

        if (array_key_exists('error', $login->toArray())) {
                return redirectTo('auth/login');
        }
        return redirectTo('dashboard');

    }
}