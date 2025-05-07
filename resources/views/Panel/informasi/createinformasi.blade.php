@extends('layout.template')
@section('main')
    <div class="container mx-auto px-4 py-6">
        <!-- Header Section -->
        <div class="flex justify-between items-center mb-6">
            <div>
                <h2 class="text-xl font-semibold text-gray-700">Tambah Informasi Broadcast</h2>
            </div>

            <a href="{{ route('get.info') }}"
                class="bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded-md flex items-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd"
                        d="M9.707 16.707a1 1 0 01-1.414 0l-6-6a1 1 0 010-1.414l6-6a1 1 0 011.414 1.414L5.414 9H17a1 1 0 110 2H5.414l4.293 4.293a1 1 0 010 1.414z"
                        clip-rule="evenodd" />
                </svg>
                Kembali
            </a>
        </div>

        <!-- Form Card -->
        <div class="bg-white shadow-md rounded-md p-6">
            @if ($errors->any())
                <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 mb-6">
                    <ul class="list-disc pl-5">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('post.info') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                @csrf

                <!-- Judul -->
                <div>
                    <label for="Judul" class="block text-sm font-medium text-gray-700 mb-1">Judul</label>
                    <input type="text" name="Judul" id="Judul" value="{{ old('Judul') }}"
                        class="w-full border border-gray-300 px-3 py-2 rounded-md focus:outline-none focus:ring-2 focus:ring-teal-500"
                        required>
                </div>

                <!-- Kategori -->
                <div>
                    <label for="IDKategoriInformasi" class="block text-sm font-medium text-gray-700 mb-1">Kategori</label>
                    <select name="IDKategoriInformasi" id="IDKategoriInformasi"
                        class="w-full border border-gray-300 px-3 py-2 rounded-md focus:outline-none focus:ring-2 focus:ring-teal-500"
                        required>
                        <option value="" hidden>Pilih Kategori</option>
                        @foreach ($kategori as $item)
                            <option value="{{ $item->IDKategoriInformasi }}">{{ $item->NamaKategori }}</option>
                        @endforeach
                    </select>
                </div>

                <!-- Isi -->
                <div>
                    <label for="Deskripsi" class="block text-sm font-medium text-gray-700 mb-1">Isi</label>
                    <textarea name="Deskripsi" id="Deskripsi" rows="8"
                        class="w-full border border-gray-300 px-3 py-2 rounded-md focus:outline-none focus:ring-2 focus:ring-teal-500"
                        required>{{ old('Deskripsi') }}</textarea>
                </div>

                <!-- Target Audience Dropdown -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Target Informasi</label>
                    <div class="relative inline-block text-left">
                        <div>
                            <button type="button" onclick="toggleDropdown()"
                                class="inline-flex justify-between w-full md:w-64 rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none">
                                Pilih Target
                                <svg class="-mr-1 ml-2 h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                    fill="currentColor">
                                    <path fill-rule="evenodd"
                                        d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                        clip-rule="evenodd" />
                                </svg>
                            </button>
                        </div>

                        <div id="dropdownMenu"
                            class="hidden origin-top-left absolute left-0 mt-2 w-full md:w-64 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 divide-y divide-gray-100 z-10">

                            <div class="py-1 px-3">
                                @foreach ($departemens as $dept )
                                    <div class="flex items-center my-1">                                        
                                        <input 
                                            id="IDOperator" 
                                            name="IDOperator" 
                                            value="{{ $dept->IDOperator }}" 
                                            type="checkbox"
                                            class="option-checkbox h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded">
                                        <label for="IDOperator" class="ml-2 block text-sm text-gray-900">
                                            {{ $dept->departemen->Nama_Departemen }}
                                        </label>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
               

                <!-- Submit Button -->
                <div class="pt-4">
                    <button type="submit" 
                        class="w-full bg-teal-600 hover:bg-teal-700 text-white py-2 px-4 rounded-md transition duration-300">
                        Simpan
                    </button>
                </div>
            </form>
        </div>
    </div>

    <script>
        function toggleDropdown() {
            const menu = document.getElementById("dropdownMenu");
            menu.classList.toggle("hidden");
        }
        
        
        
        // Close the dropdown if the user clicks outside of it
        window.onclick = function(event) {
            if (!event.target.closest(".relative")) {
                const dropdowns = document.getElementById("dropdownMenu");
                if (!dropdowns.classList.contains("hidden")) {
                    dropdowns.classList.add("hidden");
                }
            }
        }
    </script>
@endsection