<?php

namespace App\Controllers;

use Illuminate\Routing\Controller;

class DashboardController extends Controller
{

    public function index()
    {
        return renderView('admin.dashboard');
    }
}