<?php

namespace App\Controllers;

use Illuminate\Routing\Controller;
use PDC\Request;
use App\Repositories\UserRepository as UserRepo;
use App\Services\Notifier;
use App\Services\Session;

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

        if (!empty($user->toArray()) && $user->get('id')) {
            $res = Notifier::welcome($user);
            Session::success("Your Registration was successful we sent you an email.");
            return redirectTo('auth/login');
        }
        Session::error($user->get('error'));
        return redirectTo('auth/register');
    }

    public function postLogin(Request $pdcRequest)
    {
        $login = $this->userepo->loginUser($pdcRequest->request->all());

        if (array_key_exists('error', $login->toArray())) {
                Session::error($login->get('error'));
                return redirectTo('auth/login');
        }
        return redirectTo('dashboard');

    }
}