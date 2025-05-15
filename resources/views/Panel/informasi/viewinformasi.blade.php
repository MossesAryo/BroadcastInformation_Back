@extends('layout.template')

@section('main')
    <div class="container mx-auto px-4 py-6">
        <!-- Header Section -->
        <div class="flex justify-between items-center mb-6">
            <div>
                <h2 class="text-xl font-semibold text-gray-700">Detail Informasi Broadcast</h2>
            </div>

            <button class="bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded-md flex items-center"
                onclick="window.location='{{ route('get.info') }}'">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd"
                        d="M9.707 16.707a1 1 0 01-1.414 0l-6-6a1 1 0 010-1.414l6-6a1 1 0 011.414 1.414L5.414 9H17a1 1 0 110 2H5.414l4.293 4.293a1 1 0 010 1.414z"
                        clip-rule="evenodd" />
                </svg>
                Kembali
            </button>
        </div>

        <!-- Detail Card -->
        <div class="bg-white shadow-md rounded-md overflow-hidden">
            <!-- Header Info Section -->
            <div class="border-b border-gray-200 bg-gray-50 p-6">
                <div class="flex flex-col md:flex-row justify-between">
                    <div class="mb-4 md:mb-0">
                        <h1 class="text-2xl font-bold text-gray-800">{{ $informasi->Judul }}</h1>
                        <div class="flex items-center mt-2">
                            <span class="text-sm text-gray-600 flex items-center mr-4">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                </svg>
                                {{ \Carbon\Carbon::parse($informasi->created_at)->format('d M Y, H:i') }}
                            </span>
                            <span class="text-sm text-gray-600 flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                                </svg>
                                {{ $informasi->operator->NamaOperatorDepartemen }}
                            </span>
                        </div>
                    </div>
                    <div class="flex flex-col items-start md:items-end">

                        <span
                            class="inline-flex items-center px-2.5 py-0.5 rounded-md text-sm font-medium bg-blue-100 text-blue-800">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z" />
                            </svg>
                            {{ $informasi->kategori->NamaKategori }}
                        </span>
                    </div>
                </div>
            </div>

            <!-- Content Section -->

           
                <div class="mb-6 p-60">
                    <img src="{{ asset('storage/' . $informasi->Thumbnail) }}" alt="Gambar Informasi"
                        class="w-full rounded-md shadow-md " >
                </div>
            

            <div class="p-6">
                <div class="mb-6">
                    <h3 class="text-lg font-medium text-gray-900 mb-2">{{ $informasi->Deskripsi }}</h3>
                    <div class="prose max-w-none">
                        {!! $informasi->Isi !!}
                    </div>
                </div>

                <!-- Last Updated Information -->
                <div class="mt-8 text-sm text-gray-500">
                    <p>Last updated: {{ \Carbon\Carbon::parse($informasi->updated_at)->format('d M Y, H:i') }}</p>
                </div>


            </div>
        </div>

        {{-- Delete Modal
    @include('Panel.informasi.deleteinformasi') --}}
    </div>
@endsection
