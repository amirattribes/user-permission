<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Category;

class HomeController extends Controller
{
    // public function index()
    // {
    //     $products = Product::where('is_active', true)->latest()->take(12)->get();
    //     return view('frontend.home', compact('products'));
    // }

    public function index()
    {
        $categories = Category::with('products')->get();
        return view('frontend.home', compact('categories'));
    }
}

