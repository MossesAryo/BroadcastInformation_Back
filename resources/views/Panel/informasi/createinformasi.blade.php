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
                        <label for="TanggalSelesai" class="block text-sm font-medium text-gray-700 mb-1">Tanggal
                            Selesai</label>
                        <input type="date" name="TanggalSelesai" id="TanggalSelesai" value="{{ old('TanggalSelesai') }}"
                            class="w-full border border-gray-300 px-3 py-2 rounded-md focus:outline-none focus:ring-2 focus:ring-teal-500"
                            required>
                    </div>
                </div>

                <!-- Upload Gambar -->
                <div>
                    <label for="Thumbnail" class="block text-sm font-medium text-gray-700 mb-1">Upload Thumbnail</label>
                    <div class="flex items-center">
                        <label
                            class="w-full flex flex-col items-center px-4 py-6 bg-white rounded-md shadow-sm border border-gray-300 cursor-pointer hover:bg-gray-50">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-gray-400" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
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


                <div>
                    <h2 class="text-xl font-semibold text-gray-700">Pilih Departemen</h2>
                </div>
                <!-- Target Audience Dropdown -->
                <div class="space-y-3">
                    <!-- Semua Departemen -->
                    <label
                        class="flex items-start space-x-3 p-4 border border-gray-200 rounded-lg hover:bg-gray-50 cursor-pointer transition-colors">
                        <input type="radio" name="target_type" value="semua" checked
                            class="mt-1 h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300">
                        <div class="flex-1">
                            <div class="font-medium text-gray-900">
                                <i class="fas fa-globe text-blue-500 mr-2"></i>
                                Semua Departemen
                            </div>
                            <p class="text-sm text-gray-600 mt-1">Broadcast akan dikirim ke seluruh departemen termasuk guru
                                dan siswa</p>
                        </div>
                    </label>

                    <!-- Satu Departemen -->
                    <label
                        class="flex items-start space-x-3 p-4 border border-gray-200 rounded-lg hover:bg-gray-50 cursor-pointer transition-colors">
                        <input type="radio" name="target_type" value="satu"
                            class="mt-1 h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300">
                        <div class="flex-1">
                            <div class="font-medium text-gray-900">
                                <i class="fas fa-building text-green-500 mr-2"></i>
                                Satu Departemen
                            </div>
                            <p class="text-sm text-gray-600 mt-1">Pilih satu departemen tertentu</p>
                            <select name="target_departemen_id"
                                class="mt-3 w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500 focus:border-blue-500 disabled:opacity-50"
                                disabled>
                                <option value="">Pilih Departemen</option>
                                @foreach ($departemen as $item)
                                <option value="{{ $item->ID_Departemen }}">{{ $item->Nama_Departemen }}</option>
                                @endforeach
                               
                            </select>
                        </div>
                    </label>

                    <!-- Beberapa Departemen -->
                    <label
                        class="flex items-start space-x-3 p-4 border border-gray-200 rounded-lg hover:bg-gray-50 cursor-pointer transition-colors">
                        <input type="radio" name="target_type" value="beberapa"
                            class="mt-1 h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300">
                        <div class="flex-1">
                            <div class="font-medium text-gray-900">
                                <i class="fas fa-check-double text-purple-500 mr-2"></i>
                                Beberapa Departemen
                            </div>
                            <p class="text-sm text-gray-600 mt-1">Pilih beberapa departemen sekaligus</p>
                            <div class="mt-3 grid grid-cols-2 gap-2">
                                @foreach ($departemen as $item)
                                <label class="flex items-center space-x-2">
                                    <input type="checkbox" name="target_departemen_ids[]" value="{{ $item->ID_Departemen }}" disabled
                                    class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded disabled:opacity-50">
                                    <span class="text-sm text-gray-700">{{ $item->Nama_Departemen }}</span>
                                </label>
                                @endforeach
                            </div>
                        </div>
                    </label>
                </div>


                <!-- Submit Button -->
                <div class="bg-white rounded-lg shadow-sm border border-gray-200">
                    <div class="px-6 py-4 flex items-center justify-between">
                        <div class="text-sm text-gray-600">
                            <i class="fas fa-info-circle text-blue-500 mr-1"></i>
                            Pastikan semua informasi sudah benar sebelum mengirim
                        </div>
                        <div class="flex space-x-3">
                            <button type="button" 
                                    onclick="window.history.back()"
                                    class="px-6 py-3 border border-gray-300 rounded-lg text-gray-700 font-medium hover:bg-gray-50 focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition-colors">
                                <i class="fas fa-times mr-2"></i>Batal
                            </button>
                            <button type="submit" 
                                    class="px-6 py-3 bg-blue-600 text-white rounded-lg font-medium hover:bg-blue-700 focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition-colors">
                                <i class="fas fa-paper-plane mr-2"></i>Kirim Broadcast
                            </button>
                        </div>
                    </div>
            </form>
        </div>
    </div>

    <script>
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

        // Target type radio button handler
        const targetRadios = document.querySelectorAll('input[name="target_type"]');
        const singleSelect = document.querySelector('select[name="target_departemen_id"]');
        const multipleCheckboxes = document.querySelectorAll('input[name="target_departemen_ids[]"]');

        targetRadios.forEach(radio => {
            radio.addEventListener('change', function() {
                // Disable all inputs first
                singleSelect.disabled = true;
                multipleCheckboxes.forEach(cb => cb.disabled = true);

                // Enable based on selection
                if (this.value === 'satu') {
                    singleSelect.disabled = false;
                } else if (this.value === 'beberapa') {
                    multipleCheckboxes.forEach(cb => cb.disabled = false);
                }
            });
        });

        // Form validation
        document.querySelector('form').addEventListener('submit', function(e) {
            const targetType = document.querySelector('input[name="target_type"]:checked').value;

            if (targetType === 'satu') {
                const singleDept = document.querySelector('select[name="target_departemen_id"]').value;
                if (!singleDept) {
                    e.preventDefault();
                    alert('Silakan pilih departemen tujuan!');
                    return;
                }
            } else if (targetType === 'beberapa') {
                const multipleDepts = document.querySelectorAll('input[name="target_departemen_ids[]"]:checked');
                if (multipleDepts.length === 0) {
                    e.preventDefault();
                    alert('Silakan pilih minimal satu departemen!');
                    return;
                }
            }
        });
    </script>
@endsection
