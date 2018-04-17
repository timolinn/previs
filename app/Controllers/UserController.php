<?php

namespace App\Controllers;

use Illuminate\Routing\Controller;

class UserController extends Controller
{

    public function index()
    {
        return \App\Models\User::all();
    }
}