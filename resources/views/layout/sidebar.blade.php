<div x-cloak :class="{'block': sidebarOpen, 'hidden': !sidebarOpen}" @click="sidebarOpen = false" class="fixed inset-0 z-20 transition-opacity bg-gray-500 bg-opacity-75 md:hidden"></div>
<div x-cloak :class="{'translate-x-0': sidebarOpen, '-translate-x-full': !sidebarOpen}" class="fixed inset-y-0 left-0 z-30 w-64 bg-white transform transition duration-300 md:translate-x-0 md:static md:h-auto border-r border-gray-200">
    <div class="h-16 flex items-center justify-center border-b border-gray-200 md:hidden">
        <span class="text-theme text-xl font-bold">AdminPanel</span>
    </div>
    <nav x-data="{ activeItem: window.location.pathname }" class="mt-5 px-2 space-y-1">
        <a href="{{ url('/') }}" 
           @click="activeItem = '/'"
           :class="activeItem === '/' ? 'bg-theme text-white' : 'text-gray-600 hover:bg-theme-light hover:text-theme'"
           class="group flex items-center px-2 py-2 text-base font-medium rounded-md">
            <i :class="activeItem === '/' ? 'text-white' : 'text-gray-400'" class="fas fa-home mr-3"></i>
            Dashboard
        </a>
        <a href="{{ url('/users') }}"
           @click="activeItem = '/users'"
           :class="activeItem === '/users' ? 'bg-theme text-white' : 'text-gray-600 hover:bg-theme-light hover:text-theme'"
           class="group flex items-center px-2 py-2 text-base font-medium rounded-md">
            <i :class="activeItem === '/users' ? 'text-white' : 'text-gray-400'" class="fas fa-users mr-3"></i>
            Users
        </a>
        <a href="{{ url('/informasi') }}"
           @click="activeItem = '/informasi'"
           :class="activeItem === '/informasi' ? 'bg-theme text-white' : 'text-gray-600 hover:bg-theme-light hover:text-theme'"
           class="group flex items-center px-2 py-2 text-base font-medium rounded-md">
            <i :class="activeItem === '/informasi' ? 'text-white' : 'text-gray-400'" class="fas fa-file-invoice mr-3"></i>
            Informasi
        </a>
        <a href="{{ url('/informasi/op') }}"
           @click="activeItem = '/informasi/op'"
           :class="activeItem === '/informasi/op' ? 'bg-theme text-white' : 'text-gray-600 hover:bg-theme-light hover:text-theme'"
           class="group flex items-center px-2 py-2 text-base font-medium rounded-md">
            <i :class="activeItem === '/informasi/op' ? 'text-white' : 'text-gray-400'" class="fas fa-file-invoice mr-3"></i>
            Informasi Op
        </a>
        <a href="{{ url('/kategori') }}"
           @click="activeItem = '/kategori'"
           :class="activeItem === '/kategori' ? 'bg-theme text-white' : 'text-gray-600 hover:bg-theme-light hover:text-theme'"
           class="group flex items-center px-2 py-2 text-base font-medium rounded-md">
            <i :class="activeItem === '/kategori' ? 'text-white' : 'text-gray-400'" class="fa-solid fa-icons mr-3"></i>
            Kategori
        </a>
        <a href="{{ url('/history') }}"
        @click="activeItem = '/history'"
        :class="activeItem === '/history' ? 'bg-theme text-white' : 'text-gray-600 hover:bg-theme-light hover:text-theme'"
        class="group flex items-center px-2 py-2 text-base font-medium rounded-md">
        <i :class="activeItem === '/history' ? 'text-grey' : 'text-white-400'" class="fas fa-history mr-3"></i>
            Aktivitas
    </a>
    <a href="{{ url('/kalender') }}"
    @click="activeItem = '/kalender'"
    :class="activeItem === '/kalender' ? 'bg-theme text-white' : 'text-gray-600 hover:bg-theme-light hover:text-theme'"
    class="group flex items-center px-2 py-2 text-base font-medium rounded-md">
    <i :class="activeItem === '/kalender' ? 'text-grey' : 'text-white-400'" class="fas fa-calendar-alt mr-3"></i>
        Kalender
    </a>
    

    </nav>
</div>