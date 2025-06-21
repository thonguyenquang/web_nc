<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class Register extends Controller
{
    public function register(Request $request)
    {
        $request->validate(
        [
            'name' => 'required',
            'email'=> 'required|email|unique:users',
            'password'=> 'required',
        ]);
        $data= $request->only('name','email','password');
        $data['password'] = bcrypt($data['password']);
        User::create($data);

        return redirect()->route('login');
    }
    public function showForm ()
    {
        return view('auth.register');
    }
}
