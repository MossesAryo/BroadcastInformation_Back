@extends('layout.template')
@section('main')
    <div class="flex-1 overflow-auto">
        <main class="py-6 px-4">
            <div class="container mx-auto">
                <h2 class="text-2xl font-semibold text-gray-800 mb-6">Activity History</h2>

                <div class="bg-white rounded-lg shadow overflow-hidden">
                    <div class="p-4 bg-theme text-white flex justify-between items-center">
                        <h3 class="font-medium">Activity Timeline</h3>
                    </div>

                    <div class="relative">
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
@endsection
