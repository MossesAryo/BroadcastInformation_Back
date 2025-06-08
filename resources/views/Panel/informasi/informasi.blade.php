@extends('layout.template')
@section('main')
    <div class="container mx-auto px-4 py-6">
        <!-- Header Section -->
        <div class="flex justify-between items-center mb-6">
            <div>
                <h2 class="text-xl font-semibold text-gray-700">Informasi Broadcast</h2>
            </div>

            <div class="flex gap-3">                
                <button id="exportImportBtn" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-md flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M3 17a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm3.293-7.707a1 1 0 011.414 0L9 10.586V3a1 1 0 112 0v7.586l1.293-1.293a1 1 0 111.414 1.414l-3 3a1 1 0 01-1.414 0l-3-3a1 1 0 010-1.414z" clip-rule="evenodd" />
                    </svg>
                    Export/Import
                </button>
            </div>
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
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">NO</th>
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Judul
                        </th>
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Kategori
                        </th>
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tanggal
                        </th>
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Departemen
                        </th>
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Aksi
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <!-- DataTable will populate this -->
                </tbody>
            </table>
        </div>
    </div>

    @include('Panel.informasi.modalExportImport')

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
                        data: 'IDInformasi',
                        name: 'IDInformasi',
                        searchable: false
                    },
                    {
                        data: 'Judul',
                        name: 'Judul'
                    },
                    {
                        data: 'IDKategoriInformasi',
                        name: 'IDKategoriInformasi'
                    },
                    {
                        data: 'TanggalMulai',
                        name: 'TanggalMulai'
                    },
                    {
                        data: 'IDOperator',
                        name: 'IDOperator'
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
            $('.dataTables_info').addClass('px-4 py-3 text-sm text-gray-700');
            $('.dataTables_paginate').addClass(
                'px-4 py-3 flex items-center justify-between border-t border-gray-200');
        });
    </script>

    {{-- Delete Modal --}}
    @include('Panel.informasi.deleteinformasi')
@endsection
