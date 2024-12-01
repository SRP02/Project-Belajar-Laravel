<x-layout>
  <x-slot:title>
    {{$title}}
  </x-slot>
  <h3>Halaman Department</h3>
  <table border="1" cellpadding="10" cellspacing="0">
    <thead>
      <tr>
        <th>ID</th>
        <th>Department</th>
        <th>Grades</th>
        <th>Siswa</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($departments as $department)
      <tr>
        <td>{{ $department->id }}</td>
        <td>{{ $department->name }}</td>
        <td>
          <!-- Jika ada lebih dari satu grade -->
          @foreach ($department->grades as $grade)
            <p>{{ $grade->name }}</p>
          @endforeach
        </td>
        <td>
          <ul>
            @foreach ($department->students as $student)
              <li>{{ $student->name }}</li>
            @endforeach
          </ul>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
</x-layout>
