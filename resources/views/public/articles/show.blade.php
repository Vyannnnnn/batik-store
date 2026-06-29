@extends('layouts.public')

@section('title', $article->title . ' - Batikura Plate')

@section('content')
<div class="bg-ivory/20 min-h-screen py-12">
    <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 space-y-8">
        
        <!-- Back Navigation -->
        <div>
            <a href="{{ route('articles.index') }}" 
                class="inline-flex items-center gap-2 text-sm font-medium text-batik-gold hover:text-sogan transition-colors duration-300 group">
                <svg class="w-4 h-4 transition-transform group-hover:-translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                </svg>
                Kembali ke Edukasi
            </a>
        </div>

        <!-- Article Card -->
        <div class="bg-white border border-batik-gold/10 shadow-sm overflow-hidden">
            
            <!-- Cover Image -->
            <div class="relative w-full overflow-hidden bg-gray-100" style="aspect-ratio: 21/9;">
                @php
                    $imgPath = $article->image_path ?? '';
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
                    <img src="{{ $imgUrl }}" alt="{{ $article->title }}" 
                        class="w-full h-full object-cover">
                @else
                    <div class="w-full h-full flex items-center justify-center text-6xl text-gray-300 font-playfair">✦</div>
                @endif
                
                <!-- Overlay Gradient -->
                <div class="absolute inset-0 bg-gradient-to-t from-sogan/60 via-transparent to-transparent"></div>
                
                <!-- Category Badge - TANPA TANGGAL -->
                <div class="absolute bottom-6 left-6">
                    <span class="bg-batik-gold/90 backdrop-blur-sm text-sogan text-[10px] font-bold px-4 py-1.5 uppercase tracking-wider border border-white/10">
                        {{ $article->category->name ?? 'Uncategorized' }}
                    </span>
                </div>
            </div>

            <!-- Content -->
            <div class="p-8 md:p-12 lg:p-16 space-y-8">
                
                <!-- Title -->
                <h1 class="font-playfair text-3xl md:text-4xl lg:text-5xl font-bold text-sogan leading-tight">
                    {{ $article->title }}
                </h1>
                
                <!-- Divider -->
                <div class="w-20 h-[2px] bg-batik-gold"></div>

                <!-- Body -->
                <div class="prose prose-sm md:prose-base max-w-none text-dark-brown/80 leading-relaxed whitespace-pre-line">
                    {{ $article->content }}
                </div>

                <!-- Back Button - TANPA SHARE -->
                <div class="pt-8 border-t border-gray-100">
                    <a href="{{ route('articles.index') }}" 
                        class="inline-flex items-center gap-2 px-6 py-3 border border-sogan/30 text-sogan hover:bg-sogan hover:text-white text-xs font-semibold uppercase tracking-wider transition-all duration-300 hover:shadow-md">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                        </svg>
                        Kembali ke Edukasi
                    </a>
                </div>
            </div>
        </div>
        
        <!-- Related Articles -->
        @php
            $related = App\Models\Article::where('category_id', $article->category_id)
                ->where('id', '!=', $article->id)
                ->where('is_published', true)
                ->latest()
                ->take(3)
                ->get();
        @endphp
        
        @if($related->count() > 0)
        <div class="space-y-6">
            <div class="flex items-center gap-4">
                <h2 class="font-playfair text-2xl font-bold text-sogan">Artikel Terkait</h2>
                <span class="flex-1 h-px bg-batik-gold/20"></span>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                @foreach($related as $rel)
                    <div class="group bg-white border border-batik-gold/10 overflow-hidden shadow-sm hover:shadow-md transition-all duration-300 hover:-translate-y-1">
                        <div class="relative w-full overflow-hidden bg-gray-100" style="aspect-ratio: 16/10;">
                            @php
                                $relImg = $rel->image_path ?? '';
                                $relUrl = '';
                                if (!empty($relImg) && file_exists(public_path('storage/' . $relImg))) {
                                    $relUrl = asset('storage/' . $relImg);
                                }
                            @endphp
                            @if(!empty($relUrl))
                                <img src="{{ $relUrl }}" alt="{{ $rel->title }}" 
                                    class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                            @else
                                <div class="w-full h-full flex items-center justify-center text-3xl text-gray-300 font-playfair">✦</div>
                            @endif
                        </div>
                        <div class="p-4">
                            <h4 class="font-playfair text-sm font-bold text-sogan group-hover:text-batik-gold transition-colors line-clamp-2">
                                <a href="{{ route('articles.show', $rel->slug) }}">{{ $rel->title }}</a>
                            </h4>
                            <a href="{{ route('articles.show', $rel->slug) }}" 
                                class="inline-block mt-2 text-[10px] font-bold text-batik-gold hover:text-sogan transition-colors">
                                Baca →
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        @endif
    </div>
</div>
@endsection