@extends('layouts.public')

@section('title', 'Katalog Produk Piring Keramik Batik - Batikura Plate')

@section('content')
<div class="bg-ivory/20 min-h-screen py-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-12">
        <!-- Page Header -->
        <div class="text-center space-y-2">
            <span class="text-xs font-bold text-batik-gold uppercase tracking-widest">Koleksi Alat Makan</span>
            <h1 class="font-playfair text-4xl font-extrabold text-sogan">Katalog Produk Batikura</h1>
            <div class="w-16 h-[2px] bg-batik-gold mx-auto mt-2"></div>
            <p class="text-xs text-gray-500 max-w-md mx-auto">Temukan koleksi piring keramik bermotif batik Malang yang elegan dan higienis.</p>
        </div>

        <!-- Filter & Search Panel -->
        <div class="bg-white border border-batik-gold/15 shadow-sm">
            <form action="{{ route('products.index') }}" method="GET" class="grid grid-cols-1 md:grid-cols-3 gap-4 p-6 items-end">
                <!-- Search Input -->
                <div class="space-y-1.5">
                    <label for="search" class="text-xs font-bold text-sogan uppercase tracking-wider">Cari Produk</label>
                    <input type="text" name="search" id="search" value="{{ request('search') }}"
                        class="w-full px-4 py-2 border border-gray-300 text-xs focus:outline-none focus:ring-1 focus:ring-batik-gold" 
                        placeholder="Contoh: Kembang Malang">
                </div>

                <!-- Motif Filter -->
                <div class="space-y-1.5">
                    <label for="motif" class="text-xs font-bold text-sogan uppercase tracking-wider">Filter Motif</label>
                    <select name="motif" id="motif"
                        class="w-full px-4 py-2 border border-gray-300 text-xs focus:outline-none focus:ring-1 focus:ring-batik-gold bg-white">
                        <option value="">Semua Motif</option>
                        @foreach($motifs as $m)
                            <option value="{{ $m }}" {{ request('motif') == $m ? 'selected' : '' }}>{{ $m }}</option>
                        @endforeach
                    </select>
                </div>

                <!-- Action Buttons -->
                <div class="flex gap-2">
                    <button type="submit" 
                        class="flex-grow py-2.5 px-4 bg-sogan hover:bg-dark-brown text-white text-xs font-semibold transition-colors border border-gold-accent/20">
                        Cari & Terapkan
                    </button>
                    @if(request()->filled('search') || request()->filled('motif'))
                        <a href="{{ route('products.index') }}" 
                            class="py-2.5 px-4 border border-gray-300 text-gray-700 text-xs font-semibold hover:bg-gray-50 transition-colors">
                            Reset
                        </a>
                    @endif
                </div>
            </form>
        </div>

        <!-- Catalogue Grid -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            @forelse($products as $prod)
                <div class="bg-white border border-batik-gold/15 overflow-hidden shadow-sm hover:shadow-xl transition-all duration-300 flex flex-col group">
                    <!-- Image -->
                    <div class="aspect-square w-full overflow-hidden bg-gray-50 relative border-b border-gray-100">
                        @if(Str::startsWith($prod->image_path, 'http') || Str::startsWith($prod->image_path, 'storage/'))
                            <img src="{{ asset($prod->image_path) }}" alt="{{ $prod->name }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
                        @else
                            <img src="{{ asset('storage/' . $prod->image_path) }}" alt="{{ $prod->name }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
                        @endif
                        <span class="absolute top-3 left-3 bg-sogan/90 text-batik-gold text-[9px] font-bold px-2 py-0.5 uppercase tracking-wider">
                            {{ $prod->motif }}
                        </span>
                    </div>

                    <!-- Details -->
                    <div class="p-6 space-y-3 flex-grow flex flex-col justify-between">
                        <div>
                            <h3 class="font-playfair text-lg font-bold text-sogan leading-tight group-hover:text-batik-gold transition-colors">
                                <a href="{{ route('products.show', $prod->slug) }}">{{ $prod->name }}</a>
                            </h3>
                            <p class="text-xs text-gray-400 mt-1">Ukuran: {{ $prod->size }}</p>
                            <p class="text-xs text-gray-500 mt-2 line-clamp-2">{{ $prod->description }}</p>
                        </div>
                        
                        <div class="pt-4 border-t border-gray-50 flex items-center justify-between">
                            <span class="font-semibold text-sogan text-base">
                                Rp {{ number_format($prod->price, 0, ',', '.') }}
                            </span>
                            <a href="{{ route('products.show', $prod->slug) }}" 
                                class="text-xs font-bold text-batik-gold hover:text-sogan transition-colors flex items-center gap-1">
                                Detail Produk →
                            </a>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-span-full py-16 text-center text-sm text-gray-400">
                    Tidak ditemukan piring keramik batik yang cocok dengan pencarian Anda.
                </div>
            @endforelse
        </div>

        <!-- Pagination -->
        @if($products->hasPages())
            <div class="mt-12">
                {{ $products->appends(request()->input())->links() }}
            </div>
        @endif
    </div>
</div>
@endsection