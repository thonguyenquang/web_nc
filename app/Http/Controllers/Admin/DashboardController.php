<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
   
    public function index()
    {
        return view('admin.dashboard'); // Đảm bảo index trả về dashboard
    }
}