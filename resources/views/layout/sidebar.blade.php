<div x-cloak :class="{ 'block': sidebarOpen, 'hidden': !sidebarOpen }" @click="sidebarOpen = false"
    class="fixed inset-0 z-20 transition-opacity bg-gray-500 bg-opacity-75 md:hidden"></div>
<div x-cloak :class="{ 'translate-x-0': sidebarOpen, '-translate-x-full': !sidebarOpen }"
    class="fixed inset-y-0 left-0 z-30 w-64 bg-white transform transition duration-300 md:translate-x-0 md:static md:h-auto border-r border-gray-200">
    <nav x-data="{ activeItem: window.location.pathname }" class="mt-5 px-2 space-y-1">


        @if (in_array(auth()->user()->role , [1, 2, 3]))
            <a href="{{ url('/dashboard/op') }}" @click="activeItem = '/dashboard/op'"
                :class="activeItem === '/dashboard/op' ? 'bg-theme text-white' :
                    'text-gray-600 hover:bg-theme-light hover:text-theme'"
                class="group flex items-center px-2 py-2 text-base font-medium rounded-md">
                <i :class="activeItem === '/dashboard/op' ? 'text-white' : 'text-gray-400'"
                    class="fas fa-home mr-3"></i>
                Dashboard
            </a>
        @endif
        
        @if (auth()->user()->role == 0)
            <a href="{{ url('/dashboard') }}" @click="activeItem = '/dashboard'"
                :class="activeItem === '/dashboard' ? 'bg-theme text-white' :
                    'text-gray-600 hover:bg-theme-light hover:text-theme'"
                class="group flex items-center px-2 py-2 text-base font-medium rounded-md">
                <i :class="activeItem === '/dashboard' ? 'text-white' : 'text-gray-400'" class="fas fa-home mr-3"></i>
                Dashboard
            </a>

            <a href="{{ url('/informasi') }}" @click="activeItem = '/informasi'"
                :class="activeItem === '/informasi' ? 'bg-theme text-white' :
                    'text-gray-600 hover:bg-theme-light hover:text-theme'"
                class="group flex items-center px-2 py-2 text-base font-medium rounded-md">
                <i :class="activeItem === '/informasi' ? 'text-white' : 'text-gray-400'"
                    class="fas fa-file-invoice mr-3"></i>
                Informasi
            </a>

            <a href="{{ url('/kategori') }}" @click="activeItem = '/kategori'"
                :class="activeItem === '/kategori' ? 'bg-theme text-white' :
                    'text-gray-600 hover:bg-theme-light hover:text-theme'"
                class="group flex items-center px-2 py-2 text-base font-medium rounded-md">
                <i :class="activeItem === '/kategori' ? 'text-white' : 'text-gray-400'"
                    class="fa-solid fa-icons mr-3"></i>
                Kategori
            </a>
             <a href="{{ url('/users') }}" @click="activeItem = '/users'"
            :class="activeItem === '/users' ? 'bg-theme text-white' : 'text-gray-600 hover:bg-theme-light hover:text-theme'"
            class="group flex items-center px-2 py-2 text-base font-medium rounded-md">
            <i :class="activeItem === '/users' ? 'text-white' : 'text-gray-400'" class="fas fa-users mr-3"></i>
            Users
        </a>
        @endif

        @if (auth()->user()->role == 1)
          <a href="{{ url('/siswa') }}"
           @click="activeItem = '/siswa'"
           :class="activeItem === '/siswa' ? 'bg-theme text-white' : 'text-gray-600 hover:bg-theme-light hover:text-theme'"
           class="group flex items-center px-2 py-2 text-base font-medium rounded-md">
            <i :class="activeItem === '/siswa' ? 'text-white' : 'text-gray-400'" class="fas fa-book-reader mr-3"></i>
            Siswa
        </a>
        @endif
        @if (auth()->user()->role == 2)
           <a href="{{ url('/guru') }}"
           @click="activeItem = '/guru'"
           :class="activeItem === '/guru' ? 'bg-theme text-white' : 'text-gray-600 hover:bg-theme-light hover:text-theme'"
           class="group flex items-center px-2 py-2 text-base font-medium rounded-md">
            <i :class="activeItem === '/guru' ? 'text-white' : 'text-gray-400'" class="fas fa-chalkboard-teacher mr-3"></i>
            Guru
        </a>
        @endif

       



        <a href="{{ url('/history') }}" @click="activeItem = '/history'"
            :class="activeItem === '/history' ? 'bg-theme text-white' : 'text-gray-600 hover:bg-theme-light hover:text-theme'"
            class="group flex items-center px-2 py-2 text-base font-medium rounded-md">
            <i :class="activeItem === '/history' ? 'text-grey' : 'text-white-400'" class="fas fa-history mr-3"></i>
            Aktivitas
        </a>
        <a href="{{ url('/kalender') }}" @click="activeItem = '/kalender'"
            :class="activeItem === '/kalender' ? 'bg-theme text-white' : 'text-gray-600 hover:bg-theme-light hover:text-theme'"
            class="group flex items-center px-2 py-2 text-base font-medium rounded-md">
            <i :class="activeItem === '/kalender' ? 'text-grey' : 'text-white-400'"
                class="fas fa-calendar-alt mr-3"></i>
            Kalender
        </a>


    </nav>
</div>
