<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>@yield('title', 'Latis Education')</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
</head>
<body class="bg-gray-100 min-h-screen flex">

    <!-- SIDEBAR -->
    <aside class="w-64 bg-white shadow-lg border-r hidden md:block flex flex-col">
        <div class="p-6 border-b flex items-center justify-center h-16">
            <h1 class="text-2xl font-bold text-gray-800 m-0">Latis Education</h1>
        </div>

        <nav class="p-4 space-y-2 flex-grow">

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
        <header class="bg-white shadow-sm border-b h-16 flex items-center">
            <div class="max-w-full mx-auto flex justify-between items-center py-0 px-6 w-full">
                <h1 class="text-2xl font-bold text-gray-800 m-0">@yield('page_title', 'Dashboard')</h1>

                <div x-data="{ open: false }" class="relative">
                    <button @click="open = !open" class="flex items-center space-x-2 focus:outline-none">
                        <img
                            src="{{ Auth::user()->avatar ?? 'https://ui-avatars.com/api/?name=' . urlencode(Auth::user()->name) }}"
                            alt="User Avatar"
                            class="h-8 w-8 rounded-full object-cover"
                        />
                        <span class="text-gray-700 font-semibold cursor-pointer">{{ Auth::user()->name }}</span>
                        <svg class="w-4 h-4 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>

                    <div
                        x-show="open"
                        @click.away="open = false"
                        x-transition
                        class="absolute right-0 mt-2 w-40 bg-white border rounded shadow-lg z-50"
                    >
                        <a href="{{ route('profile') }}" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">Profile</a>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="w-full text-left px-4 py-2 text-gray-700 hover:bg-gray-100">
                                Logout
                            </button>
                        </form>
                    </div>
                </div>
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