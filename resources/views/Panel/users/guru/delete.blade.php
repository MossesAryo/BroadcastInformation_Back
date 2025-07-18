<!-- Delete Modal -->
<style>
    .modal-open {
        overflow: hidden;
    }

    .modal-overlay.active {
        display: flex !important;
        align-items: center;
        justify-content: center;
    }
</style>

@foreach ($guru as $item)
    <input type="checkbox" id="deleteModalToggle{{ $item->ID_Guru }}_{{ $item->user->username }}" class="hidden">
    <div class="fixed inset-0 bg-black bg-opacity-50 z-40 modal-overlay hidden flex items-center justify-center"
        id="deleteModalOverlay{{ $item->ID_Guru }}_{{ $item->user->username }}" data-modal="deleteModal{{ $item->ID_Guru }}_{{ $item->user->username }}">
        <div class="bg-white rounded-lg shadow-xl max-w-md w-full mx-4" onclick="event.stopPropagation()">
            <div class="flex justify-between items-center p-6 border-b">
                <h3 class="text-lg font-medium">Hapus Guru</h3>
                <button type="button" onclick="closeDeleteModal('{{ $item->ID_Guru }}_{{ $item->user->username }}')" class="cursor-pointer">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
            <div class="p-6">
                <p class="text-gray-700">
                    Apa kamu yakin ingin menghapus Guru "{{ $item->Nama_Guru }}"? Aksi ini tidak bisa diulang.
                </p>
            </div>
            <form action="{{ route('guru.destroy', [$item->ID_Guru, $item->user->username]) }}" method="POST" class="inline">
                <div class="px-6 py-4 border-t bg-gray-50 flex justify-end space-x-3 rounded-b-lg">
                    <button type="button" onclick="closeDeleteModal('{{ $item->ID_Guru }}_{{ $item->user->username }}')"
                        class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-400 cursor-pointer">
                        Cancel
                    </button>
                    @csrf
                    @method('DELETE')
                    <button type="submit"
                        class="bg-red-700 text-white px-4 py-2 rounded hover:bg-red-500 cursor-pointer">
                        Delete Guru
                    </button>
                </div>
            </form>
        </div>
    </div>
@endforeach

<script>
    document.addEventListener('DOMContentLoaded', function () {
        window.openDeleteModal = function (id) {
            const overlay = document.getElementById(`deleteModalOverlay${id}`);
            const checkbox = document.getElementById(`deleteModalToggle${id}`);

            if (overlay && checkbox) {
                checkbox.checked = true;
                overlay.classList.remove('hidden');
                overlay.classList.add('active');
                document.body.classList.add('modal-open');
            } else {
                console.error('Modal elements not found for ID:', id);
            }
        };

        window.closeDeleteModal = function (id) {
            const overlay = document.getElementById(`deleteModalOverlay${id}`);
            const checkbox = document.getElementById(`deleteModalToggle${id}`);

            if (overlay && checkbox) {
                checkbox.checked = false;
                overlay.classList.add('hidden');
                overlay.classList.remove('active');
                document.body.classList.remove('modal-open');
            }
        };

        document.querySelectorAll('.modal-overlay').forEach(overlay => {
            overlay.addEventListener('click', function (e) {
                if (e.target === this) {
                    const id = this.dataset.modal.replace('deleteModal', '');
                    closeDeleteModal(id);
                }
            });
        });

        document.addEventListener('keydown', function (e) {
            if (e.key === 'Escape') {
                document.querySelectorAll('.modal-overlay.active').forEach(overlay => {
                    const id = overlay.dataset.modal.replace('deleteModal', '');
                    closeDeleteModal(id);
                });
            }
        });
    });
</script>