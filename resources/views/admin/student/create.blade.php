<x-admin-layout>
    <x-slot:title>
        {{ $title }}
    </x-slot:title>
    <script>
        document.addEventListener('DOMContentLoaded', () => {
    const gradeSelect = document.getElementById('grade_id');
    const departmentSelect = document.getElementById('department_id');

    gradeSelect.addEventListener('change', (event) => {
        const selectedOption = event.target.selectedOptions[0];
        const departmentId = selectedOption.getAttribute('data-department-id');

        if (departmentId) {
            departmentSelect.value = departmentId; // Set value department sesuai dengan kelas
        }
    });
});
    </script>

    <section class="bg-white dark:bg-gray-900">
        <div class="py-8 px-4 mx-auto max-w-2xl lg:py-16">
            <h2 class="mb-4 text-xl font-bold text-gray-900 dark:text-white">Tambah Data Siswa</h2>
            <form action="{{ route('admin.students.store') }}" method="POST">
                @csrf
                <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">
                    <!-- Input Name -->
                    <div class="sm:col-span-2">
                        <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama</label>
                        <input type="text" name="name" id="name" 
                               class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" 
                               placeholder="Masukkan nama siswa" required>
                    </div>

                    <!-- Select Grade -->
                    <div>
                        <label for="grade_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kelas</label>
                            <select id="grade_id" name="grade_id" 
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                <option value="" disabled selected>Pilih kelas</option>
                                @foreach ($grades as $grade)
                                    <option value="{{ $grade->id }}" data-department-id="{{ $grade->department_id }}">{{ $grade->name }}</option>
                                @endforeach
                            </select>
                    </div>

                    <!-- Input Email -->
                    <div>
                        <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email</label>
                        <input type="email" name="email" id="email" 
                               class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" 
                               placeholder="Masukkan email siswa" required>
                    </div>

                    <!-- Input Address -->
                    <div class="sm:col-span-2">
                        <label for="address" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Alamat</label>
                        <textarea id="address" name="address" rows="4" 
                                  class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" 
                                  placeholder="Masukkan alamat siswa"></textarea>
                    </div>

                    <!-- Select Department -->
                    <div>
                        <label for="department_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Jurusan</label>
                        <select id="department_id" name="department_id" disabled
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                            <option value="" disabled selected>Pilih jurusan</option>
                            @foreach ($departments as $department)
                                <option value="{{ $department->id }}">{{ $department->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <!-- Submit Button -->
                <button type="submit" 
                        class="w-full inline-flex justify-center px-5 py-2.5 text-sm font-medium text-white bg-blue-500 rounded-lg focus:ring-4 focus:ring-blue-300 hover:bg-blue-600 mt-4">
                    Tambah Siswa
                </button>
            </form>
        </div>
    </section>
</x-admin-layout>
