<?php

namespace App\Controllers;

use Illuminate\Routing\Controller;

class DashboardController extends Controller
{

    // public function __construct()
    // {
    //     $authResumeService = app('authfactory')->newResumeService(app('connection')->getAuraPDOAdapter());
    //     $authResumeService->resume(app('authfactory'));
    // }

    public function index()
    {
        dd(app('authfactory')->newInstance()->isValid());
        return renderView('admin.dashboard');
    }
}