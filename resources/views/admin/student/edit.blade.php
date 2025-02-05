<x-admin-layout>
    <x-slot:title>
        Edit Siswa
    </x-slot:title>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const gradeSelect = document.getElementById('grade_id');
            const departmentSelect = document.getElementById('department_id');
            const hiddenDepartmentInput = document.getElementById('hidden_department_id');

            gradeSelect.addEventListener('change', (event) => {
                const selectedOption = event.target.selectedOptions[0];
                const departmentId = selectedOption.getAttribute('data-department-id');

                if (departmentId) {
                    departmentSelect.value = departmentId; // Update department dropdown
                    hiddenDepartmentInput.value = departmentId; // Update hidden input
                }
            });
        });
    </script>

    <div class="max-w-2xl mx-auto py-6">
        <div class="bg-white dark:bg-gray-800 rounded-lg shadow p-6">
            <div class="mb-6">
                <h3 class="text-2xl font-semibold text-gray-700 dark:text-gray-300">Edit Data Siswa</h3>
            </div>

            <form action="{{ route('admin.students.update', $student->id) }}" method="POST" class="space-y-6">
                @csrf
                @method('PUT')

                <div class="grid grid-cols-1 gap-6 mt-4">
                    <div>
                        <label for="name" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Nama</label>
                        <input type="text" name="name" id="name" value="{{ $student->name }}"
                            class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-600 dark:bg-gray-700 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                    </div>

                    <div>
                        <label for="grade" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Kelas</label>
                        <select name="grade_id" id="grade_id"
                            class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-600 dark:bg-gray-700 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                            @foreach ($grades as $grade)
                                <option value="{{ $grade->id }}" data-department-id="{{ $grade->department_id }}"
                                    {{ $student->grade_id == $grade->id ? 'selected' : '' }}>
                                    {{ $grade->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Email</label>
                        <input type="email" name="email" id="email" value="{{ $student->email }}"
                            class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-600 dark:bg-gray-700 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                    </div>

                    <div>
                        <label for="department" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Department</label>
                        <select name="department_id" id="department_id" disabled
                            class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-600 dark:bg-gray-700 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                            @foreach ($departments as $department)
                                <option value="{{ $department->id }}" {{ $student->department_id == $department->id ? 'selected' : '' }}>
                                    {{ $department->name }}
                                </option>
                            @endforeach
                        </select>
                        <input type="hidden" name="department_id" id="hidden_department_id" value="{{ $student->department_id }}">
                    </div>

                    <div>
                        <label for="address" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Alamat</label>
                        <textarea name="address" id="address" rows="3"
                            class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-600 dark:bg-gray-700 shadow-sm focus:border-blue-500 focus:ring-blue-500">{{ $student->address }}</textarea>
                    </div>
                </div>

                <div class="flex justify-end space-x-4 mt-6">
                    <a href="{{ route('admin.students.index') }}"
                        class="inline-flex justify-center rounded-md border border-gray-300 dark:border-gray-600 px-4 py-2 bg-white dark:bg-gray-700 text-base font-medium text-gray-700 dark:text-gray-300 hover:bg-gray-50 dark:hover:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                        Batal
                    </a>
                    <button type="submit"
                        class="inline-flex justify-center rounded-md border border-transparent px-4 py-2 bg-blue-600 text-base font-medium text-white hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                        Simpan Perubahan
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-admin-layout>
