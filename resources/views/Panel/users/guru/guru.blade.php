@extends('layout.template')
@section('main')
    <div class="container mx-auto px-4 py-6">
        <!-- Header Section -->
        <div class="flex justify-between items-center mb-6">
            <div>
                <h2 class="text-xl font-semibold text-gray-700">Guru</h2>
            </div>

            <button class="bg-teal-500 hover:bg-teal-600 text-white px-4 py-2 rounded-md flex items-center"
                onclick="window.location='{{ route('create.guru') }}'">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd"
                        d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z"
                        clip-rule="evenodd" />
                </svg>
                Tambah Guru
            </button>
        </div>

        <!-- Search and Filter Section -->
        <form action="{{ route('get.guru') }}" method="GET"
            class="bg-white shadow-md rounded-md p-4 mb-6 flex flex-col md:flex-row justify-between items-start md:items-center space-y-3 md:space-y-0">
            <!-- Search Box -->
            <div class="flex items-center">
                <div class="relative">
                    <input type="text" name="search" value="{{ $search ?? '' }}" placeholder="Cari guru..."
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
            </div>

            <!-- Sort Filter -->
            <div class="flex items-center space-x-4">
                <label class="text-sm font-medium text-gray-600">Urutan:</label>
                <select name="sort" onchange="this.form.submit()"
                    class="border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-teal-500">
                    <option value="all" {{ ($sort ?? '') == 'all' ? 'selected' : '' }}>Default</option>
                    <option value="latest" {{ ($sort ?? '') == 'latest' ? 'selected' : '' }}>Terbaru</option>
                    <option value="earliest" {{ ($sort ?? '') == 'earliest' ? 'selected' : '' }}>Terlama</option>
                </select>

                <!-- Search Button -->
                {{-- <button type="submit" class="bg-teal-500 hover:bg-teal-600 text-white px-4 py-2 rounded-md">
                    Cari
                </button> --}}

                <!-- Reset Button -->
                {{-- @if (($search ?? '') || ($sort ?? '') != 'all')
                    <a href="{{ route('guru') }}" class="bg-gray-300 hover:bg-gray-400 text-gray-800 px-4 py-2 rounded-md">
                        Reset
                    </a>
                @endif --}}
            </div>
        </form>

        <!-- Broadcast Table Section -->
        <div class="bg-white shadow-md rounded-md overflow-hidden">
            <table class="min-w-full divide-y divide-gray-200">
                <!-- Table Header -->
                <thead class="bg-gray-50">
                    <tr>
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">NIP</th>
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nama
                        </th>
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Email
                        </th>
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tanggal
                        </th>
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Aksi</th>
                    </tr>
                </thead>

                <!-- Table Body -->
                <tbody class="bg-white divide-y divide-gray-200">
                    @forelse ($guru as $item)
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $item->ID_Guru }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $item->Nama_Guru}}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                {{ $item->user->email }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $item->created_at }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                <div class="flex space-x-2">
                                    <button title="Edit"
                                        onclick="window.location='{{ route('edit.guru', [$item->ID_Guru, $item->username]) }}'">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" fill="#57B4BA"
                                            class="w-5 h-5">
                                            <path
                                                d="M402.6 83.2l90.2 90.2c3.8 3.8 3.8 10 0 13.8L274.4 405.6l-92.8 10.3c-12.4 1.4-22.9-9.1-21.5-21.5l10.3-92.8L388.8 83.2c3.8-3.8 10-3.8 13.8 0zm162-22.9l-48.8-48.8c-15.2-15.2-39.9-15.2-55.2 0l-35.4 35.4c-3.8 3.8-3.8 10 0 13.8l90.2 90.2c3.8 3.8 10 3.8 13.8 0l35.4-35.4c15.2-15.3 15.2-40 0-55.2zM384 346.2V448H64V128h229.8c3.2 0 6.2-1.3 8.5-3.5l40-40c7.6-7.6 2.2-20.5-8.5-20.5H48C21.5 64 0 85.5 0 112v352c0 26.5 21.5 48 48 48h352c26.5 0 48-21.5 48-48V306.2c0-10.7-12.9-16-20.5-8.5l-40 40c-2.2 2.3-3.5 5.3-3.5 8.5z" />
                                        </svg>
                                    </button>


                                    <button class="text-red-600 hover:text-red-900" title="Delete"
                                        onclick="openDeleteModal('{{ $item->ID_Guru, $item->username }}')">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20"
                                            fill="currentColor">
                                            <path fill-rule="evenodd"
                                                d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                                                clip-rule="evenodd" />
                                        </svg>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="px-6 py-4 text-center text-sm text-gray-500">Tidak ada informasi.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>

            <!-- Pagination Section -->
            <div class="bg-white px-4 py-3 flex items-center justify-between border-t border-gray-200">
                <!-- Mobile Pagination -->
                <div class="flex-1 flex justify-between sm:hidden">
                    @if ($guru->onFirstPage())
                        <span
                            class="relative inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-md text-gray-500 bg-gray-100">
                            Previous
                        </span>
                    @else
                        <a href="{{ $guru->previousPageUrl() }}"
                            class="relative inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50">
                            Previous
                        </a>
                    @endif

                    @if ($guru->hasMorePages())
                        <a href="{{ $guru->nextPageUrl() }}"
                            class="ml-3 relative inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50">
                            Next
                        </a>
                    @else
                        <span
                            class="ml-3 relative inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-md text-gray-500 bg-gray-100">
                            Next
                        </span>
                    @endif
                </div>

                <!-- Desktop Pagination -->
                <div class="hidden sm:flex-1 sm:flex sm:items-center sm:justify-between">
                    <!-- Results Summary -->
                    <div>
                        <p class="text-sm text-gray-700">
                            Showing <span class="font-medium">{{ $guru->firstItem() ?? 0 }}</span> to
                            <span class="font-medium">{{ $guru->lastItem() ?? 0 }}</span> of
                            <span class="font-medium">{{ $guru->total() }}</span> results
                        </p>
                    </div>

                    <!-- Page Navigation with Custom Colors -->
                    <div>
                        @if ($guru->hasPages())
                            <nav class="relative z-0 inline-flex rounded-md shadow-sm -space-x-px" aria-label="Pagination">
                                {{-- Previous Page Link --}}
                                @if ($guru->onFirstPage())
                                    <span
                                        class="relative inline-flex items-center px-2 py-2 rounded-l-md border border-gray-300 bg-white text-gray-300 cursor-not-allowed">
                                        <span class="sr-only">Previous</span>
                                        <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                            fill="currentColor" aria-hidden="true">
                                            <path fill-rule="evenodd"
                                                d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z"
                                                clip-rule="evenodd" />
                                        </svg>
                                    </span>
                                @else
                                    <a href="{{ $guru->previousPageUrl() }}"
                                        class="relative inline-flex items-center px-2 py-2 rounded-l-md border border-gray-300 bg-white text-sm font-medium text-gray-500 hover:bg-gray-50">
                                        <span class="sr-only">Previous</span>
                                        <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                            fill="currentColor" aria-hidden="true">
                                            <path fill-rule="evenodd"
                                                d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z"
                                                clip-rule="evenodd" />
                                        </svg>
                                    </a>
                                @endif

                                {{-- Pagination Elements --}}
                                @foreach ($guru->getUrlRange(1, $guru->lastPage()) as $page => $url)
                                    @if ($page == $guru->currentPage())
                                        <span
                                            class="relative inline-flex items-center px-4 py-2 border border-teal-500 bg-teal-500 text-sm font-medium text-white"
                                            style="background-color: #57B4BA; border-color: #57B4BA;">
                                            {{ $page }}
                                        </span>
                                    @else
                                        <a href="{{ $url }}"
                                            class="relative inline-flex items-center px-4 py-2 border border-gray-300 bg-white text-sm font-medium text-gray-700 hover:bg-gray-50">
                                            {{ $page }}
                                        </a>
                                    @endif
                                @endforeach

                                {{-- Next Page Link --}}
                                @if ($guru->hasMorePages())
                                    <a href="{{ $guru->nextPageUrl() }}"
                                        class="relative inline-flex items-center px-2 py-2 rounded-r-md border border-gray-300 bg-white text-sm font-medium text-gray-500 hover:bg-gray-50">
                                        <span class="sr-only">Next</span>
                                        <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                            fill="currentColor" aria-hidden="true">
                                            <path fill-rule="evenodd"
                                                d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                                clip-rule="evenodd" />
                                        </svg>
                                    </a>
                                @else
                                    <span
                                        class="relative inline-flex items-center px-2 py-2 rounded-r-md border border-gray-300 bg-white text-gray-300 cursor-not-allowed">
                                        <span class="sr-only">Next</span>
                                        <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                            fill="currentColor" aria-hidden="true">
                                            <path fill-rule="evenodd"
                                                d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                                clip-rule="evenodd" />
                                        </svg>
                                    </span>
                                @endif
                            </nav>
                        @endif
                    </div>
                </div>

                <!-- Mobile Pagination with Custom Colors -->
                <div class="flex-1 flex justify-between sm:hidden">
                    @if ($guru->onFirstPage())
                        <span
                            class="relative inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-md text-gray-500 bg-gray-100 cursor-not-allowed">
                            Previous
                        </span>
                    @else
                        <a href="{{ $guru->previousPageUrl() }}"
                            class="relative inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50">
                            Previous
                        </a>
                    @endif

                    @if ($guru->hasMorePages())
                        <a href="{{ $guru->nextPageUrl() }}"
                            class="ml-3 relative inline-flex items-center px-4 py-2 border border-teal-500 text-sm font-medium rounded-md text-white hover:bg-teal-600"
                            style="background-color: #57B4BA; border-color: #57B4BA;">
                            Next
                        </a>
                    @else
                        <span
                            class="ml-3 relative inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-md text-gray-500 bg-gray-100 cursor-not-allowed">
                            Next
                        </span>
                    @endif
                </div>
            </div>
        </div>
    </div>

    {{-- Delete Modal --}}
    @include('Panel.users.guru.delete')
@endsection

@section('scripts')
    <script>
        // Add this script to your guru.blade.php file
        document.addEventListener('DOMContentLoaded', function() {
            const searchInput = document.querySelector('input[name="search"]');
            const sortSelect = document.querySelector('select[name="sort"]');
            const tableBody = document.querySelector('tbody');
            const paginationContainer = document.querySelector(
                '.sm\\:flex-1.sm\\:flex.sm\\:items-center.sm\\:justify-between');
            const mobilePagination = document.querySelector('.flex-1.flex.justify-between.sm\\:hidden');
            const resultsInfo = document.querySelector('.text-sm.text-gray-700');

            let typingTimer;
            const doneTypingInterval = 500; // Wait for 500ms after user stops typing

            // Function to load the data via AJAX
            function loadData() {
                const searchValue = searchInput.value;
                const sortValue = sortSelect.value;

                // Show loading state
                tableBody.innerHTML = `
            <tr>
                <td colspan="5" class="px-6 py-4 text-center text-sm text-gray-500">
                    <div class="flex justify-center">
                        <svg class="animate-spin h-5 w-5 text-teal-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                            <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                        </svg>
                    </div>
                </td>
            </tr>
        `;

                // Fetch data from the server
                fetch(
                        `${window.location.pathname}?search=${encodeURIComponent(searchValue)}&sort=${sortValue}&ajax=1`
                        )
                    .then(response => response.json())
                    .then(data => {
                        // Update table body with new data
                        updateTable(data.guru.data);

                        // Update pagination
                        if (paginationContainer) {
                            updatePagination(data.guru);
                        }

                        // Update mobile pagination
                        if (mobilePagination) {
                            updateMobilePagination(data.guru);
                        }

                        // Update results info
                        if (resultsInfo) {
                            updateResultsInfo(data.guru);
                        }

                        // Update URL without reloading the page
                        const url = new URL(window.location);
                        url.searchParams.set('search', searchValue);
                        url.searchParams.set('sort', sortValue);
                        window.history.pushState({}, '', url);
                    })
                    .catch(error => {
                        console.error('Error:', error);
                        tableBody.innerHTML = `
                    <tr>
                        <td colspan="5" class="px-6 py-4 text-center text-sm text-red-500">
                            Terjadi kesalahan saat memuat data.
                        </td>
                    </tr>
                `;
                    });
            }

            // Function to update table with new data
            function updateTable(data) {
                if (data.length === 0) {
                    tableBody.innerHTML = `
                <tr>
                    <td colspan="5" class="px-6 py-4 text-center text-sm text-gray-500">Tidak ada informasi.</td>
                </tr>
            `;
                    return;
                }

                let html = '';
                data.forEach(item => {
                    html += `
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">${item.ID_Siswa}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">${item.Nama_Siswa}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">${item.user.email}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">${item.created_at}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                        <div class="flex space-x-2">
                            <button title="Edit" onclick="window.location='${window.location.origin}/guru/edit/${item.ID_Siswa}/${item.username}'">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" fill="#57B4BA" class="w-5 h-5">
                                    <path d="M402.6 83.2l90.2 90.2c3.8 3.8 3.8 10 0 13.8L274.4 405.6l-92.8 10.3c-12.4 1.4-22.9-9.1-21.5-21.5l10.3-92.8L388.8 83.2c3.8-3.8 10-3.8 13.8 0zm162-22.9l-48.8-48.8c-15.2-15.2-39.9-15.2-55.2 0l-35.4 35.4c-3.8 3.8-3.8 10 0 13.8l90.2 90.2c3.8 3.8 10 3.8 13.8 0l35.4-35.4c15.2-15.3 15.2-40 0-55.2zM384 346.2V448H64V128h229.8c3.2 0 6.2-1.3 8.5-3.5l40-40c7.6-7.6 2.2-20.5-8.5-20.5H48C21.5 64 0 85.5 0 112v352c0 26.5 21.5 48 48 48h352c26.5 0 48-21.5 48-48V306.2c0-10.7-12.9-16-20.5-8.5l-40 40c-2.2 2.3-3.5 5.3-3.5 8.5z" />
                                </svg>
                            </button>
                            <button class="text-red-600 hover:text-red-900" title="Delete" onclick="openDeleteModal('${item.ID_Siswa},${item.username}')">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd" />
                                </svg>
                            </button>
                        </div>
                    </td>
                </tr>
            `;
                });

                tableBody.innerHTML = html;
            }

            // Function to update the pagination for desktop
            function updatePagination(data) {
                if (!data.last_page || data.last_page <= 1) {
                    paginationContainer.querySelector('nav')?.remove();
                    return;
                }

                let paginationHtml = `
            <nav class="relative z-0 inline-flex rounded-md shadow-sm -space-x-px" aria-label="Pagination">
                ${data.prev_page_url ?
                    `<a href="#" data-page="${data.current_page-1}" class="paginate-link relative inline-flex items-center px-2 py-2 rounded-l-md border border-gray-300 bg-white text-sm font-medium text-gray-500 hover:bg-gray-50">
                                <span class="sr-only">Previous</span>
                                <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                    <path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd" />
                                </svg>
                            </a>` :
                    `<span class="relative inline-flex items-center px-2 py-2 rounded-l-md border border-gray-300 bg-white text-gray-300 cursor-not-allowed">
                                <span class="sr-only">Previous</span>
                                <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                    <path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd" />
                                </svg>
                            </span>`
                }
        `;

                // Generate page number links
                for (let i = 1; i <= data.last_page; i++) {
                    if (i === data.current_page) {
                        paginationHtml += `
                    <span class="relative inline-flex items-center px-4 py-2 border border-teal-500 bg-teal-500 text-sm font-medium text-white" style="background-color: #57B4BA; border-color: #57B4BA;">
                        ${i}
                    </span>
                `;
                    } else {
                        paginationHtml += `
                    <a href="#" data-page="${i}" class="paginate-link relative inline-flex items-center px-4 py-2 border border-gray-300 bg-white text-sm font-medium text-gray-700 hover:bg-gray-50">
                        ${i}
                    </a>
                `;
                    }
                }

                paginationHtml += `
            ${data.next_page_url ?
                `<a href="#" data-page="${data.current_page+1}" class="paginate-link relative inline-flex items-center px-2 py-2 rounded-r-md border border-gray-300 bg-white text-sm font-medium text-gray-500 hover:bg-gray-50">
                            <span class="sr-only">Next</span>
                            <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                            </svg>
                        </a>` :
                `<span class="relative inline-flex items-center px-2 py-2 rounded-r-md border border-gray-300 bg-white text-gray-300 cursor-not-allowed">
                            <span class="sr-only">Next</span>
                            <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                            </svg>
                        </span>`
            }
        </nav>
        `;

                const paginationDiv = paginationContainer.querySelector('div:last-child');
                if (paginationDiv) {
                    paginationDiv.innerHTML = paginationHtml;

                    // Add event listeners to pagination links
                    paginationDiv.querySelectorAll('.paginate-link').forEach(link => {
                        link.addEventListener('click', function(e) {
                            e.preventDefault();
                            const page = this.getAttribute('data-page');
                            loadPage(page);
                        });
                    });
                }
            }

            // Function to update mobile pagination
            function updateMobilePagination(data) {
                let mobilePaginationHtml = '';

                if (data.prev_page_url) {
                    mobilePaginationHtml += `
                <a href="#" data-page="${data.current_page-1}" class="paginate-link relative inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50">
                    Previous
                </a>
            `;
                } else {
                    mobilePaginationHtml += `
                <span class="relative inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-md text-gray-500 bg-gray-100 cursor-not-allowed">
                    Previous
                </span>
            `;
                }

                if (data.next_page_url) {
                    mobilePaginationHtml += `
                <a href="#" data-page="${data.current_page+1}" class="paginate-link ml-3 relative inline-flex items-center px-4 py-2 border border-teal-500 text-sm font-medium rounded-md text-white hover:bg-teal-600" style="background-color: #57B4BA; border-color: #57B4BA;">
                    Next
                </a>
            `;
                } else {
                    mobilePaginationHtml += `
                <span class="ml-3 relative inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-md text-gray-500 bg-gray-100 cursor-not-allowed">
                    Next
                </span>
            `;
                }

                mobilePagination.innerHTML = mobilePaginationHtml;

                // Add event listeners to mobile pagination links
                mobilePagination.querySelectorAll('.paginate-link').forEach(link => {
                    link.addEventListener('click', function(e) {
                        e.preventDefault();
                        const page = this.getAttribute('data-page');
                        loadPage(page);
                    });
                });
            }

            // Function to update results info
            function updateResultsInfo(data) {
                const from = data.from || 0;
                const to = data.to || 0;
                const total = data.total || 0;

                resultsInfo.innerHTML = `
            Showing <span class="font-medium">${from}</span> to
            <span class="font-medium">${to}</span> of
            <span class="font-medium">${total}</span> results
        `;
            }

            // Function to load a specific page
            function loadPage(page) {
                const searchValue = searchInput.value;
                const sortValue = sortSelect.value;

                // Show loading state
                tableBody.innerHTML = `
            <tr>
                <td colspan="5" class="px-6 py-4 text-center text-sm text-gray-500">
                    <div class="flex justify-center">
                        <svg class="animate-spin h-5 w-5 text-teal-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                            <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                        </svg>
                    </div>
                </td>
            </tr>
        `;

                // Fetch data for the specific page
                fetch(
                        `${window.location.pathname}?search=${encodeURIComponent(searchValue)}&sort=${sortValue}&page=${page}&ajax=1`
                        )
                    .then(response => response.json())
                    .then(data => {
                        updateTable(data.guru.data);
                        updatePagination(data.guru);
                        updateMobilePagination(data.guru);
                        updateResultsInfo(data.guru);

                        // Update URL without reloading the page
                        const url = new URL(window.location);
                        url.searchParams.set('search', searchValue);
                        url.searchParams.set('sort', sortValue);
                        url.searchParams.set('page', page);
                        window.history.pushState({}, '', url);
                    })
                    .catch(error => {
                        console.error('Error:', error);
                        tableBody.innerHTML = `
                    <tr>
                        <td colspan="5" class="px-6 py-4 text-center text-sm text-red-500">
                            Terjadi kesalahan saat memuat data.
                        </td>
                    </tr>
                `;
                    });
            }

            // Event listener for search input changes
            if (searchInput) {
                searchInput.addEventListener('keyup', function() {
                    clearTimeout(typingTimer);
                    typingTimer = setTimeout(loadData, doneTypingInterval);
                });

                searchInput.addEventListener('keydown', function() {
                    clearTimeout(typingTimer);
                });
            }

            // Event listener for sort select changes
            if (sortSelect) {
                sortSelect.addEventListener('change', loadData);
            }

            // Add event listener to prevent form submission
            const searchForm = document.querySelector('form[action*="guru"]');
            if (searchForm) {
                searchForm.addEventListener('submit', function(e) {
                    e.preventDefault();
                    loadData();
                });
            }
        });
    </script>
@endsection
