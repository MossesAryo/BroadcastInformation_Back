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

                <!-- Tanggal Mulai dan Selesai -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label for="TanggalMulai" class="block text-sm font-medium text-gray-700 mb-1">Tanggal Mulai</label>
                        <input type="date" name="TanggalMulai" id="TanggalMulai" value="{{ old('TanggalMulai') }}"
                            class="w-full border border-gray-300 px-3 py-2 rounded-md focus:outline-none focus:ring-2 focus:ring-teal-500"
                            required>
                    </div>
                    <div>
                        <label for="TanggalSelesai" class="block text-sm font-medium text-gray-700 mb-1">Tanggal Selesai</label>
                        <input type="date" name="TanggalSelesai" id="TanggalSelesai" value="{{ old('TanggalSelesai') }}"
                            class="w-full border border-gray-300 px-3 py-2 rounded-md focus:outline-none focus:ring-2 focus:ring-teal-500"
                            required>
                    </div>
                </div>

                <!-- Upload Gambar -->
                <div>
                    <label for="Thumbnail" class="block text-sm font-medium text-gray-700 mb-1">Upload Thumbnail</label>
                    <div class="flex items-center">
                        <label class="w-full flex flex-col items-center px-4 py-6 bg-white rounded-md shadow-sm border border-gray-300 cursor-pointer hover:bg-gray-50">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                            </svg>
                            <span class="mt-2 text-sm text-gray-600">Pilih Thumbnail</span>
                            <input type="file" name="Thumbnail" id="Thumbnail" class="hidden" accept="image/*">
                        </label>
                    </div>
                    <div id="imagePreview" class="mt-2 hidden">
                        <img src="" alt="Preview" class="h-32 object-cover rounded-md">
                        <button type="button" id="removeImage" class="text-xs text-red-500 mt-1">Hapus gambar</button>
                    </div>
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
        // Toggle dropdown menu
        function toggleDropdown() {
            const menu = document.getElementById('dropdownMenu');
            menu.classList.toggle('hidden');
        }

        // Close dropdown when clicking outside
        window.addEventListener('click', function(e) {
            const dropdown = document.querySelector('.relative.inline-block');
            if (dropdown && !dropdown.contains(e.target)) {
                document.getElementById('dropdownMenu').classList.add('hidden');
            }
        });

        // Image preview functionality
        document.getElementById('Thumbnail').addEventListener('change', function(e) {
            const file = e.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    const preview = document.getElementById('imagePreview');
                    preview.classList.remove('hidden');
                    preview.querySelector('img').src = e.target.result;
                }
                reader.readAsDataURL(file);
            }
        });

        // Remove image
        document.getElementById('removeImage').addEventListener('click', function() {
            document.getElementById('Thumbnail').value = '';
            document.getElementById('imagePreview').classList.add('hidden');
        });

        // Set min date for end date based on start date
        document.getElementById('TanggalMulai').addEventListener('change', function() {
            document.getElementById('TanggalSelesai').min = this.value;
        });
    </script>
@endsection