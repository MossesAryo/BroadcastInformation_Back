@extends('layout.template')
@section('main')
    <div class="p-4">
        <div class="bg-white rounded-2xl shadow-md p-6">
            <div class="flex justify-between items-center mb-6">
                <div>
                    <h2 class="text-2xl font-bold text-gray-800">Departemen</h2>
                    <p class="text-sm text-gray-500">Kelola data departemen</p>
                </div>
                <div class="flex gap-3">
                    <button class="bg-teal-500 hover:bg-teal-600 text-white px-4 py-2 rounded-md flex items-center"
                        onclick="window.location='{{ route('departemen.create') }}'">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd"
                                d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z"
                                clip-rule="evenodd" />
                        </svg>
                        Tambah Departemen
                    </button>


                </div>
            </div>

            <div class="overflow-x-auto rounded-lg">
                <table class="min-w-full bg-white text-gray-700 text-sm">
                    <thead class="bg-[#f8fafc] text-gray-600 uppercase text-xs">
                        <tr>
                            <th class="px-6 py-3 text-left">ID</th>
                            <th class="px-6 py-3 text-left">Nama</th>
                            <th class="px-6 py-3 text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        @foreach ($departemen as $item)
                            <tr class="hover:bg-gray-50">
                                <td class="px-6 py-4">{{ $item->ID_Departemen }}</td>
                                <td class="px-6 py-4 font-medium">{{ $item->Nama_Departemen }}

                                <td class="px-6 py-4 text-center space-x-2">
                                    <a href="{{ route('departemen.edit', $item->ID_Departemen) }}"
                                        class="text-[#57B4BA] hover:underline">Edit</a>
                                    <a href="{{ route('departemen.destroy', $item->ID_Departemen) }}"
                                        class="text-red-500 hover:underline">Delete</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
