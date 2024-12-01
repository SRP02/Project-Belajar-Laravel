<x-admin-layout>
    <x-slot:title>
        {{$title}}
    </x-slot:title>

    <h3 class="text-2xl font-semibold text-gray-700 dark:text-gray-300 mb-6">Halaman Departemen</h3>

    <div class="overflow-x-auto">
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400 border border-gray-200 dark:border-gray-700">
            <thead class="bg-gray-100 dark:bg-gray-700 text-gray-700 dark:text-gray-300">
                <tr>
                    <th scope="col" class="px-6 py-3 border-b border-gray-300 dark:border-gray-600">
                        ID
                    </th>
                    <th scope="col" class="px-6 py-3 border-b border-gray-300 dark:border-gray-600">
                        Department
                    </th>
                    <th scope="col" class="px-6 py-3 border-b border-gray-300 dark:border-gray-600">
                        Grades
                    </th>
                    <th scope="col" class="px-6 py-3 border-b border-gray-300 dark:border-gray-600">
                        Siswa
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($departments as $department)
                    <tr class="bg-white dark:bg-gray-800 hover:bg-gray-100 dark:hover:bg-gray-700">
                        <td class="px-6 py-4 border-b border-gray-300 dark:border-gray-600">
                            {{ $department->id }}
                        </td>
                        <td class="px-6 py-4 border-b border-gray-300 dark:border-gray-600">
                            {{ $department->name }}
                        </td>
                        <td class="px-6 py-4 border-b border-gray-300 dark:border-gray-600">
                            @foreach ($department->grades as $grade)
                                <p>{{ $grade->name }}</p>
                            @endforeach
                        </td>
                        <td class="px-6 py-4 border-b border-gray-300 dark:border-gray-600">
                            <ul class="list-disc list-inside">
                                @foreach ($department->students as $student)
                                    <li>{{ $student->name }}</li>
                                @endforeach
                            </ul>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-admin-layout>