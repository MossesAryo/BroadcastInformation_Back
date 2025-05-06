<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Alpine.js for interactions -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        theme: {
                            DEFAULT: '#57B4BA',
                            light: '#D7EEF0',
                            dark: '#3E979D',
                        }
                    }
                }
            }
        }
    </script>
    <style>
        [x-cloak] { display: none !important; }
        .bg-theme { background-color: #57B4BA; }
        .text-theme { color: #57B4BA; }
        .border-theme { border-color: #57B4BA; }
        .hover\:bg-theme-dark:hover { background-color: #3E979D; }
    </style>
</head>
<body class="bg-gray-100">
    <div x-data="{ sidebarOpen: false }" class="min-h-screen flex flex-col">
        <!-- Top Navigation -->
        @include('layout.navbar')

        <div class="flex flex-1">
            <!-- Sidebar -->
            @include('layout.sidebar')
<!-- Calendar blade component for Laravel application -->
<div class="w-full p-4">
    <div class="max-w-4xl mx-auto bg-white rounded-lg shadow-md p-6">
        <h1 class="text-2xl text-gray-400 font-light mb-6 pl-2">kalendar</h1>
        
        <div class="flex items-center justify-between mb-6">
            <div class="bg-[#57B4BA] text-white py-3 px-8 rounded-full font-medium text-lg" id="monthYear">May 2025</div>
            <div class="flex space-x-3">
                <button id="prevMonth" class="bg-gray-200 hover:bg-gray-300 w-10 h-10 rounded-full flex items-center justify-center">
                    <span class="text-gray-600 text-lg">&lt;</span>
                </button>
                <button id="nextMonth" class="bg-gray-200 hover:bg-gray-300 w-10 h-10 rounded-full flex items-center justify-center">
                    <span class="text-gray-600 text-lg">&gt;</span>
                </button>
            </div>
        </div>
        
        <div class="grid grid-cols-7 gap-2 mb-3">
            <div class="text-center text-gray-500 font-medium text-lg py-2">Sun</div>
            <div class="text-center text-gray-500 font-medium text-lg py-2">Mon</div>
            <div class="text-center text-gray-500 font-medium text-lg py-2">Tue</div>
            <div class="text-center text-gray-500 font-medium text-lg py-2">Wed</div>
            <div class="text-center text-gray-500 font-medium text-lg py-2">Thu</div>
            <div class="text-center text-gray-500 font-medium text-lg py-2">Fri</div>
            <div class="text-center text-gray-500 font-medium text-lg py-2">Sat</div>
        </div>
        
        <div id="calendarDays" class="grid grid-cols-7 gap-2 mb-6">
            <!-- Calendar days will be inserted here by JavaScript -->
        </div>
        
        <div class="flex flex-wrap justify-center mt-4 mb-6 space-x-6 text-sm text-gray-500">
            <div class="flex items-center">
                <div class="w-4 h-4 bg-blue-200 rounded-full mr-2"></div>
                <span>Academic</span>
            </div>
            <div class="flex items-center">
                <div class="w-4 h-4 bg-yellow-200 rounded-full mr-2"></div>
                <span>Events</span>
            </div>
            <div class="flex items-center">
                <div class="w-4 h-4 bg-blue-600 rounded-full mr-2"></div>
                <span>News</span>
            </div>
            <div class="flex items-center">
                <div class="w-4 h-4 bg-red-300 rounded-full mr-2"></div>
                <span>Announcements</span>
            </div>
        </div>
        
        <!-- Event Details Section -->
        <div class="border-t border-gray-200 pt-6">
            <h2 class="text-xl font-medium text-gray-700 mb-4">Event Details</h2>
            
            <!-- Selected Date Info -->
            <div class="bg-gray-50 p-4 rounded-lg mb-4">
                <div class="flex items-center">
                    <div class="bg-[#57B4BA] text-white rounded-full w-10 h-10 flex items-center justify-center font-medium mr-3" id="selectedDate">2</div>
                    <div class="text-lg font-medium text-gray-700" id="selectedDayInfo">Friday, May 2, 2025</div>
                </div>
            </div>
            
            <!-- Event List -->
            <div id="eventList" class="space-y-4">
                <!-- Academic Event -->
                <div class="p-4 border-l-4 border-blue-200 bg-blue-50 rounded-r-lg">
                    <div class="flex justify-between items-start">
                        <div>
                            <h3 class="font-medium text-gray-800">Mid-semester Exam Schedule</h3>
                            <p class="text-gray-600 mt-1">09:00 AM - 11:00 AM</p>
                            <p class="text-gray-600 mt-2">The mid-semester examination for all departments will begin today. Check your exam hall and schedule.</p>
                        </div>
                        <span class="bg-blue-200 text-blue-800 text-xs font-medium px-2.5 py-0.5 rounded">Academic</span>
                    </div>
                </div>
                
                <!-- Event -->
                <div class="p-4 border-l-4 border-yellow-200 bg-yellow-50 rounded-r-lg">
                    <div class="flex justify-between items-start">
                        <div>
                            <h3 class="font-medium text-gray-800">Campus Open Day</h3>
                            <p class="text-gray-600 mt-1">02:00 PM - 05:00 PM</p>
                            <p class="text-gray-600 mt-2">Join us for the campus open day event. Various activities and information sessions will be available for prospective students.</p>
                        </div>
                        <span class="bg-yellow-200 text-yellow-800 text-xs font-medium px-2.5 py-0.5 rounded">Event</span>
                    </div>
                </div>
                
                <!-- News Event -->
                <div class="p-4 border-l-4 border-blue-600 bg-blue-50 rounded-r-lg">
                    <div class="flex justify-between items-start">
                        <div>
                            <h3 class="font-medium text-gray-800">Faculty Research Publication</h3>
                            <p class="text-gray-600 mt-1">Published Today</p>
                            <p class="text-gray-600 mt-2">The Computer Science department has published a groundbreaking research paper in the International Journal of Computer Science.</p>
                        </div>
                        <span class="bg-blue-600 text-white text-xs font-medium px-2.5 py-0.5 rounded">News</span>
                    </div>
                </div>
            </div>
            
            <!-- No Events Message (hidden by default) -->
            <div id="noEvents" class="hidden p-4 text-center text-gray-500 bg-gray-50 rounded-lg">
                <p>No events scheduled for this date.</p>
            </div>
        </div>
    </div>
</div>

<style>
    .calendar-day {
        width: 100%;
        height: 50px;
        display: flex;
        align-items: center;
        justify-content: center;
        position: relative;
    }
    
    .active-day {
        background-color: #57B4BA;
        color: white;
        border-radius: 9999px;
    }
    
    .day-content {
        position: relative;
        width: 40px;
        height: 40px;
        display: flex;
        align-items: center;
        justify-content: center;
    }
    
    .has-event::after {
        content: '';
        position: absolute;
        bottom: 2px;
        left: 50%;
        transform: translateX(-50%);
        width: 6px;
        height: 6px;
        border-radius: 50%;
        background-color: #57B4BA;
    }
    
    .has-academic::after {
        background-color: #BFDBFE;  /* blue-200 */
    }
    
    .has-regular-event::after {
        background-color: #FEF08A;  /* yellow-200 */
    }
    
    .has-news::after {
        background-color: #2563EB;  /* blue-600 */
    }
    
    .has-announcement::after {
        background-color: #FDA4AF;  /* red-300 */
    }
</style>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Calendar events data
        const events = {
            // May 2025
            '2025-05-02': [
                { type: 'academic', title: 'Mid-semester Exam Schedule', time: '09:00 AM - 11:00 AM', description: 'The mid-semester examination for all departments will begin today. Check your exam hall and schedule.' },
                { type: 'event', title: 'Campus Open Day', time: '02:00 PM - 05:00 PM', description: 'Join us for the campus open day event. Various activities and information sessions will be available for prospective students.' },
                { type: 'news', title: 'Faculty Research Publication', time: 'Published Today', description: 'The Computer Science department has published a groundbreaking research paper in the International Journal of Computer Science.' }
            ],
            '2025-05-05': [
                { type: 'academic', title: 'Assignment Deadline', time: '11:59 PM', description: 'Final deadline for submitting the semester project.' }
            ],
            '2025-05-08': [
                { type: 'announcement', title: 'System Maintenance', time: '10:00 PM - 02:00 AM', description: 'The university portal will be under maintenance during this time.' }
            ],
            '2025-05-15': [
                { type: 'event', title: 'Career Fair', time: '10:00 AM - 04:00 PM', description: 'Annual career fair with representatives from over 50 companies.' },
                { type: 'announcement', title: 'Holiday Notice', time: 'All Day', description: 'Campus will be closed on May 16th for a public holiday.' }
            ],
            '2025-05-20': [
                { type: 'news', title: 'New Campus Building', time: 'Announced Today', description: 'The university has announced the construction of a new technology building.' }
            ],
            '2025-05-27': [
                { type: 'academic', title: 'Final Exams Begin', time: '08:00 AM', description: 'Final examination period begins today and continues until June 10th.' }
            ]
        };

        // Set current date to May 2, 2025
        const currentDate = new Date(2025, 4, 2);
        
        document.getElementById('monthYear').textContent = 
            new Intl.DateTimeFormat('en-US', { month: 'long', year: 'numeric' }).format(currentDate);
        
        // Update selected date display
        updateSelectedDateInfo(currentDate);
        
        // Render the calendar
        renderCalendar(currentDate);
        
        // Show events for the selected date (initially May 2, 2025)
        showEventsForDate(currentDate);
        
        document.getElementById('prevMonth').addEventListener('click', function() {
            currentDate.setMonth(currentDate.getMonth() - 1);
            document.getElementById('monthYear').textContent = 
                new Intl.DateTimeFormat('en-US', { month: 'long', year: 'numeric' }).format(currentDate);
            renderCalendar(currentDate);
        });
        
        document.getElementById('nextMonth').addEventListener('click', function() {
            currentDate.setMonth(currentDate.getMonth() + 1);
            document.getElementById('monthYear').textContent = 
                new Intl.DateTimeFormat('en-US', { month: 'long', year: 'numeric' }).format(currentDate);
            renderCalendar(currentDate);
        });
        
        function updateSelectedDateInfo(date) {
            document.getElementById('selectedDate').textContent = date.getDate();
            document.getElementById('selectedDayInfo').textContent = 
                new Intl.DateTimeFormat('en-US', { weekday: 'long', month: 'long', day: 'numeric', year: 'numeric' }).format(date);
        }
        
        function renderCalendar(date) {
            const year = date.getFullYear();
            const month = date.getMonth();
            
            // First day of the month
            const firstDay = new Date(year, month, 1).getDay();
            
            // Last day of the month
            const lastDay = new Date(year, month + 1, 0).getDate();
            
            const calendarDays = document.getElementById('calendarDays');
            calendarDays.innerHTML = '';
            
            // Empty cells for days before the first day of month
            for (let i = 0; i < firstDay; i++) {
                const emptyDay = document.createElement('div');
                emptyDay.className = 'calendar-day';
                calendarDays.appendChild(emptyDay);
            }
            
            // Fill the calendar with days
            for (let day = 1; day <= lastDay; day++) {
                const dayElement = document.createElement('div');
                dayElement.className = 'calendar-day';
                
                const dayContentDiv = document.createElement('div');
                dayContentDiv.className = 'day-content';
                
                const daySpan = document.createElement('span');
                daySpan.textContent = day;
                daySpan.className = 'text-lg';
                
                // Check if this date has events
                const dateString = `${year}-${String(month + 1).padStart(2, '0')}-${String(day).padStart(2, '0')}`;
                
                if (events[dateString]) {
                    // Add indicator based on event type
                    let hasTypes = [];
                    events[dateString].forEach(event => {
                        if (!hasTypes.includes(event.type)) {
                            hasTypes.push(event.type);
                        }
                    });
                    
                    if (hasTypes.includes('academic')) {
                        dayContentDiv.classList.add('has-event', 'has-academic');
                    } else if (hasTypes.includes('event')) {
                        dayContentDiv.classList.add('has-event', 'has-regular-event');
                    } else if (hasTypes.includes('news')) {
                        dayContentDiv.classList.add('has-event', 'has-news');
                    } else if (hasTypes.includes('announcement')) {
                        dayContentDiv.classList.add('has-event', 'has-announcement');
                    }
                }
                
                // Highlight May 2nd or selected date
                if (day === date.getDate() && month === date.getMonth() && year === date.getFullYear()) {
                    daySpan.className += ' active-day';
                }
                
                dayContentDiv.appendChild(daySpan);
                dayElement.appendChild(dayContentDiv);
                
                // Add click event to show events for this day
                dayElement.addEventListener('click', function() {
                    // Update the selected date
                    const selectedDate = new Date(year, month, day);
                    updateSelectedDateInfo(selectedDate);
                    
                    // Remove active class from all days
                    document.querySelectorAll('.active-day').forEach(el => {
                        el.classList.remove('active-day');
                    });
                    
                    // Add active class to clicked day
                    daySpan.classList.add('active-day');
                    
                    // Show events for the selected date
                    showEventsForDate(selectedDate);
                });
                
                calendarDays.appendChild(dayElement);
            }
        }
        
        function showEventsForDate(date) {
            const dateString = `${date.getFullYear()}-${String(date.getMonth() + 1).padStart(2, '0')}-${String(date.getDate()).padStart(2, '0')}`;
            const eventList = document.getElementById('eventList');
            const noEvents = document.getElementById('noEvents');
            
            // Clear previous events
            eventList.innerHTML = '';
            
            if (events[dateString] && events[dateString].length > 0) {
                // Show events
                eventList.classList.remove('hidden');
                noEvents.classList.add('hidden');
                
                events[dateString].forEach(event => {
                    // Create event element
                    const eventEl = document.createElement('div');
                    
                    // Set classes based on event type
                    let typeColor = '';
                    let typeBg = '';
                    let typeName = '';
                    
                    switch(event.type) {
                        case 'academic':
                            typeColor = 'border-blue-200 bg-blue-50';
                            typeBg = 'bg-blue-200 text-blue-800';
                            typeName = 'Academic';
                            break;
                        case 'event':
                            typeColor = 'border-yellow-200 bg-yellow-50';
                            typeBg = 'bg-yellow-200 text-yellow-800';
                            typeName = 'Event';
                            break;
                        case 'news':
                            typeColor = 'border-blue-600 bg-blue-50';
                            typeBg = 'bg-blue-600 text-white';
                            typeName = 'News';
                            break;
                        case 'announcement':
                            typeColor = 'border-red-300 bg-red-50';
                            typeBg = 'bg-red-300 text-red-800';
                            typeName = 'Announcement';
                            break;
                    }
                    
                    eventEl.className = `p-4 border-l-4 ${typeColor} rounded-r-lg`;
                    
                    eventEl.innerHTML = `
                        <div class="flex justify-between items-start">
                            <div>
                                <h3 class="font-medium text-gray-800">${event.title}</h3>
                                <p class="text-gray-600 mt-1">${event.time}</p>
                                <p class="text-gray-600 mt-2">${event.description}</p>
                            </div>
                            <span class="${typeBg} text-xs font-medium px-2.5 py-0.5 rounded">${typeName}</span>
                        </div>
                    `;
                    
                    eventList.appendChild(eventEl);
                });
            } else {
                // Show no events message
                eventList.classList.add('hidden');
                noEvents.classList.remove('hidden');
            }
        }
    });
</script>

                    
                        <!-- Main content -->
    <div class="flex-1 overflow-auto">
        <main class="py-6 px-4">


            @yield('main')

        </main>
    </div>

</div>


</div>
</body>
<!-- Footer -->
@include('layout.footer')
</html>
