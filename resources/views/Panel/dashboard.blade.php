@extends('layout.template')
@section('main')
<div x-data="{ sidebarOpen: false }" class="min-h-screen flex flex-col">
    <!-- Top Navigation -->
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
                    <button class="p-2 text-white relative">
                        <i class="fas fa-bell fa-lg"></i>
                        <span class="absolute -top-1 -right-1 bg-red-500 text-white text-xs w-4 h-4 flex items-center justify-center rounded-full">3</span>
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

    <div class="flex flex-1">
        <!-- Sidebar -->
        @include('layout.sidebar')

        <!-- Main content -->
        <div class="flex-1 overflow-auto">
            <main class="py-6 px-4">
                <!-- Page header -->
                <div class="flex items-center justify-between mb-6">
                    <h1 class="text-2xl font-bold text-gray-900">Dashboard</h1>
                </div>

                <!-- Stats cards -->
                <div class="grid grid-cols-1 gap-5 sm:grid-cols-2 lg:grid-cols-4">
                    <!-- Card -->
                    <div class="bg-white overflow-hidden shadow-sm rounded-lg">
                        <div class="p-5">
                            <div class="flex items-center">
                                <div class="flex-shrink-0 bg-theme-light rounded-md p-3">
                                    <i class="fas fa-users text-theme text-xl"></i>
                                </div>
                                <div class="ml-5 w-0 flex-1">
                                    <dl>
                                        <dt class="text-sm font-medium text-gray-500 truncate">Total Users</dt>
                                        <dd>
                                            <div class="text-lg font-medium text-gray-900">12,345</div>
                                        </dd>
                                    </dl>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Card -->
                    <div class="bg-white overflow-hidden shadow-sm rounded-lg">
                        <div class="p-5">
                            <div class="flex items-center">
                                <div class="flex-shrink-0 bg-theme-light rounded-md p-3">
                                    <i class="fas fa-file text-theme text-xl"></i>
                                </div>
                                <div class="ml-5 w-0 flex-1">
                                    <dl>
                                        <dt class="text-sm font-medium text-gray-500 truncate">Total Broadcast </dt>
                                        <dd>
                                            <div class="text-lg font-medium text-gray-900">245</div>
                                        </dd>
                                    </dl>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Card -->
                    <div class="bg-white overflow-hidden shadow-sm rounded-lg">
                        <div class="p-5">
                            <div class="flex items-center">
                                <div class="flex-shrink-0 bg-theme-light rounded-md p-3">
                                    <i class="fas fa-file text-theme text-xl"></i>
                                </div>
                                <div class="ml-5 w-0 flex-1">
                                    <dl>
                                        <dt class="text-sm font-medium text-gray-500 truncate">Pending Broadcast </dt>
                                        <dd>
                                            <div class="text-lg font-medium text-gray-900">42</div>
                                        </dd>
                                    </dl>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Card -->
                    <div class="bg-white overflow-hidden shadow-sm rounded-lg">
                        <div class="p-5">
                            <div class="flex items-center">
                                <div class="flex-shrink-0 bg-theme-light rounded-md p-3">
                                    <i class="fas fa-chart-line text-theme text-xl"></i>
                                </div>
                                <div class="ml-5 w-0 flex-1">
                                    <dl>
                                        <dt class="text-sm font-medium text-gray-500 truncate">Kategori</dt>
                                        <dd>
                                            <div class="text-lg font-medium text-gray-900">10</div>
                                        </dd>
                                    </dl>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Main chart -->
                <div class="mt-6">
                    <div class="bg-white shadow-sm rounded-lg p-6">
                        <div class="flex items-center justify-between mb-4">
                            <h2 class="text-lg font-medium text-gray-900">Chart Broadcast</h2>
                            <div class="flex space-x-2">
                                <button class="bg-theme-light text-theme px-3 py-1 rounded">Mingguan</button>
                                <button class="text-gray-500 px-3 py-1 rounded">Bulanan</button>
                                <button class="text-gray-500 px-3 py-1 rounded">Tahunan</button>
                            </div>
                        </div>
                        <div class="h-64 bg-gray-50 rounded flex items-center justify-center border border-gray-200">
                            <p class="text-gray-400">Chart Broadcast</p>
                        </div>
                    </div>
                </div>

                <!-- Recent activity -->
                <div class="mt-6">
                    <div class="bg-white shadow-sm rounded-lg">
                        <div class="px-6 py-5 border-b border-gray-200">
                            <div class="flex items-center justify-between">
                                <h3 class="text-lg font-medium leading-6 text-gray-900">Status Broadcast </h3>
                                <button type="button" class="text-theme hover:text-theme-dark">
                                    Lihat Semua
                                </button>
                            </div>
                        </div>
                        <div class="overflow-x-auto">
                            <table class="min-w-full divide-y divide-gray-200">
                                <thead class="bg-gray-50">
                                    <tr>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Departemen
                                        </th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Judul
                                        </th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Tanggal
                                        </th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Status
                                        </th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="flex items-center">
                                                <div class="flex-shrink-0 h-8 w-8 rounded-full bg-theme flex items-center justify-center text-white">
                                                    <span>HB</span>
                                                </div>
                                                <div class="ml-4">
                                                    <div class="text-sm font-medium text-gray-900">
                                                        Hubin
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="text-sm text-gray-900">Informasi 1</div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="text-sm text-gray-500">April 23, 2025</div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                                Published
                                            </span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="flex items-center">
                                                <div class="flex-shrink-0 h-8 w-8 rounded-full bg-theme flex items-center justify-center text-white">
                                                    <span>TU</span>
                                                </div>
                                                <div class="ml-4">
                                                    <div class="text-sm font-medium text-gray-900">
                                                        Tata Usaha
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="text-sm text-gray-900">Informasi 2</div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="text-sm text-gray-500">April 22, 2025</div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-brown-800">
                                                Pending
                                            </span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="flex items-center">
                                                <div class="flex-shrink-0 h-8 w-8 rounded-full bg-theme flex items-center justify-center text-white">
                                                    <span>KS</span>
                                                </div>
                                                <div class="ml-4">
                                                    <div class="text-sm font-medium text-gray-900">
                                                        Kesiswaan
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="text-sm text-gray-900">Informasi 3</div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="text-sm text-gray-500">April 21, 2025</div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-600 text-white">
                                                Rejected
                                            </span>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                
                <!-- Aksi Cepat -->
                <div class="mt-6">
                    <div class="bg-white shadow-sm rounded-lg p-6">
                        <h3 class="text-lg font-medium text-gray-900 mb-4">Aksi Cepat</h3>
                        <div class="grid grid-cols-2 sm:grid-cols-4 gap-4">
                            <button class="flex flex-col items-center justify-center p-4 border border-gray-200 rounded-lg hover:border-theme hover:text-theme">
                                <div class="rounded-full bg-theme-light p-3 mb-2">
                                    <i class="fas fa-user-plus text-theme"></i>
                                </div>
                                <span class="text-sm">Tambah User</span>
                            </button>
                            <button class="flex flex-col items-center justify-center p-4 border border-gray-200 rounded-lg hover:border-theme hover:text-theme">
                                <div class="rounded-full bg-theme-light p-3 mb-2">
                                    <i class="fas fa-box text-theme"></i>
                                </div>
                                <span class="text-sm">Tambah Kategori</span>
                            </button>
                            <button class="flex flex-col items-center justify-center p-4 border border-gray-200 rounded-lg hover:border-theme hover:text-theme">
                                <div class="rounded-full bg-theme-light p-3 mb-2">
                                    <i class="fas fa-file-export text-theme"></i>
                                </div>
                                <span class="text-sm">Ekspor Data</span>
                            </button>
                            <button class="flex flex-col items-center justify-center p-4 border border-gray-200 rounded-lg hover:border-theme hover:text-theme">
                                <div class="rounded-full bg-theme-light p-3 mb-2">
                                    <i class="fas fa-bell text-theme"></i>
                                </div>
                                <span class="text-sm">Notifikasi</span>
                            </button>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>
    
    
</div>
@endsection