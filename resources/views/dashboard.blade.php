<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Dashboard</title>

    {{-- Tailwind --}}
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 min-h-screen flex">

    <!-- SIDEBAR -->
    <aside class="w-64 bg-white shadow-lg border-r hidden md:block">
        <div class="p-6 border-b">
            <h1 class="text-2xl font-bold text-gray-800">MyApp</h1>
        </div>

        <nav class="p-4 space-y-2">

            <a href="#" class="block px-4 py-3 rounded-lg hover:bg-blue-100 text-gray-800 font-semibold">
                Dashboard
            </a>

            <a href="#" class="block px-4 py-3 rounded-lg hover:bg-blue-100 text-gray-700">
                Users
            </a>

            <a href="#" class="block px-4 py-3 rounded-lg hover:bg-blue-100 text-gray-700">
                Reports
            </a>

            <a href="#" class="block px-4 py-3 rounded-lg hover:bg-blue-100 text-gray-700">
                Settings
            </a>

            <a href="#" class="block px-4 py-3 rounded-lg hover:bg-blue-100 text-gray-700">
                Siswa
            </a>
        </nav>
    </aside>

    <!-- MAIN SECTION -->
    <div class="flex-1 flex flex-col">

        <!-- TOP NAV -->
        <header class="bg-white shadow-sm border-b">
            <div class="max-w-full mx-auto flex justify-between items-center py-4 px-6">
                <h1 class="text-2xl font-bold text-gray-800">Dashboard</h1>

                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button
                        class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded-lg shadow transition">
                        Logout
                    </button>
                </form>
            </div>
        </header>

        <!-- CONTENT -->
        <main class="p-6">

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">

                <!-- CARD -->
                <div class="bg-white rounded-xl shadow hover:shadow-xl transition p-6 border border-gray-100">
                    <h2 class="text-xl font-bold text-gray-800 mb-2">Users</h2>
                    <p class="text-gray-600 text-sm leading-relaxed">
                        Manage your users and their permissions.
                    </p>
                </div>

                <!-- CARD -->
                <div class="bg-white rounded-xl shadow hover:shadow-xl transition p-6 border border-gray-100">
                    <h2 class="text-xl font-bold text-gray-800 mb-2">Reports</h2>
                    <p class="text-gray-600 text-sm leading-relaxed">
                        View detailed reports and analytics.
                    </p>
                </div>

                <!-- CARD -->
                <div class="bg-white rounded-xl shadow hover:shadow-xl transition p-6 border border-gray-100">
                    <h2 class="text-xl font-bold text-gray-800 mb-2">Settings</h2>
                    <p class="text-gray-600 text-sm leading-relaxed">
                        Configure your application settings.
                    </p>
                </div>

            </div>

        </main>

        <footer class="py-4 text-center text-gray-500 text-sm">
            © {{ date('Y') }} Your Company — All rights reserved.
        </footer>

    </div>

</body>
</html>
