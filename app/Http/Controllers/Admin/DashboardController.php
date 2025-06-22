<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Order;
use App\Models\Product;
use Carbon\Carbon;

class DashboardController extends Controller
{
   
    public function index()
    {
        $userCount = User::count();
        $newUserToday = User::whereDate('created_at', Carbon::today())->count();
        $productCount = Product::count();
        $orderPending = Order::where('status', 'pending')->count();
        $orderToday = Order::whereDate('created_at', Carbon::today())->count();
        return view('admin.dashboard', compact('userCount', 'newUserToday', 'productCount', 'orderPending', 'orderToday'));
    }
}