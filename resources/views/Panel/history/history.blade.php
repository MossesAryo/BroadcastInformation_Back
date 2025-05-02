@extends('layout.template')
@section('main')

   

   

        <!-- Main content -->
        <div class="flex-1 overflow-auto">
            <main class="py-6 px-4">
                <div class="container mx-auto">
                    <h2 class="text-2xl font-semibold text-gray-800 mb-6">Activity History</h2>
                    
                    <!-- Date filter and search -->
                    <div class="bg-white rounded-lg shadow p-4 mb-6">
                        <div class="flex flex-col md:flex-row gap-4">
                            <div class="flex-1">
                                <label class="block text-sm font-medium text-gray-700 mb-1">Date Range</label>
                                <div class="flex gap-2">
                                    <input type="date" class="px-3 py-2 border border-gray-300 rounded w-full focus:outline-none focus:ring-2 focus:ring-theme">
                                    <span class="flex items-center">to</span>
                                    <input type="date" class="px-3 py-2 border border-gray-300 rounded w-full focus:outline-none focus:ring-2 focus:ring-theme">
                                </div>
                            </div>
                            <div class="flex-1">
                                <label class="block text-sm font-medium text-gray-700 mb-1">Activity Type</label>
                                <select class="px-3 py-2 border border-gray-300 rounded w-full focus:outline-none focus:ring-2 focus:ring-theme">
                                    <option value="">All Activities</option>
                                    <option value="accept">Accept Information</option>
                                    <option value="reject">Reject Information</option>
                                    <option value="update">Update Data</option>
                                    <option value="login">Login</option>
                                </select>
                            </div>
                            <div class="flex-1">
                                <label class="block text-sm font-medium text-gray-700 mb-1">Search</label>
                                <div class="relative">
                                    <input type="text" placeholder="Search history..." class="pl-10 px-3 py-2 border border-gray-300 rounded w-full focus:outline-none focus:ring-2 focus:ring-theme">
                                    <i class="fas fa-search absolute left-3 top-3 text-gray-400"></i>
                                </div>
                            </div>
                        </div>
                        <div class="mt-4 flex justify-end">
                            <button class="bg-theme text-white px-4 py-2 rounded hover:bg-theme-dark">
                                Apply Filters
                            </button>
                        </div>
                    </div>
                    
                    <!-- History Timeline -->
                    <div class="bg-white rounded-lg shadow overflow-hidden">
                        <div class="p-4 bg-theme text-white flex justify-between items-center">
                            <h3 class="font-medium">Activity Timeline</h3>
                            <button class="px-3 py-1 bg-white text-theme rounded text-sm hover:bg-gray-100">
                                Export <i class="fas fa-download ml-1"></i>
                            </button>
                        </div>
                        
                        <!-- Timeline container -->
                        <div class="relative">
                            <!-- Timeline line -->
                            <div class="absolute h-full w-px bg-gray-200 left-8 md:left-24 top-0"></div>
                            
                            <!-- Today Group -->
                            <div class="pt-6 pb-2 px-4 border-b border-gray-100">
                                <h4 class="text-sm font-medium text-gray-500">Today</h4>
                            </div>
                            
                            <!-- Timeline items -->
                            <div class="py-4 px-4 border-b border-gray-100 hover:bg-gray-50">
                                <div class="flex">
                                    <div class="flex-none w-16 md:w-32 text-center">
                                        <span class="text-xs text-gray-500">10:45 AM</span>
                                    </div>
                                    <div class="relative">
                                        <div class="h-8 w-8 rounded-full bg-green-500 text-white flex items-center justify-center z-10 relative">
                                            <i class="fas fa-check"></i>
                                        </div>
                                    </div>
                                    <div class="ml-4 flex-grow">
                                        <div class="font-medium">Accepted Information Request</div>
                                        <div class="text-sm text-gray-500">You accepted information request #4872 from Marketing Department</div>
                                        <div class="mt-2">
                                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                                Approved
                                            </span>
                                        </div>
                                    </div>
                                    <div class="flex-none flex items-start">
                                        <button class="text-gray-400 hover:text-theme">
                                            <i class="fas fa-ellipsis-v"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="py-4 px-4 border-b border-gray-100 hover:bg-gray-50">
                                <div class="flex">
                                    <div class="flex-none w-16 md:w-32 text-center">
                                        <span class="text-xs text-gray-500">09:30 AM</span>
                                    </div>
                                    <div class="relative">
                                        <div class="h-8 w-8 rounded-full bg-blue-500 text-white flex items-center justify-center z-10 relative">
                                            <i class="fas fa-sign-in-alt"></i>
                                        </div>
                                    </div>
                                    <div class="ml-4 flex-grow">
                                        <div class="font-medium">System Login</div>
                                        <div class="text-sm text-gray-500">You logged in to the system</div>
                                        <div class="mt-2">
                                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-100 text-blue-800">
                                                Login
                                            </span>
                                        </div>
                                    </div>
                                    <div class="flex-none flex items-start">
                                        <button class="text-gray-400 hover:text-theme">
                                            <i class="fas fa-ellipsis-v"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Yesterday Group -->
                            <div class="pt-6 pb-2 px-4 border-b border-gray-100">
                                <h4 class="text-sm font-medium text-gray-500">Yesterday</h4>
                            </div>
                            
                            <div class="py-4 px-4 border-b border-gray-100 hover:bg-gray-50">
                                <div class="flex">
                                    <div class="flex-none w-16 md:w-32 text-center">
                                        <span class="text-xs text-gray-500">3:22 PM</span>
                                    </div>
                                    <div class="relative">
                                        <div class="h-8 w-8 rounded-full bg-red-500 text-white flex items-center justify-center z-10 relative">
                                            <i class="fas fa-times"></i>
                                        </div>
                                    </div>
                                    <div class="ml-4 flex-grow">
                                        <div class="font-medium">Rejected Information Request</div>
                                        <div class="text-sm text-gray-500">You rejected information request #4865 from Finance Department</div>
                                        <div class="mt-2">
                                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-red-100 text-red-800">
                                                Rejected
                                            </span>
                                        </div>
                                    </div>
                                    <div class="flex-none flex items-start">
                                        <button class="text-gray-400 hover:text-theme">
                                            <i class="fas fa-ellipsis-v"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="py-4 px-4 border-b border-gray-100 hover:bg-gray-50">
                                <div class="flex">
                                    <div class="flex-none w-16 md:w-32 text-center">
                                        <span class="text-xs text-gray-500">11:05 AM</span>
                                    </div>
                                    <div class="relative">
                                        <div class="h-8 w-8 rounded-full bg-yellow-500 text-white flex items-center justify-center z-10 relative">
                                            <i class="fas fa-edit"></i>
                                        </div>
                                    </div>
                                    <div class="ml-4 flex-grow">
                                        <div class="font-medium">Updated User Information</div>
                                        <div class="text-sm text-gray-500">You updated user profile for Budi Santoso</div>
                                        <div class="mt-2">
                                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-yellow-100 text-yellow-800">
                                                Updated
                                            </span>
                                        </div>
                                    </div>
                                    <div class="flex-none flex items-start">
                                        <button class="text-gray-400 hover:text-theme">
                                            <i class="fas fa-ellipsis-v"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Older Group -->
                            <div class="pt-6 pb-2 px-4 border-b border-gray-100">
                                <h4 class="text-sm font-medium text-gray-500">May 1, 2025</h4>
                            </div>
                            
                            <div class="py-4 px-4 border-b border-gray-100 hover:bg-gray-50">
                                <div class="flex">
                                    <div class="flex-none w-16 md:w-32 text-center">
                                        <span class="text-xs text-gray-500">2:45 PM</span>
                                    </div>
                                    <div class="relative">
                                        <div class="h-8 w-8 rounded-full bg-purple-500 text-white flex items-center justify-center z-10 relative">
                                            <i class="fas fa-plus"></i>
                                        </div>
                                    </div>
                                    <div class="ml-4 flex-grow">
                                        <div class="font-medium">Created New Information</div>
                                        <div class="text-sm text-gray-500">You created new information about quarterly report</div>
                                        <div class="mt-2">
                                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-purple-100 text-purple-800">
                                                Created
                                            </span>
                                        </div>
                                    </div>
                                    <div class="flex-none flex items-start">
                                        <button class="text-gray-400 hover:text-theme">
                                            <i class="fas fa-ellipsis-v"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="py-4 px-4 border-b border-gray-100 hover:bg-gray-50">
                                <div class="flex">
                                    <div class="flex-none w-16 md:w-32 text-center">
                                        <span class="text-xs text-gray-500">10:15 AM</span>
                                    </div>
                                    <div class="relative">
                                        <div class="h-8 w-8 rounded-full bg-green-500 text-white flex items-center justify-center z-10 relative">
                                            <i class="fas fa-check"></i>
                                        </div>
                                    </div>
                                    <div class="ml-4 flex-grow">
                                        <div class="font-medium">Accepted Information Request</div>
                                        <div class="text-sm text-gray-500">You accepted information request #4845 from HR Department</div>
                                        <div class="mt-2">
                                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                                Approved
                                            </span>
                                        </div>
                                    </div>
                                    <div class="flex-none flex items-start">
                                        <button class="text-gray-400 hover:text-theme">
                                            <i class="fas fa-ellipsis-v"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Pagination -->
                        <div class="p-4 flex items-center justify-between border-t border-gray-200">
                            <div class="flex-1 flex justify-between sm:hidden">
                                <a href="#" class="relative inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50">
                                    Previous
                                </a>
                                <a href="#" class="ml-3 relative inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50">
                                    Next
                                </a>
                            </div>
                            <div class="hidden sm:flex-1 sm:flex sm:items-center sm:justify-between">
                                <div>
                                    <p class="text-sm text-gray-700">
                                        Showing <span class="font-medium">1</span> to <span class="font-medium">10</span> of <span class="font-medium">97</span> results
                                    </p>
                                </div>
                                <div>
                                    <nav class="relative z-0 inline-flex rounded-md shadow-sm -space-x-px" aria-label="Pagination">
                                        <a href="#" class="relative inline-flex items-center px-2 py-2 rounded-l-md border border-gray-300 bg-white text-sm font-medium text-gray-500 hover:bg-gray-50">
                                            <span class="sr-only">Previous</span>
                                            <i class="fas fa-chevron-left"></i>
                                        </a>
                                        <a href="#" class="relative inline-flex items-center px-4 py-2 border border-gray-300 bg-theme text-sm font-medium text-white hover:bg-theme-dark">
                                            1
                                        </a>
                                        <a href="#" class="relative inline-flex items-center px-4 py-2 border border-gray-300 bg-white text-sm font-medium text-gray-700 hover:bg-gray-50">
                                            2
                                        </a>
                                        <a href="#" class="relative inline-flex items-center px-4 py-2 border border-gray-300 bg-white text-sm font-medium text-gray-700 hover:bg-gray-50">
                                            3
                                        </a>
                                        <span class="relative inline-flex items-center px-4 py-2 border border-gray-300 bg-white text-sm font-medium text-gray-700">
                                            ...
                                        </span>
                                        <a href="#" class="relative inline-flex items-center px-4 py-2 border border-gray-300 bg-white text-sm font-medium text-gray-700 hover:bg-gray-50">
                                            10
                                        </a>
                                        <a href="#" class="relative inline-flex items-center px-2 py-2 rounded-r-md border border-gray-300 bg-white text-sm font-medium text-gray-500 hover:bg-gray-50">
                                            <span class="sr-only">Next</span>
                                            <i class="fas fa-chevron-right"></i>
                                        </a>
                                    </nav>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>
</div>
@endsection