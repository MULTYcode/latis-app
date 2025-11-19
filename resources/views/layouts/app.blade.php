<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>@yield('title', 'MyApp')</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen flex">

    <!-- SIDEBAR -->
    <aside class="w-64 bg-white shadow-lg border-r hidden md:block">
        <div class="p-6 border-b">
            <h1 class="text-2xl font-bold text-gray-800">MyApp</h1>
        </div>

        <nav class="p-4 space-y-2">

            <a href="{{ route('dashboard') }}" class="block px-4 py-3 rounded-lg hover:bg-blue-100 text-gray-800 font-semibold">
                Dashboard
            </a>

            <a href="{{ route('siswa.index') }}" class="block px-4 py-3 rounded-lg hover:bg-blue-100 text-gray-700">
                Siswa
            </a>

            <!-- Add other menu items as needed -->

        </nav>
    </aside>

    <!-- MAIN SECTION -->
    <div class="flex-1 flex flex-col">

        <!-- TOP NAV -->
        <header class="bg-white shadow-sm border-b">
            <div class="max-w-full mx-auto flex justify-between items-center py-4 px-6">
                <h1 class="text-2xl font-bold text-gray-800">@yield('page_title', 'Dashboard')</h1>

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
        <main class="p-6 flex-grow overflow-auto">
            @yield('content')
        </main>

        <footer class="py-4 text-center text-gray-500 text-sm">
            © {{ date('Y') }} Your Company — All rights reserved.
        </footer>

    </div>

</body>
</html>