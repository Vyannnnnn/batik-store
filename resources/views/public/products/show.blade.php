@extends('layouts.public')

@section('title', $product->name . ' - Batikura Plate')

@section('content')
<div class="bg-ivory/10 py-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-16">
        <!-- Back Navigation -->
        <div>
            <a href="{{ route('products.index') }}" class="text-xs font-semibold text-batik-gold hover:text-sogan flex items-center gap-1 transition-colors duration-200">
                ← Kembali ke Katalog Produk
            </a>
        </div>

        <!-- Product Details Grid -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 bg-white p-8 sm:p-12 rounded-2xl border border-batik-gold/15 shadow-sm">
            <!-- Left: Image Box -->
            <div class="flex justify-center items-start">
                <div class="w-full aspect-square max-w-md rounded-xl overflow-hidden border border-gray-150 bg-gray-50 shadow-inner">
                    @if(Str::startsWith($product->image_path, 'http') || Str::startsWith($product->image_path, 'storage/'))
                        <img src="{{ asset($product->image_path) }}" alt="{{ $product->name }}" class="w-full h-full object-cover">
                    @else
                        <img src="{{ asset('storage/' . $product->image_path) }}" alt="{{ $product->name }}" class="w-full h-full object-cover">
                    @endif
                </div>
            </div>

            <!-- Right: Details -->
            <div class="space-y-6 flex flex-col justify-between">
                <div class="space-y-4">
                    <span class="inline-block px-3 py-1 bg-ivory text-sogan border border-batik-gold/30 rounded text-xs font-bold uppercase tracking-wider">
                        Motif: {{ $product->motif }}
                    </span>
                    <h1 class="font-playfair text-3xl sm:text-4xl font-extrabold text-sogan leading-tight">
                        {{ $product->name }}
                    </h1>
                    <div class="text-2xl font-bold text-sogan">
                        Rp {{ number_format($product->price, 0, ',', '.') }}
                    </div>

                    <div class="w-full h-[1px] bg-gray-100 my-4"></div>

                    <!-- Technical Specs -->
                    <div class="grid grid-cols-2 gap-4 text-xs">
                        <div class="bg-ivory/40 p-3 rounded border border-batik-gold/10">
                            <span class="block text-gray-400 font-semibold mb-1">UKURAN PIRING</span>
                            <span class="font-bold text-dark-brown text-sm">{{ $product->size }}</span>
                        </div>
                        <div class="bg-ivory/40 p-3 rounded border border-batik-gold/10">
                            <span class="block text-gray-400 font-semibold mb-1">BAHAN BAKU</span>
                            <span class="font-bold text-dark-brown text-sm">Keramik Porselen (Food Grade)</span>
                        </div>
                    </div>

                    <!-- Description -->
                    <div class="space-y-2">
                        <h4 class="text-sm font-bold text-sogan uppercase tracking-wider">Deskripsi Produk:</h4>
                        <p class="text-xs text-dark-brown/80 leading-relaxed whitespace-pre-line">
                            {{ $product->description }}
                        </p>
                    </div>
                </div>

                <div class="pt-6 border-t border-gray-100 space-y-4">
                    <h4 class="text-sm font-bold text-sogan uppercase tracking-wider">Metode Pemesanan:</h4>
                    
                    <div class="flex flex-col sm:flex-row gap-3">
                        <!-- Shopee Button -->
                        @if($product->shopee_url)
                            <a href="{{ $product->shopee_url }}" target="_blank" 
                                class="flex-grow py-3 px-4 bg-[#EE4D2D] hover:bg-[#d84325] text-white text-xs font-bold text-center rounded-lg shadow-sm transition-colors flex items-center justify-center gap-1.5">
                                🛒 Beli di Shopee
                            </a>
                        @endif

                        <!-- Tokopedia Button -->
                        @if($product->tokopedia_url)
                            <a href="{{ $product->tokopedia_url }}" target="_blank" 
                                class="flex-grow py-3 px-4 bg-[#03AC0E] hover:bg-[#02950b] text-white text-xs font-bold text-center rounded-lg shadow-sm transition-colors flex items-center justify-center gap-1.5">
                                🛍️ Beli di Tokopedia
                            </a>
                        @endif

                        <!-- WhatsApp Order Button -->
                        <a href="https://wa.me/6281234567890?text={{ urlencode($product->whatsapp_text) }}" target="_blank" 
                            class="flex-grow py-3 px-4 bg-moss-green hover:bg-dark-brown text-white text-xs font-bold text-center rounded-lg shadow-sm transition-colors flex items-center justify-center gap-1.5 border border-gold-accent/20">
                            💬 Pesan via WhatsApp
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Related Products Section -->
        @if($relatedProducts->count() > 0)
            <div class="space-y-6">
                <div class="border-b border-batik-gold/15 pb-4">
                    <h3 class="font-playfair text-2xl font-bold text-sogan">Koleksi Terkait</h3>
                </div>
                
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
                    @foreach($relatedProducts as $rel)
                        <div class="bg-white rounded-xl border border-batik-gold/15 overflow-hidden shadow-sm hover:shadow-xl transition-all duration-300 flex flex-col group">
                            <!-- Image -->
                            <div class="aspect-square w-full overflow-hidden bg-gray-50 relative border-b border-gray-100">
                                @if(Str::startsWith($rel->image_path, 'http') || Str::startsWith($rel->image_path, 'storage/'))
                                    <img src="{{ asset($rel->image_path) }}" alt="{{ $rel->name }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
                                @else
                                    <img src="{{ asset('storage/' . $rel->image_path) }}" alt="{{ $rel->name }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
                                @endif
                                <span class="absolute top-3 left-3 bg-sogan/90 text-batik-gold text-[9px] font-bold px-2 py-0.5 rounded uppercase tracking-wider">
                                    {{ $rel->motif }}
                                </span>
                            </div>

                            <!-- Details -->
                            <div class="p-6 space-y-3 flex-grow flex flex-col justify-between">
                                <div>
                                    <h3 class="font-playfair text-sm font-bold text-sogan leading-tight group-hover:text-batik-gold transition-colors">
                                        <a href="{{ route('products.show', $rel->slug) }}">{{ $rel->name }}</a>
                                    </h3>
                                    <p class="text-[10px] text-gray-400 mt-1">Ukuran: {{ $rel->size }}</p>
                                </div>
                                <div class="pt-4 border-t border-gray-50 flex items-center justify-between">
                                    <span class="font-semibold text-sogan text-xs">
                                        Rp {{ number_format($rel->price, 0, ',', '.') }}
                                    </span>
                                    <a href="{{ route('products.show', $rel->slug) }}" 
                                        class="text-[10px] font-bold text-moss-green hover:underline">
                                        Detail →
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        @endif
    </div>
</div>
@endsection
