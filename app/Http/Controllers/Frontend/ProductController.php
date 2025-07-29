<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Product;


class ProductController extends Controller
{
    
    public function show($id)
    {
        $product = Product::findOrFail($id);

        // Option 1: Recommended from same category (if you have category_id)
        // $recommended = Product::where('category_id', $product->category_id)
        //                      ->where('id', '!=', $product->id)
        //                      ->inRandomOrder()
        //                      ->take(4)
        //                      ->get();

        // Option 2: Random recommended products
        $recommended = Product::where('id', '!=', $product->id)
                            ->where('is_active', 1)
                            ->inRandomOrder()
                            ->take(4)
                            ->get();

        return view('frontend.product.show', compact('product', 'recommended'));
    }

}
