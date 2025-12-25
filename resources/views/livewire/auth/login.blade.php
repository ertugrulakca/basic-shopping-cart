<!DOCTYPE html>

<html class="light" lang=" lang="{{ str_replace('_', '-', app()->getLocale()) }}"">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>Login - ShopCart</title>
    <link href="https://fonts.googleapis.com" rel="preconnect" />
    <link crossorigin="" href="https://fonts.gstatic.com" rel="preconnect" />
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;700;900&amp;display=swap"
        rel="stylesheet" />
    <link
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap"
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
                        "surface-dark": "#1a232e",
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

<body class="bg-background-light dark:bg-background-dark font-display text-[#111418] dark:text-white"
    style="--checkbox-tick-svg: url('data:image/svg+xml,%3csvg viewBox=%270 0 16 16%27 fill=%27rgb(255,255,255)%27 xmlns=%27http://www.w3.org/2000/svg%27%3e%3cpath d=%27M12.207 4.793a1 1 0 010 1.414l-5 5a1 1 0 01-1.414 0l-2-2a1 1 0 011.414-1.414L6.5 9.086l4.293-4.293a1 1 0 011.414 0z%27/%3e%3c/svg%3e');">
    <div class="relative flex min-h-screen w-full flex-row overflow-x-hidden">
        <!-- Left Side: Hero Image / Branding -->
        <div class="hidden lg:flex lg:w-1/2 relative flex-col justify-between bg-black">
            <!-- Background Image -->
            <div class="absolute inset-0 z-0">
                <img alt="Woman carrying shopping bags walking down a city street"
                    class="h-full w-full object-cover opacity-80"
                    data-alt="Fashionable woman holding shopping bags walking in a city"
                    src="{{ asset('images/login-banner.png') }}" />
                <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/20 to-transparent"></div>
            </div>
            <!-- Content Overlay -->
            <div class="relative z-10 p-12 flex flex-col h-full justify-between">
                <div class="flex items-center gap-4 text-white">
                    <div class="size-8 text-white">
                        <svg class="h-full w-full" fill="none" viewbox="0 0 48 48" xmlns="http://www.w3.org/2000/svg">
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
                    <h2 class="text-white text-xl font-bold tracking-tight">ShopCart</h2>
                </div>
                <div class="max-w-md">
                    <blockquote class="text-2xl font-medium text-white mb-6">
                        "The best way to shop online. Discover trends, track orders, and enjoy exclusive deals all in
                        one place."
                    </blockquote>
                    <div class="flex gap-2">
                        <div class="h-1 w-8 bg-primary rounded-full"></div>
                        <div class="h-1 w-2 bg-white/30 rounded-full"></div>
                        <div class="h-1 w-2 bg-white/30 rounded-full"></div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Right Side: Login Form -->
        <div
            class="flex w-full lg:w-1/2 flex-col items-center justify-center p-6 sm:p-12 md:p-24 bg-white dark:bg-surface-dark transition-colors duration-200">
            <div class="w-full max-w-[480px] flex flex-col gap-8">
                <!-- Mobile Logo (Visible only on small screens) -->
                <div class="flex lg:hidden items-center gap-3 mb-4 text-[#111418] dark:text-white">
                    <div class="size-8">
                        <svg class="w-full h-full text-primary" fill="none" viewbox="0 0 48 48"
                            xmlns="http://www.w3.org/2000/svg">
                            <g clip-path="url(#clip0_mobile)">
                                <path
                                    d="M8.57829 8.57829C5.52816 11.6284 3.451 15.5145 2.60947 19.7452C1.76794 23.9758 2.19984 28.361 3.85056 32.3462C5.50128 36.3314 8.29667 39.7376 11.8832 42.134C15.4698 44.5305 19.6865 45.8096 24 45.8096C28.3135 45.8096 32.5302 44.5305 36.1168 42.134C39.7033 39.7375 42.4987 36.3314 44.1494 32.3462C45.8002 28.361 46.2321 23.9758 45.3905 19.7452C44.549 15.5145 42.4718 11.6284 39.4217 8.57829L24 24L8.57829 8.57829Z"
                                    fill="currentColor"></path>
                            </g>
                            <defs>
                                <clippath id="clip0_mobile">
                                    <rect fill="white" height="48" width="48"></rect>
                                </clippath>
                            </defs>
                        </svg>
                    </div>
                    <h2 class="text-xl font-bold tracking-tight">ShopCart</h2>
                </div>
                <!-- Header Section -->
                <div class="flex flex-col gap-3">
                    <h1 class="text-[#111418] dark:text-white tracking-tight text-[32px] font-black leading-tight">
                        Welcome Back
                    </h1>
                    <p class="text-[#617589] dark:text-gray-400 text-base font-normal leading-normal">
                        Log in to access your orders, wishlist, and exclusive offers.
                    </p>
                </div>
                <!-- Form Section -->
                <form class="flex flex-col gap-6" method="POST" action="{{ route('login.store') }}">
                    @csrf
                    <!-- Email Field -->
                    <label class="flex flex-col w-full gap-2">
                        <p class="text-[#111418] dark:text-gray-200 text-base font-medium leading-normal">Email</p>
                        <input
                            class="form-input flex w-full min-w-0 flex-1 resize-none overflow-hidden rounded-lg text-[#111418] dark:text-white focus:outline-0 focus:ring-2 focus:ring-primary/20 border border-[#dbe0e6] dark:border-gray-600 bg-white dark:bg-gray-800 focus:border-primary h-14 placeholder:text-[#617589] p-[15px] text-base font-normal leading-normal transition-all"
                            name="email" :label="__('Email address')" :value="old('email')" type="email" required autofocus autocomplete="email" placeholder="email@example.com"/>
                    </label>
                    <!-- Password Field -->
                    <label class="flex flex-col w-full gap-2">
                        <div class="flex justify-between items-center">
                            <p class="text-[#111418] dark:text-gray-200 text-base font-medium leading-normal">Password
                            </p>
                        </div>
                        <div
                            class="flex w-full flex-1 items-stretch rounded-lg group focus-within:ring-2 focus-within:ring-primary/20">
                            <input
                                class="form-input flex w-full min-w-0 flex-1 resize-none overflow-hidden rounded-lg rounded-r-none border border-[#dbe0e6] dark:border-gray-600 border-r-0 bg-white dark:bg-gray-800 text-[#111418] dark:text-white focus:outline-0 focus:ring-0 focus:border-primary h-14 placeholder:text-[#617589] p-[15px] text-base font-normal leading-normal transition-all"
                                name="password" :label="__('Password')" type="password" required autocomplete="current-password" :placeholder="__('Password')" viewable />
                            <div
                                class="text-[#617589] flex border border-[#dbe0e6] dark:border-gray-600 bg-white dark:bg-gray-800 items-center justify-center pr-[15px] rounded-r-lg border-l-0 cursor-pointer group-focus-within:border-primary">
                                <span class="material-symbols-outlined select-none"
                                    style="font-size: 24px;">visibility</span>
                            </div>
                        </div>
                    </label>
                    <!-- Actions Row -->
                    <div class="flex flex-wrap items-center justify-between gap-4">
                        <label class="flex gap-x-3 items-center cursor-pointer">
                            <input
                                class="h-5 w-5 rounded border-[#dbe0e6] border-2 bg-transparent text-primary checked:bg-primary checked:border-primary checked:bg-[image:--checkbox-tick-svg] focus:ring-0 focus:ring-offset-0 focus:border-primary focus:outline-none transition-colors"
                                type="checkbox" name="remember" :label="__('Remember me')" :checked="old('remember')" />
                            <p
                                class="text-[#111418] dark:text-gray-300 text-base font-normal leading-normal select-none">
                                Remember Me</p>
                        </label>
                        <a class="text-primary text-base font-medium hover:underline" href="#">Forgot Password?</a>
                    </div>
                    <!-- Login Button -->
                    <button
                        class="flex w-full cursor-pointer items-center justify-center overflow-hidden rounded-lg h-12 bg-primary hover:bg-blue-600 text-white text-base font-bold leading-normal tracking-[0.015em] transition-colors shadow-sm active:scale-[0.98]">
                        <span class="truncate">Log In</span>
                    </button>
                </form>
                <!-- Footer -->
                <div class="flex items-center justify-center gap-1 text-base text-[#617589] dark:text-gray-400">
                    <p>Don't have an account?</p>
                    <a class="font-bold text-primary hover:underline" href="{{ route('register') }}">Sign Up</a>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
