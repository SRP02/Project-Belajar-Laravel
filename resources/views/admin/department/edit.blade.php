<x-admin-layout>
    <x-slot:title>Edit Departemen</x-slot:title>

    <form id="editDepartmentForm" action="{{ route('admin.department.update', $department) }}" method="POST">
        @csrf
        @method('PUT')

        <!-- Nama Departemen -->
        <div>
            <label for="name" class="block text-sm font-medium">Nama Departemen</label>
            <input type="text" id="name" name="name" value="{{ $department->name }}"
                   class="block w-full mt-1 border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500" required>
        </div>

        <!-- Deskripsi Departemen -->
        <div class="mt-4">
            <label for="desc" class="block text-sm font-medium">Deskripsi Departemen</label>
            <textarea id="desc" name="desc" 
                      class="block w-full mt-1 border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500" required>{{ $department->desc }}</textarea>
        </div>

        <!-- Tombol Update -->
        <button type="button" onclick="showEditConfirmation()" 
                class="mt-4 px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600">
            Update
        </button>
    </form>

    <!-- Modal Konfirmasi Edit -->
    <div id="editConfirmationModal" class="fixed inset-0 bg-black bg-opacity-50 hidden items-center justify-center z-50">
       
