<?php

namespace App\Controllers;

use Illuminate\Routing\Controller;

class AdminController extends Controller
{

    public function sendOrderReadyNotif($userId, $orderId)
    {
        if (!Auth::user()->isAdmin()) {
            Session::set('error', 'You are not allowed to do this.');
            return redirectTo('/dashboard');
        }
    }

}