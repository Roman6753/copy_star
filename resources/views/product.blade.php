<x-layout>
    <x-slot:title>{{ $product->name }}</x-slot:title>

    <section>
        <div class="max-w-4xl mx-auto">
            <div class="bg-white rounded-lg shadow-md overflow-hidden">
                <div class="md:flex">
                    <div class="md:flex-shrink-0 md:w-1/2">
                        @if($product->image)
                            <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" class="h-96 w-full object-cover">
                        @else
                            <div class="h-96 w-full bg-gray-200 flex items-center justify-center">
                                <span class="text-gray-500">Нет изображения</span>
                            </div>
                        @endif
                    </div>
                    <div class="p-8 md:w-1/2">
                        <h1 class="text-2xl font-bold text-gray-800 mb-2">{{ $product->name }}</h1>
                        <p class="text-gray-600 mb-4">{{ $product->model }}</p>
                        <p class="text-3xl font-bold text-green-600 mb-4">{{ number_format($product->price, 2, '.', ' ') }} руб.</p>

                        <div class="mb-6">
                            <h2 class="text-lg font-semibold mb-2">Характеристики:</h2>
                            <ul class="text-gray-600 space-y-2">
                                <li><strong>Страна-производитель:</strong> {{ $product->country }}</li>
                                <li><strong>Год выпуска:</strong> {{ $product->year }}</li>
                                <li><strong>Модель:</strong> {{ $product->model }}</li>
                                <li><strong>Категория:</strong> {{ $product->category->name }}</li>
                                <li><strong>Наличие:</strong> 
                                    <span class="{{ $product->stock > 0 ? 'text-green-600' : 'text-red-600' }}">
                                        {{ $product->stock > 0 ? 'В наличии (' . $product->stock . ' шт.)' : 'Нет в наличии' }}
                                    </span>
                                </li>
                            </ul>
                        </div>

                        @if($product->description)
                        <div class="mb-6">
                            <h2 class="text-lg font-semibold mb-2">Описание:</h2>
                            <p class="text-gray-600">{{ $product->description }}</p>
                        </div>
                        @endif

                        @auth
                            @if($product->stock > 0)
                                <form method="POST" action="{{ route('cart.add', $product) }}" class="inline w-full">
                                    @csrf
                                    <button type="submit" class="w-full bg-blue-500 text-white px-4 py-3 rounded hover:bg-blue-600 transition duration-300">
                                        Добавить в корзину
                                    </button>
                                </form>
                            @else
                                <button disabled class="w-full bg-gray-400 text-white px-4 py-3 rounded cursor-not-allowed">
                                    Нет в наличии
                                </button>
                            @endif
                        @else
                            <a href="{{ route('login') }}" class="block text-center bg-gray-500 text-white px-4 py-3 rounded hover:bg-gray-600 transition duration-300">
                                Войдите, чтобы добавить в корзину
                            </a>
                        @endauth
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-layout>