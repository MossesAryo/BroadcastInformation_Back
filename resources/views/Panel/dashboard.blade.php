@extends('layout.template')
@section('main')
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
                                <a href="{{ url('/informasi') }}" <button type="button" class="text-theme hover:text-theme-dark">
                                    Lihat Semua
                                </button>
                                </a>
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
                            
                            <a href="{{ url('/users') }}" button class="flex flex-col items-center justify-center p-4 border border-gray-200 rounded-lg hover:border-theme hover:text-theme">
                                
                                <div class="rounded-full bg-theme-light p-3 mb-2">
                                    <i class="fas fa-user-plus text-theme"></i>
                                </div>
                               <span class="text-sm">Tambah User</span>
                            </button> </a>
                    
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
                            <a href="{{ url('/notifikasi') }}" button class="flex flex-col items-center justify-center p-4 border border-gray-200 rounded-lg hover:border-theme hover:text-theme">
                            <div class="rounded-full bg-theme-light p-3 mb-2">
                                    <i class="fas fa-bell text-theme"></i>
                                </div>
                                <span class="text-sm">Notifikasi</span>
                            </button>  </a>
                        </div>
                    </div>
                </div>

@endsection
