<!-- resources/views/students/create.blade.php -->

<link rel="stylesheet" href="/resources/css/app.css">

<x-layout>
    <x-slot:title>
        {{$title}}
    </x-slot>
    <div class="bagianluar">
    <form>
        <div>
            <label for="nama">Nama:</label>
            <input type="text" name="nama" id="nama" required>
        </div>

        <div>
            <label for="grade">Kelas:</label>
            <input type="text" name="grade" id="grade" required>
        </div>

        <div>
            <label for="email">Email:</label>
            <input type="email" name="email" id="email" required>
        </div>

        <div>
            <label for="address">Alamat:</label>
            <textarea name="address" id="address" required></textarea>
        </div>

        <button type="submit">Tambah Siswa</button>
    </form>

    <a id="back" href="/students" :active="request()->is('students')">Kembali ke Daftar Siswa</a>
    </div>
</x-layout>
