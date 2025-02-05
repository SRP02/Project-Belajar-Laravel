<x-admin-layout>
    <x-slot:title>{{ $title }}</x-slot:title>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/js/all.min.js"></script>

    <h3 class="text-2xl font-semibold text-gray-700 dark:text-gray-300 mb-6">Halaman Grade</h3>

    <div class="mb-4">
        <a href="{{ route('admin.grade.create') }}" 
            class="inline-block px-6 py-3 bg-green-500 text-white font-semibold rounded-lg shadow hover:bg-green-600 focus:outline-none focus:ring-2 focus:ring-green-400">
            Tambah Grade
        </a>
    </div>

    <!-- Modal for Grade Details -->
    <div id="gradeDetailModal" class="fixed inset-0 bg-black bg-opacity-50 hidden items-center justify-center z-50">
        <div class="bg-white dark:bg-gray-800 rounded-lg p-6 max-w-2xl w-full mx-4">
            <div class="flex justify-between items-center mb-4">
                <h3 class="text-xl font-semibold text-gray-900 dark:text-white">Detail Grade</h3>
                <button onclick="closeModal()" class="text-gray-500 hover:text-gray-700 dark:hover:text-gray-300">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            </div>
            <div class="space-y-4">
                <div>
                    <p class="text-sm font-medium text-gray-500 dark:text-gray-400">Nama Grade</p>
                    <p class="text-gray-900 dark:text-white" id="modalGradeName"></p>
                </div>
                <div>
                    <p class="text-sm font-medium text-gray-500 dark:text-gray-400">List Nama</p>
                    <ul id="modalGradeStudents" class="list-disc list-inside text-gray-900 dark:text-white"></ul>
                </div>
            </div>
            <div class="mt-6">
                <button onclick="closeModal()" class="w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white dark:bg-gray-700 text-base font-medium text-gray-700 dark:text-gray-300 hover:bg-gray-50 dark:hover:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                    Close
                </button>
            </div>
        </div>
    </div>



    <div class="overflow-x-auto">
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400 border border-gray-200 dark:border-gray-700 rounded-lg shadow-sm">
            <thead class="bg-gray-100 dark:bg-gray-700">
                <tr>
                    <th class="px-6 py-3 text-xs font-semibold text-gray-700 dark:text-gray-300 uppercase tracking-wide border-b border-gray-300 dark:border-gray-600">ID</th>
                    <th class="px-6 py-3 text-xs font-semibold text-gray-700 dark:text-gray-300 uppercase tracking-wide border-b border-gray-300 dark:border-gray-600">Name</th>
                    <th class="px-6 py-3 text-xs font-semibold text-gray-700 dark:text-gray-300 uppercase tracking-wide border-b border-gray-300 dark:border-gray-600">List Nama</th>
                    <th class="px-6 py-3 text-xs font-semibold text-gray-700 dark:text-gray-300 uppercase tracking-wide border-b border-gray-300 dark:border-gray-600">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                @foreach ($grades as $grade)
                    <tr class="hover:bg-gray-50 dark:hover:bg-gray-800 transition-colors">
                        <td class="px-6 py-4 text-gray-900 dark:text-gray-300">{{ $grade->id }}</td>
                        <td class="px-6 py-4 text-gray-900 dark:text-gray-300">{{ $grade->name }}</td>
                        <td class="px-6 py-4 text-gray-900 dark:text-gray-300">
                            <ul class="list-disc list-inside">
                                @foreach ($grade->students as $student)
                                    <li>{{ $student->name }}</li>
                                @endforeach
                            </ul>
                        </td>
                        <td class="px-6 py-4 flex space-x-2">
                            <button onclick="showModal('{{ $grade->name }}', @json($grade->students->pluck('name'))) " 
                                class="w-8 h-8 bg-blue-500 text-white rounded-md shadow hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-400 transition flex items-center justify-center">
                                <i class="fas fa-eye text-xs"></i>
                            </button>
                            <a href="{{ route('admin.grade.edit', $grade) }}" 
                                class="w-8 h-8 bg-yellow-500 text-white rounded-md shadow hover:bg-yellow-600 focus:outline-none focus:ring-2 focus:ring-yellow-400 transition flex items-center justify-center">
                                <i class="fas fa-edit text-xs"></i>
                            </a>

                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <script>
        function showModal(name, students) {
            document.getElementById('modalGradeName').textContent = name;
            const studentList = students.map(student => `<li>${student}</li>`).join('');
            document.getElementById('modalGradeStudents').innerHTML = studentList;
            document.getElementById('gradeDetailModal').classList.remove('hidden');
            document.getElementById('gradeDetailModal').classList.add('flex');
        }

        function closeModal() {
            document.getElementById('gradeDetailModal').classList.remove('flex');
            document.getElementById('gradeDetailModal').classList.add('hidden');
        }

        function confirmDelete(url) {
            document.getElementById('deleteForm').action = url;
            document.getElementById('deleteModal').classList.remove('hidden');
            document.getElementById('deleteModal').classList.add('flex');
        }

        function closeDeleteModal() {
            document.getElementById('deleteModal').classList.remove('flex');
            document.getElementById('deleteModal').classList.add('hidden');
        }
    </script>
</x-admin-layout>
