<?php

namespace App\Controllers;

use Illuminate\Routing\Controller;
use App\Services\Session;
use App\Models\Auth;
use App\Models\User;
use App\Services\Notifier;

class AdminController extends Controller
{

    public function sendOrderReadyNotif($userId, $orderId)
    {
        if (!Auth::user()->isAdmin()) {
            Session::flash('error', 'You are not allowed to do this.');

            return redirectTo('dashboard');
        }

        $user = User::find($userId);
        if ($user) {
            Notifier::notify($user, 'order_ready');
        }
        return "Done";
    }

    public function send()
    {
        // dd('Here');
        $user = User::find(2);
        $mail = Notifier::notifyAdmin($user);
        dd($mail);
    }

}