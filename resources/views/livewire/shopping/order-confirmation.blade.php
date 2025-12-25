<main class="flex-grow flex flex-col items-center justify-center px-4 md:px-10">
    <div class="flex flex-col items-center gap-6 text-center max-w-2xl mb-10 animate-fade-in-up">
        <div class="size-20 bg-primary/10 rounded-full flex items-center justify-center text-primary">
            <span class="material-symbols-outlined text-5xl">check_circle</span>
        </div>
        <div class="flex flex-col gap-2">
            <h1 class="text-[#111418] dark:text-white tracking-tight text-3xl md:text-4xl font-extrabold leading-tight">
                Payment Successful!
            </h1>
        </div>
    </div>
    <a href="{{ route('home') }}"
        class="w-full sm:w-auto px-8 py-3 bg-primary hover:bg-blue-600 active:bg-blue-700 text-white text-base font-bold rounded-lg transition-all shadow-md shadow-blue-500/20 flex items-center justify-center gap-2">
        Continue Shopping
    </a>
</main>
