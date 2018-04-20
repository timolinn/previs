<?php

namespace App\Controllers;

use Illuminate\Routing\Controller;
use App\Models\Auth;

class DashboardController extends Controller
{

    // public function __construct()
    // {
    //     $authResumeService = app('authfactory')->newResumeService(app('connection')->getAuraPDOAdapter());
    //     $authResumeService->resume(app('authfactory'));
    // }

    public function index()
    {
        // dd($_SESSION);
        if (Auth::check())
                return renderView('admin.dashboard');

        return redirectTo("auth/login");
    }
}