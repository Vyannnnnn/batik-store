<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Panel') - Batikura Plate</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100 font-sans text-dark-brown min-h-screen flex flex-col md:flex-row">

    <!-- Mobile Header -->
    <header class="bg-sogan text-white p-4 flex justify-between items-center md:hidden border-b border-batik-gold/30">
        <h1 class="font-playfair text-2xl font-bold tracking-wide">Batikura Admin</h1>
        <button id="menu-toggle" class="text-white hover:text-batik-gold focus:outline-none">
            <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
            </svg>
        </button>
    </header>

    <!-- Sidebar Navigation -->
    <aside id="sidebar" class="bg-sogan text-white w-full md:w-64 min-h-screen flex-shrink-0 flex flex-col hidden md:flex border-r border-batik-gold/30">
        <!-- Logo/Brand -->
        <div class="p-6 border-b border-batik-gold/20 text-center">
            <h2 class="font-playfair text-2xl font-bold tracking-wider text-white">Batikura Plate</h2>
            <p class="text-[10px] text-batik-gold uppercase tracking-widest mt-1">Management Panel</p>
        </div>

        <!-- Admin Info -->
        <div class="px-6 py-4 border-b border-batik-gold/10 bg-dark-brown/20 flex items-center gap-3">
            <div class="w-8 h-8 rounded-full bg-batik-gold flex items-center justify-center text-sogan font-bold">
                A
            </div>
            <div>
                <p class="text-xs font-semibold text-white">{{ Auth::user()->name }}</p>
                <p class="text-[10px] text-batik-gold">Administrator</p>
            </div>
        </div>

        <!-- Nav Links -->
        <nav class="flex-grow p-4 space-y-2">
            <a href="{{ route('admin.dashboard') }}" 
                class="flex items-center gap-3 px-4 py-3 rounded-lg text-sm font-medium transition-colors {{ Request::routeIs('admin.dashboard') ? 'bg-batik-gold text-sogan' : 'hover:bg-dark-brown text-gray-200 hover:text-white' }}">
                <span>📊</span> Dashboard
            </a>
            
            <a href="{{ route('admin.products.index') }}" 
                class="flex items-center gap-3 px-4 py-3 rounded-lg text-sm font-medium transition-colors {{ Request::routeIs('admin.products.*') ? 'bg-batik-gold text-sogan' : 'hover:bg-dark-brown text-gray-200 hover:text-white' }}">
                <span>🍽️</span> Kelola Produk
            </a>
            
            <a href="{{ route('admin.articles.index') }}" 
                class="flex items-center gap-3 px-4 py-3 rounded-lg text-sm font-medium transition-colors {{ Request::routeIs('admin.articles.*') ? 'bg-batik-gold text-sogan' : 'hover:bg-dark-brown text-gray-200 hover:text-white' }}">
                <span>📖</span> Kelola Artikel
            </a>
            
            <a href="{{ route('admin.galleries.index') }}" 
                class="flex items-center gap-3 px-4 py-3 rounded-lg text-sm font-medium transition-colors {{ Request::routeIs('admin.galleries.*') ? 'bg-batik-gold text-sogan' : 'hover:bg-dark-brown text-gray-200 hover:text-white' }}">
                <span>🖼️</span> Kelola Galeri
            </a>
        </nav>

        <!-- Footer / Logout -->
        <div class="p-4 border-t border-batik-gold/20">
            <a href="{{ route('home') }}" target="_blank" class="block text-center text-xs text-batik-gold hover:text-white mb-4 transition-colors">
                👁️ Lihat Website Utama
            </a>
            
            <form action="{{ route('logout') }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin keluar?')">
                @csrf
                <button type="submit" class="w-full py-2.5 px-4 bg-red-800 hover:bg-red-700 text-white rounded-lg text-sm font-semibold transition-colors flex items-center justify-center gap-2">
                    🚪 Logout
                </button>
            </form>
        </div>
    </aside>

    <!-- Main Content Area -->
    <main class="flex-grow p-6 md:p-10 bg-ivory/20 overflow-y-auto">
        @if (session('success'))
            <div class="mb-6 bg-green-50 border-l-4 border-green-500 p-4 rounded shadow-sm text-sm text-green-700">
                {{ session('success') }}
            </div>
        @endif

        @if (session('error'))
            <div class="mb-6 bg-red-50 border-l-4 border-red-500 p-4 rounded shadow-sm text-sm text-red-700">
                {{ session('error') }}
            </div>
        @endif

        @yield('content')
    </main>

    <!-- JS Vanilla for Sidebar Mobile Toggle -->
    <script>
        document.getElementById('menu-toggle').addEventListener('click', function() {
            const sidebar = document.getElementById('sidebar');
            sidebar.classList.toggle('hidden');
        });
    </script>
</body>
</html>
