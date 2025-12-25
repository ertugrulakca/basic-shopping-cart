<div>
    @foreach ($cartItems as $item)
        <div
            class="flex flex-col sm:flex-row gap-4 bg-white dark:bg-[#1C252E] p-4 rounded-xl shadow-sm border border-[#f0f2f4] dark:border-[#2A3441] mb-3">
            <div class="shrink-0">
                <div class="bg-center bg-no-repeat bg-cover rounded-lg size-24 sm:size-32 bg-gray-100"
                    data-alt="Black wireless noise cancelling headphones on a neutral background"
                    style='background-image: url("{{ $item->product->image_url }}");'>
                </div>
            </div>
            <div class="flex flex-1 flex-col justify-between">
                <div class="flex justify-between items-start gap-4">
                    <div>
                        <h3 class="text-base sm:text-lg font-bold leading-snug mb-1">
                            {{ $item->product->name }}
                        </h3>
                        <p class="text-[#617589] dark:text-gray-400 text-sm mb-1">Color: {{ fake()->colorName() }}</p>
                    </div>
                    <p class="text-lg font-bold text-primary sm:text-right">${{ $item->product->price * $item->quantity }}</p>
                </div>
                <div class="flex justify-between items-end mt-4">
                    <div class="flex items-center gap-3">
                        <button
                            wire:click="removeItem({{ $item->id }})"
                            class="text-[#617589] dark:text-gray-400 hover:text-red-500 dark:hover:text-red-400 text-sm font-medium flex items-center gap-1 transition-colors">
                            <span class="material-symbols-outlined text-lg">delete</span>
                            <span class="hidden sm:inline">Remove</span>
                        </button>
                    </div>
                    <div
                        class="flex items-center border border-[#e5e7eb] dark:border-[#2A3441] rounded-lg bg-[#f9fafb] dark:bg-[#101922]">
                        <button
                            wire:click="updateItemQuantity({{ $item->id }}, {{ $item->quantity - 1 }})"
                            class="size-8 sm:size-9 flex items-center justify-center text-[#617589] dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-[#2A3441] rounded-l-lg transition-colors">
                            <span class="material-symbols-outlined text-sm">remove</span>
                        </button>
                        <input
                            class="w-10 sm:w-12 text-center bg-transparent border-none p-0 text-sm font-medium focus:ring-0"
                            min="1" type="number" value="{{ $item->quantity }}" wire:change="updateItemQuantity({{ $item->id }}, $event.target.value)" />
                        <button
                            wire:click="updateItemQuantity({{ $item->id }}, {{ $item->quantity + 1 }})"
                            class="size-8 sm:size-9 flex items-center justify-center text-[#617589] dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-[#2A3441] rounded-r-lg transition-colors">
                            <span class="material-symbols-outlined text-sm">add</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</div>
