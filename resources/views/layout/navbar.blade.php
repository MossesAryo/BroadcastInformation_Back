<nav class="bg-theme text-white shadow-md">
    <div class="max-w-full mx-auto px-4">
        <div class="flex justify-between items-center h-16">
            <div class="flex items-center">
                <!-- Mobile menu button -->
                <button @click="sidebarOpen = !sidebarOpen" type="button" class="md:hidden inline-flex items-center justify-center p-2 rounded-md text-white hover:bg-white hover:bg-opacity-10 transition duration-200">
                    <i class="fas fa-bars fa-lg"></i>
                </button>
                <!-- Logo -->
                <div class="flex-shrink-0 flex items-center">
                    <span class="text-white text-xl font-bold ml-2 md:ml-0">EduInform</span>
                </div>
            </div>
            
            <!-- Sign Out Button -->
            <div class="flex items-center">
                <a href="{{ route('logout') }}" 
                   class="inline-flex items-center bg-red-600 hover:bg-red-700 text-white font-medium py-2 px-4 rounded-md transition duration-200 text-sm focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 focus:ring-offset-transparent">
                    <i class="fas fa-sign-out-alt mr-2"></i>
                    Sign Out
                </a>
            </div>
        </div>
    </div>
</nav>