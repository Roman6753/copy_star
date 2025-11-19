<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Copy Star' }}</title>
    <script src="{{asset('tailwindcss.js')}}"></script>
</head>
<body class="bg-gray-100 min-h-screen flex flex-col">
    <nav class="bg-white shadow-lg sticky top-0 z-40">
        <div class="max-w-7xl mx-auto px-4">
            <div class="flex justify-between items-center">
                <div class="flex items-center space-x-8">
                    <div class="flex items-center py-4">
                        <a href="{{ route('about') }}" class="text-2xl font-bold text-gray-800 flex items-center">
                            <div class="w-8 h-8 bg-blue-500 rounded-full flex items-center justify-center text-white text-sm mr-2">
                                CS
                            </div>
                            Copy Star
                        </a>
                    </div>
                    <div class="hidden md:flex items-center space-x-6">
                        <a href="{{ route('about') }}" class="py-4 px-2 text-gray-600 font-medium hover:text-blue-500 transition duration-300 border-b-2 border-transparent hover:border-blue-500 {{ request()->routeIs('about') ? 'text-blue-500 border-blue-500' : '' }}">О нас</a>
                        <a href="{{ route('catalog') }}" class="py-4 px-2 text-gray-600 font-medium hover:text-blue-500 transition duration-300 border-b-2 border-transparent hover:border-blue-500 {{ request()->routeIs('catalog') ? 'text-blue-500 border-blue-500' : '' }}">Каталог</a>
                        <a href="{{ route('contacts') }}" class="py-4 px-2 text-gray-600 font-medium hover:text-blue-500 transition duration-300 border-b-2 border-transparent hover:border-blue-500 {{ request()->routeIs('contacts') ? 'text-blue-500 border-blue-500' : '' }}">Где нас найти?</a>
                    </div>
                </div>
                <div class="flex items-center space-x-3">
                    @auth
                        <a href="{{ route('cart.index') }}" class="relative py-2 px-3 bg-blue-50 text-blue-600 rounded-lg hover:bg-blue-100 transition duration-300 flex items-center">
                            <svg class="w-5 h-5 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"/>
                            </svg>
                            Корзина
                            @if($cartCount ?? 0 > 0)
                                <span class="ml-1 bg-red-500 text-white rounded-full w-5 h-5 flex items-center justify-center text-xs">
                                    {{ $cartCount }}
                                </span>
                            @endif
                        </a>
                        <a href="{{ route('orders.index') }}" class="py-2 px-3 bg-gray-100 text-gray-700 rounded-lg hover:bg-gray-200 transition duration-300 flex items-center">
                            <svg class="w-5 h-5 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/>
                            </svg>
                            Мои заказы
                        </a>

                        @if(auth()->user()->is_admin)
                            <a href="/moonshine" class="py-2 px-3 bg-purple-500 text-white rounded-lg hover:bg-purple-600 transition duration-300 flex items-center">
                                <svg class="w-5 h-5 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"/>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                </svg>
                                Админ панель
                            </a>
                        @endif

                        <form method="POST" action="{{ route('logout') }}" class="inline">
                            @csrf
                            <button type="submit" class="py-2 px-3 bg-red-500 text-white rounded-lg hover:bg-red-600 transition duration-300 flex items-center">
                                <svg class="w-5 h-5 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/>
                                </svg>
                                Выйти
                            </button>
                        </form>
                    @else
                        <a href="{{ route('login') }}" class="py-2 px-4 bg-blue-500 text-white rounded-lg hover:bg-blue-600 transition duration-300">Вход</a>
                        <a href="{{ route('register') }}" class="py-2 px-4 bg-green-500 text-white rounded-lg hover:bg-green-600 transition duration-300">Регистрация</a>
                    @endauth
                </div>
            </div>
        </div>
    </nav>

    @if(session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mx-4 mt-4" role="alert">
            <span class="block sm:inline">{{ session('success') }}</span>
        </div>
    @endif

    @if(session('error'))
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mx-4 mt-4" role="alert">
            <span class="block sm:inline">{{ session('error') }}</span>
        </div>
    @endif

    <main class="flex-grow container mx-auto px-4 py-8">
        {{ $slot }}
    </main>

    <footer class="bg-gray-800 text-white mt-12">
        <div class="max-w-7xl mx-auto px-4 py-8">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div>
                    <h3 class="text-lg font-semibold mb-4">Copy Star</h3>
                    <p class="text-gray-300">Ваш надежный партнер в мире копировального оборудования. Качество и надежность в каждом устройстве.</p>
                </div>
                <div>
                    <h3 class="text-lg font-semibold mb-4">Контакты</h3>
                    <div class="space-y-2 text-gray-300">
                        <p>г. Москва, ул. Примерная, д. 123</p>
                        <p>+7 (495) 123-45-67</p>
                        <p>info@copy-star.ru</p>
                    </div>
                </div>
                <div>
                    <h3 class="text-lg font-semibold mb-4">Режим работы</h3>
                    <div class="space-y-2 text-gray-300">
                        <p>Пн-Пт: 9:00 - 20:00</p>
                        <p>Сб: 10:00 - 18:00</p>
                        <p>Вс: 10:00 - 16:00</p>
                    </div>
                </div>
            </div>
        </div>
    </footer>
</body>
</html>