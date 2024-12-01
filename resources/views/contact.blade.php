<x-layout>
    <x-slot:title>
        {{$title}}
    </x-slot>
    <h1>Halaman Contact</h1>
    <p>Ini adalah halaman contact</p>
    <br>
    <ul>
        <li>Nama : {{$nama}}</li>
        <li>Alamat : {{$alamat}}</li>
        <li><a href={{$linkedin_link}}>Akun Linkedin</a></li>
        <!-- https://www.linkedin.com/in/satria-rudi-pratama-25538a298/ -->
        <li><a href={{$repository_link}}>Akun Repository</a></li>
        <!-- https://github.com/SRP02 -->
    </ul>
</x-layout>