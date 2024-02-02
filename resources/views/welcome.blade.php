<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="https://cdn.tailwindcss.com"></script>
        <title>Laravel</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

        
    </head>
    <body>
            <nav x-data="{ isOpen: false }" class="bg-white shadow dark:bg-orange-400">
                <div class="container px-6 py-4 mx-auto">
                    <div class="lg:flex lg:items-center lg:justify-between">
                        <div class="flex items-center justify-between">
                            <a href="#" class="mx-auto ">
                                <img class="w-auto h-6 sm:h-7" src="https://merakiui.com/images/full-logo.svg" alt="">
                            </a>
        
                            <!-- Mobile menu button -->
                            <div class="flex lg:hidden">
                               <button x-cloak @click="isOpen = !isOpen" type="button" class="text-gray-500 dark:text-gray-200 hover:text-gray-600 dark:hover:text-gray-400 focus:outline-none focus:text-gray-600 dark:focus:text-gray-400" aria-label="toggle menu">
                                    <svg x-show="!isOpen" xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M4 8h16M4 16h16" />
                                    </svg>
                            
                                    <svg x-show="isOpen" xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </nav>
        
            <div class="w-full bg-center bg-cover h-[669px]" style="background-image: url('https://images.unsplash.com/photo-1556761175-b413da4baf72?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1374&q=80');">
                <div class="flex items-center justify-center w-full h-full bg-gray-900/40">
                    <div class="text-center">
                        <h1 class="text-3xl font-semibold text-white lg:text-4xl">Build your new <span class="text-orange-400">Saas</span> Project</h1>
                        <button class="w-full px-5 py-2 mt-4 text-sm font-medium text-white capitalize transition-colors duration-300 transform bg-orange-400 rounded-md lg:w-auto hover:bg-orange-500 focus:outline-none focus:bg-orange-500">Start project</button>
                    </div>
                </div>
            </div>
    </body>
</html>
