<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function productList()
    {
        $products = \App\Models\Product::all();
        return view('products', compact('products'));
    }
}
