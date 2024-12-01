<link rel="stylesheet" href="/resources/css/app.css">
<link rel="stylesheet" href="/resources/css/button.css">
<x-layout>
  <x-slot:title>
    {{$title}}
  </x-slot>
  <h3>Halaman Grade</h3>
  <table border="1" cellpadding="10" cellspacing="0">
    <thead>
      <tr>
        <th>ID</th>
        <th>Nama/Kelas</th>
        <th>List nama</th>
      </tr>
    </thead>
    <tbody>
    @foreach ($grades as $grade)
    <tr>
    <td>{{ $grade['id'] }}</td>
    <td>{{ $grade['name'] }}</td>
    <td>
      <ul>
        @foreach($grade->students as $student)
          <li>{{ $student->name }}</li>
        @endforeach
      </ul>
    </td>
    </tr>
    @endforeach
    </tbody>
  </table>
</x-layout>