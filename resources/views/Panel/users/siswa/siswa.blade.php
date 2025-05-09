@extends('layout.template')
@section('main')
    <div class="p-4">
        <div class="bg-white rounded-2xl shadow-md p-6">
            <div class="flex justify-between items-center mb-6">
                <div>
                    <h2 class="text-2xl font-bold text-gray-800">Siswa</h2>
                    <p class="text-sm text-gray-500">Kelola data siswa</p>
                </div>
                <button onclick="window.location='{{ route('siswa.create') }}'"
                    class="bg-[#57B4BA] hover:bg-[#4aa1a6] text-white px-5 py-2 rounded-lg text-sm font-semibold shadow transition">
                    Add Siswa
                </button>
            </div>

            <div class="overflow-x-auto rounded-lg">
                <table class="min-w-full bg-white text-gray-700 text-sm">
                    <thead class="bg-[#f8fafc] text-gray-600 uppercase text-xs">
                        <tr>
                            <th class="px-6 py-3 text-left">ID</th>
                            <th class="px-6 py-3 text-left">Nama</th>
                            <th class="px-6 py-3 text-left">Username</th>
                            <th class="px-6 py-3 text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        @foreach ($siswa as $item)
                            <tr class="hover:bg-gray-50">
                                <td class="px-6 py-4">{{ $item->ID_Siswa }}</td>
                                <td class="px-6 py-4 font-medium">{{ $item->Nama_Siswa }}</td>
                                <td class="px-6 py-4 font-medium">{{ $item->user->name }}</td>
                                <td class="px-6 py-4 text-center space-x-2">
                                    <a href="{{ route('siswa.edit', [$item->ID_Siswa, $item->id_user]) }}"
                                        class="text-[#57B4BA] hover:underline">Edit</a>
                                    <a href="{{ route('siswa.destroy', [$item->ID_Siswa, $item->id_user]) }}"
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
