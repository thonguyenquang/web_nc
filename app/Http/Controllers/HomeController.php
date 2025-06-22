<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class HomeController extends Controller
{
    function index()
    {
        $season_collection =Product::where('page','home')->where('section','season_collection')->get();
        $promotions = Product::where('page','home')->where('section','promotions')->get();
        return view('layouts.home', compact('season_collection','promotions'));
    }
}
