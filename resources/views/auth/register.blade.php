<x-layout>
    <x-slot:title>Регистрация</x-slot:title>

    <section>
        <div class="max-w-2xl mx-auto">
            <h1 class="text-3xl font-bold text-gray-800 mb-6 text-center">Регистрация</h1>

            <div class="bg-white rounded-lg shadow-md p-6">
                <form method="POST" action="{{ route('register') }}">
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

                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-4">
                        <div>
                            <label for="surname" class="block text-gray-700 mb-2">Фамилия *</label>
                            <input type="text" id="surname" name="surname" value="{{ old('surname') }}" 
                                   class="w-full border rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500 @error('surname') border-red-500 @enderror" 
                                   required>
                            @error('surname')
                                <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                        <div>
                            <label for="name" class="block text-gray-700 mb-2">Имя *</label>
                            <input type="text" id="name" name="name" value="{{ old('name') }}" 
                                   class="w-full border rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500 @error('name') border-red-500 @enderror" 
                                   required>
                            @error('name')
                                <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                        <div>
                            <label for="patronymic" class="block text-gray-700 mb-2">Отчество</label>
                            <input type="text" id="patronymic" name="patronymic" value="{{ old('patronymic') }}" 
                                   class="w-full border rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500 @error('patronymic') border-red-500 @enderror">
                            @error('patronymic')
                                <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="mb-4">
                        <label for="login" class="block text-gray-700 mb-2">Логин *</label>
                        <input type="text" id="login" name="login" value="{{ old('login') }}" 
                               class="w-full border rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500 @error('login') border-red-500 @enderror" 
                               required>
                        @error('login')
                            <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="email" class="block text-gray-700 mb-2">Email *</label>
                        <input type="email" id="email" name="email" value="{{ old('email') }}" 
                               class="w-full border rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500 @error('email') border-red-500 @enderror" 
                               required>
                        @error('email')
                            <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                        <div>
                            <label for="password" class="block text-gray-700 mb-2">Пароль *</label>
                            <input type="password" id="password" name="password" 
                                   class="w-full border rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500 @error('password') border-red-500 @enderror" 
                                   required>
                            @error('password')
                                <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                        <div>
                            <label for="password_confirmation" class="block text-gray-700 mb-2">Подтверждение пароля *</label>
                            <input type="password" id="password_confirmation" name="password_confirmation" 
                                   class="w-full border rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500" 
                                   required>
                        </div>
                    </div>

                    <div class="mb-6">
                        <label class="flex items-center">
                            <input type="checkbox" name="rules" id="rules" 
                                   class="rounded border-gray-300 text-blue-600 focus:ring-blue-500 @error('rules') border-red-500 @enderror" 
                                   {{ old('rules') ? 'checked' : '' }}>
                            <span class="ml-2 text-gray-700">Соглашаюсь с <a href="#" class="text-blue-500 hover:underline">правилами регистрации</a> *</span>
                        </label>
                        @error('rules')
                            <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                        @enderror
                    </div>

                    <button type="submit" class="w-full bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600 transition duration-300 focus:outline-none focus:ring-2 focus:ring-green-500">
                        Зарегистрироваться
                    </button>
                </form>

                <p class="mt-4 text-center text-gray-600">
                    Уже есть аккаунт? 
                    <a href="{{ route('login') }}" class="text-blue-500 hover:underline">Войдите</a>
                </p>
            </div>
        </div>
    </section>
</x-layout>