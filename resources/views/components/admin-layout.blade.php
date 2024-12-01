<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="//unpkg.com/alpinejs" defer></script>

    <title>{{$title}}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
<div class="antialiased bg-gray-50 dark:bg-gray-900">
    <!-- Navbar -->
    <x-admin-navbar class="fixed top-0 left-0 w-full z-50 h-16 bg-white dark:bg-gray-800 shadow"></x-admin-navbar>

    <!-- Sidebar -->
    <x-admin-sidebar class="fixed top-16 left-0 z-40 w-64 h-[calc(100vh-4rem)] bg-white border-r border-gray-200 dark:bg-gray-800 dark:border-gray-700"></x-admin-sidebar>

    <!-- Main Content -->
    <div class="min-h-screen pt-16 md:ml-64 bg-gray-50 dark:bg-gray-900">
        <main class="p-4">
            {{$slot}}
        </main>
    </div>
</div>
</body>
</html>
