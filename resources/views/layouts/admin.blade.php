<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Admin Panel') - Batikura Plate</title>
    
    <!-- Font Awesome 6 (Gratis) -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,600;0,700;1,400&family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    <style>
        /* Custom Scrollbar */
        ::-webkit-scrollbar {
            width: 6px;
            height: 6px;
        }
        ::-webkit-scrollbar-track {
            background: #f1f1f1;
            border-radius: 10px;
        }
        ::-webkit-scrollbar-thumb {
            background: #8B7A5C;
            border-radius: 10px;
        }
        ::-webkit-scrollbar-thumb:hover {
            background: #6B5D45;
        }
        
        /* Sidebar Transition */
        #sidebar {
            transition: transform 0.3s ease-in-out;
        }
        #sidebar.hidden-mobile {
            transform: translateX(-100%);
        }
        @media (min-width: 768px) {
            #sidebar.hidden-mobile {
                transform: translateX(0);
            }
        }
        
        /* Active Nav Link */
        .nav-link-active {
            background: rgba(184, 161, 118, 0.2);
            border-left: 3px solid #B8A176;
            color: #B8A176;
        }
        .nav-link-active i {
            color: #B8A176;
        }
        
        /* Hover Effect */
        .nav-link-hover:hover {
            background: rgba(255, 255, 255, 0.05);
            transform: translateX(4px);
        }
    </style>
</head>
<body class="bg-gray-50 font-inter text-dark-brown min-h-screen flex flex-col md:flex-row">

    <!-- ============================================ -->
    <!-- MOBILE HEADER -->
    <!-- ============================================ -->
    <header class="bg-sogan text-white p-4 flex justify-between items-center md:hidden border-b border-batik-gold/30 shadow-lg z-50 sticky top-0">
        <div>
            <h1 class="font-playfair text-xl font-bold tracking-wide flex items-center gap-2">
                <i class=" text-batik-gold text-sm"></i>
                Batikura
            </h1>
            <p class="text-[8px] text-batik-gold uppercase tracking-[0.2em]">Admin Panel</p>
        </div>
        <button id="menu-toggle" class="text-white hover:text-batik-gold focus:outline-none p-2 hover:bg-white/10 rounded-lg transition-colors">
            <i class="fas fa-bars text-xl"></i>
        </button>
    </header>

    <!-- ============================================ -->
    <!-- SIDEBAR NAVIGATION -->
    <!-- ============================================ -->
    <aside id="sidebar" class="bg-sogan text-white w-full md:w-64 min-h-screen flex-shrink-0 flex flex-col fixed md:relative inset-0 z-40 transform -translate-x-full md:translate-x-0 transition-transform duration-300 ease-in-out shadow-2xl md:shadow-none">
        
        <!-- Logo/Brand -->
        <div class="p-6 border-b border-batik-gold/20 text-center bg-dark-brown/10">
            <div class="flex items-center justify-center gap-2 mb-1">
                <i class=" text-batik-gold text-xl"></i>
                <h2 class="font-playfair text-2xl font-bold tracking-wider text-white">Batikura</h2>
            </div>
            <p class="text-[9px] text-batik-gold uppercase tracking-[0.25em] font-semibold">
                <i class=" text-[8px] mr-1"></i>
                Premium Ceramic Art
            </p>
        </div>

        <!-- Admin Info -->
        <div class="px-6 py-4 border-b border-batik-gold/10 bg-dark-brown/20 flex items-center gap-3">
            <div class="w-10 h-10 rounded-full bg-gradient-to-br from-batik-gold to-dark-brown flex items-center justify-center text-white font-bold shadow-lg">
                {{ Auth::user() ? strtoupper(substr(Auth::user()->name, 0, 1)) : 'A' }}
            </div>
            <div class="flex-1 min-w-0">
                <p class="text-sm font-semibold text-white truncate">{{ Auth::user() ? Auth::user()->name : 'Admin' }}</p>
                <p class="text-[10px] text-batik-gold flex items-center gap-1">
                    <i class=" text-[8px]"></i>
                    Administrator
                </p>
            </div>
        </div>

        <!-- Nav Links -->
        <nav class="flex-grow p-4 space-y-1 overflow-y-auto">
            <!-- Dashboard -->
            <a href="{{ route('admin.dashboard') }}" 
                class="flex items-center gap-3 px-4 py-3 rounded-lg text-sm font-medium transition-all duration-200 {{ Request::routeIs('admin.dashboard') ? 'nav-link-active' : 'text-gray-200 hover:text-white nav-link-hover' }}">
                <i class="fas fa-chart-pie w-5 text-center {{ Request::routeIs('admin.dashboard') ? 'text-batik-gold' : 'text-gray-400' }}"></i>
                <span>Dashboard</span>
                @if(Request::routeIs('admin.dashboard'))
                    <span class="ml-auto w-1.5 h-1.5 rounded-full bg-batik-gold"></span>
                @endif
            </a>
            
            <!-- Products -->
            <a href="{{ route('admin.products.index') }}" 
                class="flex items-center gap-3 px-4 py-3 rounded-lg text-sm font-medium transition-all duration-200 {{ Request::routeIs('admin.products.*') ? 'nav-link-active' : 'text-gray-200 hover:text-white nav-link-hover' }}">
                <i class="fas fa-warehouse w-5 text-center {{ Request::routeIs('admin.products.*') ? 'text-batik-gold' : 'text-gray-400' }}"></i>
                <span>Koleksi Mangkuk</span>
                @if(Request::routeIs('admin.products.*'))
                    <span class="ml-auto w-1.5 h-1.5 rounded-full bg-batik-gold"></span>
                @endif
            </a>
            
            <!-- Articles -->
            <a href="{{ route('admin.articles.index') }}" 
                class="flex items-center gap-3 px-4 py-3 rounded-lg text-sm font-medium transition-all duration-200 {{ Request::routeIs('admin.articles.*') ? 'nav-link-active' : 'text-gray-200 hover:text-white nav-link-hover' }}">
                <i class="fas fa-scroll w-5 text-center {{ Request::routeIs('admin.articles.*') ? 'text-batik-gold' : 'text-gray-400' }}"></i>
                <span>Edukasi Batik</span>
                @if(Request::routeIs('admin.articles.*'))
                    <span class="ml-auto w-1.5 h-1.5 rounded-full bg-batik-gold"></span>
                @endif
            </a>
            
            <!-- Gallery -->
            <a href="{{ route('admin.galleries.index') }}" 
                class="flex items-center gap-3 px-4 py-3 rounded-lg text-sm font-medium transition-all duration-200 {{ Request::routeIs('admin.galleries.*') ? 'nav-link-active' : 'text-gray-200 hover:text-white nav-link-hover' }}">
                <i class="fas fa-camera w-5 text-center {{ Request::routeIs('admin.galleries.*') ? 'text-batik-gold' : 'text-gray-400' }}"></i>
                <span>Galeri Foto</span>
                @if(Request::routeIs('admin.galleries.*'))
                    <span class="ml-auto w-1.5 h-1.5 rounded-full bg-batik-gold"></span>
                @endif
            </a>

            <!-- Categories -->
            <a href="{{ route('admin.categories.index') }}" 
                class="flex items-center gap-3 px-4 py-3 rounded-lg text-sm font-medium transition-all duration-200 {{ Request::routeIs('admin.categories.*') ? 'nav-link-active' : 'text-gray-200 hover:text-white nav-link-hover' }}">
                <i class="fas fa-tags w-5 text-center {{ Request::routeIs('admin.categories.*') ? 'text-batik-gold' : 'text-gray-400' }}"></i>
                <span>Kategori</span>
                @if(Request::routeIs('admin.categories.*'))
                    <span class="ml-auto w-1.5 h-1.5 rounded-full bg-batik-gold"></span>
                @endif
            </a>


            <!-- Health & Safety -->
            <a href="{{ route('admin.health-safety.index') }}" 
                class="flex items-center gap-3 px-4 py-3 rounded-lg text-sm font-medium transition-all duration-200 {{ Request::routeIs('admin.health-safety.*') ? 'nav-link-active' : 'text-gray-200 hover:text-white nav-link-hover' }}">
                <i class="fas fa-shield-alt w-5 text-center {{ Request::routeIs('admin.health-safety.*') ? 'text-batik-gold' : 'text-gray-400' }}"></i>
                <span>Kesehatan & Keamanan</span>
                @if(Request::routeIs('admin.health-safety.*'))
                    <span class="ml-auto w-1.5 h-1.5 rounded-full bg-batik-gold"></span>
                @endif
            </a>

            <!-- Divider -->
            <div class="my-4 border-t border-batik-gold/10"></div>
            <p class="text-[9px] text-gray-500 uppercase tracking-[0.2em] px-4 py-1 font-semibold">
                <i class="fas fa-sliders-h mr-1"></i> Pengaturan
            </p>

            <!-- Home Settings -->
            <a href="{{ route('admin.home-settings.index') }}" 
                class="flex items-center gap-3 px-4 py-3 rounded-lg text-sm font-medium transition-all duration-200 {{ Request::routeIs('admin.home-settings.*') ? 'nav-link-active' : 'text-gray-200 hover:text-white nav-link-hover' }}">
                <i class="fas fa-home w-5 text-center {{ Request::routeIs('admin.home-settings.*') ? 'text-batik-gold' : 'text-gray-400' }}"></i>
                <span>Halaman Home</span>
            </a>
            
            <!-- About Settings -->
            <a href="{{ route('admin.about-settings.index') }}" 
                class="flex items-center gap-3 px-4 py-3 rounded-lg text-sm font-medium transition-all duration-200 {{ Request::routeIs('admin.about-settings.*') ? 'nav-link-active' : 'text-gray-200 hover:text-white nav-link-hover' }}">
                <i class="fas fa-store w-5 text-center {{ Request::routeIs('admin.about-settings.*') ? 'text-batik-gold' : 'text-gray-400' }}"></i>
                <span>Tentang Kami</span>
            </a>
            
            <!-- Contact Settings -->
            <a href="{{ route('admin.contact-settings.index') }}" 
                class="flex items-center gap-3 px-4 py-3 rounded-lg text-sm font-medium transition-all duration-200 {{ Request::routeIs('admin.contact-settings.*') ? 'nav-link-active' : 'text-gray-200 hover:text-white nav-link-hover' }}">
                <i class="fas fa-address-card w-5 text-center {{ Request::routeIs('admin.contact-settings.*') ? 'text-batik-gold' : 'text-gray-400' }}"></i>
                <span>Kontak</span>
            </a>
        </nav>

        <!-- Footer / Logout -->
        <div class="p-4 border-t border-batik-gold/20 bg-dark-brown/10">
            <a href="{{ route('home') }}" target="_blank" 
                class="flex items-center justify-center gap-2 text-xs text-batik-gold hover:text-white transition-colors mb-3 py-2 hover:bg-white/5 rounded-lg">
                <i class="fas fa-external-link-alt text-[10px]"></i>
                Lihat Website
            </a>
            
            <form action="{{ route('logout') }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin keluar?')">
                @csrf
                <button type="submit" 
                    class="w-full py-2.5 px-4 bg-red-700/80 hover:bg-red-600 text-white rounded-lg text-sm font-semibold transition-all duration-200 flex items-center justify-center gap-2 hover:shadow-lg">
                    <i class="fas fa-sign-out-alt"></i>
                    Logout
                </button>
            </form>
        </div>
    </aside>

    <!-- ============================================ -->
    <!-- OVERLAY UNTUK MOBILE -->
    <!-- ============================================ -->
    <div id="sidebar-overlay" class="fixed inset-0 bg-black/50 z-30 hidden md:hidden" onclick="closeSidebar()"></div>

    <!-- ============================================ -->
    <!-- MAIN CONTENT -->
    <!-- ============================================ -->
    <main class="flex-grow p-4 md:p-8 bg-gray-50/50 min-h-screen overflow-y-auto">
        <!-- Alert Messages -->
        @if(session('success'))
            <div class="mb-6 bg-emerald-50 border-l-4 border-emerald-500 p-4 rounded-r-lg shadow-sm text-sm text-emerald-700 flex items-center gap-3 animate-fade-in">
                <i class="fas fa-check-circle text-emerald-500 text-lg"></i>
                <span>{{ session('success') }}</span>
                <button onclick="this.parentElement.remove()" class="ml-auto text-emerald-400 hover:text-emerald-600">
                    <i class="fas fa-times"></i>
                </button>
            </div>
        @endif

        @if(session('error'))
            <div class="mb-6 bg-red-50 border-l-4 border-red-500 p-4 rounded-r-lg shadow-sm text-sm text-red-700 flex items-center gap-3 animate-fade-in">
                <i class="fas fa-exclamation-circle text-red-500 text-lg"></i>
                <span>{{ session('error') }}</span>
                <button onclick="this.parentElement.remove()" class="ml-auto text-red-400 hover:text-red-600">
                    <i class="fas fa-times"></i>
                </button>
            </div>
        @endif

        @if($errors->any())
            <div class="mb-6 bg-amber-50 border-l-4 border-amber-500 p-4 rounded-r-lg shadow-sm text-sm text-amber-700 flex items-start gap-3 animate-fade-in">
                <i class="fas fa-warning text-amber-500 text-lg mt-0.5"></i>
                <div class="flex-1">
                    <ul class="list-disc list-inside space-y-1">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                <button onclick="this.parentElement.remove()" class="ml-auto text-amber-400 hover:text-amber-600 flex-shrink-0">
                    <i class="fas fa-times"></i>
                </button>
            </div>
        @endif

        @yield('content')
    </main>

    <!-- ============================================ -->
    <!-- SCRIPTS -->
    <!-- ============================================ -->
    <script>
        // Mobile Sidebar Toggle
        const menuToggle = document.getElementById('menu-toggle');
        const sidebar = document.getElementById('sidebar');
        const overlay = document.getElementById('sidebar-overlay');

        function openSidebar() {
            sidebar.classList.remove('-translate-x-full');
            overlay.classList.remove('hidden');
            document.body.style.overflow = 'hidden';
        }

        function closeSidebar() {
            sidebar.classList.add('-translate-x-full');
            overlay.classList.add('hidden');
            document.body.style.overflow = '';
        }

        if (menuToggle) {
            menuToggle.addEventListener('click', function() {
                if (sidebar.classList.contains('-translate-x-full')) {
                    openSidebar();
                } else {
                    closeSidebar();
                }
            });
        }

        // Close sidebar on escape key
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape') {
                closeSidebar();
            }
        });

        // Auto close on resize to desktop
        window.addEventListener('resize', function() {
            if (window.innerWidth >= 768) {
                closeSidebar();
            }
        });

        // Auto dismiss alert after 5 seconds
        document.addEventListener('DOMContentLoaded', function() {
            const alerts = document.querySelectorAll('.animate-fade-in');
            alerts.forEach(alert => {
                setTimeout(() => {
                    alert.style.transition = 'opacity 0.5s';
                    alert.style.opacity = '0';
                    setTimeout(() => alert.remove(), 500);
                }, 5000);
            });
        });
    </script>

    <style>
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(-10px); }
            to { opacity: 1; transform: translateY(0); }
        }
        .animate-fade-in {
            animation: fadeIn 0.3s ease-out forwards;
        }
    </style>
</body>
</html>