@extends('layout.template')
@section('main')
    <div class="container mx-auto px-4 py-6">
        <!-- Header Section -->
        <div class="flex justify-between items-center mb-6">
            <div>
                <h2 class="text-xl font-semibold text-gray-700">Edit Data Operator
                    <strong>{{ $operatordepartemen->NamaOperatorDepartemen }}</strong>
            </div>

            <a href="{{ route('get.op') }}"
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

            {{-- enctype="multipart/form-data" --}}
            <form
                action="{{ route('update.op', [$operatordepartemen->IDOperator, $operatordepartemen->ID_Departemen, $operatordepartemen->id_user]) }}"
                method="POST" class="space-y-6">
                @csrf
                @method('PUT')

                <!-- Nama Kategori -->
                <div>
                    <label for="NamaOperatorDepartemen" class="block text-sm font-medium text-gray-700 mb-1">Nama
                        Operator</label>
                    <input type="text" name="NamaOperatorDepartemen" id="NamaOperatorDepartemen"
                        value="{{ $operatordepartemen->NamaOperatorDepartemen }}"
                        class="w-full border border-gray-300 px-3 py-2 rounded-md focus:outline-none focus:ring-2 focus:ring-teal-500"
                        required>
                </div>

                <!-- Isi -->
                <div>
                    <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Username</label>
                    <input type="text" name="name" id="name" value="{{ $operatordepartemen->user->name }}"
                        class="w-full border border-gray-300 px-3 py-2 rounded-md focus:outline-none focus:ring-2 focus:ring-teal-500"
                        required>
                </div>
                <div>
                    <label for="ID_Departemen" class="block text-sm font-medium text-gray-700 mb-1"></label>Departemen
                    <select name="ID_Departemen" id="ID_Departemen"
                        class="w-full border border-gray-300 px-3 py-2 rounded-md focus:outline-none focus:ring-2 focus:ring-teal-500"
                        required>
                        <option value="" hidden>Pilih Departemen</option>
                        @foreach ($departemen as $item)
                            <option value="{{ $item->ID_Departemen }}"
                                {{ old('ID_Departemen', $operatordepartemen->ID_Departemen ?? '') == $item->ID_Departemen ? 'selected' : '' }}>
                                {{ $item->Nama_Departemen }}
                            </option>
                        @endforeach
                    </select>
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

    
@endsection
