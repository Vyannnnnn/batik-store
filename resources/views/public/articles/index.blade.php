@extends('layouts.public')

@section('title', 'Edukasi Budaya & Higienitas Alat Makan - Batikura Plate')

@section('content')
<div class="bg-ivory/20 min-h-screen py-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-12">
        <!-- Page Header -->
        <div class="text-center space-y-2">
            <span class="text-xs font-bold text-batik-gold uppercase tracking-widest">Ruang Edukasi</span>
            <h1 class="font-playfair text-4xl font-extrabold text-sogan">Artikel Budaya & Kesehatan</h1>
            <div class="w-16 h-[2px] bg-batik-gold mx-auto mt-2"></div>
            <p class="text-xs text-gray-500 max-w-md mx-auto">Pelajari lebih dalam mengenai sejarah Kampung Dinoyo, keunikan motif batik Malang, serta alasan pentingnya higienitas alat makan Anda.</p>
        </div>

        <!-- Tab Filters (Vanilla HTML Links) -->
        <div class="flex flex-wrap justify-center gap-2 border-b border-batik-gold/15 pb-6">
            <a href="{{ route('articles.index') }}" 
                class="px-4 py-2 rounded-full text-xs font-semibold tracking-wider transition-colors {{ !request()->filled('category') ? 'bg-sogan text-white' : 'bg-white text-sogan border border-batik-gold/20 hover:bg-ivory' }}">
                Semua Kategori
            </a>
            <a href="{{ route('articles.index', ['category' => 'keramik_dinoyo']) }}" 
                class="px-4 py-2 rounded-full text-xs font-semibold tracking-wider transition-colors {{ request('category') === 'keramik_dinoyo' ? 'bg-sogan text-white' : 'bg-white text-sogan border border-batik-gold/20 hover:bg-ivory' }}">
                Kampung Keramik Dinoyo
            </a>
            <a href="{{ route('articles.index', ['category' => 'batik_malang']) }}" 
                class="px-4 py-2 rounded-full text-xs font-semibold tracking-wider transition-colors {{ request('category') === 'batik_malang' ? 'bg-sogan text-white' : 'bg-white text-sogan border border-batik-gold/20 hover:bg-ivory' }}">
                Batik Malang
            </a>
            <a href="{{ route('articles.index', ['category' => 'topeng_malangan']) }}" 
                class="px-4 py-2 rounded-full text-xs font-semibold tracking-wider transition-colors {{ request('category') === 'topeng_malangan' ? 'bg-sogan text-white' : 'bg-white text-sogan border border-batik-gold/20 hover:bg-ivory' }}">
                Topeng Malangan
            </a>
            <a href="{{ route('articles.index', ['category' => 'higienitas']) }}" 
                class="px-4 py-2 rounded-full text-xs font-semibold tracking-wider transition-colors {{ request('category') === 'higienitas' ? 'bg-sogan text-white' : 'bg-white text-sogan border border-batik-gold/20 hover:bg-ivory' }}">
                Higienitas Alat Makan
            </a>
        </div>

        <!-- Articles Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @forelse($articles as $art)
                <div class="bg-white rounded-xl border border-batik-gold/15 overflow-hidden shadow-sm hover:shadow-xl transition-all duration-300 flex flex-col justify-between group">
                    <div>
                        <!-- Cover Image -->
                        <div class="aspect-video w-full overflow-hidden bg-gray-50 border-b border-gray-100 relative">
                            @if($art->image_path)
                                @if(Str::startsWith($art->image_path, 'http') || Str::startsWith($art->image_path, 'storage/'))
                                    <img src="{{ asset($art->image_path) }}" alt="{{ $art->title }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
                                @else
                                    <img src="{{ asset('storage/' . $art->image_path) }}" alt="{{ $art->title }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
                                @endif
                            @else
                                <div class="w-full h-full flex items-center justify-center text-4xl text-gray-300">📖</div>
                            @endif
                            <span class="absolute bottom-3 left-3 bg-dark-brown/90 text-batik-gold text-[9px] font-bold px-2.5 py-1 rounded uppercase tracking-wider">
                                {{ str_replace('_', ' ', $art->category) }}
                            </span>
                        </div>

                        <!-- Details -->
                        <div class="p-6 space-y-3">
                            <span class="text-[10px] text-gray-400 font-semibold uppercase tracking-wider">{{ $art->created_at->format('d M Y') }}</span>
                            <h3 class="font-playfair text-lg font-bold text-sogan leading-tight group-hover:text-batik-gold transition-colors">
                                <a href="{{ route('articles.show', $art->slug) }}">{{ $art->title }}</a>
                            </h3>
                            <p class="text-xs text-gray-500 leading-relaxed line-clamp-3">
                                {{ $art->content }}
                            </p>
                        </div>
                    </div>

                    <div class="px-6 pb-6 pt-3 border-t border-gray-50">
                        <a href="{{ route('articles.show', $art->slug) }}" 
                            class="text-xs font-bold text-moss-green hover:underline flex items-center gap-1">
                            Baca Artikel Lengkap →
                        </a>
                    </div>
                </div>
            @empty
                <div class="col-span-full py-16 text-center text-sm text-gray-400">
                    Tidak ditemukan artikel untuk kategori ini.
                </div>
            @endforelse
        </div>

        <!-- Pagination -->
        @if($articles->hasPages())
            <div class="mt-12">
                {{ $articles->appends(request()->input())->links() }}
            </div>
        @endif
    </div>
</div>
@endsection
