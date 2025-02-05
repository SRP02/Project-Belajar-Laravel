<x-admin-layout>
    <x-slot:title>Edit Grade</x-slot:title>

    <form id="editGradeForm" action="{{ route('admin.grade.update', $grade) }}" method="POST" class="space-y-6">
        @csrf
        @method('PUT')
        <div>
            <label for="name" class="block text-gray-700 font-semibold mb-1">Grade Name</label>
            <input type="text" name="name" id="name" value="{{ $grade->name }}" class="w-full rounded-lg border-gray-300 focus:ring-blue-500 focus:border-blue-500 shadow-sm" required>
        </div>
        <div>
            <label for="department_id" class="block text-gray-700 font-semibold mb-1">Department</label>
            <select name="department_id" id="department_id" class="w-full rounded-lg border-gray-300 focus:ring-blue-500 focus:border-blue-500 shadow-sm" required>
                @foreach($departments as $department)
                    <option value="{{ $department->id }}" @if($grade->department_id == $department->id) selected @endif>
                        {{ $department->name }}
                    </option>
                @endforeach
            </select>
        </div>
        <button type="button" onclick="showEditConfirmation()" class="bg-blue-500 text-white px-6 py-2 rounded-lg hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-400">
            Update
        </button>
    </form>

    <!-- Modal for Edit Confirmation -->
    <div id="editConfirmationModal" class="fixed inset-0 bg-black bg-opacity-50 hidden items-center justify-center z-50">
        <div class="bg-white dark:bg-gray-800 rounded-lg p-6 max-w-md w-full mx-4 shadow-lg">
            <h3 class="text-xl font-semibold text-gray-900 dark:text-white">Confirm Update</h3>
            <p class="mt-2 text-gray-600 dark:text-gray-300">Are you sure you want to update this grade?</p>
            <div class="mt-4 flex justify-end space-x-4">
                <button onclick="closeEditConfirmation()" class="px-4 py-2 bg-gray-500 text-white rounded-lg hover:bg-gray-600">Cancel</button>
                <button type="submit" form="editGradeForm" class="px-4 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600">Confirm</button>
            </div>
        </div>
    </div>

    <script>
        function showEditConfirmation() {
            document.getElementById('editConfirmationModal').classList.remove('hidden');
            document.getElementById('editConfirmationModal').classList.add('flex');
        }

        function closeEditConfirmation() {
            document.getElementById('editConfirmationModal').classList.remove('flex');
            document.getElementById('editConfirmationModal').classList.add('hidden');
        }
    </script>
</x-admin-layout>
