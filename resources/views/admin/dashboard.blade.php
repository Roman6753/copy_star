<x-layout title="Админ панель - Copy Star">
    <div class="max-w-4xl mx-auto">
        <div class="bg-white rounded-lg shadow-md p-8">
            <div class="text-center mb-8">
                <h1 class="text-3xl font-bold text-gray-800 mb-4">Админ панель</h1>
                <p class="text-gray-600">Добро пожаловать в панель администратора</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
                <div class="bg-blue-50 rounded-lg p-6 border border-blue-200">
                    <h3 class="text-xl font-semibold text-blue-800 mb-3">Быстрый доступ</h3>
                    <p class="text-blue-600 mb-4">Перейдите в полную админ-панель для управления контентом</p>
                    <a href="{{ route('moonshine.direct') }}" 
                    class="inline-flex items-center bg-blue-500 hover:bg-blue-600 text-white font-bold py-3 px-6 rounded-lg transition duration-200">
                        Перейти в MoonShine панель
                    </a>
                </div>

                <div class="bg-gray-50 rounded-lg p-6 border border-gray-200">
                    <h3 class="text-xl font-semibold text-gray-800 mb-3">Статистика</h3>
                    <div class="space-y-2 text-gray-600">
                        <p>Администратор: {{ auth()->user()->full_name }}</p>
                        <p>Email: {{ auth()->user()->email }}</p>
                        <p>Роль: Администратор системы</p>
                    </div>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                <div class="bg-white border border-gray-200 rounded-lg p-4 text-center hover:shadow-md transition duration-200">
                    <div class="w-12 h-12 bg-blue-100 rounded-full flex items-center justify-center mx-auto mb-3">
                        <svg class="w-6 h-6 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                        </svg>
                    </div>
                    <h4 class="font-semibold text-gray-800">Пользователи</h4>
                    <p class="text-sm text-gray-600 mt-1">Управление пользователями</p>
                </div>

                <div class="bg-white border border-gray-200 rounded-lg p-4 text-center hover:shadow-md transition duration-200">
                    <div class="w-12 h-12 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-3">
                        <svg class="w-6 h-6 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/>
                        </svg>
                    </div>
                    <h4 class="font-semibold text-gray-800">Заказы</h4>
                    <p class="text-sm text-gray-600 mt-1">Управление заказами</p>
                </div>

                <div class="bg-white border border-gray-200 rounded-lg p-4 text-center hover:shadow-md transition duration-200">
                    <div class="w-12 h-12 bg-purple-100 rounded-full flex items-center justify-center mx-auto mb-3">
                        <svg class="w-6 h-6 text-purple-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/>
                        </svg>
                    </div>
                    <h4 class="font-semibold text-gray-800">Товары</h4>
                    <p class="text-sm text-gray-600 mt-1">Управление каталогом</p>
                </div>
            </div>

            <div class="mt-8 text-center">
                <a href="{{ route('about') }}" 
                   class="inline-flex items-center text-blue-500 hover:text-blue-600 font-medium">
                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                    </svg>
                    Вернуться на главную
                </a>
            </div>
        </div>
    </div>
</x-layout>