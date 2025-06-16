@extends('layout.template')
@section('main')
    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
        <a href="{{ url('/departemen') }}"
            class="block p-6 bg-[#57B4BA] text-white border border-gray-200 rounded-lg shadow-md hover:shadow-lg transition-shadow">
            <h5 class="mb-2 text-2xl font-bold tracking-tight">
                Departemen
            </h5>
            <p class="font-normal">
                Kelola data departemen
            </p>
        </a>

        <a href="{{ url('/guru') }}"
            class="block p-6 bg-[#57B4BA] text-white border border-gray-200 rounded-lg shadow-md hover:shadow-lg transition-shadow">
            <h5 class="mb-2 text-2xl font-bold tracking-tight">
                Guru
            </h5>
            <p class="font-normal">
                Kelola data guru
            </p>
        </a>

        <a href="{{ url('/siswa') }}"
            class="block p-6 bg-[#57B4BA] text-white border border-gray-200 rounded-lg shadow-md hover:shadow-lg transition-shadow">
            <h5 class="mb-2 text-2xl font-bold tracking-tight">
                Siswa
            </h5>
            <p class="font-normal">
                Kelola data siswa
            </p>
        </a>
        <a href="{{ route('op.index') }}"
            class="block p-6 bg-[#57B4BA] text-white border border-gray-200 rounded-lg shadow-md hover:shadow-lg transition-shadow">
            <h5 class="mb-2 text-2xl font-bold tracking-tight">
                Operator
            </h5>
            <p class="font-normal">
                Kelola data Operator
            </p>
        </a>
    </div>
@endsection
