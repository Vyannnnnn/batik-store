<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Batikura Plate - @yield('title', 'Piring Keramik Batik Premium Dinoyo')</title>
    
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,600;0,700;1,400&family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- Tailwind CSS -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    <style>
        [x-cloak] { display: none !important; }
        .font-inter { font-family: 'Inter', sans-serif; }
        .font-playfair { font-family: 'Playfair Display', serif; }
    </style>
</head>
<body class="font-inter bg-ivory text-sogan antialiased flex flex-col min-h-screen">

    <!-- Navigation Header -->
    <header class="bg-white/95 backdrop-blur-md sticky top-0 z-50 border-b border-batik-gold/10 transition-all duration-300 shadow-sm">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-20">
                <!-- Logo -->
                <div class="flex-shrink-0">
                    <a href="{{ route('home') }}" class="flex flex-col group">
                        <span class="font-playfair text-2xl md:text-3xl font-bold text-sogan tracking-wide group-hover:text-batik-gold transition-colors">
                            Batikura
                        </span>
                        <span class="text-[9px] uppercase tracking-[0.25em] text-batik-gold font-semibold -mt-0.5 group-hover:text-sogan transition-colors">
                            Premium Ceramic Art
                        </span>
                    </a>
                </div>

                <!-- Desktop Nav Links -->
                <nav class="hidden md:flex items-center space-x-8">
                    <a href="{{ route('home') }}" 
                        class="text-sm font-medium tracking-wide transition-colors {{ Request::routeIs('home') ? 'text-sogan border-b-2 border-batik-gold pb-1' : 'text-dark-brown/60 hover:text-sogan hover:border-b-2 hover:border-batik-gold/30 pb-1' }}">
                        Beranda
                    </a>
                    <a href="{{ route('products.index') }}" 
                        class="text-sm font-medium tracking-wide transition-colors {{ Request::routeIs('products.*') ? 'text-sogan border-b-2 border-batik-gold pb-1' : 'text-dark-brown/60 hover:text-sogan hover:border-b-2 hover:border-batik-gold/30 pb-1' }}">
                        Produk
                    </a>
                    <a href="{{ route('articles.index') }}" 
                        class="text-sm font-medium tracking-wide transition-colors {{ Request::routeIs('articles.*') ? 'text-sogan border-b-2 border-batik-gold pb-1' : 'text-dark-brown/60 hover:text-sogan hover:border-b-2 hover:border-batik-gold/30 pb-1' }}">
                        Edukasi
                    </a>
                    <a href="{{ route('about') }}" 
                        class="text-sm font-medium tracking-wide transition-colors {{ Request::routeIs('about') ? 'text-sogan border-b-2 border-batik-gold pb-1' : 'text-dark-brown/60 hover:text-sogan hover:border-b-2 hover:border-batik-gold/30 pb-1' }}">
                        Tentang
                    </a>
                    <a href="{{ route('gallery.index') }}" 
                        class="text-sm font-medium tracking-wide transition-colors {{ Request::routeIs('gallery.index') ? 'text-sogan border-b-2 border-batik-gold pb-1' : 'text-dark-brown/60 hover:text-sogan hover:border-b-2 hover:border-batik-gold/30 pb-1' }}">
                        Galeri
                    </a>
                    <a href="{{ route('contact') }}" 
                        class="text-sm font-medium tracking-wide transition-colors {{ Request::routeIs('contact') ? 'text-sogan border-b-2 border-batik-gold pb-1' : 'text-dark-brown/60 hover:text-sogan hover:border-b-2 hover:border-batik-gold/30 pb-1' }}">
                        Kontak
                    </a>

                    @auth
                        <a href="{{ route('admin.dashboard') }}" 
                            class="ml-2 px-5 py-2.5 bg-sogan hover:bg-dark-brown text-white text-xs font-semibold tracking-wider uppercase transition-all duration-200 border border-batik-gold/20 hover:shadow-lg">
                            Dashboard
                        </a>
                    @else
                        <a href="{{ route('login') }}" 
                            class="ml-2 px-5 py-2.5 border border-batik-gold/40 text-batik-gold hover:text-sogan hover:border-sogan text-xs font-semibold tracking-wider uppercase transition-all duration-200 hover:bg-ivory">
                            Admin
                        </a>
                    @endauth
                </nav>

                <!-- Mobile Menu Button -->
                <div class="flex items-center md:hidden">
                    <button id="mobile-menu-btn" class="text-sogan hover:text-batik-gold focus:outline-none p-2">
                        <svg class="h-7 w-7" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path id="burger-icon" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>

        <!-- Mobile Navigation Menu -->
        <div id="mobile-menu" class="hidden md:hidden bg-white border-t border-batik-gold/10 px-4 py-4 space-y-2 shadow-lg">
            <a href="{{ route('home') }}" class="block px-4 py-2.5 text-sm font-medium hover:bg-ivory transition-colors {{ Request::routeIs('home') ? 'text-sogan bg-ivory' : 'text-dark-brown/70' }}">
                Beranda
            </a>
            <a href="{{ route('products.index') }}" class="block px-4 py-2.5 text-sm font-medium hover:bg-ivory transition-colors {{ Request::routeIs('products.*') ? 'text-sogan bg-ivory' : 'text-dark-brown/70' }}">
                Produk
            </a>
            <a href="{{ route('articles.index') }}" class="block px-4 py-2.5 text-sm font-medium hover:bg-ivory transition-colors {{ Request::routeIs('articles.*') ? 'text-sogan bg-ivory' : 'text-dark-brown/70' }}">
                Edukasi
            </a>
            <a href="{{ route('about') }}" class="block px-4 py-2.5 text-sm font-medium hover:bg-ivory transition-colors {{ Request::routeIs('about') ? 'text-sogan bg-ivory' : 'text-dark-brown/70' }}">
                Tentang
            </a>
            <a href="{{ route('gallery.index') }}" class="block px-4 py-2.5 text-sm font-medium hover:bg-ivory transition-colors {{ Request::routeIs('gallery.index') ? 'text-sogan bg-ivory' : 'text-dark-brown/70' }}">
                Galeri
            </a>
            <a href="{{ route('contact') }}" class="block px-4 py-2.5 text-sm font-medium hover:bg-ivory transition-colors {{ Request::routeIs('contact') ? 'text-sogan bg-ivory' : 'text-dark-brown/70' }}">
                Kontak
            </a>
            <div class="pt-3 border-t border-batik-gold/10">
                @auth
                    <a href="{{ route('admin.dashboard') }}" class="block text-center px-4 py-2.5 bg-sogan hover:bg-dark-brown text-white font-semibold text-sm transition-colors">
                        Dashboard Admin
                    </a>
                @else
                    <a href="{{ route('login') }}" class="block text-center px-4 py-2.5 border border-batik-gold/40 text-batik-gold hover:text-sogan hover:border-sogan font-semibold text-sm transition-colors">
                        Login Admin
                    </a>
                @endauth
            </div>
        </div>
    </header>

    <!-- Main Content -->
    <main class="flex-grow">
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-sogan text-white border-t border-batik-gold/20 pt-16 pb-8">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-10">
                <!-- Brand Info -->
                <div class="space-y-4 md:col-span-1">
                    <h3 class="font-playfair text-2xl font-bold text-batik-gold">Batikura</h3>
                    <p class="text-xs text-white/60 leading-relaxed">
                        Piring keramik premium buatan tangan dari Kampung Keramik Dinoyo, berhias motif batik Malang yang elegan dan aman bagi kesehatan keluarga.
                    </p>
                    <div class="flex items-center gap-3 pt-2">
                        <a href="https://instagram.com/batikura_plate" target="_blank" 
                            class="w-9 h-9 border border-batik-gold/30 hover:bg-batik-gold hover:text-sogan transition-all flex items-center justify-center text-sm text-white/70 hover:border-batik-gold">
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zM12 0C8.741 0 8.333.014 7.053.072 2.695.272.273 2.69.073 7.052.014 8.333 0 8.741 0 12c0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98C8.333 23.986 8.741 24 12 24c3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98C15.668.014 15.259 0 12 0zm0 5.838a6.162 6.162 0 100 12.324 6.162 6.162 0 000-12.324zM12 16a4 4 0 110-8 4 4 0 010 8zm6.406-11.845a1.44 1.44 0 100 2.881 1.44 1.44 0 000-2.881z"/>
                            </svg>
                        </a>
                        <span class="text-xs text-white/50 font-light">@batikura_plate</span>
                    </div>
                </div>

                <!-- Navigation -->
                <div>
                    <h4 class="font-semibold text-batik-gold text-sm uppercase tracking-wider mb-4">Menu</h4>
                    <ul class="space-y-2.5 text-sm">
                        <li><a href="{{ route('home') }}" class="text-white/60 hover:text-batik-gold transition-colors">Beranda</a></li>
                        <li><a href="{{ route('products.index') }}" class="text-white/60 hover:text-batik-gold transition-colors">Katalog Produk</a></li>
                        <li><a href="{{ route('articles.index') }}" class="text-white/60 hover:text-batik-gold transition-colors">Artikel Edukasi</a></li>
                        <li><a href="{{ route('about') }}" class="text-white/60 hover:text-batik-gold transition-colors">Tentang Kami</a></li>
                    </ul>
                </div>

                <!-- Gallery & Contact -->
                <div>
                    <h4 class="font-semibold text-batik-gold text-sm uppercase tracking-wider mb-4">Informasi</h4>
                    <ul class="space-y-2.5 text-sm">
                        <li><a href="{{ route('gallery.index') }}" class="text-white/60 hover:text-batik-gold transition-colors">Galeri Foto</a></li>
                        <li><a href="{{ route('contact') }}" class="text-white/60 hover:text-batik-gold transition-colors">Kontak Kami</a></li>
                    </ul>
                </div>

                <!-- Address -->
                <div>
                    <h4 class="font-semibold text-batik-gold text-sm uppercase tracking-wider mb-4">Alamat</h4>
                    <p class="text-sm text-white/50 leading-relaxed">
                        Jalan MT Haryono<br>
                        Kampung Wisata Keramik Dinoyo<br>
                        Kec. Lowokwaru, Kota Malang<br>
                        Jawa Timur 65144
                    </p>
                </div>
            </div>

            <!-- Copyright -->
            <div class="border-t border-white/10 mt-12 pt-6 text-center text-xs text-white/30">
                <p>&copy; {{ date('Y') }} Batikura Plate. All Rights Reserved.</p>
                <p class="mt-1 text-[10px] text-batik-gold/30 tracking-wider">Hand-painted Batik Ceramic Plate from Dinoyo, Malang</p>
            </div>
        </div>
    </footer>

    <!-- Scripts -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const menuBtn = document.getElementById('mobile-menu-btn');
            const mobileMenu = document.getElementById('mobile-menu');
            const burgerIcon = document.getElementById('burger-icon');

            if (menuBtn) {
                menuBtn.addEventListener('click', function() {
                    const isHidden = mobileMenu.classList.contains('hidden');
                    if (isHidden) {
                        mobileMenu.classList.remove('hidden');
                        burgerIcon.setAttribute('d', 'M6 18L18 6M6 6l12 12');
                    } else {
                        mobileMenu.classList.add('hidden');
                        burgerIcon.setAttribute('d', 'M4 6h16M4 12h16M4 18h16');
                    }
                });
            }

            const mobileLinks = mobileMenu.querySelectorAll('a');
            mobileLinks.forEach(link => {
                link.addEventListener('click', function() {
                    mobileMenu.classList.add('hidden');
                    burgerIcon.setAttribute('d', 'M4 6h16M4 12h16M4 18h16');
                });
            });
        });
    </script>

    <!-- Alpine.js (optional) -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
</body>
</html>