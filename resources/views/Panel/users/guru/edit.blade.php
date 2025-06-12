@extends('layout.template')
@section('main')
    <div class="container mx-auto px-4 py-6">
        <div class="flex justify-between items-center mb-6">
            <div>
                <h2 class="text-xl font-semibold text-gray-700">Edit Data Guru <strong>{{ $guru->Nama_Guru }}</strong>
            </div>

            <a href="{{ route('get.guru') }}"
                class="bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded-md flex items-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd"
                        d="M9.707 16.707a1 1 0 01-1.414 0l-6-6a1 1 0 010-1.414l6-6a1 1 0 011.414 1.414L5.414 9H17a1 1 0 110 2H5.414l4.293 4.293a1 1 0 010 1.414z"
                        clip-rule="evenodd" />
                </svg>
                Kembali
            </a>
        </div>

        
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

            
            <form action="{{ route('update.guru', [$guru->ID_Guru, $guru->username]) }}" method="POST"
                class="space-y-6">
                @csrf
                @method('PUT')

               
                 <div>
                    <label for="ID_Guru" class="block text-sm font-medium text-gray-700 mb-1">NIP</label>
                    <input type="text" name="ID_Guru" id="ID_Guru" value="{{ $guru->ID_Guru }}"
                        class="w-full border border-gray-300 px-3 py-2 rounded-md focus:outline-none focus:ring-2 focus:ring-teal-500"
                        required>
                </div>
                <div>
                    <label for="Nama_Guru" class="block text-sm font-medium text-gray-700 mb-1">Nama Guru</label>
                    <input type="text" name="Nama_Guru" id="Nama_Guru" value="{{ $guru->Nama_Guru }}"
                        class="w-full border border-gray-300 px-3 py-2 rounded-md focus:outline-none focus:ring-2 focus:ring-teal-500"
                        required>
                </div>

                <div>
                    <label for="username" class="block text-sm font-medium text-gray-700 mb-1">Username</label>
                    <input type="text" name="username" id="username" value="{{ $guru->username }}"
                        class="w-full border border-gray-300 px-3 py-2 rounded-md focus:outline-none focus:ring-2 focus:ring-teal-500"
                        required>
                </div>
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
