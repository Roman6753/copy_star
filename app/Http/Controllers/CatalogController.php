<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CatalogController extends Controller
{
    public function index(Request $request)
    {
        $query = Product::where('stock', '>', 0);

        // Фильтрация по категориям
        if ($request->has('category') && $request->category !== 'all') {
            $query->whereHas('category', function($q) use ($request) {
                $q->where('slug', $request->category);
            });
        }

        // Сортировка
        $sort = $request->get('sort', 'newest');
        switch ($sort) {
            case 'year':
                $query->orderBy('year', 'desc');
                break;
            case 'name':
                $query->orderBy('name', 'asc');
                break;
            case 'price':
                $query->orderBy('price', 'asc');
                break;
            default:
                $query->latest();
        }

        $products = $query->get();
        $categories = Category::all();
        $cartCount = array_sum(Session::get('cart', []));

        return view('catalog', compact('products', 'categories', 'cartCount'));
    }

    public function show(Product $product)
    {
        $cartCount = array_sum(Session::get('cart', []));
        return view('product', compact('product', 'cartCount'));
    }
}