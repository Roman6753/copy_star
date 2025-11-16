<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Auth::user()->orders()->latest()->get();
        $cartCount = array_sum(Session::get('cart', []));
        
        return view('orders', compact('orders', 'cartCount'));
    }

    public function create()
    {
        $cart = Session::get('cart', []);
        if (empty($cart)) {
            return redirect()->route('cart.index')->with('error', 'Корзина пуста');
        }

        $cartCount = array_sum($cart);
        return view('order-create', compact('cartCount'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'password' => 'required'
        ]);

        if (!Hash::check($request->password, Auth::user()->password)) {
            return redirect()->back()->with('error', 'Неверный пароль');
        }

        $cart = Session::get('cart', []);
        if (empty($cart)) {
            return redirect()->route('cart.index')->with('error', 'Корзина пуста');
        }

        $total = 0;
        $orderItems = [];

        foreach ($cart as $productId => $quantity) {
            $product = \App\Models\Product::find($productId);
            if (!$product || $product->stock < $quantity) {
                return redirect()->back()->with('error', 'Товар "' . ($product->name ?? 'Unknown') . '" недоступен в нужном количестве');
            }
            $total += $product->price * $quantity;
            $orderItems[] = [
                'product_id' => $productId,
                'quantity' => $quantity,
                'price' => $product->price,
            ];
        }

        $order = Order::create([
            'user_id' => Auth::id(),
            'total' => $total,
            'status' => 'new',
        ]);

        foreach ($orderItems as $item) {
            OrderItem::create(array_merge($item, ['order_id' => $order->id]));
            $product = \App\Models\Product::find($item['product_id']);
            $product->decrement('stock', $item['quantity']);
        }

        Session::forget('cart');

        return redirect()->route('orders.index')->with('success', 'Заказ успешно создан');
    }

    public function destroy(Order $order)
    {
        if ($order->user_id !== Auth::id()) {
            abort(403);
        }

        if ($order->status !== 'new') {
            return redirect()->back()->with('error', 'Можно удалять только новые заказы');
        }

        $order->delete();

        return redirect()->route('orders.index')->with('success', 'Заказ удален');
    }
}