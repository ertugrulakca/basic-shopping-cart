<!DOCTYPE html>

<html class="light" lang="en">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>Registration Page - ShopCart</title>
    <link
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap"
        rel="stylesheet" />
    <link href="https://fonts.googleapis.com" rel="preconnect" />
    <link crossorigin="" href="https://fonts.gstatic.com" rel="preconnect" />
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&amp;display=swap"
        rel="stylesheet" />
    <link
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap"
        rel="stylesheet" />
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <script id="tailwind-config">
        tailwind.config = {
            darkMode: "class",
            theme: {
                extend: {
                    colors: {
                        "primary": "#137fec",
                        "background-light": "#f6f7f8",
                        "background-dark": "#101922",
                    },
                    fontFamily: {
                        "display": ["Inter", "sans-serif"]
                    },
                    borderRadius: { "DEFAULT": "0.25rem", "lg": "0.5rem", "xl": "0.75rem", "full": "9999px" },
                },
            },
        }
    </script>
</head>

<body
    class="bg-background-light dark:bg-background-dark font-display text-[#111418] dark:text-white transition-colors duration-200">
    <div class="relative flex min-h-screen flex-col overflow-hidden">
        <!-- Header -->
        <header
            class="flex items-center justify-between whitespace-nowrap border-b border-solid border-b-[#f0f2f4] dark:border-gray-800 px-10 py-4 bg-white dark:bg-[#1a202c]">
            <div class="flex items-center gap-4 text-[#111418] dark:text-white cursor-pointer">
                <div class="size-6 text-primary">
                    <svg fill="none" viewbox="0 0 48 48" xmlns="http://www.w3.org/2000/svg">
                        <g clip-path="url(#clip0_6_319)">
                            <path
                                d="M8.57829 8.57829C5.52816 11.6284 3.451 15.5145 2.60947 19.7452C1.76794 23.9758 2.19984 28.361 3.85056 32.3462C5.50128 36.3314 8.29667 39.7376 11.8832 42.134C15.4698 44.5305 19.6865 45.8096 24 45.8096C28.3135 45.8096 32.5302 44.5305 36.1168 42.134C39.7033 39.7375 42.4987 36.3314 44.1494 32.3462C45.8002 28.361 46.2321 23.9758 45.3905 19.7452C44.549 15.5145 42.4718 11.6284 39.4217 8.57829L24 24L8.57829 8.57829Z"
                                fill="currentColor"></path>
                        </g>
                        <defs>
                            <clippath id="clip0_6_319">
                                <rect fill="white" height="48" width="48"></rect>
                            </clippath>
                        </defs>
                    </svg>
                </div>
                <h2 class="text-lg font-bold leading-tight tracking-[-0.015em]">ShopCart</h2>
            </div>
            <div class="flex gap-4 items-center">
                <span class="text-sm font-medium text-gray-600 dark:text-gray-400 hidden sm:block">Already a
                    member?</span>
                <button
                    class="flex min-w-[84px] cursor-pointer items-center justify-center overflow-hidden rounded-lg h-10 px-4 bg-[#f0f2f4] hover:bg-[#e5e7eb] dark:bg-gray-800 dark:hover:bg-gray-700 text-[#111418] dark:text-white text-sm font-bold leading-normal tracking-[0.015em] transition-colors">
                    <a href="{{ route('login') }}" class="truncate">Log In</a>
                </button>
            </div>
        </header>
        <!-- Main Content -->
        <main class="flex-1 flex justify-center py-10 px-4 sm:px-6 lg:px-8">
            <div class="w-full max-w-[480px]">
                <!-- Card Container -->
                <div
                    class="bg-white dark:bg-[#1a202c] rounded-xl shadow-sm border border-[#e5e7eb] dark:border-gray-800 p-6 sm:p-8">
                    <!-- Heading -->
                    <div class="mb-8">
                        <h1
                            class="text-[#111418] dark:text-white tracking-tight text-[32px] font-bold leading-tight mb-2">
                            Create an Account</h1>
                        <p class="text-[#617589] dark:text-gray-400 text-sm font-normal leading-normal">Start shopping
                            for the best deals today.</p>
                    </div>
                    <div class="relative flex py-2 items-center mb-6">
                        <div class="flex-grow border-t border-gray-200 dark:border-gray-700"></div>
                        <span
                            class="flex-shrink-0 mx-4 text-gray-400 dark:text-gray-500 text-xs font-medium uppercase">
                            Register with email
                        </span>
                        <div class="flex-grow border-t border-gray-200 dark:border-gray-700"></div>
                    </div>
                    <!-- Form -->
                    <form class="flex flex-col gap-4" method="POST" action="{{ route('register.store') }}">
                        @csrf
                        <!-- Full Name -->
                        <label class="flex flex-col flex-1">
                            <p class="text-[#111418] dark:text-gray-200 text-sm font-medium leading-normal pb-2">Full
                                Name
                            </p>
                            <input
                                class="form-input flex w-full min-w-0 flex-1 resize-none overflow-hidden rounded-lg text-[#111418] dark:text-white focus:outline-0 focus:ring-2 focus:ring-primary/50 focus:border-primary border border-[#dbe0e6] dark:border-gray-600 bg-white dark:bg-gray-800 h-12 placeholder:text-[#617589] dark:placeholder:text-gray-500 px-4 text-sm font-normal leading-normal transition-all"
                                name="name" :label="__('Name')" :value="old('name')" type="text" required autofocus
                                autocomplete="name" :placeholder="__('Full name')" />
                        </label>
                        <!-- Email -->
                        <label class="flex flex-col flex-1">
                            <p class="text-[#111418] dark:text-gray-200 text-sm font-medium leading-normal pb-2">Email
                                Address</p>
                            <input
                                class="form-input flex w-full min-w-0 flex-1 resize-none overflow-hidden rounded-lg text-[#111418] dark:text-white focus:outline-0 focus:ring-2 focus:ring-primary/50 focus:border-primary border border-[#dbe0e6] dark:border-gray-600 bg-white dark:bg-gray-800 h-12 placeholder:text-[#617589] dark:placeholder:text-gray-500 px-4 text-sm font-normal leading-normal transition-all"
                                name="email" :label="__('Email address')" :value="old('email')" type="email" required
                                autocomplete="email" placeholder="email@example.com" />
                        </label>
                        <!-- Password -->
                        <label class="flex flex-col flex-1">
                            <p class="text-[#111418] dark:text-gray-200 text-sm font-medium leading-normal pb-2">
                                Password</p>
                            <div class="relative flex w-full items-center">
                                <input
                                    class="form-input flex w-full min-w-0 flex-1 resize-none overflow-hidden rounded-lg text-[#111418] dark:text-white focus:outline-0 focus:ring-2 focus:ring-primary/50 focus:border-primary border border-[#dbe0e6] dark:border-gray-600 bg-white dark:bg-gray-800 h-12 placeholder:text-[#617589] dark:placeholder:text-gray-500 pl-4 pr-12 text-sm font-normal leading-normal transition-all"
                                    name="password" :label="__('Password')" type="password" required autocomplete="new-password"
                                    :placeholder="__('Password')" viewable />
                                <div
                                    class="absolute right-0 top-0 bottom-0 flex items-center pr-3 text-[#617589] dark:text-gray-400 cursor-pointer hover:text-primary transition-colors">
                                    <span class="material-symbols-outlined text-[20px]">visibility</span>
                                </div>
                            </div>
                        </label>
                        <!-- Confirm Password -->
                        <label class="flex flex-col flex-1">
                            <p class="text-[#111418] dark:text-gray-200 text-sm font-medium leading-normal pb-2">Confirm
                                Password</p>
                            <div class="relative flex w-full items-center">
                                <input
                                    class="form-input flex w-full min-w-0 flex-1 resize-none overflow-hidden rounded-lg text-[#111418] dark:text-white focus:outline-0 focus:ring-2 focus:ring-primary/50 focus:border-primary border border-[#dbe0e6] dark:border-gray-600 bg-white dark:bg-gray-800 h-12 placeholder:text-[#617589] dark:placeholder:text-gray-500 pl-4 pr-12 text-sm font-normal leading-normal transition-all"
                                    name="password_confirmation" :label="__('Confirm password')" type="password" required
                                    autocomplete="new-password" :placeholder="__('Confirm password')" viewable />
                                <div
                                    class="absolute right-0 top-0 bottom-0 flex items-center pr-3 text-[#617589] dark:text-gray-400 cursor-pointer hover:text-primary transition-colors">
                                    <span class="material-symbols-outlined text-[20px]">visibility_off</span>
                                </div>
                            </div>
                        </label>
                        <!-- Terms Checkbox -->
                        <div class="flex items-start gap-3 py-2">
                            <div class="flex h-5 items-center">
                                <input
                                    class="h-4 w-4 rounded border-gray-300 text-primary focus:ring-primary dark:border-gray-600 dark:bg-gray-700 dark:ring-offset-gray-800"
                                    id="terms" name="terms" type="checkbox" required />
                            </div>
                            <div class="text-sm">
                                <label class="font-normal text-gray-500 dark:text-gray-400" for="terms">By creating an
                                    account, you agree to our <a class="font-medium text-primary hover:text-primary/80"
                                        href="#">Terms of Service</a> and <a class="font-medium text-primary hover:text-primary/80"
                                        href="#">Privacy Policy</a>.</label>
                            </div>
                        </div>
                        <!-- Submit Button -->
                        <button
                            class="flex w-full cursor-pointer items-center justify-center overflow-hidden rounded-lg h-12 px-4 bg-primary hover:bg-primary/90 text-white text-base font-bold leading-normal tracking-[0.015em] transition-all shadow-md hover:shadow-lg mt-2"
                            type="submit">
                            {{ __('Create account') }}
                        </button>
                    </form>
                </div>
                <!-- Footer Links -->
                <div class="text-center mt-8 space-y-4">
                    <p class="text-[#617589] dark:text-gray-400 text-sm">
                        © 2024 This application is a demo for a technical interview purpose. Not a real application.
                    </p>
                </div>
            </div>
        </main>
    </div>
</body>

</html>
