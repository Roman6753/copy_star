<x-layout>
    <x-slot:title>Каталог</x-slot:title>

    <section>
        <div class="max-w-7xl mx-auto">
            <h1 class="text-3xl font-bold text-gray-800 mb-6">Каталог товаров</h1>

            <div class="bg-white p-4 rounded-lg shadow-md mb-6">
                <form method="GET" action="{{ route('catalog') }}" class="flex flex-wrap gap-4">
                    <select name="category" class="border rounded px-3 py-2">
                        <option value="all">Все категории</option>
                        @foreach($categories as $category)
                            <option value="{{ $category->slug }}" {{ request('category') == $category->slug ? 'selected' : '' }}>
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>

                    <select name="sort" class="border rounded px-3 py-2">
                        <option value="newest" {{ request('sort') == 'newest' ? 'selected' : '' }}>Сначала новые</option>
                        <option value="year" {{ request('sort') == 'year' ? 'selected' : '' }}>По году выпуска</option>
                        <option value="name" {{ request('sort') == 'name' ? 'selected' : '' }}>По названию</option>
                        <option value="price" {{ request('sort') == 'price' ? 'selected' : '' }}>По цене</option>
                    </select>

                    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 transition duration-300">
                        Применить
                    </button>
                    <a href="{{ route('catalog') }}" class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600 transition duration-300">
                        Сбросить
                    </a>
                </form>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
                @foreach($products as $product)
                    <div class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition duration-300">
                        @if($product->image)
                            <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" class="w-full h-48 object-cover">
                        @else
                            <div class="w-full h-48 bg-gray-200 flex items-center justify-center">
                                <span class="text-gray-500">Нет изображения</span>
                            </div>
                        @endif
                        <div class="p-4">
                            <h3 class="font-semibold text-lg mb-2">{{ $product->name }}</h3>
                            <p class="text-gray-600 text-sm mb-2">{{ $product->model }}</p>
                            <p class="text-green-600 font-bold text-lg">{{ number_format($product->price, 2, '.', ' ') }} руб.</p>
                            <div class="mt-3 flex space-x-2">
                                <a href="{{ route('product.show', $product) }}" class="flex-1 bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 transition duration-300 text-center">Подробнее</a>
                                @auth
                                    @if($product->stock > 0)
                                        <form method="POST" action="{{ route('cart.add', $product) }}" class="inline">
                                            @csrf
                                            <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600 transition duration-300">
                                                В корзину
                                            </button>
                                        </form>
                                    @else
                                        <button disabled class="bg-gray-400 text-white px-4 py-2 rounded cursor-not-allowed">
                                            Нет в наличии
                                        </button>
                                    @endif
                                @endauth
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            @if($products->isEmpty())
                <div class="text-center py-8">
                    <p class="text-gray-500 text-lg">Товары не найдены</p>
                </div>
            @endif
        </div>
    </section>
</x-layout>