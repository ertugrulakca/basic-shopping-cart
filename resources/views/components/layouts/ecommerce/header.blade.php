<!-- Header -->
<header
    class="flex items-center justify-between whitespace-nowrap border-b border-solid border-b-[#f0f2f4] dark:border-[#333] px-10 py-3 bg-white dark:bg-[#1e2732] sticky top-0 z-50">
    <div class="flex items-center gap-8">
        <div class="flex items-center gap-4 text-[#111418] dark:text-white">
            <div class="size-8 text-primary">
                <span class="material-symbols-outlined text-4xl">shopping_bag</span>
            </div>
            <h2 class="text-[#111418] dark:text-white text-lg font-bold leading-tight tracking-[-0.015em]">
                ShopNow</h2>
        </div>
        <label class="flex flex-col min-w-40 !h-10 max-w-64 hidden md:flex">
            <div class="flex w-full flex-1 items-stretch rounded-lg h-full">
                <div
                    class="text-[#617589] flex border-none bg-[#f0f2f4] dark:bg-[#333] items-center justify-center pl-4 rounded-l-lg border-r-0">
                    <span class="material-symbols-outlined text-[24px]">search</span>
                </div>
                <input wire:model.live="search"
                    class="form-input flex w-full min-w-0 flex-1 resize-none overflow-hidden rounded-lg text-[#111418] dark:text-white focus:outline-0 focus:ring-0 border-none bg-[#f0f2f4] dark:bg-[#333] focus:border-none h-full placeholder:text-[#617589] px-4 rounded-l-none border-l-0 pl-2 text-base font-normal leading-normal"
                    placeholder="Search products..." />
            </div>
        </label>
    </div>
    <div class="flex flex-1 justify-end gap-8">
        <div class="flex items-center gap-9 hidden lg:flex">
            <a class="text-[#111418] dark:text-white text-sm font-medium leading-normal hover:text-primary"
                href="{{ route('home') }}">Home</a>
            <a class="text-[#111418] dark:text-white text-sm font-medium leading-normal hover:text-primary"
                href="#">Shop</a>
            <a class="text-[#111418] dark:text-white text-sm font-medium leading-normal hover:text-primary"
                href="#">Deals</a>
            <a class="text-[#111418] dark:text-white text-sm font-medium leading-normal hover:text-primary"
                href="#">Contact</a>
        </div>
        <div class="flex gap-2">
            <button @click="darkMode = !darkMode"
                class="flex max-w-[480px] cursor-pointer items-center justify-center overflow-hidden rounded-lg h-10 bg-[#f0f2f4] dark:bg-[#333] text-[#111418] dark:text-white hover:bg-[#e0e2e4] dark:hover:bg-[#444] transition-colors gap-2 text-sm font-bold leading-normal tracking-[0.015em] min-w-0 px-2.5">
                <span class="material-symbols-outlined text-[20px]" x-text="darkMode ? 'light_mode' : 'dark_mode'"></span>
            </button>
            
            <button
                class="flex max-w-[480px] cursor-pointer items-center justify-center overflow-hidden rounded-lg h-10 bg-[#f0f2f4] dark:bg-[#333] text-[#111418] dark:text-white hover:bg-[#e0e2e4] dark:hover:bg-[#444] transition-colors gap-2 text-sm font-bold leading-normal tracking-[0.015em] min-w-0 px-2.5 relative">
                <span class="material-symbols-outlined text-[20px]">shopping_cart</span>
                <span class="absolute top-1 right-1 h-2 w-2 rounded-full bg-primary"></span>
            </button>
            
            @auth
                <button wire:click="logout" type="button"
                    class="flex max-w-[480px] cursor-pointer items-center justify-center overflow-hidden rounded-lg h-10 bg-[#f0f2f4] dark:bg-[#333] text-[#111418] dark:text-white hover:bg-[#e0e2e4] dark:hover:bg-[#444] transition-colors gap-2 text-sm font-bold leading-normal tracking-[0.015em] min-w-0 px-2.5">
                    <span class="material-symbols-outlined text-[20px]">exit_to_app</span>
                </button>
            @else
                <a href="{{ route('login') }}"
                    class="flex max-w-[480px] cursor-pointer items-center justify-center overflow-hidden rounded-lg h-10 bg-[#f0f2f4] dark:bg-[#333] text-[#111418] dark:text-white hover:bg-[#e0e2e4] dark:hover:bg-[#444] transition-colors gap-2 text-sm font-bold leading-normal tracking-[0.015em] min-w-0 px-2.5">
                    <span class="material-symbols-outlined text-[20px]">account_circle</span>
                </a>
            @endauth
        </div>
    </div>
</header>

