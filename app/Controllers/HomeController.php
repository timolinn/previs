<?php

namespace App\Controllers;

use Illuminate\Routing\Controller;

class HomeController extends Controller
{

    public function index()
    {
        return "This is the home pages";
    }
}