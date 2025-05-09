@extends('layout.template')

@section('main')

<div class="container mx-auto px-4 py-6">
    <div class="bg-white rounded-lg shadow-sm p-6">
        <h2 class="text-xl font-semibold mb-6">Tambah Departemen</h2>
        
        <form action="{{ route('departemen.store') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label for="nama" class="block text-gray-700 text-sm font-medium mb-2">Nama Departemen</label>
                <input type="text" name="Nama_Departemen" id="nama" 
                    class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-teal-500" 
                    required>
            </div>
            
            <div class="mb-4">
                <label for="email" class="block text-gray-700 text-sm font-medium mb-2">Email</label>
                <input type="email" name="Email_Departemen" id="email" 
                    class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-teal-500" 
                    required>
            </div>
            
            <div class="mb-4">
                <label for="tanggal" class="block text-gray-700 text-sm font-medium mb-2">Tanggal</label>
                <input type="date" name="Tanggal_Dibuat" id="tanggal" 
                    class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-teal-500" 
                    required>
            </div>
            
            <div class="flex justify-end">
                <button type="submit" 
                    class="px-4 py-2 bg-teal-500 text-white rounded-md hover:bg-teal-600 focus:outline-none focus:ring-2 focus:ring-teal-500 focus:ring-offset-2">
                    Simpan
                </button>
            </div>
        </form>
    </div>
</div>

@endsection
