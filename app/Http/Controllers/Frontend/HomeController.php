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

    public function home()
    {
        $products = Product::latest()->take(12)->get();
        $categories = Category::all();
        return view('frontend.home', compact('products','categories'));
    }

    public function category($id)
    {
        $selectedCategory = Category::findOrFail($id);
        $products = $selectedCategory->products()->latest()->get();
        $categories = Category::all();
        return view('frontend.home', compact('products','categories','selectedCategory'));
    }
}

