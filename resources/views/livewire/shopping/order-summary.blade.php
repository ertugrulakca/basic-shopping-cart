<aside class="lg:col-span-4 mt-8 lg:mt-0">
    <div
        class="sticky top-24 bg-white dark:bg-[#1C252E] rounded-xl shadow-sm border border-[#f0f2f4] dark:border-[#2A3441] p-6">
        <h2 class="text-lg font-bold text-[#111418] dark:text-white mb-4">Order Summary</h2>
        <div class="flex flex-col gap-3 pb-6 border-b border-[#f0f2f4] dark:border-[#2A3441]">
            <div class="flex justify-between text-sm">
                <span class="text-[#617589] dark:text-gray-400">Subtotal</span>
                <span class="font-medium">$719.00</span>
            </div>
            <div class="flex justify-between text-sm">
                <span class="text-[#617589] dark:text-gray-400">Shipping estimate</span>
                <span class="font-medium text-green-600 dark:text-green-500">Free</span>
            </div>
            <div class="flex justify-between text-sm">
                <span class="text-[#617589] dark:text-gray-400">Tax estimate</span>
                <span class="font-medium">$57.52</span>
            </div>
        </div>
        <div class="py-6">
            <div class="flex justify-between items-center mb-6">
                <span class="text-lg font-bold">Order Total</span>
                <span class="text-2xl font-black text-[#111418] dark:text-white">${{ $totalPrice }}</span>
            </div>
            <div class="mb-4">
                <label class="sr-only" for="promo">Promo Code</label>
                <div class="flex gap-2">
                    <input
                        class="flex-1 rounded-lg border border-[#e5e7eb] dark:border-[#2A3441] bg-[#f9fafb] dark:bg-[#101922] px-3 py-2 text-sm focus:border-primary focus:ring-1 focus:ring-primary dark:text-white"
                        id="promo" placeholder="Promo code" type="text" />
                    <button
                        class="rounded-lg bg-[#f0f2f4] dark:bg-[#2A3441] px-4 py-2 text-sm font-semibold text-[#111418] dark:text-white hover:bg-[#e0e2e4] dark:hover:bg-[#354050] transition-colors">Apply</button>
                </div>
            </div>
            <button
                class="w-full rounded-lg bg-primary hover:bg-blue-600 py-3.5 px-4 text-center text-sm font-bold text-white shadow-sm transition-all focus:outline-none focus:ring-2 focus:ring-primary focus:ring-offset-2 dark:focus:ring-offset-[#1C252E]">
                Proceed to Checkout
            </button>
            <div
                class="mt-4 flex flex-col gap-2 items-center justify-center text-xs text-[#617589] dark:text-gray-400">
                <div class="flex items-center gap-1.5">
                    <span class="material-symbols-outlined text-base">lock</span>
                    <span>Secure Checkout</span>
                </div>
                <p>30-Day Money-Back Guarantee</p>
            </div>
        </div>
    </div>
</aside>
