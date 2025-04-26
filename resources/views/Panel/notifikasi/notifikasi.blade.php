<!-- This would be in a separate file, e.g., notification.blade.php -->
@extends('layout.template')

@section('main')
<div class="container mx-auto px-4 py-6">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-semibold text-gray-800">Notifications</h1>
        <a href="" class="text-sm text-theme hover:text-theme-dark">
            Mark all as read
        </a>
    </div>

    <div class="bg-white rounded-lg shadow-md overflow-hidden">
        <div class="divide-y divide-gray-200">
            <!-- Unread notification -->
            <div class="p-4 bg-theme-light hover:bg-gray-50">
                <div class="flex items-start">
                    <div class="flex-shrink-0 mr-3">
                        <div class="w-10 h-10 rounded-full bg-theme text-white flex items-center justify-center">
                            <i class="fas fa-user"></i>
                        </div>
                    </div>
                    <div class="flex-1">
                        <div class="flex justify-between items-start">
                            <div>
                                <div class="flex items-center">
                                    <span class="font-medium text-gray-900">John Doe</span>
                                    <span class="ml-2 text-sm text-gray-600">posted new information</span>
                                </div>
                                <h3 class="mt-1 font-medium text-gray-800">System Maintenance</h3>
                                <p class="mt-1 text-sm text-gray-600">The system will be down for maintenance this weekend.</p>
                                <div class="mt-2 text-xs text-gray-500">5 minutes ago • 2025-04-26</div>
                            </div>
                            <a href="{{ url('/mark-read/1') }}" class="text-xs text-theme hover:text-theme-dark">
                                Mark as read
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Unread notification -->
            <div class="p-4 bg-theme-light hover:bg-gray-50">
                <div class="flex items-start">
                    <div class="flex-shrink-0 mr-3">
                        <div class="w-10 h-10 rounded-full bg-theme text-white flex items-center justify-center">
                            <i class="fas fa-user"></i>
                        </div>
                    </div>
                    <div class="flex-1">
                        <div class="flex justify-between items-start">
                            <div>
                                <div class="flex items-center">
                                    <span class="font-medium text-gray-900">Sarah Kim</span>
                                    <span class="ml-2 text-sm text-gray-600">posted new information</span>
                                </div>
                                <h3 class="mt-1 font-medium text-gray-800">Holiday Schedule</h3>
                                <p class="mt-1 text-sm text-gray-600">Updated holiday schedule for the upcoming months.</p>
                                <div class="mt-2 text-xs text-gray-500">2 hours ago • 2025-04-26</div>
                            </div>
                            <a href="{{ url('/mark-read/2') }}" class="text-xs text-theme hover:text-theme-dark">
                                Mark as read
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Read notification -->
            <div class="p-4 bg-white hover:bg-gray-50">
                <div class="flex items-start">
                    <div class="flex-shrink-0 mr-3">
                        <div class="w-10 h-10 rounded-full bg-theme text-white flex items-center justify-center">
                            <i class="fas fa-user"></i>
                        </div>
                    </div>
                    <div class="flex-1">
                        <div class="flex items-start">
                            <div>
                                <div class="flex items-center">
                                    <span class="font-medium text-gray-900">Alex Wang</span>
                                    <span class="ml-2 text-sm text-gray-600">posted new information</span>
                                </div>
                                <h3 class="mt-1 font-medium text-gray-800">New Feature Release</h3>
                                <p class="mt-1 text-sm text-gray-600">Check out the new features added to the dashboard.</p>
                                <div class="mt-2 text-xs text-gray-500">1 day ago • 2025-04-25</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Read notification -->
            <div class="p-4 bg-white hover:bg-gray-50">
                <div class="flex items-start">
                    <div class="flex-shrink-0 mr-3">
                        <div class="w-10 h-10 rounded-full bg-theme text-white flex items-center justify-center">
                            <i class="fas fa-user"></i>
                        </div>
                    </div>
                    <div class="flex-1">
                        <div class="flex items-start">
                            <div>
                                <div class="flex items-center">
                                    <span class="font-medium text-gray-900">Lisa Johnson</span>
                                    <span class="ml-2 text-sm text-gray-600">posted new information</span>
                                </div>
                                <h3 class="mt-1 font-medium text-gray-800">Team Meeting</h3>
                                <p class="mt-1 text-sm text-gray-600">Reminder about the weekly team meeting tomorrow.</p>
                                <div class="mt-2 text-xs text-gray-500">2 days ago • 2025-04-24</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection