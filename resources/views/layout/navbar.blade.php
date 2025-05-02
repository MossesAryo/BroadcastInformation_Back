<nav class="bg-theme text-white shadow-md">
    <div class="max-w-full mx-auto px-4">
        <div class="flex justify-between h-16">
            <div class="flex items-center">
                <!-- Mobile menu button -->
                <button @click="sidebarOpen = !sidebarOpen" type="button" class="md:hidden inline-flex items-center justify-center p-2 rounded-md text-white">
                    <i class="fas fa-bars fa-lg"></i>
                </button>
                <!-- Logo -->
                <div class="flex-shrink-0 flex items-center">
                    <span class="text-white text-xl font-bold ml-2 md:ml-0">Admin Panel</span>
                </div>
            </div>

            <!-- Right side menu -->
            <div class="flex items-center space-x-4">
                <!-- Notifications -->
                <button onclick="window.location='{{ route('notifikasi') }}'" class="p-2 text-white relative">
                    <i class="fas fa-bell fa-lg"></i>

                    {{-- <span class="absolute -top-1 -right-1 bg-red-500 text-white text-xs w-4 h-4 flex items-center justify-center rounded-full">3</span> --}}
                </button>

                <!-- User menu -->
                <div class="relative" x-data="{ open: false }">
                    <button @click="open = !open" class="flex items-center text-sm rounded-full focus:outline-none">
                        <div class="h-8 w-8  bg-white flex items-center justify-center text-theme">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                              </svg>

                        </div>
                    </button>
                    <!-- User dropdown menu -->
                    <div x-show="open" @click.away="open = false" x-cloak class="origin-top-right absolute right-0 mt-2 w-48 rounded-md shadow-lg py-1 bg-white ring-1 ring-black ring-opacity-5 focus:outline-none" role="menu">

                        <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Settings</a>
                        <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Sign out</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</nav>
