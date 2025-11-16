<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    public function index()
    {
        $cart = Session::get('cart', []);
        $products = [];
        $total = 0;

        foreach ($cart as $productId => $quantity) {
            $product = Product::find($productId);
            if ($product && $product->stock >= $quantity) {
                $product->quantity = $quantity;
                $products[] = $product;
                $total += $product->price * $quantity;
            }
        }

        $cartCount = array_sum($cart);

        return view('cart', compact('products', 'total', 'cartCount'));
    }

    public function add(Product $product, Request $request)
    {
        $cart = Session::get('cart', []);
        
        if ($product->stock <= 0) {
            return redirect()->back()->with('error', 'Товара нет в наличии');
        }

        $currentQuantity = $cart[$product->id] ?? 0;
        if ($currentQuantity >= $product->stock) {
            return redirect()->back()->with('error', 'Нельзя добавить больше товара, чем есть в наличии');
        }

        $cart[$product->id] = $currentQuantity + 1;
        Session::put('cart', $cart);

        return redirect()->back()->with('success', 'Товар добавлен в корзину');
    }

    public function update(Request $request)
    {
        $cart = Session::get('cart', []);
        $product = Product::find($request->product_id);

        if (!$product) {
            return redirect()->back()->with('error', 'Товар не найден');
        }

        if ($request->quantity > $product->stock) {
            return redirect()->back()->with('error', 'Недостаточно товара в наличии');
        }

        if ($request->quantity <= 0) {
            unset($cart[$request->product_id]);
        } else {
            $cart[$request->product_id] = $request->quantity;
        }

        Session::put('cart', $cart);

        return redirect()->route('cart.index')->with('success', 'Корзина обновлена');
    }

    public function remove($productId)
    {
        $cart = Session::get('cart', []);
        unset($cart[$productId]);
        Session::put('cart', $cart);

        return redirect()->route('cart.index')->with('success', 'Товар удален из корзины');
    }
}