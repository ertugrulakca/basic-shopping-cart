<main class="flex-grow w-full max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10">
    <x-action-message class="me-3" on="cart-error">
        <div class="mb-4 p-4 rounded-lg bg-red-100 dark:bg-red-900 text-red-700 dark:text-red-200">
            {{ session('message') ?? 'Unavailable stock for this product' }}
        </div>
    </x-action-message>

    <!-- Page Header -->
    <div class="mb-8">
        <h1 class="text-3xl md:text-4xl font-black leading-tight tracking-[-0.033em] mb-2">Your Shopping Cart</h1>
        <p class="text-[#617589] dark:text-gray-400 text-base font-normal">You have {{ $cartItemCount }} items in your cart</p>
    </div>

    @if ($cartItemCount == 0)
        <div class="text-center text-gray-500 dark:text-gray-400">
            <p>Your cart is empty</p>
        </div>
    @else
        <div class="lg:grid lg:grid-cols-12 lg:gap-x-12 lg:items-start">
            <!-- Left Column: Cart Items -->
            <section class="lg:col-span-8 flex flex-col gap-6">
                <!-- Item 1 -->
                @livewire('shopping.cart-items')
            </section>
            <!-- Right Column: Order Summary -->
            @livewire('shopping.order-summary')
        </div>
    @endif
</main>
