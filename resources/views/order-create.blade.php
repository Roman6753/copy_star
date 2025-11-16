<x-layout>
    <x-slot:title>Оформление заказа</x-slot:title>

    <section>
        <div class="max-w-md mx-auto">
            <h1 class="text-3xl font-bold text-gray-800 mb-6">Оформление заказа</h1>

            <div class="bg-white rounded-lg shadow-md p-6">
                <form method="POST" action="{{ route('orders.store') }}">
                    @csrf

                    <div class="mb-6">
                        <p class="text-gray-600 mb-4">Для подтверждения заказа введите ваш пароль:</p>
                        
                        <div class="mb-4">
                            <label for="password" class="block text-gray-700 mb-2">Пароль</label>
                            <input type="password" id="password" name="password" class="w-full border rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                        </div>
                    </div>

                    <div class="flex justify-between space-x-3">
                        <a href="{{ route('cart.index') }}" class="flex-1 bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600 transition duration-300 text-center">
                            Назад
                        </a>
                        <button type="submit" class="flex-1 bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600 transition duration-300">
                            Подтвердить заказ
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </section>
</x-layout>