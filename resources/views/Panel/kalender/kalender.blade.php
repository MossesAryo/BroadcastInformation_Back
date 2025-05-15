<!-- resources/views/calendar.blade.php -->
@extends('layout.template') <!-- Assuming you have a layout file -->

@section('main')
<div class="w-full p-4">
    <div class="max-w-4xl mx-auto bg-white rounded-lg shadow-md p-6">
        <h1 class="text-2xl text-gray-400 font-light mb-6 pl-2">Kalendar</h1>
        
        <div class="flex items-center justify-between mb-6">
            <div class="bg-[#57B4BA] text-white py-3 px-8 rounded-full font-medium text-lg" id="monthYear"></div>
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
        
        <div id="calendarDays" class="grid grid-cols-7 gap-2 mb-6"></div>
        
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
        
        <div class="border-t border-gray-200 pt-6">
            <h2 class="text-xl font-medium text-gray-700 mb-4">Event Details</h2>
            <div class="bg-gray-50 p-4 rounded-lg mb-4">
                <div class="flex items-center">
                    <div class="bg-[#57B4BA] text-white rounded-full w-10 h-10 flex items-center justify-center font-medium mr-3" id="selectedDate"></div>
                    <div class="text-lg font-medium text-gray-700" id="selectedDayInfo"></div>
                </div>
            </div>
            
            <div id="eventList" class="space-y-4"></div>
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
        background-color: #BFDBFE;
    }
    .has-regular-event::after {
        background-color: #FEF08A;
    }
    .has-news::after {
        background-color: #2563EB;
    }
    .has-announcement::after {
        background-color: #FDA4AF;
    }
</style>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Get informasi data from Laravel
        const informasi = @json($informasi);

        // Process events to map to all dates between TanggalMulai and TanggalSelesai
        const events = {};
        informasi.forEach(event => {
            const startDate = new Date(event.TanggalMulai);
            const endDate = new Date(event.TanggalSelesai);
            // Ensure dates are valid
            if (isNaN(startDate) || isNaN(endDate)) return;

            // Loop through each day from start to end date
            for (let d = new Date(startDate); d <= endDate; d.setDate(d.getDate() + 1)) {
                const dateString = `${d.getFullYear()}-${String(d.getMonth() + 1).padStart(2, '0')}-${String(d.getDate()).padStart(2, '0')}`;
                if (!events[dateString]) {
                    events[dateString] = [];
                }
                events[dateString].push({
                    id: event.id,
                    title: event.title,
                    description: event.description,
                    time: event.time || 'All Day', // Fallback if time is not provided
                    type: event.type || 'event' // Default to 'event' if type is not provided
                });
            }
        });

        // Set current date to today or a specific date
        const currentDate = new Date(); // Or set to new Date(2025, 4, 2) for May 2, 2025
        
        // Update month/year display
        document.getElementById('monthYear').textContent = 
            new Intl.DateTimeFormat('en-US', { month: 'long', year: 'numeric' }).format(currentDate);
        
        // Update selected date display
        updateSelectedDateInfo(currentDate);
        
        // Render the calendar
        renderCalendar(currentDate);
        
        // Show events for the selected date
        showEventsForDate(currentDate);
        
        // Previous month button
        document.getElementById('prevMonth').addEventListener('click', function() {
            currentDate.setMonth(currentDate.getMonth() - 1);
            document.getElementById('monthYear').textContent = 
                new Intl.DateTimeFormat('en-US', { month: 'long', year: 'numeric' }).format(currentDate);
            renderCalendar(currentDate);
        });
        
        // Next month button
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
            const firstDay = new Date(year, month, 1).getDay();
            const lastDay = new Date(year, month + 1, 0).getDate();
            const calendarDays = document.getElementById('calendarDays');
            calendarDays.innerHTML = '';

            // Empty cells for days before the first day of the month
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
                    let hasTypes = [];
                    events[dateString].forEach(event => {
                        if (!hasTypes.includes(event.type)) {
                            hasTypes.push(event.type);
                        }
                    });
                    
                    // Add event indicators based on type
                    if (hasTypes.includes('academic')) {
                        dayContentDiv.classList.add('has-event', 'has-academic');
                    }
                    if (hasTypes.includes('event')) {
                        dayContentDiv.classList.add('has-event', 'has-regular-event');
                    }
                    if (hasTypes.includes('news')) {
                        dayContentDiv.classList.add('has-event', 'has-news');
                    }
                    if (hasTypes.includes('announcement')) {
                        dayContentDiv.classList.add('has-event', 'has-announcement');
                    }
                }
                
                // Highlight the selected date
                if (day === date.getDate() && month === date.getMonth() && year === date.getFullYear()) {
                    daySpan.className += ' active-day';
                }
                
                dayContentDiv.appendChild(daySpan);
                dayElement.appendChild(dayContentDiv);
                
                // Add click event to show events
                dayElement.addEventListener('click', function() {
                    const selectedDate = new Date(year, month, day);
                    updateSelectedDateInfo(selectedDate);
                    
                    // Remove active class from all days
                    document.querySelectorAll('.active-day').forEach(el => el.classList.remove('active-day'));
                    
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
            
            eventList.innerHTML = '';
            
            if (events[dateString] && events[dateString].length > 0) {
                eventList.classList.remove('hidden');
                noEvents.classList.add('hidden');
                
                events[dateString].forEach(event => {
                    const eventEl = document.createElement('div');
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
                        default:
                            typeColor = 'border-yellow-200 bg-yellow-50';
                            typeBg = 'bg-yellow-200 text-yellow-800';
                            typeName = 'Event';
                    }
                    
                    eventEl.className = `p-4 border-l-4 ${typeColor} rounded-r-lg`;
                    
                    eventEl.innerHTML = `
                        <div class="flex justify-between items-start">
                            <div>
                                <h3 class="font-medium text-gray-800">${event.judul}</h3>
                                <p class="text-gray-600 mt-1">${event.time}</p>
                                <p class="text-gray-600 mt-2">${event.deskripsi}</p>
                            </div>
                            <span class="${typeBg} text-xs font-medium px-2.5 py-0.5 rounded">${typeName}</span>
                        </div>
                    `;
                    
                    eventList.appendChild(eventEl);
                });
            } else {
                eventList.classList.add('hidden');
                noEvents.classList.remove('hidden');
            }
        }
    });
</script>
@endsection