@extends('layout.template')
@section('main')
    <div class="container mx-auto px-4 py-6">
        <!-- Header Section -->
        <div class="flex justify-between items-center mb-6">
            <div>
                <h2 class="text-xl font-semibold text-gray-700">Siswa</h2>
            </div>

            <button class="bg-teal-500 hover:bg-teal-600 text-white px-4 py-2 rounded-md flex items-center"
                onclick="window.location='{{ route('siswa.create') }}'">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd"
                        d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z"
                        clip-rule="evenodd" />
                </svg>
                Tambah Siswa
            </button>
        </div>

        <!-- Search and Filter Section -->
        <div
            class="bg-white shadow-md rounded-md p-4 mb-6 flex flex-col md:flex-row justify-between items-start md:items-center space-y-3 md:space-y-0">
            <!-- Search Box -->
            <div class="flex items-center">
                <div class="relative">
                    <input type="text" id="customSearch" placeholder="Cari broadcast..."
                        class="pl-10 pr-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-teal-500">
                    <div class="absolute left-3 top-2.5">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" viewBox="0 0 20 20"
                            fill="currentColor">
                            <path fill-rule="evenodd"
                                d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                                clip-rule="evenodd" />
                        </svg>
                    </div>

                </div>
                <div class="p-3">
                    <label for="entryLength" class="mr-2 text-sm text-gray-600">Tampilkan</label>
                    <select id="entryLength"
                        class="py-1 px-2 border border-gray-300 rounded-md focus:ring-teal-500 text-sm">
                        <option value="5">5</option>
                        <option value="10">10</option>
                        <option value="15">15</option>
                        <option value="20">20</option>
                        <option value="25">25</option>
                        <option value="50">50</option>
                        <option value="100">100</option>
                    </select>
                </div>
            </div>



        </div>

        <!-- Broadcast Table Section -->
        <div class="bg-white shadow-md rounded-md overflow-hidden">
            <table id="informasitable" class="min-w-full divide-y divide-gray-200">
                <!-- Table Header -->
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">NIS</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nama</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Email
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Created
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- DataTable will populate this -->
                </tbody>
            </table>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            // Initialize DataTable
            var table = $('#informasitable').DataTable({
                responsive: true,
                processing: true,
                serverSide: true,
                ajax: {
                    url: '{{ url()->current() }}',
                    data: function(d) {

                    }
                },
                columns: [{
                        data: 'ID_Siswa',
                        name: 'ID_Siswa'
                    },
                    {
                        data: 'Nama_Siswa',
                        name: 'Nama_Siswa'
                    },
                    {
                        data: 'email',
                        name: 'email'
                    },
                    {
                        data: 'created_at',
                        name: 'created_at'
                    },
                    {
                        data: 'button',
                        name: 'button',
                        orderable: false,
                        searchable: false
                    }
                ],

                dom: 'rtip',
                language: {
                    processing: "Memproses...",
                    lengthMenu: "Tampilkan _MENU_ entri",
                    zeroRecords: "Tidak ada data yang ditemukan",
                    info: "Menampilkan _START_ sampai _END_ dari _TOTAL_ entri",
                    infoEmpty: "Menampilkan 0 sampai 0 dari 0 entri",
                    infoFiltered: "(disaring dari _MAX_ total entri)",
                    search: "Cari:",
                    paginate: {
                        first: "Pertama",
                        last: "Terakhir",
                        next: "Selanjutnya",
                        previous: "Sebelumnya"
                    }
                },
                pageLength: 10,
                // Custom styling for pagination
                drawCallback: function() {
                    // Style the pagination to match your design
                    $('.dataTables_paginate .paginate_button').addClass(
                        'relative inline-flex items-center px-4 py-2 border border-gray-300 bg-white text-sm font-medium text-gray-500 hover:bg-gray-50'
                    );
                    $('.dataTables_paginate .paginate_button.current').addClass(
                        'z-10 bg-teal-50 border-teal-500 text-teal-600').removeClass(
                        'text-gray-500');
                    $('.dataTables_info').addClass('text-sm text-gray-700');
                }
            });
            $('#entryLength').on('change', function() {
                table.page.len($(this).val()).draw();
            });
            // Custom search functionality
            $('#customSearch').on('keyup', function() {
                table.search(this.value).draw();
            });
            // Style the DataTable elements to match your design
            $('.dataTables_wrapper').addClass('bg-white');
            $('.dataTables_info').addClass(
                'px-4 py-3 text-sm text-gray-700');
            $('.dataTables_paginate').addClass(
                'px-4 py-3 flex items-center justify-between border-t border-gray-200');
        });
    </script>

    {{-- Delete Modal --}}
    @include('Panel.users.siswa.delete')
@endsection
