<header class="bg-white">
    <nav class="mx-auto flex max-w-7xl items-center justify-between p-6 lg:px-8" aria-label="Global">
        <div class="flex lg:flex-1">
            <a href="#" class="-m-1.5 p-1.5">
                <span class="sr-only">Your Company</span>
                <img class="h-8 w-auto" src="https://tailwindcss.com/plus-assets/img/logos/mark.svg?color=indigo&shade=600" alt="Logo">
            </a>
        </div>

        <div class="flex lg:hidden">
            <button type="button" class="-m-2.5 inline-flex items-center justify-center rounded-md p-2.5 text-gray-700">
                <span class="sr-only">Open main menu</span>
                <svg class="size-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                </svg>
            </button>
        </div>

        <div class="hidden lg:flex lg:gap-x-12 items-center">
            <a href="/" class="text-sm font-semibold text-gray-900">Home</a>
            <a href="/blog" class="text-sm font-semibold text-gray-900">Blog</a>
            <a href="/contact" class="text-sm font-semibold text-gray-900">Contact</a>

            <div class="relative group">
                <!-- Category Button -->
                <button class="text-sm font-semibold text-gray-900 focus:outline-none">
                    Category
                </button>

                <!-- Dropdown Menu -->
                <div class="absolute left-0 mt-2 hidden group-hover:flex flex-col w-40 rounded-md bg-white shadow-lg ring-1 ring-gray-300 z-10">
                    <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Sports</a>
                    <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Crime</a>
                    <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Lifestyle</a>
                    <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Technology</a>
                    <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Health</a>
                </div>
            </div>
            <div class="relative">
                <input
                    type="text"
                    placeholder="Search..."
                    class="text-sm rounded-md border border-gray-300 px-3 py-1.5 focus:outline-none focus:ring-2 focus:ring-indigo-500" />
                <button class="absolute right-1 top-1/2 -translate-y-1/2 text-gray-500 hover:text-indigo-600">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-4.35-4.35M16.65 16.65A7.5 7.5 0 1 0 3 10.5a7.5 7.5 0 0 0 13.65 6.15Z" />
                    </svg>
                </button>
            </div>


        </div>
    </nav>
</header>