<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Dashboard')</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <style>
        .sidebar {
            transition: transform 0.3s ease-in-out;
        }
        .sidebar-hidden {
            transform: translateX(-100%);
        }
        @media (min-width: 768px) {
            .sidebar-hidden {
                transform: translateX(0);
            }
        }
    </style>
</head>
<body class="bg-gray-100">
    <div class="flex h-screen overflow-hidden">
        <!-- Sidebar -->
        <aside id="sidebar" class="sidebar w-64 bg-gray-800 text-white fixed md:static inset-y-0 left-0 z-50 overflow-y-auto">
            <div class="p-4 flex justify-between items-center">
                <h2 class="text-xl md:text-2xl font-bold">Admin Panel</h2>
                <button id="close-sidebar" class="md:hidden text-white">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            </div>
            <nav class="mt-8">
                <a href="{{ route('admin.dashboard') }}" class="block py-2.5 px-4 hover:bg-gray-700 {{ request()->routeIs('admin.dashboard') ? 'bg-gray-700' : '' }}">
                    Dashboard
                </a>
                <a href="{{ route('admin.contents.index') }}" class="block py-2.5 px-4 hover:bg-gray-700 {{ request()->routeIs('admin.contents.*') ? 'bg-gray-700' : '' }}">
                    Content Management
                </a>
                <a href="{{ route('admin.services.index') }}" class="block py-2.5 px-4 hover:bg-gray-700 {{ request()->routeIs('admin.services.*') ? 'bg-gray-700' : '' }}">
                    Services
                </a>
                <a href="{{ route('admin.galleries.index') }}" class="block py-2.5 px-4 hover:bg-gray-700 {{ request()->routeIs('admin.galleries.*') ? 'bg-gray-700' : '' }}">
                    Gallery
                </a>
                <a href="{{ route('admin.contacts.index') }}" class="block py-2.5 px-4 hover:bg-gray-700 {{ request()->routeIs('admin.contacts.*') ? 'bg-gray-700' : '' }}">
                    Contact Messages
                </a>
            </nav>
        </aside>

        <!-- Overlay for mobile -->
        <div id="sidebar-overlay" class="fixed inset-0 bg-black opacity-50 z-40 hidden md:hidden"></div>

        <!-- Main Content -->
        <div class="flex-1 flex flex-col overflow-hidden w-full">
            <!-- Topbar -->
            <header class="bg-white shadow-sm">
                <div class="flex justify-between items-center px-4 md:px-6 py-4">
                    <div class="flex items-center">
                        <button id="open-sidebar" class="md:hidden mr-4 text-gray-700">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                            </svg>
                        </button>
                        <h1 class="text-xl md:text-2xl font-semibold text-gray-800">@yield('header', 'Dashboard')</h1>
                    </div>
                    <div class="flex items-center space-x-2 md:space-x-4">
                        <span class="text-gray-700 text-sm md:text-base hidden sm:inline">{{ auth()->user()->name }}</span>
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button type="submit" class="bg-red-500 hover:bg-red-600 text-white px-3 md:px-4 py-2 rounded text-sm md:text-base">
                                Logout
                            </button>
                        </form>
                    </div>
                </div>
            </header>

            <!-- Page Content -->
            <main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-100">
                <div class="container mx-auto px-4 md:px-6 py-6 md:py-8">
                    @if(session('success'))
                        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                            {{ session('success') }}
                        </div>
                    @endif

                    @if($errors->any())
                        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
                            <ul>
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    @yield('content')
                </div>
            </main>
        </div>
    </div>

    <script>
        // Mobile Sidebar Toggle
        const sidebar = document.getElementById('sidebar');
        const sidebarOverlay = document.getElementById('sidebar-overlay');
        const openSidebar = document.getElementById('open-sidebar');
        const closeSidebar = document.getElementById('close-sidebar');

        openSidebar.addEventListener('click', () => {
            sidebar.classList.remove('sidebar-hidden');
            sidebarOverlay.classList.remove('hidden');
        });

        closeSidebar.addEventListener('click', () => {
            sidebar.classList.add('sidebar-hidden');
            sidebarOverlay.classList.add('hidden');
        });

        sidebarOverlay.addEventListener('click', () => {
            sidebar.classList.add('sidebar-hidden');
            sidebarOverlay.classList.add('hidden');
        });

        // Initialize sidebar state on mobile
        if (window.innerWidth < 768) {
            sidebar.classList.add('sidebar-hidden');
        }
    </script>
</body>
</html>