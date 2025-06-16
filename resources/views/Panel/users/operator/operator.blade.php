@extends('layout.template')
@section('main')
    <div class="p-4">
        <div class="bg-white rounded-2xl shadow-md p-6">
            <div class="flex justify-between items-center mb-6">
                <div>
                    <h2 class="text-2xl font-bold text-gray-800">Operator Departemen</h2>
                    <p class="text-sm text-gray-500">Kelola data Operator</p>
                </div>
                <div class="flex gap-3">
                    <button class="bg-teal-500 hover:bg-teal-600 text-white px-4 py-2 rounded-md flex items-center"
                        onclick="window.location='{{ route('op.create') }}'">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd"
                                d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z"
                                clip-rule="evenodd" />
                        </svg>
                        Tambah Operator
                    </button>
                </div>
            </div>

            <div class="overflow-x-auto rounded-lg">
                <table class="min-w-full bg-white text-gray-700 text-sm">
                    <thead class="bg-[#f8fafc] text-gray-600 uppercase text-xs">
                        <tr>
                            <th class="px-6 py-3 text-left">ID</th>
                            <th class="px-6 py-3 text-left">Departemen</th>
                            <th class="px-6 py-3 text-left">Nama</th>
                            <th class="px-6 py-3 text-left">Email</th>
                            <th class="px-6 py-3 text-left">Dibuat Tanggal</th>
                            <th class="px-6 py-3 text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        @foreach ($operatordepartemen as $item)
                            <tr class="hover:bg-gray-50">
                                <td class="px-6 py-4">{{ $item->IDOperator }}</td>
                                <td class="px-6 py-4 font-medium">{{ $item->departemen->Nama_Departemen }}
                                <td class="px-6 py-4 font-medium">{{ $item->NamaOperatorDepartemen }}
                                <td class="px-6 py-4 font-medium">{{ $item->user->email }}
                                <td class="px-6 py-4 font-medium">{{ $item->created_at }}
                                <td class="px-6 py-4 text-center space-x-2">
                                    <a href="{{ route('op.edit', [$item->IDOperator, $item->ID_Departemen, $item->username]) }}"
                                        class="text-[#57B4BA] hover:underline">Edit</a>

                                    <a href="{{ route('op.destroy', [$item->IDOperator, $item->ID_Departemen, $item->username]) }}"
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
