<x-layout>
    <x-slot:title>Мои заказы</x-slot:title>

    <section>
        <div class="max-w-4xl mx-auto">
            <h1 class="text-3xl font-bold text-gray-800 mb-6">Мои заказы</h1>

            @if($orders->count() > 0)
                <div class="space-y-6">
                    @foreach($orders as $order)
                        <div class="bg-white rounded-lg shadow-md overflow-hidden">
                            <div class="bg-gray-50 px-6 py-4 border-b">
                                <div class="flex justify-between items-center">
                                    <div>
                                        <p class="font-semibold">Заказ #{{ $order->id }}</p>
                                        <p class="text-sm text-gray-600">{{ $order->created_at->format('d.m.Y H:i') }}</p>
                                    </div>
                                    <div class="flex items-center space-x-4">
                                        <span class="px-3 py-1 rounded-full text-sm font-semibold 
                                            {{ $order->status == 'new' ? 'bg-yellow-100 text-yellow-800' : '' }}
                                            {{ $order->status == 'confirmed' ? 'bg-green-100 text-green-800' : '' }}
                                            {{ $order->status == 'cancelled' ? 'bg-red-100 text-red-800' : '' }}">
                                            @if($order->status == 'new') Новый @endif
                                            @if($order->status == 'confirmed') Подтвержден @endif
                                            @if($order->status == 'cancelled') Отменен @endif
                                        </span>
                                        @if($order->status == 'new')
                                            <button onclick="deleteOrder({{ $order->id }})" 
                                                    class="text-red-500 hover:text-red-700 transition duration-300">
                                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                                </svg>
                                            </button>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="p-6">
                                <div class="space-y-3">
                                    @foreach($order->items as $item)
                                        <div class="flex justify-between items-center">
                                            <div class="flex items-center space-x-3">
                                                @if($item->product->image)
                                                    <img src="{{ asset('storage/' . $item->product->image) }}" alt="{{ $item->product->name }}" class="w-12 h-12 object-cover rounded">
                                                @else
                                                    <div class="w-12 h-12 bg-gray-200 rounded flex items-center justify-center">
                                                        <span class="text-gray-500 text-xs">Нет фото</span>
                                                    </div>
                                                @endif
                                                <div>
                                                    <p class="font-medium">{{ $item->product->name }}</p>
                                                    <p class="text-sm text-gray-600">{{ $item->product->model }}</p>
                                                </div>
                                            </div>
                                            <div class="text-right">
                                                <p class="font-semibold">{{ number_format($item->price, 2, '.', ' ') }} руб.</p>
                                                <p class="text-sm text-gray-600">x{{ $item->quantity }}</p>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                                <div class="mt-4 pt-4 border-t">
                                    <div class="flex justify-between items-center">
                                        <p class="text-lg font-semibold">Общая сумма:</p>
                                        <p class="text-lg font-bold text-green-600">{{ number_format($order->total, 2, '.', ' ') }} руб.</p>
                                    </div>
                                </div>
                                @if($order->status == 'cancelled' && $order->cancellation_reason)
                                    <div class="mt-4 p-3 bg-red-50 rounded">
                                        <p class="text-sm text-red-800">
                                            <strong>Причина отмены:</strong> {{ $order->cancellation_reason }}
                                        </p>
                                    </div>
                                @endif
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <div class="bg-white rounded-lg shadow-md p-8 text-center">
                    <svg class="w-16 h-16 mx-auto text-gray-400 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/>
                    </svg>
                    <h2 class="text-xl font-semibold text-gray-800 mb-2">Заказов нет</h2>
                    <p class="text-gray-600 mb-4">Вы еще не сделали ни одного заказа</p>
                    <a href="{{ route('catalog') }}" class="bg-blue-500 text-white px-6 py-2 rounded hover:bg-blue-600 transition duration-300">
                        Перейти в каталог
                    </a>
                </div>
            @endif
        </div>
    </section>

    <script>
        function deleteOrder(orderId) {
            if (!confirm('Вы уверены, что хотите удалить этот заказ?')) return;

            fetch(`/orders/${orderId}`, {
                method: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                },
            })
            .then(response => response.json())
            .then(data => {
                if (data.error) {
                    alert(data.error);
                } else {
                    alert(data.success);
                    location.reload();
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert('Произошла ошибка при удалении заказа');
            });
        }
    </script>
</x-layout>