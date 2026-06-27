@extends('layouts.public')

@section('title', 'Batikura Plate - Piring Keramik Batik Premium Dinoyo')

@section('content')
<!-- Hero Section -->
<section class="relative bg-white overflow-hidden py-20 border-b border-batik-gold/15">
    <div class="absolute inset-0 opacity-5 pointer-events-none bg-[radial-gradient(#3e2723_1px,transparent_1px)] [background-size:32px_32px]"></div>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
        <!-- Hero Text -->
        <div class="space-y-6 text-center lg:text-left">
            <span class="inline-block px-3 py-1 bg-ivory text-sogan border border-batik-gold/30 rounded-full text-xs font-bold uppercase tracking-widest">
                Premium Art Tableware
            </span>
            <h1 class="font-playfair text-4xl sm:text-5xl lg:text-6xl font-extrabold text-sogan leading-tight">
                Keanggunan Tradisi di Setiap Sajian
            </h1>
            <p class="text-base text-dark-brown/80 leading-relaxed max-w-lg mx-auto lg:mx-0">
                Piring keramik premium buatan pengrajin legendaris Kampung Dinoyo Malang. Dilukis tangan dengan motif batik khas Malangan untuk menghadirkan kemewahan seni budaya di meja makan Anda.
            </p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center lg:justify-start">
                <a href="{{ route('products.index') }}" 
                    class="px-8 py-3.5 bg-sogan hover:bg-dark-brown text-white text-sm font-semibold rounded-lg shadow-md hover:shadow-lg transition-all duration-200 text-center border border-gold-accent/20">
                    Lihat Koleksi Produk
                </a>
                <a href="{{ route('about') }}" 
                    class="px-8 py-3.5 border border-batik-gold text-sogan hover:bg-ivory text-sm font-semibold rounded-lg transition-colors text-center">
                    Pelajari Sejarah Kami
                </a>
            </div>
        </div>
        
        <!-- Hero Visual (Simulated premium circle plate) -->
        <div class="flex justify-center relative">
            <div class="w-72 h-72 sm:w-96 sm:h-96 rounded-full bg-ivory border-[8px] border-batik-gold/20 flex items-center justify-center shadow-2xl relative overflow-hidden group">
                <!-- Circular Batik Motif Mockup -->
                <div class="w-[88%] h-[88%] rounded-full border-[2px] border-dashed border-batik-gold flex items-center justify-center p-6 relative">
                    <div class="absolute inset-0 opacity-10 bg-[radial-gradient(#c9a96e_2px,transparent_2px)] [background-size:16px_16px]"></div>
                    <div class="text-center space-y-2 z-10">
                        <span class="text-xs text-batik-gold font-bold uppercase tracking-widest block">Batikura Plate</span>
                        <div class="w-12 h-[1px] bg-batik-gold mx-auto"></div>
                        <span class="font-playfair text-xl sm:text-2xl font-bold text-sogan block">Kembang Malang</span>
                        <span class="text-[10px] text-gray-400 block italic">Hand-painted Porcelain</span>
                    </div>
                    <!-- Outer Decorative Border -->
                    <div class="absolute inset-2 border border-batik-gold/20 rounded-full"></div>
                </div>
                <!-- Interactive Hover Glow -->
                <div class="absolute inset-0 bg-gold-accent/5 opacity-0 group-hover:opacity-100 transition-opacity duration-300 pointer-events-none"></div>
            </div>
            
            <!-- Side Small Accent Badges -->
            <div class="absolute -top-4 -right-4 bg-white px-4 py-2.5 rounded-lg border border-batik-gold/20 shadow-lg text-center hidden sm:block">
                <span class="block text-lg font-bold text-sogan">100%</span>
                <span class="text-[9px] uppercase tracking-wider text-batik-gold font-semibold">Hand Crafted</span>
            </div>
            <div class="absolute -bottom-4 -left-4 bg-white px-4 py-2.5 rounded-lg border border-batik-gold/20 shadow-lg text-center hidden sm:block">
                <span class="block text-[10px] text-moss-green font-bold uppercase tracking-wider">Food Grade</span>
                <span class="text-[9px] text-gray-400">Aman & Bebas Timbal</span>
            </div>
        </div>
    </div>
</section>

<!-- Featured Products Section -->
<section class="py-24 bg-ivory/30">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Section Header -->
        <div class="text-center space-y-2 mb-16">
            <span class="text-xs font-bold text-batik-gold uppercase tracking-widest">Koleksi Terbatas</span>
            <h2 class="font-playfair text-3xl sm:text-4xl font-bold text-sogan">Produk Unggulan Kami</h2>
            <div class="w-16 h-[2px] bg-batik-gold mx-auto mt-2"></div>
        </div>

        <!-- Products Grid -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
            @forelse($featuredProducts as $prod)
                <div class="bg-white rounded-xl border border-batik-gold/15 overflow-hidden shadow-sm hover:shadow-xl transition-all duration-300 flex flex-col group">
                    <!-- Image -->
                    <div class="aspect-square w-full overflow-hidden bg-gray-50 relative border-b border-gray-100">
                        @if(Str::startsWith($prod->image_path, 'http') || Str::startsWith($prod->image_path, 'storage/'))
                            <img src="{{ asset($prod->image_path) }}" alt="{{ $prod->name }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
                        @else
                            <img src="{{ asset('storage/' . $prod->image_path) }}" alt="{{ $prod->name }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
                        @endif
                        <span class="absolute top-3 left-3 bg-sogan/90 text-batik-gold text-[9px] font-bold px-2 py-0.5 rounded uppercase tracking-wider">
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
                                class="text-xs font-bold text-moss-green hover:underline flex items-center gap-1">
                                Detail Produk →
                            </a>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-span-full text-center py-8 text-gray-400 text-sm">
                    Belum ada produk unggulan yang diunggah.
                </div>
            @endforelse
        </div>
        
        <div class="text-center mt-12">
            <a href="{{ route('products.index') }}" class="inline-block px-6 py-3 border border-sogan text-sogan font-semibold text-sm rounded-lg hover:bg-sogan hover:text-white transition-colors">
                Lihat Semua Koleksi Piring
            </a>
        </div>
    </div>
</section>

<!-- Budaya & Edukasi Section -->
<section class="py-24 bg-white border-t border-b border-batik-gold/10 relative">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">
        <!-- Visual Accent -->
        <div class="bg-ivory border border-batik-gold/25 p-8 rounded-2xl relative shadow-md">
            <h4 class="font-playfair text-2xl font-bold text-sogan mb-4">Filosofi Batikura</h4>
            <p class="text-xs text-dark-brown/70 leading-relaxed space-y-4">
                Nama <strong class="text-sogan">Batikura</strong> terinspirasi dari gabungan kata <strong>Batik</strong> dan <strong>Kura-kura</strong>.
                Batik melambangkan karya seni warisan leluhur Indonesia, khususnya Kota Malang, sedangkan Kura-kura melambangkan umur panjang, kekuatan, dan ketenangan.
                Kami berharap setiap piring keramik yang digunakan menjadi simbol kebahagiaan serta kesehatan yang lestari bagi keluarga Indonesia.
            </p>
            <div class="mt-6 p-4 bg-white rounded-lg border border-batik-gold/15 flex items-start gap-3">
                <span class="text-xl">🌿</span>
                <div>
                    <h5 class="text-xs font-bold text-sogan">Higienis & Alami</h5>
                    <p class="text-[10px] text-gray-500">Pembakaran suhu tinggi mengunci warna glasir dan membuat piring aman dicuci berulang kali tanpa melepas residu kimia.</p>
                </div>
            </div>
        </div>

        <!-- Text / Articles -->
        <div class="space-y-6">
            <span class="text-xs font-bold text-batik-gold uppercase tracking-widest">Edukasi Budaya</span>
            <h2 class="font-playfair text-3xl font-bold text-sogan">Melestarikan Budaya Lewat Karya Seni Alat Makan</h2>
            <p class="text-sm text-dark-brown/80 leading-relaxed">
                Kami berkomitmen untuk tidak sekadar menjual barang, melainkan mengedukasi masyarakat mengenai warisan lokal Malang dan pentingnya menggunakan alat makan keramik food-grade.
            </p>
            
            <div class="space-y-4">
                @foreach($latestArticles as $art)
                    <div class="flex items-start gap-4 p-3 hover:bg-ivory/30 rounded-lg transition-colors">
                        <div class="text-lg bg-ivory text-sogan w-10 h-10 rounded-full flex items-center justify-center flex-shrink-0">
                            📄
                        </div>
                        <div>
                            <h4 class="text-sm font-bold text-dark-brown hover:text-sogan transition-colors">
                                <a href="{{ route('articles.show', $art->slug) }}">{{ $art->title }}</a>
                            </h4>
                            <p class="text-[10px] text-batik-gold capitalize font-semibold tracking-wider mt-1">{{ str_replace('_', ' ', $art->category) }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
            
            <div class="pt-2">
                <a href="{{ route('articles.index') }}" class="text-xs font-bold text-moss-green hover:underline">
                    Baca Artikel Selengkapnya →
                </a>
            </div>
        </div>
    </div>
</section>

<!-- Instagram Feed Invitation Section -->
<section class="py-24 bg-ivory/20">
    <div class="max-w-4xl mx-auto px-4 text-center space-y-6">
        <span class="text-3xl">📸</span>
        <h2 class="font-playfair text-3xl font-bold text-sogan">Ikuti Perjalanan Kami di Instagram</h2>
        <p class="text-sm text-dark-brown/80 leading-relaxed max-w-lg mx-auto">
            Dapatkan informasi produk terbaru, proses melukis batik, serta potret aktivitas pengrajin Kampung Dinoyo langsung di feed Instagram kami.
        </p>
        <div>
            <a href="https://instagram.com/batikura_plate" target="_blank" 
                class="inline-flex items-center gap-2 bg-sogan hover:bg-dark-brown text-white text-xs font-bold tracking-wider uppercase px-6 py-3.5 rounded-lg transition-all border border-batik-gold/30">
                Instagram: @batikura_plate
            </a>
        </div>
    </div>
</section>
@endsection
