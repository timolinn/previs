<?php

namespace App\Services;

use App\Models\Order;
use App\Models\User;

class Notifier
{

    public function notify(User $user)
    {
        echo "Email sent!";
    }

    public function notifyAdmin()
    {
        echo "Email sent to admin";
    }

    public function orderConfirmation(User $user, Order $order)
    {
        echo 'COnfirmation email sent to user';
    }
}