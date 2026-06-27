@extends('layouts.public')

@section('title', 'Galeri Foto Produk & Proses Pembuatan - Batikura Plate')

@section('content')
<div class="bg-ivory/20 min-h-screen py-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-12">
        <!-- Page Header -->
        <div class="text-center space-y-2">
            <span class="text-xs font-bold text-batik-gold uppercase tracking-widest">Galeri Visual</span>
            <h1 class="font-playfair text-4xl font-extrabold text-sogan">Keindahan Batikura Plate</h1>
            <div class="w-16 h-[2px] bg-batik-gold mx-auto mt-2"></div>
            <p class="text-xs text-gray-500 max-w-md mx-auto">Lihat aktivitas pembuatan keramik, kemasan eksklusif hantaran, serta potret piring keramik batik premium kami.</p>
        </div>

        <!-- Filter Tabs (Vanilla HTML Links) -->
        <div class="flex flex-wrap justify-center gap-2 border-b border-batik-gold/15 pb-6">
            <a href="{{ route('gallery.index') }}" 
                class="px-4 py-2 rounded-full text-xs font-semibold tracking-wider transition-colors {{ !request()->filled('category') ? 'bg-sogan text-white' : 'bg-white text-sogan border border-batik-gold/20 hover:bg-ivory' }}">
                Semua Foto
            </a>
            <a href="{{ route('gallery.index', ['category' => 'produk']) }}" 
                class="px-4 py-2 rounded-full text-xs font-semibold tracking-wider transition-colors {{ request('category') === 'produk' ? 'bg-sogan text-white' : 'bg-white text-sogan border border-batik-gold/20 hover:bg-ivory' }}">
                Produk
            </a>
            <a href="{{ route('gallery.index', ['category' => 'kemasan']) }}" 
                class="px-4 py-2 rounded-full text-xs font-semibold tracking-wider transition-colors {{ request('category') === 'kemasan' ? 'bg-sogan text-white' : 'bg-white text-sogan border border-batik-gold/20 hover:bg-ivory' }}">
                Kemasan
            </a>
            <a href="{{ route('gallery.index', ['category' => 'proses']) }}" 
                class="px-4 py-2 rounded-full text-xs font-semibold tracking-wider transition-colors {{ request('category') === 'proses' ? 'bg-sogan text-white' : 'bg-white text-sogan border border-batik-gold/20 hover:bg-ivory' }}">
                Proses Pembuatan
            </a>
        </div>

        <!-- Gallery Grid -->
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
            @forelse($galleries as $gal)
                <div class="bg-white rounded-xl border border-batik-gold/15 overflow-hidden shadow-xs hover:shadow-lg transition-all duration-300 flex flex-col justify-between cursor-pointer gallery-trigger"
                    data-src="{{ Str::startsWith($gal->image_path, 'http') || Str::startsWith($gal->image_path, 'storage/') ? asset($gal->image_path) : asset('storage/' . $gal->image_path) }}"
                    data-title="{{ $gal->title ?: 'Tanpa Judul' }}"
                    data-desc="{{ $gal->description ?: 'Tidak ada deskripsi.' }}">
                    
                    <div class="relative group overflow-hidden aspect-[4/3] bg-gray-50 border-b border-gray-100">
                        <!-- Image -->
                        @if(Str::startsWith($gal->image_path, 'http') || Str::startsWith($gal->image_path, 'storage/'))
                            <img src="{{ asset($gal->image_path) }}" alt="{{ $gal->title }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                        @else
                            <img src="{{ asset('storage/' . $gal->image_path) }}" alt="{{ $gal->title }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                        @endif
                        
                        <!-- Hover Overlay Indicator -->
                        <div class="absolute inset-0 bg-sogan/15 opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center duration-300">
                            <span class="bg-white/95 px-3 py-1.5 rounded-lg text-[10px] font-bold text-sogan shadow border border-batik-gold/20 uppercase tracking-widest">
                                Perbesar 🔍
                            </span>
                        </div>
                    </div>

                    <!-- Details below image -->
                    <div class="p-4 bg-white">
                        <span class="inline-block text-[9px] font-bold text-batik-gold uppercase tracking-wider mb-1">
                            {{ $gal->category }}
                        </span>
                        <h4 class="text-xs font-bold text-dark-brown truncate">{{ $gal->title ?: 'Foto Batikura' }}</h4>
                        <p class="text-[10px] text-gray-400 mt-1 line-clamp-1">{{ $gal->description ?: 'Batikura Plate.' }}</p>
                    </div>
                </div>
            @empty
                <div class="col-span-full py-16 text-center text-sm text-gray-400">
                    Tidak ditemukan foto galeri untuk kategori ini.
                </div>
            @endforelse
        </div>
    </div>
</div>

<!-- Custom Lightbox Modal -->
<div id="lightbox" class="fixed inset-0 bg-black/95 z-[100] hidden flex flex-col items-center justify-center p-4 transition-all duration-300">
    <button id="lightbox-close" class="absolute top-6 right-6 text-white hover:text-batik-gold text-4xl font-light focus:outline-none transition-colors">&times;</button>
    
    <div class="max-w-4xl w-full flex flex-col items-center relative">
        <!-- Large Image -->
        <img id="lightbox-img" src="" alt="" class="max-w-full max-h-[75vh] object-contain rounded-lg border border-white/10 shadow-2xl">
        
        <!-- Text overlay info -->
        <div class="w-full max-w-2xl text-center mt-6 space-y-1">
            <h4 id="lightbox-title" class="text-white font-playfair text-xl font-bold tracking-wide"></h4>
            <p id="lightbox-desc" class="text-gray-400 text-xs leading-relaxed"></p>
        </div>
    </div>
</div>

<!-- Lightbox JS Script -->
<script>
    document.addEventListener('DOMContentLoaded', () => {
        const triggers = document.querySelectorAll('.gallery-trigger');
        const lightbox = document.getElementById('lightbox');
        const lightboxImg = document.getElementById('lightbox-img');
        const lightboxTitle = document.getElementById('lightbox-title');
        const lightboxDesc = document.getElementById('lightbox-desc');
        const closeBtn = document.getElementById('lightbox-close');

        // Open Lightbox
        triggers.forEach(trigger => {
            trigger.addEventListener('click', () => {
                const src = trigger.getAttribute('data-src');
                const title = trigger.getAttribute('data-title');
                const desc = trigger.getAttribute('data-desc');

                lightboxImg.setAttribute('src', src);
                lightboxTitle.textContent = title;
                lightboxDesc.textContent = desc;

                lightbox.classList.remove('hidden');
                document.body.classList.add('overflow-hidden'); // Disable body scroll
            });
        });

        // Close Lightbox
        const closeLightbox = () => {
            lightbox.classList.add('hidden');
            lightboxImg.setAttribute('src', '');
            document.body.classList.remove('overflow-hidden');
        };

        closeBtn.addEventListener('click', closeLightbox);
        
        // Close on background click
        lightbox.addEventListener('click', (e) => {
            if (e.target === lightbox || e.target === closeBtn) {
                closeLightbox();
            }
        });

        // Close on ESC key press
        document.addEventListener('keydown', (e) => {
            if (e.key === 'Escape' && !lightbox.classList.contains('hidden')) {
                closeLightbox();
            }
        });
    });
</script>
@endsection
