<x-admin-layout>
    <x-slot:title>
        {{$title}}
    </x-slot:title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/js/all.min.js"></script>

    <h3 class="text-2xl font-semibold text-gray-700 dark:text-gray-300 mb-6">Halaman Siswa</h3>

    <div class="mb-6 bg-white dark:bg-gray-800 rounded-lg shadow p-4">
        <form action="{{ route('admin.students.index') }}" method="GET" class="grid grid-cols-1 md:grid-cols-4 gap-4">
            <div>
                <label for="search_name" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Name</label>
                <input type="text" name="search_name" id="search_name" value="{{ request('search_name') }}" 
                    class="w-full rounded-md border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white shadow-sm focus:border-blue-500 focus:ring-blue-500">
            </div>
            <div>
                <label for="search_grade" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Grade</label>
                <input type="text" name="search_grade" id="search_grade" value="{{ request('search_grade') }}"
                    class="w-full rounded-md border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white shadow-sm focus:border-blue-500 focus:ring-blue-500">
            </div>
            <div>
                <label for="search_email" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Email</label>
                <input type="text" name="search_email" id="search_email" value="{{ request('search_email') }}"
                    class="w-full rounded-md border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white shadow-sm focus:border-blue-500 focus:ring-blue-500">
            </div>
            <div>
                <label for="search_address" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Address</label>
                <input type="text" name="search_address" id="search_address" value="{{ request('search_address') }}"
                    class="w-full rounded-md border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white shadow-sm focus:border-blue-500 focus:ring-blue-500">
            </div>
            <div class="md:col-span-4 flex justify-end space-x-2">
                <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-400">
                    <i class="fas fa-search mr-2"></i>Search
                </button>
                <a href="{{ route('admin.students.index') }}" class="px-4 py-2 bg-gray-500 text-white rounded-lg hover:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-gray-400">
                    <i class="fas fa-redo mr-2"></i>Reset
                </a>
            </div>
        </form>
    </div>

    <div class="mb-4">
        <a href="{{ route('admin.students.create') }}" 
            class="inline-block px-6 py-3 bg-green-500 text-white font-semibold rounded-lg shadow hover:bg-green-600 focus:outline-none focus:ring-2 focus:ring-green-400">
            Tambah Siswa
        </a>
    </div>

    <!-- Modal for Student Details -->
    <div id="studentDetailModal" class="fixed inset-0 bg-black bg-opacity-50 hidden items-center justify-center z-50">
        <div class="bg-white dark:bg-gray-800 rounded-lg p-6 max-w-2xl w-full mx-4">
            <div class="flex justify-between items-center mb-4">
                <h3 class="text-xl font-semibold text-gray-900 dark:text-white">Detail Siswa</h3>
                <button onclick="closeModal()" class="text-gray-500 hover:text-gray-700 dark:hover:text-gray-300">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            </div>
            <div class="space-y-4">
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <p class="text-sm font-medium text-gray-500 dark:text-gray-400">Nama</p>
                        <p class="text-gray-900 dark:text-white" id="modalName"></p>
                    </div>
                    <div>
                        <p class="text-sm font-medium text-gray-500 dark:text-gray-400">Kelas</p>
                        <p class="text-gray-900 dark:text-white" id="modalGrade"></p>
                    </div>
                    <div>
                        <p class="text-sm font-medium text-gray-500 dark:text-gray-400">Email</p>
                        <p class="text-gray-900 dark:text-white" id="modalEmail"></p>
                    </div>
                    <div>
                        <p class="text-sm font-medium text-gray-500 dark:text-gray-400">Department</p>
                        <p class="text-gray-900 dark:text-white" id="modalDepartment"></p>
                    </div>
                </div>
                <div>
                    <p class="text-sm font-medium text-gray-500 dark:text-gray-400">Alamat</p>
                    <p class="text-gray-900 dark:text-white" id="modalAddress"></p>
                </div>
            </div>
            <div class="mt-6">
                <button onclick="closeModal()" class="w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white dark:bg-gray-700 text-base font-medium text-gray-700 dark:text-gray-300 hover:bg-gray-50 dark:hover:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                    Close
                </button>
            </div>
        </div>
    </div>

    <!-- Modal for Delete Confirmation -->
    <div id="deleteModal" class="fixed inset-0 bg-black bg-opacity-50 hidden items-center justify-center z-50">
        <div class="bg-white dark:bg-gray-800 rounded-lg p-6 max-w-sm w-full mx-4">
            <h3 class="text-xl font-semibold text-gray-900 dark:text-white">Confirm Deletion</h3>
            <p class="mt-2 text-gray-600 dark:text-gray-300">Are you sure you want to delete this student?</p>
            <div class="mt-4 flex justify-end space-x-4">
                <button onclick="closeDeleteModal()" class="px-4 py-2 bg-gray-500 text-white rounded-lg hover:bg-gray-600">Cancel</button>
                <form id="deleteForm" method="POST" class="inline-block">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="px-4 py-2 bg-red-500 text-white rounded-lg hover:bg-red-600">Delete</button>
                </form>
            </div>
        </div>
    </div>

    <div class="overflow-x-auto">
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400 border border-gray-200 dark:border-gray-700 rounded-lg shadow-sm">
            <thead class="bg-gray-100 dark:bg-gray-700">
                <tr>
                    <th class="px-6 py-3 text-xs font-semibold text-gray-700 dark:text-gray-300 uppercase tracking-wide border-b border-gray-300 dark:border-gray-600">ID</th>
                    <th class="px-6 py-3 text-xs font-semibold text-gray-700 dark:text-gray-300 uppercase tracking-wide border-b border-gray-300 dark:border-gray-600">Name</th>
                    <th class="px-6 py-3 text-xs font-semibold text-gray-700 dark:text-gray-300 uppercase tracking-wide border-b border-gray-300 dark:border-gray-600">Grade</th>
                    <th class="px-6 py-3 text-xs font-semibold text-gray-700 dark:text-gray-300 uppercase tracking-wide border-b border-gray-300 dark:border-gray-600">Email</th>
                    <th class="px-6 py-3 text-xs font-semibold text-gray-700 dark:text-gray-300 uppercase tracking-wide border-b border-gray-300 dark:border-gray-600">Address</th>
                    <th class="px-6 py-3 text-xs font-semibold text-gray-700 dark:text-gray-300 uppercase tracking-wide border-b border-gray-300 dark:border-gray-600">Department</th>
                    <th class="px-6 py-3 text-xs font-semibold text-gray-700 dark:text-gray-300 uppercase tracking-wide border-b border-gray-300 dark:border-gray-600">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                @foreach ($students as $student)
                    <tr class="hover:bg-gray-50 dark:hover:bg-gray-800 transition-colors">
                        <td class="px-6 py-4 text-gray-900 dark:text-gray-300">{{ $student['id'] }}</td>
                        <td class="px-6 py-4 text-gray-900 dark:text-gray-300">{{ $student['name'] }}</td>
                        <td class="px-6 py-4 text-gray-900 dark:text-gray-300">{{ $student->grade ? $student->grade->name : 'No Grade Assigned' }}</td>
                        <td class="px-6 py-4 text-gray-900 dark:text-gray-300">{{ $student['email'] }}</td>
                        <td class="px-6 py-4 text-gray-900 dark:text-gray-300">{{ $student['address'] }}</td>
                        <td class="px-6 py-4 text-gray-900 dark:text-gray-300">{{ $student->department ? $student->department->name : 'No Department Assigned' }}</td>
                        <td class="px-6 py-4 flex space-x-1">
                            <button onclick="showModal('{{ $student['name'] }}', '{{ $student->grade ? $student->grade->name : 'No Grade Assigned' }}', '{{ $student['email'] }}', '{{ $student['address'] }}', '{{ $student->department ? $student->department->name : 'No Department Assigned' }}')" 
                                class="w-8 h-8 bg-blue-500 text-white rounded-md shadow hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-400 transition flex items-center justify-center">
                                <i class="fas fa-eye text-xs"></i>
                            </button>
                            <a href="{{ route('admin.students.edit', $student) }}" 
                                class="w-8 h-8 bg-yellow-500 text-white rounded-md shadow hover:bg-yellow-600 focus:outline-none focus:ring-2 focus:ring-yellow-400 transition flex items-center justify-center">
                                <i class="fas fa-edit text-xs"></i>
                            </a>
                            <button onclick="confirmDelete('{{ route('admin.students.destroy', $student) }}')" 
                                class="w-8 h-8 bg-red-500 text-white rounded-md shadow hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-red-400 transition flex items-center justify-center">
                                <i class="fas fa-trash text-xs"></i>
                            </button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <!-- Pagination -->
        <div class="mt-4">
            {{ $students->appends(request()->query())->links() }}
        </div>

    </div>

    <script>
        function showModal(name, grade, email, address, department) {
            document.getElementById('modalName').textContent = name;
            document.getElementById('modalGrade').textContent = grade;
            document.getElementById('modalEmail').textContent = email;
            document.getElementById('modalAddress').textContent = address;
            document.getElementById('modalDepartment').textContent = department;
            document.getElementById('studentDetailModal').classList.remove('hidden');
            document.getElementById('studentDetailModal').classList.add('flex');
        }

        function closeModal() {
            document.getElementById('studentDetailModal').classList.remove('flex');
            document.getElementById('studentDetailModal').classList.add('hidden');
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