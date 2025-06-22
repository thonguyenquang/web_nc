<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function showForm()
    {
        return view("auth.login");
    }
    
    public function login(Request $request)
    {
        $email = $request->input("email");
        $password = $request->input("password");
        $status = Auth::attempt(['email'=> $email, 'password'=> $password]);

        if ($status) {
            $user = Auth::user();
            $urlRedi = '/';
            if ($user->is_admin == 1) {
                $urlRedi = '/dashboard';
            } elseif ($user->role === 'shipper') {
                $urlRedi = '/shipper/orders'; // chuyển hướng shipper về trang shipper
            }
            return redirect($urlRedi);
        }

        return back()->with('error', 'Email hoặc mật khẩu không đúng');
    }
}