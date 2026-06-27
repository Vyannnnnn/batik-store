@extends('layouts.public')

@section('title', $article->title . ' - Ruang Edukasi Batikura')

@section('content')
<div class="bg-ivory/10 py-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Grid layout: Article + Sidebar -->
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-12">
            <!-- Left: Main Article Content -->
            <div class="lg:col-span-2 space-y-8 bg-white p-6 sm:p-10 rounded-2xl border border-batik-gold/15 shadow-sm">
                <!-- Back Link & Metadata -->
                <div class="space-y-4">
                    <a href="{{ route('articles.index') }}" class="text-xs font-semibold text-batik-gold hover:text-sogan transition-colors flex items-center gap-1">
                        ← Kembali ke Semua Artikel
                    </a>
                    
                    <div class="flex items-center gap-3 text-xs text-gray-400 font-semibold uppercase tracking-wider">
                        <span>{{ $article->created_at->format('d F Y') }}</span>
                        <span>•</span>
                        <span class="text-batik-gold">{{ str_replace('_', ' ', $article->category) }}</span>
                    </div>
                    
                    <h1 class="font-playfair text-3xl sm:text-4xl font-extrabold text-sogan leading-tight">
                        {{ $article->title }}
                    </h1>
                </div>

                <!-- Cover Image -->
                @if($article->image_path)
                    <div class="w-full aspect-video rounded-xl overflow-hidden bg-gray-50 border border-gray-100">
                        @if(Str::startsWith($article->image_path, 'http') || Str::startsWith($article->image_path, 'storage/'))
                            <img src="{{ asset($article->image_path) }}" alt="{{ $article->title }}" class="w-full h-full object-cover">
                        @else
                            <img src="{{ asset('storage/' . $article->image_path) }}" alt="{{ $article->title }}" class="w-full h-full object-cover">
                        @endif
                    </div>
                @endif

                <!-- Article Body -->
                <div class="text-dark-brown/90 text-sm leading-relaxed space-y-6 whitespace-pre-line font-serif">
                    {{ $article->content }}
                </div>
                
                <!-- Share Accent -->
                <div class="border-t border-gray-100 pt-6 flex items-center justify-between text-xs text-gray-400">
                    <span>Diunggah oleh: Admin Batikura Plate</span>
                    <span>Melestarikan Budaya, Menjaga Kesehatan</span>
                </div>
            </div>

            <!-- Right: Sidebar Articles -->
            <div class="space-y-6">
                <div class="bg-white p-6 rounded-2xl border border-batik-gold/15 shadow-sm space-y-6">
                    <h3 class="font-playfair text-lg font-bold text-sogan border-b border-batik-gold/15 pb-2">Artikel Terbaru Lainnya</h3>
                    
                    <div class="divide-y divide-gray-100">
                        @forelse($otherArticles as $oth)
                            <div class="py-4 first:pt-0 last:pb-0 space-y-2">
                                <span class="text-[9px] font-bold text-batik-gold uppercase tracking-wider">{{ str_replace('_', ' ', $oth->category) }}</span>
                                <h4 class="text-xs font-bold text-dark-brown hover:text-sogan transition-colors leading-tight">
                                    <a href="{{ route('articles.show', $oth->slug) }}">{{ $oth->title }}</a>
                                </h4>
                                <span class="block text-[10px] text-gray-400">{{ $oth->created_at->format('d M Y') }}</span>
                            </div>
                        @empty
                            <p class="text-xs text-gray-400 py-4">Belum ada artikel lainnya.</p>
                        @endforelse
                    </div>
                </div>
                
                <!-- Quick Ad/CTA widget -->
                <div class="bg-sogan text-white p-6 rounded-2xl border border-gold-accent/20 shadow-sm text-center space-y-4">
                    <span class="text-2xl">🍽️</span>
                    <h4 class="font-playfair text-base font-bold text-batik-gold">Tertarik Koleksi Piring Kami?</h4>
                    <p class="text-[11px] text-gray-300">Lihat katalog piring keramik batik Malang premium kami dan pesan motif favorit Anda sekarang.</p>
                    <a href="{{ route('products.index') }}" class="block w-full py-2 bg-batik-gold hover:bg-white text-sogan text-xs font-bold rounded transition-colors uppercase tracking-wider">
                        Katalog Produk
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
