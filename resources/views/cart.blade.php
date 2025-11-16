<x-layout>
    <x-slot:title>Корзина</x-slot:title>

    <section>
        <div class="max-w-4xl mx-auto">
            <h1 class="text-3xl font-bold text-gray-800 mb-6">Корзина покупок</h1>

            @if(count($products) > 0)
                <div class="bg-white rounded-lg shadow-md overflow-hidden mb-6">
                    <div class="p-6">
                        <div class="space-y-4">
                            @foreach($products as $product)
                                <div class="flex items-center justify-between border-b pb-4">
                                    <div class="flex items-center space-x-4">
                                        @if($product->image)
                                            <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" class="w-16 h-16 object-cover rounded">
                                        @else
                                            <div class="w-16 h-16 bg-gray-200 rounded flex items-center justify-center">
                                                <span class="text-gray-500 text-xs">Нет фото</span>
                                            </div>
                                        @endif
                                        <div>
                                            <h3 class="font-semibold">{{ $product->name }}</h3>
                                            <p class="text-gray-600 text-sm">{{ $product->model }}</p>
                                            <p class="text-green-600 font-bold">{{ number_format($product->price, 2, '.', ' ') }} руб.</p>
                                        </div>
                                    </div>
                                    <div class="flex items-center space-x-3">
                                        <form method="POST" action="{{ route('cart.update') }}" class="inline">
                                            @csrf
                                            <input type="hidden" name="product_id" value="{{ $product->id }}">
                                            <input type="hidden" name="quantity" value="{{ $product->quantity - 1 }}">
                                            <button type="submit" class="w-8 h-8 bg-gray-200 rounded-full flex items-center justify-center hover:bg-gray-300 transition duration-300">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 12H4"/>
                                                </svg>
                                            </button>
                                        </form>
                                        <span class="font-semibold">{{ $product->quantity }}</span>
                                        <form method="POST" action="{{ route('cart.update') }}" class="inline">
                                            @csrf
                                            <input type="hidden" name="product_id" value="{{ $product->id }}">
                                            <input type="hidden" name="quantity" value="{{ $product->quantity + 1 }}">
                                            <button type="submit" 
                                                    {{ $product->quantity >= $product->stock ? 'disabled' : '' }}
                                                    class="w-8 h-8 bg-gray-200 rounded-full flex items-center justify-center hover:bg-gray-300 transition duration-300 {{ $product->quantity >= $product->stock ? 'opacity-50 cursor-not-allowed' : '' }}">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                                                </svg>
                                            </button>
                                        </form>
                                        <form method="POST" action="{{ route('cart.remove', $product->id) }}" class="inline ml-4">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-500 hover:text-red-700 transition duration-300">
                                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                                </svg>
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="bg-gray-50 px-6 py-4">
                        <div class="flex justify-between items-center">
                            <div>
                                <p class="text-lg font-semibold">Итого: {{ number_format($total, 2, '.', ' ') }} руб.</p>
                            </div>
                            <form method="GET" action="{{ route('orders.create') }}">
                                <button type="submit" class="bg-green-500 text-white px-6 py-3 rounded hover:bg-green-600 transition duration-300">
                                    Оформить заказ
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            @else
                <div class="bg-white rounded-lg shadow-md p-8 text-center">
                    <svg class="w-16 h-16 mx-auto text-gray-400 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"/>
                    </svg>
                    <h2 class="text-xl font-semibold text-gray-800 mb-2">Корзина пуста</h2>
                    <p class="text-gray-600 mb-4">Добавьте товары в корзину, чтобы оформить заказ</p>
                    <a href="{{ route('catalog') }}" class="bg-blue-500 text-white px-6 py-2 rounded hover:bg-blue-600 transition duration-300">
                        Перейти в каталог
                    </a>
                </div>
            @endif
        </div>
    </section>
</x-layout>