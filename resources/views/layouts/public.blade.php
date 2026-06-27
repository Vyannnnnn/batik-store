<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Piring Keramik Batik Premium') - Batikura Plate</title>
    <!-- Tailwind CSS & Vite Assets -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-ivory text-dark-brown font-sans flex flex-col min-h-screen">

    <!-- Top Announcement Bar -->
    <div class="bg-sogan text-batik-gold text-center py-2 text-xs font-semibold tracking-wider border-b border-gold-accent/20">
        ✨ PROMOSI BUDAYA MALANG - PIRING KERAMIK PREMIUM DINOYO ✨
    </div>

    <!-- Navigation Header -->
    <header class="bg-white/80 backdrop-blur-md sticky top-0 z-50 border-b border-batik-gold/15 transition-all duration-300">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-20">
                <!-- Logo -->
                <div class="flex-shrink-0">
                    <a href="{{ route('home') }}" class="flex flex-col">
                        <span class="font-playfair text-2xl md:text-3xl font-extrabold text-sogan tracking-wide">Batikura Plate</span>
                        <span class="text-[9px] uppercase tracking-widest text-batik-gold font-bold -mt-1">Premium Ceramic Art</span>
                    </a>
                </div>

                <!-- Desktop Nav Links -->
                <nav class="hidden md:flex space-x-8 items-center">
                    <a href="{{ route('home') }}" 
                        class="text-sm font-semibold tracking-wide transition-colors {{ Request::routeIs('home') ? 'text-sogan border-b-2 border-batik-gold pb-1' : 'text-dark-brown/70 hover:text-sogan' }}">
                        Beranda
                    </a>
                    <a href="{{ route('products.index') }}" 
                        class="text-sm font-semibold tracking-wide transition-colors {{ Request::routeIs('products.*') ? 'text-sogan border-b-2 border-batik-gold pb-1' : 'text-dark-brown/70 hover:text-sogan' }}">
                        Produk
                    </a>
                    <a href="{{ route('articles.index') }}" 
                        class="text-sm font-semibold tracking-wide transition-colors {{ Request::routeIs('articles.*') ? 'text-sogan border-b-2 border-batik-gold pb-1' : 'text-dark-brown/70 hover:text-sogan' }}">
                        Edukasi
                    </a>
                    <a href="{{ route('about') }}" 
                        class="text-sm font-semibold tracking-wide transition-colors {{ Request::routeIs('about') ? 'text-sogan border-b-2 border-batik-gold pb-1' : 'text-dark-brown/70 hover:text-sogan' }}">
                        Tentang Kami
                    </a>
                    <a href="{{ route('gallery.index') }}" 
                        class="text-sm font-semibold tracking-wide transition-colors {{ Request::routeIs('gallery.index') ? 'text-sogan border-b-2 border-batik-gold pb-1' : 'text-dark-brown/70 hover:text-sogan' }}">
                        Galeri
                    </a>
                    <a href="{{ route('contact') }}" 
                        class="text-sm font-semibold tracking-wide transition-colors {{ Request::routeIs('contact') ? 'text-sogan border-b-2 border-batik-gold pb-1' : 'text-dark-brown/70 hover:text-sogan' }}">
                        Kontak
                    </a>

                    @auth
                        <a href="{{ route('admin.dashboard') }}" 
                            class="ml-4 px-4 py-2 bg-sogan hover:bg-dark-brown text-white text-xs font-semibold rounded-lg tracking-wider uppercase transition-all duration-200 border border-batik-gold/30">
                            Dashboard
                        </a>
                    @else
                        <a href="{{ route('login') }}" 
                            class="ml-4 text-xs font-semibold text-batik-gold hover:text-sogan border border-batik-gold/40 px-3 py-1.5 rounded hover:bg-ivory transition-colors">
                            Admin
                        </a>
                    @endauth
                </nav>

                <!-- Mobile Menu Button -->
                <div class="flex items-center md:hidden">
                    <button id="mobile-menu-btn" class="text-sogan hover:text-batik-gold focus:outline-none">
                        <svg class="h-7 w-7" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path id="burger-icon" stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M4 6h16M4 12h16M4 18h16" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>

        <!-- Mobile Navigation Menu -->
        <div id="mobile-menu" class="hidden md:hidden bg-white border-t border-batik-gold/10 px-4 py-4 space-y-3 shadow-inner">
            <a href="{{ route('home') }}" class="block px-3 py-2 rounded-md text-base font-semibold hover:bg-ivory {{ Request::routeIs('home') ? 'text-sogan' : 'text-dark-brown/70' }}">Beranda</a>
            <a href="{{ route('products.index') }}" class="block px-3 py-2 rounded-md text-base font-semibold hover:bg-ivory {{ Request::routeIs('products.*') ? 'text-sogan' : 'text-dark-brown/70' }}">Produk</a>
            <a href="{{ route('articles.index') }}" class="block px-3 py-2 rounded-md text-base font-semibold hover:bg-ivory {{ Request::routeIs('articles.*') ? 'text-sogan' : 'text-dark-brown/70' }}">Edukasi</a>
            <a href="{{ route('about') }}" class="block px-3 py-2 rounded-md text-base font-semibold hover:bg-ivory {{ Request::routeIs('about') ? 'text-sogan' : 'text-dark-brown/70' }}">Tentang Kami</a>
            <a href="{{ route('gallery.index') }}" class="block px-3 py-2 rounded-md text-base font-semibold hover:bg-ivory {{ Request::routeIs('gallery.index') ? 'text-sogan' : 'text-dark-brown/70' }}">Galeri</a>
            <a href="{{ route('contact') }}" class="block px-3 py-2 rounded-md text-base font-semibold hover:bg-ivory {{ Request::routeIs('contact') ? 'text-sogan' : 'text-dark-brown/70' }}">Kontak</a>
            @auth
                <a href="{{ route('admin.dashboard') }}" class="block text-center px-3 py-2.5 bg-sogan text-white rounded-md font-semibold text-sm">Dashboard Admin</a>
            @else
                <a href="{{ route('login') }}" class="block text-center px-3 py-2.5 border border-batik-gold text-batik-gold rounded-md font-semibold text-sm">Login Admin</a>
            @endauth
        </div>
    </header>

    <!-- Main Content -->
    <main class="flex-grow">
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-sogan text-white border-t border-gold-accent/20 pt-16 pb-8">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 grid grid-cols-1 md:grid-cols-3 gap-12">
            <!-- Brand Info -->
            <div class="space-y-4">
                <h3 class="font-playfair text-2xl font-bold tracking-wide text-white">Batikura Plate</h3>
                <p class="text-xs text-gray-300 leading-relaxed">
                    Menghadirkan keindahan piring keramik buatan tangan (hand-crafted) dari Kampung Keramik Dinoyo, berhias motif batik Malang yang premium, elegan, dan aman bagi kesehatan keluarga.
                </p>
                <div class="flex items-center gap-3 pt-2">
                    <a href="https://instagram.com/batikura_plate" target="_blank" class="w-8 h-8 rounded-full bg-white/10 hover:bg-batik-gold hover:text-sogan transition-colors flex items-center justify-center text-sm">
                        📸
                    </a>
                    <span class="text-xs text-gray-300 font-medium">@batikura_plate</span>
                </div>
            </div>

            <!-- Site Directory -->
            <div class="space-y-4">
                <h4 class="font-playfair text-lg font-bold text-batik-gold">Navigasi Cepat</h4>
                <ul class="grid grid-cols-2 gap-2 text-xs">
                    <li><a href="{{ route('home') }}" class="hover:text-batik-gold transition-colors">Beranda</a></li>
                    <li><a href="{{ route('products.index') }}" class="hover:text-batik-gold transition-colors">Katalog Produk</a></li>
                    <li><a href="{{ route('articles.index') }}" class="hover:text-batik-gold transition-colors">Artikel Edukasi</a></li>
                    <li><a href="{{ route('about') }}" class="hover:text-batik-gold transition-colors">Tentang Kami</a></li>
                    <li><a href="{{ route('gallery.index') }}" class="hover:text-batik-gold transition-colors">Galeri Foto</a></li>
                    <li><a href="{{ route('contact') }}" class="hover:text-batik-gold transition-colors">Kontak Kami</a></li>
                </ul>
            </div>

            <!-- Address / Contact -->
            <div class="space-y-4">
                <h4 class="font-playfair text-lg font-bold text-batik-gold">Lokasi Galeri</h4>
                <p class="text-xs text-gray-300 leading-relaxed">
                    📍 Jalan MT Haryono, Kampung Wisata Keramik Dinoyo, Kec. Lowokwaru, Kota Malang, Jawa Timur 65144
                </p>
                <p class="text-xs text-gray-300 pt-1">
                    📞 WhatsApp: +62 812-3456-7890
                </p>
            </div>
        </div>

        <!-- Copyright -->
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 border-t border-white/10 mt-12 pt-6 text-center text-xs text-gray-400">
            <p>&copy; {{ date('Y') }} Batikura Plate. Seluruh Hak Cipta Dilindungi.</p>
            <p class="mt-1 text-[10px] text-batik-gold/50">Hand-painted Batik Ceramic Plate from Dinoyo, Malang.</p>
        </div>
    </footer>

    <!-- JS Vanilla for Header Scroll Effect & Mobile Menu Toggle -->
    <script>
        // Hamburger Menu Toggle
        const menuBtn = document.getElementById('mobile-menu-btn');
        const mobileMenu = document.getElementById('mobile-menu');
        const burgerIcon = document.getElementById('burger-icon');

        menuBtn.addEventListener('click', () => {
            const isHidden = mobileMenu.classList.contains('hidden');
            if (isHidden) {
                mobileMenu.classList.remove('hidden');
                // Change burger to close 'X'
                burgerIcon.setAttribute('d', 'M6 18L18 6M6 6l12 12');
            } else {
                mobileMenu.classList.add('hidden');
                // Change back to burger
                burgerIcon.setAttribute('d', 'M4 6h16M4 12h16M4 18h16');
            }
        });
    </script>
</body>
</html>
