<!-- Main Content Layout -->
<div class="layout-container flex h-full grow flex-col">
    <div class="px-4 md:px-10 lg:px-20 xl:px-40 flex flex-1 justify-center py-5">
        <div class="layout-content-container flex flex-col max-w-[1280px] flex-1">

            <x-action-message class="me-3" on="cart-success">
                <div class="mb-4 p-4 rounded-lg bg-green-100 dark:bg-green-900 text-green-700 dark:text-green-200">
                    {{ session('message') ?? 'Item Added to Cart Successfully' }}
                </div>
            </x-action-message>

            <x-action-message class="me-3" on="cart-error">
                <div class="mb-4 p-4 rounded-lg bg-red-100 dark:bg-red-900 text-red-700 dark:text-red-200">
                    {{ session('message') ?? 'Item Not Added to Cart' }}
                </div>
            </x-action-message>

            <!-- Breadcrumbs & Heading Section -->
            <div class="flex flex-col gap-2 p-4">
                <div class="flex flex-wrap gap-2 items-center">
                    <a class="text-[#617589] hover:text-primary text-sm font-medium leading-normal transition-colors"
                        href="{{ route('home') }}">Home</a>
                    <span class="text-[#617589] text-sm font-medium leading-normal">/</span>
                    <a class="text-[#617589] hover:text-primary text-sm font-medium leading-normal transition-colors"
                        href="#">Electronics</a>
                    <span class="text-[#617589] text-sm font-medium leading-normal">/</span>
                    <span class="text-[#111418] dark:text-white text-sm font-medium leading-normal">Audio</span>
                </div>
                <div class="flex flex-wrap justify-between items-end gap-3 mt-4">
                    <div class="flex min-w-72 flex-col gap-1">
                        <h1
                            class="text-[#111418] dark:text-white text-4xl font-black leading-tight tracking-[-0.033em]">
                            Wireless Headphones</h1>
                        <p class="text-[#617589] text-base font-normal leading-normal">Showing {{ count($products) }}
                            results
                        </p>
                    </div>
                    <!-- Sort & View Controls -->
                    <div class="flex items-center gap-3">
                        <label class="flex items-center gap-2">
                            <span class="text-sm font-medium text-[#111418] dark:text-white hidden sm:block">Sort
                                by:</span>
                            <div class="relative">
                                <select wire:model.live="sortBy"
                                    class="form-select pl-3 pr-8 py-2 text-sm border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-[#1e2732] text-[#111418] dark:text-white focus:ring-primary focus:border-primary cursor-pointer appearance-none">
                                    <option value="featured">Featured</option>
                                    <option value="price_low">Price: Low to High</option>
                                    <option value="price_high">Price: High to Low</option>
                                    <option value="newest">Newest Arrivals</option>
                                </select>
                                <div
                                    class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-[#617589]">
                                    <span class="material-symbols-outlined text-[18px]">expand_more</span>
                                </div>
                            </div>
                        </label>
                        <div
                            class="flex bg-white dark:bg-[#1e2732] rounded-lg border border-[#dbe0e6] dark:border-gray-600 overflow-hidden">
                            <button wire:click="$set('viewMode', 'grid')"
                                class="p-2 {{ $viewMode === 'grid' ? 'bg-primary/10 text-primary' : 'text-[#617589] hover:text-[#111418] dark:hover:text-white' }}">
                                <span class="material-symbols-outlined text-[20px]">grid_view</span>
                            </button>
                            <button wire:click="$set('viewMode', 'list')"
                                class="p-2 {{ $viewMode === 'list' ? 'bg-primary/10 text-primary' : 'text-[#617589] hover:text-[#111418] dark:hover:text-white' }}">
                                <span class="material-symbols-outlined text-[20px]">view_list</span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="flex flex-col lg:flex-row gap-6 p-4 pt-0 mt-4">
                <!-- Sidebar Filters -->
                <aside class="w-full lg:w-64 shrink-0 flex flex-col gap-4">
                    <div
                        class="flex items-center justify-between pb-2 border-b border-[#f0f2f4] dark:border-gray-700 lg:hidden">
                        <h3 class="font-bold text-lg">Filters</h3>
                        <button class="text-primary text-sm font-medium">Reset</button>
                    </div>
                    <div class="hidden lg:flex items-center justify-between pb-2">
                        <h3 class="font-bold text-lg text-[#111418] dark:text-white">Filters</h3>
                        <button class="text-primary text-sm font-medium hover:underline">Clear All</button>
                    </div>
                    <!-- Accordions -->
                    <div class="flex flex-col gap-3">
                        <details
                            class="flex flex-col rounded-lg border border-[#dbe0e6] dark:border-gray-700 bg-white dark:bg-[#1e2732] overflow-hidden group"
                            open="">
                            <summary
                                class="flex cursor-pointer items-center justify-between gap-6 p-4 select-none hover:bg-gray-50 dark:hover:bg-gray-800 transition-colors">
                                <p class="text-[#111418] dark:text-white text-sm font-bold leading-normal">Category</p>
                                <span
                                    class="material-symbols-outlined text-[#111418] dark:text-white group-open:rotate-180 transition-transform text-[20px]">expand_more</span>
                            </summary>
                            <div class="px-4 pb-4 flex flex-col gap-2">
                                <label class="flex items-center gap-3 cursor-pointer group/item">
                                    <input checked=""
                                        class="h-4 w-4 rounded border-gray-300 text-primary focus:ring-primary bg-gray-100 dark:bg-gray-700 dark:border-gray-600"
                                        type="checkbox" />
                                    <span
                                        class="text-sm text-[#617589] dark:text-gray-300 group-hover/item:text-primary transition-colors">Over-ear
                                        (120)</span>
                                </label>
                                <label class="flex items-center gap-3 cursor-pointer group/item">
                                    <input
                                        class="h-4 w-4 rounded border-gray-300 text-primary focus:ring-primary bg-gray-100 dark:bg-gray-700 dark:border-gray-600"
                                        type="checkbox" />
                                    <span
                                        class="text-sm text-[#617589] dark:text-gray-300 group-hover/item:text-primary transition-colors">In-ear
                                        (45)</span>
                                </label>
                                <label class="flex items-center gap-3 cursor-pointer group/item">
                                    <input
                                        class="h-4 w-4 rounded border-gray-300 text-primary focus:ring-primary bg-gray-100 dark:bg-gray-700 dark:border-gray-600"
                                        type="checkbox" />
                                    <span
                                        class="text-sm text-[#617589] dark:text-gray-300 group-hover/item:text-primary transition-colors">Earbuds
                                        (32)</span>
                                </label>
                            </div>
                        </details>
                        <details
                            class="flex flex-col rounded-lg border border-[#dbe0e6] dark:border-gray-700 bg-white dark:bg-[#1e2732] overflow-hidden group"
                            open="">
                            <summary
                                class="flex cursor-pointer items-center justify-between gap-6 p-4 select-none hover:bg-gray-50 dark:hover:bg-gray-800 transition-colors">
                                <p class="text-[#111418] dark:text-white text-sm font-bold leading-normal">Price Range
                                </p>
                                <span
                                    class="material-symbols-outlined text-[#111418] dark:text-white group-open:rotate-180 transition-transform text-[20px]">expand_more</span>
                            </summary>
                            <div class="px-4 pb-4">
                                <div class="flex items-center justify-between text-sm text-[#617589] mb-2">
                                    <span>$50</span>
                                    <span>$500</span>
                                </div>
                                <input
                                    class="w-full h-2 bg-gray-200 rounded-lg appearance-none cursor-pointer accent-primary dark:bg-gray-700"
                                    max="500" min="50" type="range" value="250" />
                                <div class="flex gap-2 mt-4">
                                    <div class="relative w-full">
                                        <div
                                            class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                            <span class="text-gray-500 sm:text-sm">$</span>
                                        </div>
                                        <input
                                            class="block w-full pl-7 pr-3 sm:text-sm border-gray-300 dark:border-gray-600 rounded-md focus:ring-primary focus:border-primary dark:bg-[#333] dark:text-white"
                                            placeholder="Min" type="number" value="50" />
                                    </div>
                                    <div class="relative w-full">
                                        <div
                                            class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                            <span class="text-gray-500 sm:text-sm">$</span>
                                        </div>
                                        <input
                                            class="block w-full pl-7 pr-3 sm:text-sm border-gray-300 dark:border-gray-600 rounded-md focus:ring-primary focus:border-primary dark:bg-[#333] dark:text-white"
                                            placeholder="Max" type="number" value="500" />
                                    </div>
                                </div>
                            </div>
                        </details>
                        <details
                            class="flex flex-col rounded-lg border border-[#dbe0e6] dark:border-gray-700 bg-white dark:bg-[#1e2732] overflow-hidden group">
                            <summary
                                class="flex cursor-pointer items-center justify-between gap-6 p-4 select-none hover:bg-gray-50 dark:hover:bg-gray-800 transition-colors">
                                <p class="text-[#111418] dark:text-white text-sm font-bold leading-normal">Brand</p>
                                <span
                                    class="material-symbols-outlined text-[#111418] dark:text-white group-open:rotate-180 transition-transform text-[20px]">expand_more</span>
                            </summary>
                            <div class="px-4 pb-4 flex flex-col gap-2">
                                <label class="flex items-center gap-3 cursor-pointer">
                                    <input
                                        class="h-4 w-4 rounded border-gray-300 text-primary focus:ring-primary bg-gray-100 dark:bg-gray-700"
                                        type="checkbox" />
                                    <span class="text-sm text-[#617589] dark:text-gray-300">Sony</span>
                                </label>
                                <label class="flex items-center gap-3 cursor-pointer">
                                    <input
                                        class="h-4 w-4 rounded border-gray-300 text-primary focus:ring-primary bg-gray-100 dark:bg-gray-700"
                                        type="checkbox" />
                                    <span class="text-sm text-[#617589] dark:text-gray-300">Bose</span>
                                </label>
                                <label class="flex items-center gap-3 cursor-pointer">
                                    <input
                                        class="h-4 w-4 rounded border-gray-300 text-primary focus:ring-primary bg-gray-100 dark:bg-gray-700"
                                        type="checkbox" />
                                    <span class="text-sm text-[#617589] dark:text-gray-300">Apple</span>
                                </label>
                                <label class="flex items-center gap-3 cursor-pointer">
                                    <input
                                        class="h-4 w-4 rounded border-gray-300 text-primary focus:ring-primary bg-gray-100 dark:bg-gray-700"
                                        type="checkbox" />
                                    <span class="text-sm text-[#617589] dark:text-gray-300">Sennheiser</span>
                                </label>
                            </div>
                        </details>
                        <details
                            class="flex flex-col rounded-lg border border-[#dbe0e6] dark:border-gray-700 bg-white dark:bg-[#1e2732] overflow-hidden group">
                            <summary
                                class="flex cursor-pointer items-center justify-between gap-6 p-4 select-none hover:bg-gray-50 dark:hover:bg-gray-800 transition-colors">
                                <p class="text-[#111418] dark:text-white text-sm font-bold leading-normal">Rating</p>
                                <span
                                    class="material-symbols-outlined text-[#111418] dark:text-white group-open:rotate-180 transition-transform text-[20px]">expand_more</span>
                            </summary>
                            <div class="px-4 pb-4 flex flex-col gap-2">
                                <label class="flex items-center gap-3 cursor-pointer">
                                    <input
                                        class="h-4 w-4 border-gray-300 text-primary focus:ring-primary bg-gray-100 dark:bg-gray-700"
                                        name="rating" type="radio" />
                                    <div class="flex text-amber-400">
                                        <span class="material-symbols-outlined text-[18px] fill-current">star</span>
                                        <span class="material-symbols-outlined text-[18px] fill-current">star</span>
                                        <span class="material-symbols-outlined text-[18px] fill-current">star</span>
                                        <span class="material-symbols-outlined text-[18px] fill-current">star</span>
                                        <span class="material-symbols-outlined text-[18px] fill-current">star</span>
                                    </div>
                                    <span class="text-sm text-[#617589] dark:text-gray-300">&amp; Up</span>
                                </label>
                                <label class="flex items-center gap-3 cursor-pointer">
                                    <input
                                        class="h-4 w-4 border-gray-300 text-primary focus:ring-primary bg-gray-100 dark:bg-gray-700"
                                        name="rating" type="radio" />
                                    <div class="flex text-amber-400">
                                        <span class="material-symbols-outlined text-[18px] fill-current">star</span>
                                        <span class="material-symbols-outlined text-[18px] fill-current">star</span>
                                        <span class="material-symbols-outlined text-[18px] fill-current">star</span>
                                        <span class="material-symbols-outlined text-[18px] fill-current">star</span>
                                        <span class="material-symbols-outlined text-[18px] text-gray-300">star</span>
                                    </div>
                                    <span class="text-sm text-[#617589] dark:text-gray-300">&amp; Up</span>
                                </label>
                            </div>
                        </details>
                    </div>
                </aside>

                <!-- Product Grid -->
                <div class="flex-1">
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                        <!-- Products -->
                        @foreach ($products as $product)
                            <div
                                class="group flex flex-col rounded-xl border border-[#dbe0e6] dark:border-gray-700 bg-white dark:bg-[#1e2732] overflow-hidden hover:shadow-lg transition-shadow duration-300">
                                <div class="relative w-full aspect-square bg-[#f8f9fa] dark:bg-[#2a3441] overflow-hidden">
                                    <img alt="{{ $product->name }}"
                                        class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500"
                                        src="{{ asset($product->image_url) }}" />

                                    @if ($product->badge)
                                        <div
                                            class="absolute top-3 left-3 bg-white dark:bg-[#101922] px-2 py-1 rounded text-xs font-bold uppercase tracking-wider text-[#111418] dark:text-white border border-[#dbe0e6] dark:border-gray-700">
                                            {{ $product->badge }}
                                        </div>
                                    @endif
                                    <button
                                        class="absolute top-3 right-3 h-9 w-9 bg-white dark:bg-[#101922] rounded-full flex items-center justify-center text-[#111418] dark:text-white hover:text-red-500 transition-colors shadow-sm opacity-0 group-hover:opacity-100 translate-y-2 group-hover:translate-y-0 duration-300">
                                        <span class="material-symbols-outlined text-[20px]">favorite</span>
                                    </button>
                                </div>
                                <div class="flex flex-col p-4 flex-1">
                                    <div class="flex items-center gap-1 mb-1">
                                        <span
                                            class="material-symbols-outlined text-[16px] text-amber-400 fill-current">star</span>
                                        <span class="text-xs font-medium text-[#617589]">{{ $product->rating }}
                                            ({{ $product->rating_count }})</span>
                                    </div>
                                    <h3
                                        class="text-[#111418] dark:text-white text-base font-bold leading-tight mb-2 line-clamp-2 min-h-[2.5rem]">
                                        {{ $product->name }}
                                    </h3>
                                    <div class="mt-auto flex flex-col gap-3">
                                        <div class="flex items-baseline gap-2">
                                            <span
                                                class="text-lg font-bold text-[#111418] dark:text-white">${{ $product->price }}</span>
                                            @if ($product->old_price)
                                                <span
                                                    class="text-sm text-[#617589] line-through">${{ $product->old_price }}</span>
                                            @endif
                                        </div>
                                        @auth
                                            <button
                                                class="w-full flex items-center justify-center gap-2 rounded-lg bg-primary hover:bg-blue-600 text-white font-bold h-10 px-4 transition-colors"
                                                wire:click="addToCart({{ $product->id }}, 1)">
                                                <span class="material-symbols-outlined text-[18px]">add_shopping_cart</span>
                                                Add to Cart
                                            </button>
                                        @else
                                            <div class="flex flex-col gap-2">
                                                <button disabled
                                                    class="w-full flex items-center justify-center gap-2 rounded-lg bg-primary hover:bg-blue-600 text-white font-bold h-10 px-4 transition-colors disabled:opacity-50 disabled:cursor-not-allowed">
                                                    <span class="material-symbols-outlined text-[18px]">add_shopping_cart</span>
                                                    Add to Cart
                                                </button>
                                                <p class="text-xs text-[#617589] dark:text-gray-400 text-center">
                                                    You need to login to add to cart
                                                </p>
                                            </div>
                                        @endauth
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <!-- Pagination -->
                    <div class="flex justify-center mt-10">
                        <nav class="flex items-center gap-2">
                            <button
                                class="flex items-center justify-center w-10 h-10 rounded-lg border border-[#dbe0e6] dark:border-gray-700 bg-white dark:bg-[#1e2732] text-[#111418] dark:text-white hover:bg-gray-50 dark:hover:bg-gray-800 disabled:opacity-50">
                                <span class="material-symbols-outlined text-[20px]">chevron_left</span>
                            </button>
                            <button
                                class="flex items-center justify-center w-10 h-10 rounded-lg bg-primary text-white font-bold shadow-sm">1</button>
                            <button
                                class="flex items-center justify-center w-10 h-10 rounded-lg border border-[#dbe0e6] dark:border-gray-700 bg-white dark:bg-[#1e2732] text-[#111418] dark:text-white hover:bg-gray-50 dark:hover:bg-gray-800 font-medium">2</button>
                            <button
                                class="flex items-center justify-center w-10 h-10 rounded-lg border border-[#dbe0e6] dark:border-gray-700 bg-white dark:bg-[#1e2732] text-[#111418] dark:text-white hover:bg-gray-50 dark:hover:bg-gray-800 font-medium">3</button>
                            <span class="flex items-end justify-center w-10 h-10 text-[#617589] pb-2">...</span>
                            <button
                                class="flex items-center justify-center w-10 h-10 rounded-lg border border-[#dbe0e6] dark:border-gray-700 bg-white dark:bg-[#1e2732] text-[#111418] dark:text-white hover:bg-gray-50 dark:hover:bg-gray-800 font-medium">12</button>
                            <button
                                class="flex items-center justify-center w-10 h-10 rounded-lg border border-[#dbe0e6] dark:border-gray-700 bg-white dark:bg-[#1e2732] text-[#111418] dark:text-white hover:bg-gray-50 dark:hover:bg-gray-800">
                                <span class="material-symbols-outlined text-[20px]">chevron_right</span>
                            </button>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
