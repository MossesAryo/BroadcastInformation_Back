@extends('layout.template')
@section('main')

    <body class="bg-gray-100 min-h-screen">
        <div class="container mx-auto px-4 py-6">
            <!-- Header Section -->
            <div class="flex justify-between items-center mb-6">
                <div>
                    <h2 class="text-xl font-semibold text-gray-700">Informasi Broadcast</h2>
                    <p class="text-sm text-gray-500 mt-1">Informasi terbaru untuk Anda</p>
                </div>

                <div class="flex gap-3">
                    <button class="bg-teal-500 hover:bg-teal-600 text-white px-4 py-2 rounded-md flex items-center"
                        onclick="showUploadModal()">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd"
                                d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z"
                                clip-rule="evenodd" />
                        </svg>
                        Upload Informasi
                    </button>
                </div>
            </div>

            <!-- Search Section -->
            <div
                class="bg-white shadow-md rounded-md p-4 mb-6 flex flex-col md:flex-row justify-between items-start md:items-center space-y-3 md:space-y-0">
                <div class="flex items-center">
                    <div class="relative">
                        <input type="text" id="searchInfo" placeholder="Cari informasi..."
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

                <div class="flex items-center space-x-3">
                    <label for="categoryFilter" class="text-sm text-gray-600">Filter:</label>
                    <select id="categoryFilter"
                        class="py-1 px-3 border border-gray-300 rounded-md focus:ring-teal-500 text-sm">
                        <option value="">Semua Kategori</option>
                        <option value="pengumuman">Pengumuman</option>
                        <option value="berita">Berita</option>
                        <option value="event">Event</option>
                        <option value="informasi">Informasi Umum</option>
                    </select>
                </div>
            </div>

            <!-- Information Cards -->
            <div id="informationCards" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                <!-- Card 1 -->
                @forelse ($informasi as $item)
                <div class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition-shadow duration-300"
                    data-category="pengumuman">
                    <div class="p-6">
                        <div class="flex items-center justify-between mb-3">
                            <span
                                class="px-3 py-1 bg-blue-100 text-blue-800 text-xs font-semibold rounded-full">{{ $item->kategori->NamaKategori}}</span>
                            <span class="text-xs text-gray-500">{{ $item->TanggalMulai }}</span>
                        </div>
                        <h3 class="text-lg font-semibold text-gray-800 mb-2">{{ $item->Judul  }}</h3>
                        <p class="text-gray-600 text-sm mb-4 line-clamp-3">
                            {{ $item->Deskripsi }}
                        </p>
                        <div class="flex items-center justify-between">
                            <div class="flex items-center text-xs text-gray-500">
                                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                </svg>
                               {{ $item->operator->NamaOperatorDepartemen }}
                            </div>
                            <button class="text-teal-600 hover:text-teal-800 text-sm font-medium" onclick="readMore(1)">
                                Baca Selengkapnya
                            </button>
                        </div>
                    </div>
                </div>    
                @empty
                    <div id="noResults" class="text-center py-12 hidden">
                        <svg class="mx-auto h-16 w-16 text-gray-400 mb-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                        </svg>
                        <h3 class="text-lg font-medium text-gray-900 mb-2">Tidak ada informasi ditemukan</h3>
                        <p class="text-gray-500">Coba ubah kata kunci pencarian atau filter kategori</p>
                    </div>
                @endforelse
            </div>

            <!-- No Results Message -->
        </div>



        <script>
            // Search functionality
            document.getElementById('searchInfo').addEventListener('input', function() {
                const searchTerm = this.value.toLowerCase();
                filterCards();
            });

            // Category filter
            document.getElementById('categoryFilter').addEventListener('change', function() {
                filterCards();
            });

            function filterCards() {
                const searchTerm = document.getElementById('searchInfo').value.toLowerCase();
                const selectedCategory = document.getElementById('categoryFilter').value;
                const cards = document.querySelectorAll('#informationCards > div');
                let visibleCards = 0;

                cards.forEach(card => {
                    const title = card.querySelector('h3').textContent.toLowerCase();
                    const content = card.querySelector('p').textContent.toLowerCase();
                    const category = card.getAttribute('data-category');

                    const matchesSearch = title.includes(searchTerm) || content.includes(searchTerm);
                    const matchesCategory = !selectedCategory || category === selectedCategory;

                    if (matchesSearch && matchesCategory) {
                        card.style.display = 'block';
                        visibleCards++;
                    } else {
                        card.style.display = 'none';
                    }
                });

               
            }
        </script>
    </body>
@endsection
