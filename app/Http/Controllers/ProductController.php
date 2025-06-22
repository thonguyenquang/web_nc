<?php

namespace App\Http\Controllers;

use App\Models\Product;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::paginate(24);
        return view('layouts.shop', compact('products'));

    }

    public function show(Product $product)
    {
        // Nạp quan hệ reviews, user, category nếu có
        $product->load(['reviews.user', 'category']);
        return view('products.show', compact('product'));
    }
}

