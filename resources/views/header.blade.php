<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laravel | Tailwind Project</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tw-elements/dist/css/tw-elements.min.css" />
    @vite('resources/css/app.css', 'resources/js/app.js')
</head>

<body>
    <header class="text-gray-400 bg-gray-900 body-font hidden lg:block  md:hidden">
        <div class="container mx-auto flex flex-wrap p-5 flex-col md:flex-row items-center">
            <a class="flex title-font font-medium items-center text-white mb-4 md:mb-0" href="/">
                <span class="ml-3 text-xl">Laravel | Dashboard</span>   
            </a>
            <nav
                class="md:mr-auto md:ml-4 md:py-1 md:pl-4 md:border-l md:border-gray-700	flex flex-wrap items-center text-base justify-center">
                <a class="mr-5 hover:text-white {{ request()->is('home') ? 'text-white' : (request()->is('/') ? 'text-white' : '') }}"
                    href="{{ route('home') }}">Home</a>
                <a class="mr-5 hover:text-white {{ request()->is('movie-profile') ? 'text-white' : '' }}"
                    href="{{ route('movie-profile') }}">Movie Profile</a>
                <a
                    class="mr-5 hover:text-white {{ request()->is('notification') ? 'text-white' : '' }}">Notifications</a>
                <a class="mr-5 hover:text-white {{ (request()->is('movie-management') ? 'text-white' : request()->is('movie-management/*')) ? 'text-white' : '' }}"
                    href="{{ route('movie-management/') }}">Movie Management</a>
            </nav>
            <div class="pr-1">
                @include('notification')
            </div>
            <button
                class="inline-flex items-center border border-gray-900 rounded-full 0 p-1 transition-all hover:border-white  focus:outline-none text-base mt-4 md:mt-0">
                <img src="https://tecdn.b-cdn.net/img/new/avatars/2.webp" class="w-8 rounded-full" alt="Avatar" />
            </button>
        </div>
    </header>
    <div class="absolute z-10 top-5 px-4 lg:hidden flex justify-between w-full">
        <div onclick="openMobMenu()">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor" class="w-6 h-6 text-white ">
                <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
            </svg>
        </div>
        <div class="text-white">
            Dashboard
        </div>
        <div class="pr-1 text-white float-right">
            @include('notification')
        </div>
    </div>
    <header
        class="bg-gray-800 w-64 h-screen fixed top-0 z-10 transition-all left-[-400px] lg:hidden block cursor-pointer"
        id="mobMenuId">
        <div class="relative h-full w-full">
            <div class="absolute right-3 top-[-20px]" onclick="closeMobMenu()">
                {{-- CANCEL ICON --}}
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="w-6 h-6 text-white">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </div>
            <div class="container mx-auto flex flex-wrap p-5 flex-col md:flex-row items-center mt-10">
                <a class="flex title-font font-medium items-center text-white mb-4 md:mb-0" href="/">
                    <span class="ml-3 text-xl">Laravel | Dashboard</span>
                </a>
                <nav class="flex flex-col md:ml-3 md:mt-3">
                    <a class="mr-5 hover:text-white {{ request()->is('home') ? 'text-white' : '' }} text-gray-400"
                        href="{{ route('home') }}">Home</a>
                    <a class="mr-5 hover:text-white {{ request()->is('movie-profile') ? 'text-white' : '' }} text-gray-400"
                        href="{{ route('movie-profile') }}">Movie Profile</a>
                    <a
                        class="mr-5 hover:text-white {{ request()->is('notification') ? 'text-white' : '' }} text-gray-400">Notifications</a>
                    <a class="mr-5 hover:text-white {{ (request()->is('movie-management') ? 'text-white' : request()->is('movie-management/*')) ? 'text-white' : '' }} text-gray-400"
                        href="{{ route('movie-management/') }}">Movie Management</a>
                </nav>
                <button
                    class="absolute bottom-14 left-10 flex align-center text-white border-0 outline-none p-1 transition-all hover:border-white  focus:outline-none text-base mt-4 md:mt-0">
                    <img src="https://tecdn.b-cdn.net/img/new/avatars/2.webp" class="w-8 rounded-full" alt="Avatar" />
                    <span class="ml-2">Profile</span>
                </button>
            </div>
        </div>
    </header>
    <script>
        function closeMobMenu() {
            const mobMenuId = document.getElementById("mobMenuId");
            mobMenuId.style.left = "-400px"
        }

        function openMobMenu() {
            const mobMenuId = document.getElementById("mobMenuId");
            mobMenuId.style.left = "0"
        }
    </script>
