<x-layout>
    <x-slot:title>Вход в систему</x-slot:title>

    <section>
        <div class="max-w-md mx-auto">
            <h1 class="text-3xl font-bold text-gray-800 mb-6 text-center">Вход в систему</h1>

            <div class="bg-white rounded-lg shadow-md p-6">
                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    @if ($errors->any())
                        <div class="mb-4 p-3 bg-red-100 border border-red-400 text-red-700 rounded">
                            <ul class="list-disc list-inside">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <div class="mb-4">
                        <label for="login" class="block text-gray-700 mb-2">Логин</label>
                        <input type="text" id="login" name="login" value="{{ old('login') }}" 
                               class="w-full border rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500 @error('login') border-red-500 @enderror" 
                               required autofocus>
                        @error('login')
                            <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-6">
                        <label for="password" class="block text-gray-700 mb-2">Пароль</label>
                        <input type="password" id="password" name="password" 
                               class="w-full border rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500 @error('password') border-red-500 @enderror" 
                               required>
                        @error('password')
                            <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                        @enderror
                    </div>

                    <button type="submit" class="w-full bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 transition duration-300 focus:outline-none focus:ring-2 focus:ring-blue-500">
                        Войти
                    </button>
                </form>

                <p class="mt-4 text-center text-gray-600">
                    Нет аккаунта? 
                    <a href="{{ route('register') }}" class="text-blue-500 hover:underline">Зарегистрируйтесь</a>
                </p>
            </div>
        </div>
    </section>
</x-layout>