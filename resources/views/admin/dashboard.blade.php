@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')
<div class="space-y-8">
    <!-- Header -->
    <div class="flex justify-between items-center">
        <div>
            <h1 class="font-playfair text-3xl font-bold text-sogan">Selamat Datang, Admin</h1>
            <p class="text-sm text-gray-500">Kelola semua konten website Batikura Plate dari satu tempat.</p>
        </div>
        <div class="text-sm text-gray-500 bg-white px-4 py-2 rounded-lg border border-batik-gold/20 shadow-sm">
            📅 {{ date('d F Y') }}
        </div>
    </div>

    <!-- Stats Grid -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <!-- Stat 1 -->
        <div class="bg-white p-6 rounded-xl border border-batik-gold/20 shadow-sm flex items-center justify-between">
            <div>
                <p class="text-xs font-semibold text-batik-gold uppercase tracking-wider">Total Produk</p>
                <h3 class="text-3xl font-bold text-sogan mt-1">{{ $productCount }}</h3>
                <a href="{{ route('admin.products.index') }}" class="text-xs text-moss-green hover:underline mt-2 inline-block">Kelola Produk →</a>
            </div>
            <div class="text-4xl">🍽️</div>
        </div>
        
        <!-- Stat 2 -->
        <div class="bg-white p-6 rounded-xl border border-batik-gold/20 shadow-sm flex items-center justify-between">
            <div>
                <p class="text-xs font-semibold text-batik-gold uppercase tracking-wider">Total Artikel</p>
                <h3 class="text-3xl font-bold text-sogan mt-1">{{ $articleCount }}</h3>
                <a href="{{ route('admin.articles.index') }}" class="text-xs text-moss-green hover:underline mt-2 inline-block">Kelola Artikel →</a>
            </div>
            <div class="text-4xl">📖</div>
        </div>
        
        <!-- Stat 3 -->
        <div class="bg-white p-6 rounded-xl border border-batik-gold/20 shadow-sm flex items-center justify-between">
            <div>
                <p class="text-xs font-semibold text-batik-gold uppercase tracking-wider">Total Foto Galeri</p>
                <h3 class="text-3xl font-bold text-sogan mt-1">{{ $galleryCount }}</h3>
                <a href="{{ route('admin.galleries.index') }}" class="text-xs text-moss-green hover:underline mt-2 inline-block">Kelola Galeri →</a>
            </div>
            <div class="text-4xl">🖼️</div>
        </div>
    </div>

    <!-- Quick Actions & Data Grid -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
        <!-- Products Summary -->
        <div class="bg-white p-6 rounded-xl border border-batik-gold/20 shadow-sm">
            <div class="flex justify-between items-center mb-4 pb-2 border-b border-gray-100">
                <h4 class="font-playfair text-lg font-bold text-sogan">Produk Terbaru</h4>
                <a href="{{ route('admin.products.create') }}" class="text-xs bg-sogan hover:bg-dark-brown text-white px-3 py-1.5 rounded font-semibold transition-colors">+ Tambah</a>
            </div>
            <div class="divide-y divide-gray-100">
                @forelse($latestProducts as $prod)
                    <div class="py-3 flex justify-between items-center">
                        <div class="flex items-center gap-3">
                            <div class="w-10 h-10 rounded bg-gray-200 overflow-hidden">
                                @if(Str::startsWith($prod->image_path, 'http') || Str::startsWith($prod->image_path, 'storage/'))
                                    <img src="{{ asset($prod->image_path) }}" alt="{{ $prod->name }}" class="w-full h-full object-cover">
                                @else
                                    <div class="w-full h-full flex items-center justify-center text-xs text-gray-400">🍽️</div>
                                @endif
                            </div>
                            <div>
                                <p class="text-sm font-semibold text-dark-brown">{{ $prod->name }}</p>
                                <p class="text-xs text-gray-400">Rp {{ number_format($prod->price, 0, ',', '.') }} | {{ $prod->size }}</p>
                            </div>
                        </div>
                        <a href="{{ route('admin.products.edit', $prod->id) }}" class="text-xs text-batik-gold hover:underline">Edit</a>
                    </div>
                @empty
                    <p class="text-sm text-gray-400 py-4 text-center">Belum ada produk.</p>
                @endforelse
            </div>
        </div>

        <!-- Articles Summary -->
        <div class="bg-white p-6 rounded-xl border border-batik-gold/20 shadow-sm">
            <div class="flex justify-between items-center mb-4 pb-2 border-b border-gray-100">
                <h4 class="font-playfair text-lg font-bold text-sogan">Artikel Edukasi Terbaru</h4>
                <a href="{{ route('admin.articles.create') }}" class="text-xs bg-sogan hover:bg-dark-brown text-white px-3 py-1.5 rounded font-semibold transition-colors">+ Tambah</a>
            </div>
            <div class="divide-y divide-gray-100">
                @forelse($latestArticles as $art)
                    <div class="py-3 flex justify-between items-center">
                        <div>
                            <p class="text-sm font-semibold text-dark-brown">{{ $art->title }}</p>
                            <p class="text-xs text-gray-400">Kategori: <span class="capitalize text-batik-gold font-medium">{{ str_replace('_', ' ', $art->category) }}</span></p>
                        </div>
                        <a href="{{ route('admin.articles.edit', $art->id) }}" class="text-xs text-batik-gold hover:underline">Edit</a>
                    </div>
                @empty
                    <p class="text-sm text-gray-400 py-4 text-center">Belum ada artikel.</p>
                @endforelse
            </div>
        </div>
    </div>
</div>
@endsection
