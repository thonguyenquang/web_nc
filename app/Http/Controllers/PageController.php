<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function home() {
        return view('layouts.home');
    }

    public function ourstory() {
        return view('layouts.ourstory');
    }

    public function shop() {
        return view('layouts.shop');
    }

    public function services() {
        return view('layouts.services');
    }
}
