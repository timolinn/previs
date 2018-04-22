<?php

namespace App\Controllers;

use Illuminate\Routing\Controller;
use App\Models\Auth;
use App\Services\Session;
use App\Models\User;
use App\Models\Item;
use App\Models\Order;

class DashboardController extends Controller
{

    // public function __construct()
    // {
    //     $authResumeService = app('authfactory')->newResumeService(app('connection')->getAuraPDOAdapter());
    //     $authResumeService->resume(app('authfactory'));
    // }

    public function index()
    {

        // Session::clear();
        if (Auth::check()) {
            $totalUsers = User::all()->count();
            $totalItems = Item::all()->count();
            $totalOrders = Order::all()->count();
            return renderView('admin.dashboard', compact('totalUsers', 'totalItems', 'totalOrders'));
        }

        return redirectTo("auth/login");
    }
}