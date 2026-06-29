@extends('layouts.public')

@section('title', 'Edukasi Budaya & Higienitas Alat Makan - Batikura Plate')

@section('content')
<div class="bg-ivory/20 min-h-screen py-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-12">
        <!-- Page Header -->
        <div class="text-center space-y-3">
            <span class="inline-block text-[10px] font-bold text-batik-gold uppercase tracking-[0.25em] border border-batik-gold/20 px-4 py-1">
                Ruang Edukasi
            </span>
            <h1 class="font-playfair text-4xl sm:text-5xl font-bold text-sogan">Artikel Budaya & Kesehatan</h1>
            <div class="w-16 h-[2px] bg-batik-gold mx-auto"></div>
            <p class="text-sm text-gray-500 max-w-lg mx-auto leading-relaxed">
                Pelajari lebih dalam mengenai sejarah Kampung Dinoyo, keunikan motif batik Malang, 
                serta alasan pentingnya higienitas alat makan Anda.
            </p>
        </div>

        <!-- Tab Filters - DARI DATABASE CATEGORIES -->
        <div class="flex flex-wrap justify-center gap-3 pb-6 border-b border-batik-gold/10">
            <a href="{{ route('articles.index') }}" 
                class="px-5 py-2.5 text-xs font-semibold tracking-wider transition-all duration-300 {{ !request()->filled('category') ? 'bg-sogan text-white shadow-md' : 'bg-white text-sogan border border-batik-gold/20 hover:bg-ivory hover:border-batik-gold/40' }}">
                Semua Kategori
            </a>
            @foreach($categories as $cat)
                <a href="{{ route('articles.index', ['category' => $cat->slug]) }}" 
                    class="px-5 py-2.5 text-xs font-semibold tracking-wider transition-all duration-300 {{ request('category') === $cat->slug ? 'bg-sogan text-white shadow-md' : 'bg-white text-sogan border border-batik-gold/20 hover:bg-ivory hover:border-batik-gold/40' }}">
                    {{ $cat->name }}
                </a>
            @endforeach
        </div>

        <!-- Articles Grid - 3 KOLOM -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
            @forelse($articles as $art)
                <div class="group bg-white border border-batik-gold/10 overflow-hidden shadow-sm hover:shadow-xl transition-all duration-500 hover:-translate-y-2">
                    
                    <!-- Cover Image -->
                    <div class="relative w-full overflow-hidden bg-gray-100" style="aspect-ratio: 16/10;">
                        @php
                            $imgPath = $art->image_path ?? '';
                            $imgUrl = '';
                            $fileExists = false;
                            
                            if (!empty($imgPath)) {
                                if (str_starts_with($imgPath, 'http')) {
                                    $imgUrl = $imgPath;
                                    $fileExists = true;
                                } elseif (str_starts_with($imgPath, 'storage/')) {
                                    $imgUrl = asset($imgPath);
                                    if (file_exists(public_path($imgPath))) {
                                        $fileExists = true;
                                    }
                                } elseif (str_starts_with($imgPath, 'articles/')) {
                                    $imgUrl = asset('storage/' . $imgPath);
                                    if (file_exists(public_path('storage/' . $imgPath))) {
                                        $fileExists = true;
                                    }
                                } else {
                                    $imgUrl = asset('storage/' . $imgPath);
                                    if (file_exists(public_path('storage/' . $imgPath))) {
                                        $fileExists = true;
                                    }
                                }
                                if (!$fileExists && file_exists(public_path($imgPath))) {
                                    $fileExists = true;
                                    $imgUrl = asset($imgPath);
                                }
                            }
                        @endphp
                        
                        @if($fileExists && !empty($imgUrl))
                            <img src="{{ $imgUrl }}" alt="{{ $art->title }}" 
                                class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700 ease-out">
                        @else
                            <div class="w-full h-full flex items-center justify-center text-5xl text-gray-300 font-playfair">✦</div>
                        @endif
                        
                        <!-- Category Badge -->
                        <span class="absolute bottom-4 left-4 bg-sogan/90 backdrop-blur-sm text-white text-[9px] font-bold px-3 py-1 uppercase tracking-wider border border-white/10">
                            {{ $art->category->name ?? 'Uncategorized' }}
                        </span>
                    </div>

                    <!-- Content - TANPA TANGGAL -->
                    <div class="p-6 space-y-4">
                        <h3 class="font-playfair text-xl font-bold text-sogan leading-tight group-hover:text-batik-gold transition-colors duration-300 line-clamp-2">
                            <a href="{{ route('articles.show', $art->slug) }}">{{ $art->title }}</a>
                        </h3>
                        <p class="text-sm text-gray-500 leading-relaxed line-clamp-3">
                            {{ Str::limit($art->content, 130) }}
                        </p>
                        
                        <!-- Read More -->
                        <div class="pt-3 border-t border-gray-100">
                            <a href="{{ route('articles.show', $art->slug) }}" 
                                class="inline-flex items-center gap-2 text-xs font-bold text-batik-gold hover:text-sogan transition-colors duration-300 group-hover:gap-3">
                                Baca Selengkapnya
                                <svg class="w-3.5 h-3.5 transition-transform group-hover:translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/>
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-span-full py-20 text-center text-sm text-gray-400">
                    <span class="text-6xl block mb-4">📖</span>
                    Tidak ditemukan artikel untuk kategori ini.
                </div>
            @endforelse
        </div>

        <!-- Pagination -->
        @if(method_exists($articles, 'hasPages') && $articles->hasPages())
            <div class="mt-12 pt-4 border-t border-batik-gold/10">
                {{ $articles->appends(request()->input())->links() }}
            </div>
        @endif
    </div>
</div>
@endsection