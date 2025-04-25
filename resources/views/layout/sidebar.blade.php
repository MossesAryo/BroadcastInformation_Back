<div x-cloak :class="{'block': sidebarOpen, 'hidden': !sidebarOpen}" @click="sidebarOpen = false" class="fixed inset-0 z-20 transition-opacity bg-gray-500 bg-opacity-75 md:hidden"></div>

        <div x-cloak :class="{'translate-x-0': sidebarOpen, '-translate-x-full': !sidebarOpen}" class="fixed inset-y-0 left-0 z-30 w-64 bg-white transform transition duration-300 md:translate-x-0 md:static md:h-auto border-r border-gray-200">
            <div class="h-16 flex items-center justify-center border-b border-gray-200 md:hidden">
                <span class="text-theme text-xl font-bold">AdminPanel</span>
            </div>

            <nav class="mt-5 px-2 space-y-1">
                <a  href="{{ url('/') }}" class="group flex items-center px-2 py-2 text-base font-medium rounded-md bg-theme text-white">
                    <i class="fas fa-home mr-3"></i>
                    Dashboard
                </a>
                <a  href="{{ url('/users') }}" class="group flex items-center px-2 py-2 text-base font-medium rounded-md text-gray-600 hover:bg-theme-light hover:text-theme">
                    <i class="fas fa-users mr-3 text-gray-400"></i>
                    Users
                </a>
                <a   href="{{ url('/informasi') }}" class="group flex items-center px-2 py-2 text-base font-medium rounded-md text-gray-600 hover:bg-theme-light hover:text-theme">
                    <i class="fas fa-file-invoice mr-3 text-gray-400"></i>
                    Informasi
                </a>
                <a href="#" class="group flex items-center px-2 py-2 text-base font-medium rounded-md text-gray-600 hover:bg-theme-light hover:text-theme">
                    <i class="fas fa-bell mr-3 text-gray-400"></i>
                    Notifikasi
                </a>
            </nav>
        </div>
