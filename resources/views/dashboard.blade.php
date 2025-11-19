<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@3.3.2/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 min-h-screen flex flex-col">
    <header class="bg-white shadow">
        <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8 flex justify-between items-center">
            <h1 class="text-3xl font-bold text-gray-900">Dashboard</h1>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="text-red-600 hover:text-red-800 font-semibold">Logout</button>
            </form>
        </div>
    </header>
    <main class="flex-grow max-w-7xl mx-auto p-4 sm:p-6 lg:p-8">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <div class="bg-white rounded-lg shadow p-6">
                <h2 class="text-xl font-semibold mb-4">Users</h2>
                <p class="text-gray-700">Manage your users and their permissions.</p>
            </div>
            <div class="bg-white rounded-lg shadow p-6">
                <h2 class="text-xl font-semibold mb-4">Reports</h2>
                <p class="text-gray-700">View detailed reports and analytics.</p>
            </div>
            <div class="bg-white rounded-lg shadow p-6">
                <h2 class="text-xl font-semibold mb-4">Settings</h2>
                <p class="text-gray-700">Configure your application settings.</p>
            </div>
        </div>
    </main>
    <footer class="bg-white shadow py-4 text-center text-gray-500 text-sm">
        &copy; {{ date('Y') }} Your Company. All rights reserved.
    </footer>
</body>
</html>