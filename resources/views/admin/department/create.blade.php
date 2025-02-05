<x-admin-layout>
    <x-slot:title>Tambah Departemen</x-slot:title>

    <form id="createDepartmentForm" action="{{ route('admin.department.store') }}" method="POST">
        @csrf
        <div>
            <label for="name" class="block text-sm font-medium">Nama Departemen</label>
            <input type="text" id="name" name="name" 
                   class="block w-full mt-1 border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500" required>
        </div>

        <div class="mt-4">
            <label for="desc" class="block text-sm font-medium">Deskripsi Departemen</label>
            <textarea id="desc" name="desc" 
                      class="block w-full mt-1 border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500" required></textarea>
        </div>

        <button type="button" onclick="showCreateConfirmation()" 
                class="mt-4 px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600">
            Simpan
        </button>
    </form>

    <!-- Modal Konfirmasi Tambah -->
    <div id="createConfirmationModal" class="fixed inset-0 bg-black bg-opacity-50 hidden items-center justify-center z-50">
        <div class="bg-white dark:bg-gray-800 rounded-lg p-6 max-w-md w-full mx-4 shadow-lg">
            <h3 class="text-xl font-semibold text-gray-900 dark:text-white">Konfirmasi Tambah</h3>
            <p class="mt-2 text-gray-600 dark:text-gray-300">Apakah Anda yakin ingin menyimpan departemen ini?</p>
            <div class="mt-4 flex justify-end space-x-4">
                <button onclick="closeCreateConfirmation()" 
                        class="px-4 py-2 bg-gray-500 text-white rounded-lg hover:bg-gray-600">Batal</button>
                <button type="submit" form="createDepartmentForm" 
                        class="px-4 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600">Simpan</button>
            </div>
        </div>
    </div>

    <script>
        function showCreateConfirmation() {
            document.getElementById('createConfirmationModal').classList.remove('hidden');
            document.getElementById('createConfirmationModal').classList.add('flex');
        }

        function closeCreateConfirmation() {
            document.getElementById('createConfirmationModal').classList.remove('flex');
            document.getElementById('createConfirmationModal').classList.add('hidden');
        }
    </script>
</x-admin-layout>
