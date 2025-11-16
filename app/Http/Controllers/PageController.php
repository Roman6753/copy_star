<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class PageController extends Controller
{
    public function about()
    {
        $newProducts = Product::latest()->take(5)->get();
        $cartCount = array_sum(Session::get('cart', []));
        
        return view('about', compact('newProducts', 'cartCount'));
    }

    public function contacts()
    {
        $cartCount = array_sum(Session::get('cart', []));
        return view('contacts', compact('cartCount'));
    }
}