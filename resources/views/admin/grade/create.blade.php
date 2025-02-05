<x-admin-layout>
    <x-slot:title>Create Grade</x-slot:title>

    <form id="createGradeForm" action="{{ route('admin.grade.store') }}" method="POST" class="space-y-6">
        @csrf
        <div>
            <label for="name" class="block text-gray-700 font-semibold mb-1">Grade Name</label>
            <input type="text" name="name" id="name" class="w-full rounded-lg border-gray-300 focus:ring-blue-500 focus:border-blue-500 shadow-sm" required>
        </div>
        <div>
            <label for="department_id" class="block text-gray-700 font-semibold mb-1">Department</label>
            <select name="department_id" id="department_id" class="w-full rounded-lg border-gray-300 focus:ring-blue-500 focus:border-blue-500 shadow-sm" required>
                @foreach($departments as $department)
                    <option value="{{ $department->id }}">{{ $department->name }}</option>
                @endforeach
            </select>
        </div>
        <button type="button" onclick="showCreateConfirmation()" class="bg-blue-500 text-white px-6 py-2 rounded-lg hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-400">
            Create
        </button>
    </form>

    <!-- Modal for Create Confirmation -->
    <div id="createConfirmationModal" class="fixed inset-0 bg-black bg-opacity-50 hidden items-center justify-center z-50">
        <div class="bg-white dark:bg-gray-800 rounded-lg p-6 max-w-md w-full mx-4 shadow-lg">
            <h3 class="text-xl font-semibold text-gray-900 dark:text-white">Confirm Creation</h3>
            <p class="mt-2 text-gray-600 dark:text-gray-300">Are you sure you want to create this grade?</p>
            <div class="mt-4 flex justify-end space-x-4">
                <button onclick="closeCreateConfirmation()" class="px-4 py-2 bg-gray-500 text-white rounded-lg hover:bg-gray-600">Cancel</button>
                <button type="submit" form="createGradeForm" class="px-4 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600">Confirm</button>
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
