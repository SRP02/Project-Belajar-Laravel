<link rel="stylesheet" href="/resources/css/app.css">
<link rel="stylesheet" href="/resources/css/button.css">
<x-layout>
  <x-slot:title>
    {{$title}}
  </x-slot>
  <h3>Halaman students</h3>
  <table border="1" cellpadding="10" cellspacing="0">
    <thead>
      <tr>
        <th>ID</th>
        <th>Nama</th>
        <th>Kelas</th>
        <th>Email</th>
        <th>Alamat</th>
        <th>Department</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($students as $student)
        <tr>
          <td>{{ $student['id'] }}</td>
          <td>{{ $student['name'] }}</td>
          <td>{{ $student->grade ? $student->grade->name : 'No Grade Assigned' }}</td>
          <td>{{ $student['email'] }}</td>
          <td>{{ $student['address'] }}</td>
          <td>{{ $student->department ? $student->department->name : 'No Department Assigned' }}</td>
        </tr>
      @endforeach
    </tbody>
  </table>
  <a id="createStudent" href="/create" :active="request()->is('create')">Tambah Siswa Baru</a>
</x-layout>