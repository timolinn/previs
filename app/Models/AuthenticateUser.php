<?php

namespace App\Models;

use App\Models\User;

class AuthenticateUser extends User
{
    protected $table = 'users';

    public function __construct()
    {

    }
}