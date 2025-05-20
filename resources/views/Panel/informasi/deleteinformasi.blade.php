<div id="deleteModal"
    style="display: none; position: fixed; top: 0; left: 0; width: 100%; height: 100%; background-color: rgba(0,0,0,0.5); z-index: 1000;"
    class="fixed inset-0 overflow-y-auto flex items-center justify-center">
    <div class="modal-content bg-white rounded-lg shadow-xl w-full max-w-md mx-auto p-6">
        <div class="flex justify-between items-center mb-4">
            <h3 class="text-lg font-medium text-gray-900">Konfirmasi Hapus</h3>
            <button type="button" onclick="closeDeleteModal()" class="text-gray-400 hover:text-gray-500">
                <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12">
                    </path>
                </svg>
            </button>
        </div>
        <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
            <div class="mt-2">
                <p class="text-sm text-gray-500">Apakah Anda yakin ingin menghapus informasi ini? Tindakan ini tidak
                    dapat dibatalkan.</p>
            </div>
        </div>
        <div class="mt-5 sm:mt-6 flex justify-end space-x-3">
            <button type="button" onclick="closeDeleteModal()"
                class="inline-flex justify-center px-4 py-2 text-sm font-medium text-gray-700 bg-gray-100 border border-gray-300 rounded-md hover:bg-gray-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-teal-500">
                Batal
            </button>
            <form id="deleteForm" method="POST">
                @csrf
                @method('DELETE')
                <input type="hidden" id="delete_id" name="id">
                <button type="button" onclick="deleteInformasi()"
                    class="inline-flex justify-center px-4 py-2 text-sm font-medium text-white bg-red-600 border border-transparent rounded-md hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500">
                    Hapus
                </button>
            </form>
        </div>
    </div>
</div>

<script>
    function openDeleteModal(id) {
        console.log('ID:', id, 'Tipe:', typeof id);
        document.getElementById('delete_id').value = id;
        document.getElementById('deleteModal').style.display = 'flex';
    }

    function closeDeleteModal() {
        document.getElementById('deleteModal').style.display = 'none';
    }

    function deleteInformasi() {
        const id = document.getElementById('delete_id').value;

        fetch(`/informasi/destroy/${id}`, {
                method: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                    'Content-Type': 'application/json',
                    'Accept': 'application/json'
                }
            })
            .then(response => response.json())
            .then(data => {
                closeDeleteModal();
                $('#informasitable').DataTable().ajax.reload();
                
            })
            .catch(error => {
                alert('Terjadi kesalahan saat menghapus data');
                console.error('Error:', error);
            });
    }
</script>
