@extends('layout.template')
@section('main')
    <!-- Page header -->
    <div class="flex items-center justify-between mb-6">
        <h1 class="text-2xl font-bold text-gray-900">Dashboard</h1>
    </div>

    <!-- Stats cards -->
    <div class="grid grid-cols-1 gap-5 sm:grid-cols-2 lg:grid-cols-4">
        <!-- Card: Total Siswa -->
        <div class="bg-white overflow-hidden shadow-sm rounded-lg">
            <div class="p-5">
                <div class="flex items-center">
                    <div class="flex-shrink-0 bg-theme-light rounded-md p-3">
                        <i class="fas fa-users text-theme text-xl"></i>
                    </div>
                    <div class="ml-5 w-0 flex-1">
                        <dl>
                            <dt class="text-sm font-medium text-gray-500 truncate">Total Siswa</dt>
                            <dd>
                                <div class="text-lg font-medium text-gray-900">{{ number_format($totalSiswa) }}</div>
                            </dd>
                        </dl>
                    </div>
                </div>
            </div>
        </div>

        <!-- Card: Total Guru -->
        <div class="bg-white overflow-hidden shadow-sm rounded-lg">
            <div class="p-5">
                <div class="flex items-center">
                    <div class="flex-shrink-0 bg-theme-light rounded-md p-3">
                        <i class="fas fa-users text-theme text-xl"></i>
                    </div>
                    <div class="ml-5 w-0 flex-1">
                        <dl>
                            <dt class="text-sm font-medium text-gray-500 truncate">Total Guru</dt>
                            <dd>
                                <div class="text-lg font-medium text-gray-900">{{ number_format($totalGuru) }}</div>
                            </dd>
                        </dl>
                    </div>
                </div>
            </div>
        </div>

        <!-- Card: Total Informasi -->
        <div class="bg-white overflow-hidden shadow-sm rounded-lg">
            <div class="p-5">
                <div class="flex items-center">
                    <div class="flex-shrink-0 bg-theme-light rounded-md p-3">
                        <i class="fas fa-file text-theme text-xl"></i>
                    </div>
                    <div class="ml-5 w-0 flex-1">
                        <dl>
                            <dt class="text-sm font-medium text-gray-500 truncate">Total Informasi</dt>
                            <dd>
                                <div class="text-lg font-medium text-gray-900">{{ number_format($totalInformasi) }}</div>
                            </dd>
                        </dl>
                    </div>
                </div>
            </div>
        </div>

        <!-- Card: Kategori -->
        <div class="bg-white overflow-hidden shadow-sm rounded-lg">
            <div class="p-5">
                <div class="flex items-center">
                    <div class="flex-shrink-0 bg-theme-light rounded-md p-3">
                        <i class="fas fa-chart-line text-theme text-xl"></i>
                    </div>
                    <div class="ml-5 w-0 flex-1">
                        <dl>
                            <dt class="text-sm font-medium text-gray-500 truncate">Kategori</dt>
                            <dd>
                                <div class="text-lg font-medium text-gray-900">{{ number_format($totalKategori) }}</div>
                            </dd>
                        </dl>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Recent activity -->
    <div class="mt-6">
        <div class="bg-white shadow-sm rounded-lg">
            <div class="px-6 py-5 border-b border-gray-200">
                <div class="flex items-center justify-between">
                    <h3 class="text-lg font-medium leading-6 text-gray-900">Informasi Terkini</h3>
                    <a href="{{ url('/informasi') }}">
                        <button type="button" class="text-theme hover:text-theme-dark">
                            Lihat Semua
                        </button>
                    </a>
                </div>
            </div>
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Operator
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Judul
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Tanggal Mulai
                            </th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @forelse ($informasiTerkini as $info)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <div
                                            class="flex-shrink-0 h-8 w-8 rounded-full bg-theme flex items-center justify-center text-white">
                                            <span>{{ $info->operator->initial ?? strtoupper(substr($info->operator->departemen->Nama_Departemen, 0, 2)) }}</span>
                                        </div>
                                        <div class="ml-4">
                                            <div class="text-sm font-medium text-gray-900">
                                                {{ $info->operator->NamaOperatorDepartemen }}
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-900">{{ $info->Judul }}</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-500">{{ $info->created_at->format('F d, Y') }}</div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="3" class="px-6 py-4 text-center text-sm text-gray-500">
                                    Tidak ada informasi terkini.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Aksi Cepat -->
    <div class="mt-6">
        <div class="bg-white shadow-sm rounded-lg p-6">
            <h3 class="text-lg font-medium text-gray-900 mb-4">Aksi Cepat</h3>
            <div class="grid grid-cols-2 sm:grid-cols-4 gap-4">

                <a href="{{ url('/users') }}" button
                    class="flex flex-col items-center justify-center p-4 border border-gray-200 rounded-lg hover:border-theme hover:text-theme">

                    <div class="rounded-full bg-theme-light p-3 mb-2">
                        <i class="fas fa-user-plus text-theme"></i>
                    </div>
                    <span class="text-sm">Kelola User</span>
                    </button>
                </a>

                <button onclick="window.location='{{ route('kategori.index') }}'"
                    class="flex flex-col items-center justify-center p-4 border border-gray-200 rounded-lg hover:border-theme hover:text-theme">
                    <div class="rounded-full bg-theme-light p-3 mb-2">
                        <i class="fas fa-box text-theme"></i>
                    </div>
                    <span class="text-sm">Kelola Kategori</span>
                </button>
                <button onclick="openEskporModal()"
                    class="flex flex-col items-center justify-center p-4 border border-gray-200 rounded-lg hover:border-theme hover:text-theme">
                    <div class="rounded-full bg-theme-light p-3 mb-2">
                        <i class="fas fa-file-export text-theme"></i>
                    </div>
                    <span class="text-sm">Ekspor Data User</span>
                </button>
                <a href="{{ url('/notifikasi') }}" button
                    class="flex flex-col items-center justify-center p-4 border border-gray-200 rounded-lg hover:border-theme hover:text-theme">
                    <div class="rounded-full bg-theme-light p-3 mb-2">
                        <i class="fas fa-bell text-theme"></i>
                    </div>
                    <span class="text-sm">Notifikasi</span>
                    </button>
                </a>
            </div>
        </div>
    </div>

    @include('Panel.eskpormodal')

    <script>
        function openEskporModal() {
            const modal = document.getElementById('eskporModal');
            if (modal) {
                modal.style.display = 'flex'; // Atau 'block', tergantung desain awal
            }
        }

        function closeEskporModal() {
            const modal = document.getElementById('eskporModal');
            if (modal) {
                modal.style.display = 'none';
            }
        }

        // Jika ingin tetap ada fitur klik backdrop untuk menutup:
        document.addEventListener('DOMContentLoaded', function() {
            const modalBackdrop = document.getElementById('eskporModal');
            if (modalBackdrop) {
                modalBackdrop.addEventListener('click', function(e) {
                    if (e.target === this) {
                        closeEskporModal();
                    }
                });
            }
        });

        // Opsional: Escape key close
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape') {
                closeEskporModal();
            }
        });
    </script>
@endsection
@section('css')
    <style>
        .user-type-card.selected {
            border-color: #57B4BA;
            background-color: #eff6ff;
        }

        .eskpor-modal {
            animation: fadeIn 0.3s ease-out;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
            }

            to {
                opacity: 1;
            }
        }
    </style>
@endsection

@section('scripts')
    <script>
        function openEskporModal() {
            document.getElementById('eskporModal').classList.remove('hidden');
        }

        function closeEskporModal() {
            document.getElementById('eskporModal').classList.add('hidden');
        }
    </script>
@endsection
