<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'PT Sinar WebTech')</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        .mobile-menu {
            display: none;
        }
        .mobile-menu.active {
            display: block;
        }
    </style>
</head>
<body class="bg-gray-50">
    <!-- Navbar -->
    <nav class="bg-white shadow-lg sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <div class="flex items-center">
                    <a href="{{ route('home') }}" class="text-xl md:text-2xl font-bold text-blue-600">PT Sinar WebTech</a>
                </div>
                
                <!-- Desktop Menu -->
                <div class="hidden md:flex items-center space-x-8">
                    <a href="{{ route('home') }}" class="text-gray-700 hover:text-blue-600 transition">Home</a>
                    <a href="{{ route('about') }}" class="text-gray-700 hover:text-blue-600 transition">About</a>
                    <a href="{{ route('services') }}" class="text-gray-700 hover:text-blue-600 transition">Services</a>
                    <a href="{{ route('gallery') }}" class="text-gray-700 hover:text-blue-600 transition">Gallery</a>
                    <a href="{{ route('contact') }}" class="text-gray-700 hover:text-blue-600 transition">Contact</a>
                </div>

                <!-- Mobile Menu Button -->
                <div class="md:hidden flex items-center">
                    <button id="mobile-menu-button" class="text-gray-700 hover:text-blue-600 focus:outline-none">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                        </svg>
                    </button>
                </div>
            </div>
        </div>

        <!-- Mobile Menu -->
        <div id="mobile-menu" class="mobile-menu md:hidden bg-white border-t border-gray-200">
            <a href="{{ route('home') }}" class="block px-4 py-3 text-gray-700 hover:bg-blue-50 hover:text-blue-600">Home</a>
            <a href="{{ route('about') }}" class="block px-4 py-3 text-gray-700 hover:bg-blue-50 hover:text-blue-600">About</a>
            <a href="{{ route('services') }}" class="block px-4 py-3 text-gray-700 hover:bg-blue-50 hover:text-blue-600">Services</a>
            <a href="{{ route('gallery') }}" class="block px-4 py-3 text-gray-700 hover:bg-blue-50 hover:text-blue-600">Gallery</a>
            <a href="{{ route('contact') }}" class="block px-4 py-3 text-gray-700 hover:bg-blue-50 hover:text-blue-600">Contact</a>
        </div>
    </nav>

    <!-- Content -->
    <main>
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-gray-800 text-white mt-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div>
                    <h3 class="text-xl font-bold mb-4">{{ $footerContent->title ?? 'PT Sinar WebTech' }}</h3>
                    <p class="text-gray-300 text-sm">{{ $footerContent->body ?? '' }}</p>
                </div>
                <div>
                    <h3 class="text-xl font-bold mb-4">Quick Links</h3>
                    <ul class="space-y-2">
                        <li><a href="{{ route('home') }}" class="text-gray-300 hover:text-white text-sm">Home</a></li>
                        <li><a href="{{ route('about') }}" class="text-gray-300 hover:text-white text-sm">About</a></li>
                        <li><a href="{{ route('services') }}" class="text-gray-300 hover:text-white text-sm">Services</a></li>
                        <li><a href="{{ route('gallery') }}" class="text-gray-300 hover:text-white text-sm">Gallery</a></li>
                        <li><a href="{{ route('contact') }}" class="text-gray-300 hover:text-white text-sm">Contact</a></li>
                    </ul>
                </div>
                <div>
                    <h3 class="text-xl font-bold mb-4">Connect With Us</h3>
                    <div class="flex space-x-4">
                        <a href="#" class="text-gray-300 hover:text-white text-sm">Facebook</a>
                        <a href="#" class="text-gray-300 hover:text-white text-sm">Twitter</a>
                        <a href="#" class="text-gray-300 hover:text-white text-sm">LinkedIn</a>
                    </div>
                </div>
            </div>
            <div class="border-t border-gray-700 mt-8 pt-8 text-center text-gray-400">
                <p class="text-sm">&copy; 2025 PT Sinar WebTech. All rights reserved.</p>
            </div>
        </div>
    </footer>

    <script>
        // Mobile Menu Toggle
        const mobileMenuButton = document.getElementById('mobile-menu-button');
        const mobileMenu = document.getElementById('mobile-menu');

        mobileMenuButton.addEventListener('click', () => {
            mobileMenu.classList.toggle('active');
        });
    </script>
</body>
</html>