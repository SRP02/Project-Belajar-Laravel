<x-admin-layout>
    <x-slot:title>
        {{$title}}
    </x-slot:title>

    <h3 class="text-2xl font-semibold text-gray-700 dark:text-gray-300 mb-6">Halaman Siswa</h3>

    <div class="overflow-x-auto">
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400 border border-gray-200 dark:border-gray-700">
            <thead class="bg-gray-100 dark:bg-gray-700 text-gray-700 dark:text-gray-300">
                <tr>
                    <th scope="col" class="px-6 py-3 border-b border-gray-300 dark:border-gray-600">
                        ID
                    </th>
                    <th scope="col" class="px-6 py-3 border-b border-gray-300 dark:border-gray-600">
                        Nama
                    </th>
                    <th scope="col" class="px-6 py-3 border-b border-gray-300 dark:border-gray-600">
                        Kelas
                    </th>
                    <th scope="col" class="px-6 py-3 border-b border-gray-300 dark:border-gray-600">
                        Email
                    </th>
                    <th scope="col" class="px-6 py-3 border-b border-gray-300 dark:border-gray-600">
                        Alamat
                    </th>
                    <th scope="col" class="px-6 py-3 border-b border-gray-300 dark:border-gray-600">
                        Department
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($students as $student)
                    <tr class="bg-white dark:bg-gray-800 hover:bg-gray-100 dark:hover:bg-gray-700">
                        <td class="px-6 py-4 border-b border-gray-300 dark:border-gray-600">
                            {{ $student['id'] }}
                        </td>
                        <td class="px-6 py-4 border-b border-gray-300 dark:border-gray-600">
                            {{ $student['name'] }}
                        </td>
                        <td class="px-6 py-4 border-b border-gray-300 dark:border-gray-600">
                            {{ $student->grade ? $student->grade->name : 'No Grade Assigned' }}
                        </td>
                        <td class="px-6 py-4 border-b border-gray-300 dark:border-gray-600">
                            {{ $student['email'] }}
                        </td>
                        <td class="px-6 py-4 border-b border-gray-300 dark:border-gray-600">
                            {{ $student['address'] }}
                        </td>
                        <td class="px-6 py-4 border-b border-gray-300 dark:border-gray-600">
                            {{ $student->department ? $student->department->name : 'No Department Assigned' }}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-admin-layout>