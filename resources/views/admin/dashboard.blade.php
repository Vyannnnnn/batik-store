@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')
<div class="max-w-7xl mx-auto">
    
    <!-- ============================================ -->
    <!-- HEADER -->
    <!-- ============================================ -->
    <div class="border-b border-gray-200 pb-6 mb-8">
        <h1 class="font-playfair text-3xl font-bold text-sogan">
            Selamat Datang, Admin
        </h1>
        <p class="text-sm text-gray-400 mt-1">
            Kelola koleksi mangkuk batik Batikura Plate
        </p>
    </div>

    <!-- ============================================ -->
    <!-- STATS - 3 KOLOM -->
    <!-- ============================================ -->
    <div class="grid grid-cols-1 sm:grid-cols-3 gap-6 mb-8">
        
        <!-- Produk -->
        <div class="bg-white border border-gray-200 p-6 hover:border-batik-gold/50 transition">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-xs font-medium text-gray-400 uppercase tracking-wider">Total Produk</p>
                    <p class="text-3xl font-bold text-sogan mt-1">{{ $productCount }}</p>
                    <a href="{{ route('admin.products.index') }}" class="text-xs text-batik-gold hover:text-sogan transition mt-2 inline-block">
                        Kelola →
                    </a>
                </div>
                <div class="w-12 h-12 bg-ivory flex items-center justify-center">
                    <i class="fas fa-warehouse text-batik-gold text-xl"></i>
                </div>
            </div>
        </div>
        
        <!-- Artikel -->
        <div class="bg-white border border-gray-200 p-6 hover:border-batik-gold/50 transition">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-xs font-medium text-gray-400 uppercase tracking-wider">Total Artikel</p>
                    <p class="text-3xl font-bold text-sogan mt-1">{{ $articleCount }}</p>
                    <a href="{{ route('admin.articles.index') }}" class="text-xs text-batik-gold hover:text-sogan transition mt-2 inline-block">
                        Kelola →
                    </a>
                </div>
                <div class="w-12 h-12 bg-ivory flex items-center justify-center">
                    <i class="fas fa-scroll text-batik-gold text-xl"></i>
                </div>
            </div>
        </div>
        
        <!-- Galeri -->
        <div class="bg-white border border-gray-200 p-6 hover:border-batik-gold/50 transition">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-xs font-medium text-gray-400 uppercase tracking-wider">Total Galeri</p>
                    <p class="text-3xl font-bold text-sogan mt-1">{{ $galleryCount }}</p>
                    <a href="{{ route('admin.galleries.index') }}" class="text-xs text-batik-gold hover:text-sogan transition mt-2 inline-block">
                        Kelola →
                    </a>
                </div>
                <div class="w-12 h-12 bg-ivory flex items-center justify-center">
                    <i class="fas fa-camera text-batik-gold text-xl"></i>
                </div>
            </div>
        </div>
    </div>

    <!-- ============================================ -->
    <!-- QUICK ACTION - 4 TOMBOL -->
    <!-- ============================================ -->
    <div class="grid grid-cols-2 md:grid-cols-4 gap-6 mb-8">
        <a href="{{ route('admin.products.create') }}" 
           class="bg-white border border-gray-200 p-4 hover:border-batik-gold/50 transition text-center group">
            <div class="w-10 h-10 bg-ivory mx-auto flex items-center justify-center group-hover:bg-batik-gold/10 transition">
                <i class="fas fa-plus text-batik-gold"></i>
            </div>
            <p class="text-xs font-medium text-sogan mt-2">Tambah Produk</p>
        </a>
        
        <a href="{{ route('admin.articles.create') }}" 
           class="bg-white border border-gray-200 p-4 hover:border-batik-gold/50 transition text-center group">
            <div class="w-10 h-10 bg-ivory mx-auto flex items-center justify-center group-hover:bg-batik-gold/10 transition">
                <i class="fas fa-pen text-batik-gold"></i>
            </div>
            <p class="text-xs font-medium text-sogan mt-2">Tulis Artikel</p>
        </a>
        
        <a href="{{ route('admin.galleries.create') }}" 
           class="bg-white border border-gray-200 p-4 hover:border-batik-gold/50 transition text-center group">
            <div class="w-10 h-10 bg-ivory mx-auto flex items-center justify-center group-hover:bg-batik-gold/10 transition">
                <i class="fas fa-cloud-upload-alt text-batik-gold"></i>
            </div>
            <p class="text-xs font-medium text-sogan mt-2">Upload Foto</p>
        </a>
        
        <a href="{{ route('admin.home-settings.index') }}" 
           class="bg-white border border-gray-200 p-4 hover:border-batik-gold/50 transition text-center group">
            <div class="w-10 h-10 bg-ivory mx-auto flex items-center justify-center group-hover:bg-batik-gold/10 transition">
                <i class="fas fa-cog text-batik-gold"></i>
            </div>
            <p class="text-xs font-medium text-sogan mt-2">Pengaturan</p>
        </a>
    </div>

    <!-- ============================================ -->
    <!-- DATA GRID - 2 KOLOM -->
    <!-- ============================================ -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-8">
        
        <!-- Produk Terbaru -->
        <div class="bg-white border border-gray-200">
            <div class="border-b border-gray-200 px-6 py-4 flex justify-between items-center">
                <h4 class="font-playfair font-bold text-sogan flex items-center gap-2">
                    <i class="fas fa-box text-batik-gold text-sm"></i>
                    Produk Terbaru
                </h4>
                <a href="{{ route('admin.products.create') }}" 
                   class="text-xs bg-sogan hover:bg-dark-brown text-white px-3 py-1.5 font-medium transition">
                    + Tambah
                </a>
            </div>
            <div class="divide-y divide-gray-100">
                @forelse($latestProducts as $prod)
                    <div class="px-6 py-3 flex justify-between items-center hover:bg-ivory/30 transition">
                        <div class="flex items-center gap-3 min-w-0">
                            <div class="w-9 h-9 bg-gray-100 overflow-hidden flex-shrink-0 border border-gray-200">
                                @if($prod->image_path && file_exists(public_path($prod->image_path)))
                                    <img src="{{ asset($prod->image_path) }}" alt="{{ $prod->name }}" class="w-full h-full object-cover">
                                @else
                                    <div class="w-full h-full flex items-center justify-center text-gray-300 text-xs">
                                        <i class="fas fa-image"></i>
                                    </div>
                                @endif
                            </div>
                            <div class="min-w-0">
                                <p class="text-sm font-medium text-dark-brown truncate">{{ Str::limit($prod->name, 20) }}</p>
                                <p class="text-xs text-gray-400">Rp {{ number_format($prod->price, 0, ',', '.') }}</p>
                            </div>
                        </div>
                        <a href="{{ route('admin.products.edit', $prod->id) }}" 
                           class="text-xs text-batik-gold hover:text-sogan transition flex-shrink-0">
                            <i class="fas fa-edit"></i>
                        </a>
                    </div>
                @empty
                    <div class="px-6 py-8 text-center text-sm text-gray-400">
                        <i class="fas fa-box-open text-2xl block mb-2 text-gray-300"></i>
                        Belum ada produk
                    </div>
                @endforelse
            </div>
            @if($latestProducts->count() > 0)
                <div class="border-t border-gray-200 px-6 py-3 text-center">
                    <a href="{{ route('admin.products.index') }}" class="text-xs text-batik-gold hover:underline">
                        Lihat semua produk →
                    </a>
                </div>
            @endif
        </div>

<!-- Artikel Terbaru -->
<div class="bg-white border border-gray-200">
    <div class="border-b border-gray-200 px-6 py-4 flex justify-between items-center">
        <h4 class="font-playfair font-bold text-sogan flex items-center gap-2">
            <i class="fas fa-file-alt text-batik-gold text-sm"></i>
            Artikel Terbaru
        </h4>
        <a href="{{ route('admin.articles.create') }}" 
           class="text-xs bg-sogan hover:bg-dark-brown text-white px-3 py-1.5 font-medium transition">
            + Tambah
        </a>
    </div>
    <div class="divide-y divide-gray-100">
        @forelse($latestArticles as $art)
            <div class="px-6 py-3 flex justify-between items-center hover:bg-ivory/30 transition">
                <div class="min-w-0">
                    <p class="text-sm font-medium text-dark-brown truncate">{{ Str::limit($art->title, 30) }}</p>
                    <p class="text-xs text-gray-400 flex items-center gap-2">
                        @if($art->category)
                            <span class="inline-block px-2 py-0.5 text-[10px] font-medium rounded bg-ivory text-sogan border border-batik-gold/20">
                                {{ $art->category->name }}
                            </span>
                        @else
                            <span class="text-gray-400 text-[10px]">Uncategorized</span>
                        @endif
                        <span class="w-px h-3 bg-gray-200"></span>
                        <span>{{ $art->created_at->format('d M Y') }}</span>
                    </p>
                </div>
                <a href="{{ route('admin.articles.edit', $art->id) }}" 
                   class="text-xs text-batik-gold hover:text-sogan transition flex-shrink-0">
                    <i class="fas fa-edit"></i>
                </a>
            </div>
        @empty
            <div class="px-6 py-8 text-center text-sm text-gray-400">
                <i class="fas fa-file-alt text-2xl block mb-2 text-gray-300"></i>
                Belum ada artikel
            </div>
        @endforelse
    </div>
    @if($latestArticles->count() > 0)
        <div class="border-t border-gray-200 px-6 py-3 text-center">
            <a href="{{ route('admin.articles.index') }}" class="text-xs text-batik-gold hover:underline">
                Lihat semua artikel →
            </a>
        </div>
    @endif
</div>
    <!-- ============================================ -->
    <!-- INFO BOTTOM - 2 KOLOM -->
    <!-- ============================================ -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        
        <!-- Quick Stats -->
        <div class="bg-white border border-gray-200 p-6">
            <h4 class="font-playfair font-bold text-sogan flex items-center gap-2 mb-4">
                <i class="fas fa-chart-simple text-batik-gold text-sm"></i>
                Statistik
            </h4>
            <div class="grid grid-cols-3 gap-4">
                <div>
                    <p class="text-xs text-gray-400">Kategori</p>
                    <p class="text-xl font-bold text-sogan">{{ $categoryCount ?? 0 }}</p>
                </div>
                <div>
                    <p class="text-xs text-gray-400">Produk Aktif</p>
                    <p class="text-xl font-bold text-emerald-600">{{ $activeProducts ?? 0 }}</p>
                </div>
                <div>
                    <p class="text-xs text-gray-400">Artikel Terbit</p>
                    <p class="text-xl font-bold text-blue-600">{{ $publishedArticles ?? 0 }}</p>
                </div>
            </div>
        </div>

        <!-- Shortcuts -->
        <div class="bg-white border border-gray-200 p-6">
            <h4 class="font-playfair font-bold text-sogan flex items-center gap-2 mb-4">
                <i class="fas fa-link text-batik-gold text-sm"></i>
                Link Cepat
            </h4>
            <div class="space-y-2">
                <a href="{{ route('admin.home-settings.index') }}" 
                   class="flex items-center gap-3 text-sm text-gray-600 hover:text-sogan transition px-3 py-2 hover:bg-ivory/50">
                    <i class="fas fa-home text-batik-gold w-4 text-center"></i>
                    Pengaturan Home
                </a>
                <a href="{{ route('admin.about-settings.index') }}" 
                   class="flex items-center gap-3 text-sm text-gray-600 hover:text-sogan transition px-3 py-2 hover:bg-ivory/50">
                    <i class="fas fa-store text-batik-gold w-4 text-center"></i>
                    Pengaturan About
                </a>
                <a href="{{ route('admin.contact-settings.index') }}" 
                   class="flex items-center gap-3 text-sm text-gray-600 hover:text-sogan transition px-3 py-2 hover:bg-ivory/50">
                    <i class="fas fa-address-card text-batik-gold w-4 text-center"></i>
                    Pengaturan Kontak
                </a>
            </div>
        </div>
    </div>
</div>
@endsection