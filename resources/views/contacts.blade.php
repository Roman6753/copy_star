<x-layout>
    <x-slot:title>Где нас найти?</x-slot:title>

    <section>
        <div class="max-w-6xl mx-auto">
            <h1 class="text-3xl font-bold text-gray-800 mb-8 text-center">Где нас найти?</h1>

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                <!-- Контактная информация -->
                <div class="space-y-6">
                    <div class="bg-white rounded-lg shadow-md p-6">
                        <h2 class="text-xl font-semibold mb-4">Контактные данные</h2>
                        <div class="space-y-4">
                            <div class="flex items-start">
                                <svg class="w-6 h-6 text-blue-500 mt-1 mr-4 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                                </svg>
                                <div>
                                    <strong class="text-gray-800">Адрес:</strong>
                                    <p class="text-gray-600">г. Москва, ул. Примерная, д. 123</p>
                                </div>
                            </div>
                            <div class="flex items-start">
                                <svg class="w-6 h-6 text-blue-500 mt-1 mr-4 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                                </svg>
                                <div>
                                    <strong class="text-gray-800">Телефон:</strong>
                                    <p class="text-gray-600">+7 (495) 123-45-67</p>
                                </div>
                            </div>
                            <div class="flex items-start">
                                <svg class="w-6 h-6 text-blue-500 mt-1 mr-4 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                                </svg>
                                <div>
                                    <strong class="text-gray-800">Email:</strong>
                                    <p class="text-gray-600">info@copy-star.ru</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="bg-white rounded-lg shadow-md p-6">
                        <h2 class="text-xl font-semibold mb-4">Режим работы</h2>
                        <div class="space-y-2 text-gray-600">
                            <div class="flex justify-between">
                                <span>Понедельник - Пятница</span>
                                <span class="font-semibold">9:00 - 20:00</span>
                            </div>
                            <div class="flex justify-between">
                                <span>Суббота</span>
                                <span class="font-semibold">10:00 - 18:00</span>
                            </div>
                            <div class="flex justify-between">
                                <span>Воскресенье</span>
                                <span class="font-semibold">10:00 - 16:00</span>
                            </div>
                        </div>
                    </div>

                    <div class="bg-white rounded-lg shadow-md p-6">
                        <h2 class="text-xl font-semibold mb-4">Как добраться</h2>
                        <p class="text-gray-600 mb-2"> Станция метро "Примерная"</p>
                        <p class="text-gray-600 mb-2"> Автобусы: 123, 456, 789</p>
                        <p class="text-gray-600"> Трамвай: 5, 7</p>
                    </div>
                </div>

                <div class="space-y-6">
                    <div class="bg-white rounded-lg shadow-md p-6">
                        <h2 class="text-xl font-semibold mb-4">Мы на карте</h2>
                        <div class="bg-gray-100 h-80 rounded-lg flex items-center justify-center">
                            <div class="text-center">
                                <svg class="w-16 h-16 mx-auto text-gray-400 mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 20l-5.447-2.724A1 1 0 013 16.382V5.618a1 1 0 011.447-.894L9 7m0 13l6-3m-6 3V7m6 10l4.553 2.276A1 1 0 0021 18.382V7.618a1 1 0 00-.553-.894L15 4m0 13V4m0 0L9 7"/>
                                </svg>
                                <p class="text-gray-500">Интерактивная карта</p>
                                <p class="text-gray-400 text-sm mt-1">г. Москва, ул. Примерная, д. 123</p>
                            </div>
                        </div>
                    </div>

                    <div class="bg-white rounded-lg shadow-md p-6">
                        <h2 class="text-xl font-semibold mb-4">Обратная связь</h2>
                        <form class="space-y-4">
                            <div>
                                <label for="name" class="block text-gray-700 mb-2">Ваше имя</label>
                                <input type="text" id="name" class="w-full border rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
                            </div>
                            <div>
                                <label for="email" class="block text-gray-700 mb-2">Email</label>
                                <input type="email" id="email" class="w-full border rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
                            </div>
                            <div>
                                <label for="message" class="block text-gray-700 mb-2">Сообщение</label>
                                <textarea id="message" rows="4" class="w-full border rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"></textarea>
                            </div>
                            <button type="submit" class="w-full bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 transition duration-300">
                                Отправить сообщение
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-layout>