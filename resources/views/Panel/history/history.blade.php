@extends('layout.template')
@section('main')
    <!-- Main content -->
    <div class="flex-1 overflow-auto">
        <main class="py-6 px-4">
            <div class="container mx-auto">
                <h2 class="text-2xl font-semibold text-gray-800 mb-6">Activity History</h2>

                <!-- Date filter and search -->
                <div class="bg-white rounded-lg shadow p-4 mb-6">
                    <form action="{{ route('history.filter') }}" method="GET">
                        <div class="flex flex-col md:flex-row gap-4">
                            <div class="flex-1">
                                <label class="block text-sm font-medium text-gray-700 mb-1">Date Range</label>
                                <div class="flex gap-2">
                                    <input type="date" name="start_date"
                                        class="px-3 py-2 border border-gray-300 rounded w-full focus:outline-none focus:ring-2 focus:ring-theme">
                                    <span class="flex items-center">to</span>
                                    <input type="date" name="end_date"
                                        class="px-3 py-2 border border-gray-300 rounded w-full focus:outline-none focus:ring-2 focus:ring-theme">
                                </div>
                            </div>
                            <div class="flex-1">
                                <label class="block text-sm font-medium text-gray-700 mb-1">Activity Type</label>
                                <select name="activity_type"
                                    class="px-3 py-2 border border-gray-300 rounded w-full focus:outline-none focus:ring-2 focus:ring-theme">
                                    <option value="">All Activities</option>
                                    <option value="login">Login</option>
                                    <option value="logout">Logout</option>
                                    <option value="create">Create Information</option>
                                    <option value="delete">Delete Information</option>
                                </select>
                            </div>
                            <div class="flex-1">
                                <label class="block text-sm font-medium text-gray-700 mb-1">Search</label>
                                <div class="relative">
                                    <input type="text" name="search" placeholder="Search history..."
                                        class="pl-10 px-3 py-2 border border-gray-300 rounded w-full focus:outline-none focus:ring-2 focus:ring-theme">
                                    <i class="fas fa-search absolute left-3 top-3 text-gray-400"></i>
                                </div>
                            </div>
                        </div>
                        <div class="mt-4 flex justify-end">
                            <button type="submit" class="bg-theme text-white px-4 py-2 rounded hover:bg-theme-dark">
                                Apply Filters
                            </button>
                        </div>
                    </form>
                </div>

                <!-- History Timeline -->
                <div class="bg-white rounded-lg shadow overflow-hidden">
                    <div class="p-4 bg-theme text-white flex justify-between items-center">
                        <h3 class="font-medium">Activity Timeline</h3>
                        <button class="px-3 py-1 bg-white text-theme rounded text-sm hover:bg-gray-100"
                            onclick="exportActivities()">
                            Export <i class="fas fa-download ml-1"></i>
                        </button>
                    </div>

                    <!-- Timeline container -->
                    <div class="relative">
                        <!-- Timeline line -->
                        <div class="absolute h-full w-px bg-gray-200 left-8 md:left-28 top-0"></div>

                        @php
                            $activities = session('activity_logs', []);
                            $groupedActivities = collect($activities)
                                ->groupBy(function ($item) {
                                    return \Carbon\Carbon::parse($item['created_at'])->format('Y-m-d');
                                })
                                ->sortKeysDesc();
                        @endphp

                        @forelse($groupedActivities as $date => $group)
                            <div class="pt-6 pb-2 px-4 border-b border-gray-100">
                                <h4 class="text-sm font-medium text-gray-500">
                                    {{ \Carbon\Carbon::parse($date)->isToday() ? 'Today' : (\Carbon\Carbon::parse($date)->isYesterday() ? 'Yesterday' : \Carbon\Carbon::parse($date)->format('F j, Y')) }}
                                </h4>
                            </div>

                            @foreach ($group as $activity)
                                <div class="py-4 px-4 border-b border-gray-100 hover:bg-gray-50">
                                    <div class="flex items-start">
                                        <div class="flex-none w-24 md:w-36 text-center pr-6">
                                            <span
                                                class="text-xs text-gray-500 block">{{ \Carbon\Carbon::parse($activity['created_at'])->setTimezone('Asia/Jakarta')->format('H:i') }}</span>
                                        </div>
                                        <div class="relative">
                                            <div
                                                class="h-8 w-8 rounded-full {{ $activity['color'] }} text-white flex items-center justify-center z-10 relative">
                                                <i class="{{ $activity['icon'] }}"></i>
                                            </div>
                                        </div>
                                        <div class="ml-4 flex-grow">
                                            <div class="font-medium">{{ $activity['title'] }}</div>
                                            <div class="text-sm text-gray-500">{{ $activity['description'] }}</div>
                                            <div class="mt-2">
                                                <span
                                                    class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium {{ $activity['badge_color'] }}">
                                                    {{ $activity['status'] }}
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
                            @endforeach
                        @empty
                            <div class="py-4 px-4 text-center text-gray-500">No activities found.</div>
                        @endforelse
                    </div>

                    <!-- Pagination (Optional, since session data may not need pagination) -->
                    <div class="p-4 flex items-center justify-between border-t border-gray-200">
                        <div>
                            <p class="text-sm text-gray-700">
                                Showing <span class="font-medium">{{ count($activities) }}</span> activities
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>

    <script>
        function exportActivities() {
            // Implement export functionality (e.g., download as JSON or CSV)
            alert('Export functionality can be implemented to download session data.');
        }
    </script>
@endsection
