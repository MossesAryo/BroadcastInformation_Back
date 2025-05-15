@extends('layout.template')

@section('css')
    <link href="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.8/index.global.min.css" rel="stylesheet">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <style>
        body {
            background-color: #f8fafc;
        }

        #calendar {
            max-width: 100%;
            margin: 0 auto;
            background-color: white;
            padding: 20px;
            border-radius: 12px;
            box-shadow: 0 4px 10px rgba(0,0,0,0.05);
            font-family: 'Inter', sans-serif;
        }

        /* Theme colors that match the sidebar/navbar */
        .fc .fc-button-primary {
            background-color: #57B4BA; /* Theme color */
            border-color: #57B4BA;
            color: white;
        }

        .fc .fc-button-primary:hover {
            background-color: #3E979D; /* Theme dark color */
            border-color: #3E979D;
        }

        .fc .fc-button-primary:not(:disabled).fc-button-active,
        .fc .fc-button-primary:not(:disabled):active {
            background-color: #3E979D; /* Theme dark color */
            border-color: #3E979D;
        }

        .fc-col-header-cell {
            background-color: #D7EEF0; /* Theme light color */
            color: #333;
            font-weight: 600;
        }

        .fc .fc-daygrid-day.fc-day-today {
            background-color: #D7EEF0; /* Theme light color */
        }

        .fc-event {
            background-color: #57B4BA !important; /* Theme color */
            border: none !important;
            font-size: 0.85rem;
            padding: 4px 6px;
            border-radius: 6px;
        }

        .fc-event:hover {
            background-color: #3E979D !important; /* Theme dark color */
        }

        .fc-toolbar-title {
            color: #333;
            font-weight: 600;
        }

        /* Custom style for the calendar header */
        .calendar-header {
            background-color: #57B4BA;
            color: white;
            padding: 16px;
            border-radius: 12px 12px 0 0;
            margin-bottom: 0;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .calendar-container {
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 4px 10px rgba(0,0,0,0.1);
            background-color: white;
            margin-bottom: 20px;
        }

        /* Button styling that matches the theme */
        .theme-button {
            background-color: #57B4BA;
            color: white;
            border: none;
            border-radius: 6px;
            padding: 8px 16px;
            font-weight: 500;
            cursor: pointer;
            transition: background-color 0.2s;
        }

        .theme-button:hover {
            background-color: #3E979D;
        }

        /* Views toggle styling */
        .view-toggle {
            display: flex;
            background-color: #f1f5f9;
            border-radius: 8px;
            overflow: hidden;
        }

        .view-toggle button {
            padding: 8px 16px;
            border: none;
            background: transparent;
            cursor: pointer;
        }

        .view-toggle button.active {
            background-color: #57B4BA;
            color: white;
        }
    </style>
@endsection

@section('main')
    <div class="calendar-container">
        <div class="calendar-header">
            <h2 class="text-xl font-semibold">Kalender Informasi</h2>
            <button class="theme-button" id="add-event" onclick="window.location='{{ route('create.info') }}'">
                <i class="fas fa-plus mr-2"></i>Tambah Informasi
            </button>
        </div>
        <div id="calendar"></div>
    </div>
@endsection

@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.8/index.global.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const calendarEl = document.getElementById('calendar');
            const token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
            const addEventButton = document.getElementById('add-event');

            const calendar = new FullCalendar.Calendar(calendarEl, {
                initialView: 'dayGridMonth',
                selectable: true,
                editable: false,
                headerToolbar: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'dayGridMonth,listMonth'
                },
                locale: 'id',
                events: '{{ route('kalender.events') }}',
                buttonText: {
                    today: 'Hari ini',
                    month: 'Bulan',
                    list: 'Daftar'
                },
                dayHeaderFormat: { weekday: 'short' },

                select: function (info) {
                    addNewEvent(info);
                },

                eventClick: function (info) {
                    const confirmDelete = confirm(`Judul: ${info.event.title}\n\nKlik OK untuk menghapus.`);
                    if (confirmDelete) {
                        fetch(`/kalender/${info.event.id}/destroy`, {
                            method: 'DELETE',
                            headers: {
                                'X-CSRF-TOKEN': token
                            }
                        })
                        .then(res => res.json())
                        .then(() => {
                            calendar.refetchEvents();
                            alert('Informasi dihapus');
                        });
                    } else {
                        // Optional: buka detail
                        window.location.href = `/informasi/${info.event.id}`;
                    }
                }
            });

            calendar.render();

            // Add event button functionality
            addEventButton.addEventListener('click', function() {
                const today = new Date();
                const tomorrow = new Date();
                tomorrow.setDate(today.getDate() + 1);

                addNewEvent({
                    startStr: today.toISOString().slice(0, 10),
                    endStr: tomorrow.toISOString().slice(0, 10)
                });
            });

            // function addNewEvent(info) {
            //     const title = prompt('Masukkan judul informasi:');
            //     if (title) {
            //         fetch('{{ route('kalender.store') }}', {
            //             method: 'POST',
            //             headers: {
            //                 'Content-Type': 'application/json',
            //                 'X-CSRF-TOKEN': token
            //             },
            //             body: JSON.stringify({
            //                 Judul: title,
            //                 TanggalMulai: info.startStr,
            //                 TanggalSelesai: info.endStr
            //             })
            //         })
            //         .then(res => res.json())
            //         .then(() => {
            //             calendar.refetchEvents();
            //             alert('Informasi berhasil ditambahkan');
            //         });
            //     }
            // }
        });
    </script>
@endsection
