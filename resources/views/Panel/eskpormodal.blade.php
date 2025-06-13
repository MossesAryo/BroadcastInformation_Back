<!-- resources/views/components/eskpormodal.blade.php -->

<!-- Modal Structure -->
<div id="eskporModal" class="eskpor-modal fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50 hidden">
    <div class="bg-white rounded-lg shadow-lg w-full max-w-md p-6 relative">

        <!-- Close Button -->
        <button onclick="closeEskporModal()" class="absolute top-2 right-2 text-gray-500 hover:text-red-500">
            &times;
        </button>

        <!-- Modal Content -->
        <h2 class="text-xl font-semibold mb-4">Pilih User</h2>
        <p class="mb-4">Pilih user yang ingin dieskpor</p>

        <!-- Pilihan -->
        <div class="grid gap-4">
            <form action="{{ route('siswa') }}" method="GET">
                <button type="submit" class="user-type-card w-full text-left p-4 border rounded cursor-pointer hover:bg-blue-50">
                    Siswa
                </button>
            </form>
            <form action="{{ route('get.guru') }}" method="GET">
                <button type="submit" class="user-type-card w-full text-left p-4 border rounded cursor-pointer hover:bg-blue-50">
                    Guru
                </button>
            </form>
        </div>

        <!-- Modal Footer -->
        <div class="flex justify-end mt-6 space-x-2">
            <button onclick="closeEskporModal()" type="button" class="px-4 py-2 bg-gray-200 rounded hover:bg-gray-300">Batal</button>
        </div>
    </div>
</div>

