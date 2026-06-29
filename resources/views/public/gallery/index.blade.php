@extends('layouts.public')

@section('title', 'Galeri Foto Produk & Proses Pembuatan - Batikura Plate')

@section('content')
<div class="bg-ivory/20 min-h-screen py-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-12">
        
        <!-- HEADER -->
        <div class="text-center space-y-3">
            <span class="inline-block text-[10px] font-bold text-batik-gold uppercase tracking-[0.25em] border border-batik-gold/20 px-4 py-1">Galeri Visual</span>
            <h1 class="font-playfair text-4xl sm:text-5xl font-bold text-sogan">Keindahan Batikura Plate</h1>
            <div class="w-16 h-[2px] bg-batik-gold mx-auto"></div>
            <p class="text-sm text-gray-500 max-w-md mx-auto">Lihat aktivitas pembuatan keramik, kemasan eksklusif, serta potret piring keramik batik premium kami.</p>
        </div>

        <!-- FILTER TABS -->
        <div class="flex flex-wrap justify-center gap-3 border-b border-batik-gold/10 pb-6">
            <a href="{{ route('gallery.index') }}" 
                class="px-6 py-2.5 text-xs font-semibold tracking-wider transition-colors {{ !request()->filled('category') ? 'bg-sogan text-white' : 'bg-white text-sogan border border-batik-gold/20 hover:bg-ivory' }}">
                Semua Foto
            </a>
            @foreach($categories as $cat)
                <a href="{{ route('gallery.index', ['category' => $cat->slug]) }}" 
                    class="px-6 py-2.5 text-xs font-semibold tracking-wider transition-colors {{ request('category') === $cat->slug ? 'bg-sogan text-white' : 'bg-white text-sogan border border-batik-gold/20 hover:bg-ivory' }}">
                    {{ $cat->name }}
                </a>
            @endforeach
        </div>

        <!-- GALLERY GRID - CARD BESAR -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
            @forelse($galleries as $gal)
                @php
                    // PATH GAMBAR
                    $imagePath = $gal->image_path ?? '';
                    $imageUrl = '';
                    $fileExists = false;
                    
                    if (!empty($imagePath)) {
                        if (str_starts_with($imagePath, 'http')) {
                            $imageUrl = $imagePath;
                            $fileExists = true;
                        } elseif (str_starts_with($imagePath, 'storage/')) {
                            $imageUrl = asset($imagePath);
                            if (file_exists(public_path($imagePath))) {
                                $fileExists = true;
                            }
                        } elseif (str_starts_with($imagePath, 'galleries/')) {
                            $imageUrl = asset('storage/' . $imagePath);
                            if (file_exists(public_path('storage/' . $imagePath))) {
                                $fileExists = true;
                            }
                        } else {
                            $imageUrl = asset('storage/' . $imagePath);
                            if (file_exists(public_path('storage/' . $imagePath))) {
                                $fileExists = true;
                            }
                        }
                        if (!$fileExists && file_exists(public_path($imagePath))) {
                            $fileExists = true;
                            $imageUrl = asset($imagePath);
                        }
                    }
                    
                    // NAMA KATEGORI
                    $categoryName = 'Uncategorized';
                    if ($gal->category_id) {
                        try {
                            $cat = App\Models\Category::find($gal->category_id);
                            if ($cat) {
                                $categoryName = $cat->name;
                            }
                        } catch (\Exception $e) {
                            $categoryName = 'Uncategorized';
                        }
                    }
                @endphp
                
                <div class="group bg-white border border-batik-gold/10 overflow-hidden shadow-sm hover:shadow-xl transition-all duration-500 cursor-pointer gallery-trigger"
                    data-src="{{ $imageUrl }}"
                    data-title="{{ $gal->title ?: 'Tanpa Judul' }}"
                    data-desc="{{ $gal->description ?: 'Tidak ada deskripsi.' }}"
                    data-category="{{ $categoryName }}">
                    
                    <!-- GAMBAR - ASPEK RATIO 4:3 -->
                    <div class="relative overflow-hidden aspect-[4/3] bg-gray-100">
                        @if($fileExists && !empty($imageUrl))
                            <img src="{{ $imageUrl }}" alt="{{ $gal->title }}" 
                                class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700 ease-out">
                        @else
                            <div class="w-full h-full flex items-center justify-center bg-ivory">
                                <span class="text-7xl font-playfair text-batik-gold/20">✦</span>
                            </div>
                        @endif
                        
                        <!-- OVERLAY HOVER - MODERN -->
                        <div class="absolute inset-0 bg-gradient-to-t from-sogan/80 via-sogan/40 to-transparent opacity-0 group-hover:opacity-100 transition-all duration-500 flex flex-col items-center justify-end pb-8">
                            <span class="bg-white/95 text-sogan px-6 py-2.5 text-[11px] font-bold uppercase tracking-wider border border-batik-gold/20 shadow-lg transform translate-y-4 group-hover:translate-y-0 transition-all duration-500">
                                <i class="fas fa-expand mr-2"></i>
                                Lihat Foto
                            </span>
                        </div>
                        
                        <!-- BADGE KATEGORI -->
                        <div class="absolute top-4 left-4">
                            <span class="inline-block px-3 py-1 text-[9px] font-bold text-white bg-sogan/80 backdrop-blur-sm uppercase tracking-wider border border-white/20">
                                {{ $categoryName }}
                            </span>
                        </div>
                    </div>

                    <!-- DETAIL CARD -->
                    <div class="p-5 border-t border-batik-gold/5">
                        <h4 class="text-base font-bold text-sogan mt-0 truncate">{{ $gal->title ?: 'Foto Batikura' }}</h4>
                        <p class="text-xs text-gray-400 mt-1 line-clamp-2 leading-relaxed">{{ $gal->description ?: 'Karya pengrajin Dinoyo' }}</p>
                        <div class="mt-3 flex items-center justify-between">
                            <span class="text-[9px] text-batik-gold font-medium uppercase tracking-wider">
                                <i class="fas fa-camera mr-1"></i>
                                Klik untuk melihat
                            </span>
                            <span class="text-batik-gold/30 text-lg">✦</span>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-span-full py-20 text-center text-sm text-gray-400">
                    <span class="text-6xl block mb-4">📷</span>
                    Tidak ditemukan foto galeri untuk kategori ini.
                </div>
            @endforelse
        </div>

        <!-- PAGINATION -->
        @if(method_exists($galleries, 'hasPages') && $galleries->hasPages())
            <div class="mt-12">
                {{ $galleries->appends(request()->input())->links() }}
            </div>
        @endif
    </div>
</div>

<!-- LIGHTBOX MODAL - MODERN -->
<div id="lightbox" class="fixed inset-0 bg-black/95 z-[100] hidden flex flex-col items-center justify-center p-4 transition-all duration-300">
    <button id="lightbox-close" class="absolute top-6 right-6 text-white hover:text-batik-gold text-4xl font-light focus:outline-none transition-colors w-12 h-12 flex items-center justify-center hover:bg-white/10 rounded-full">
        <i class="fas fa-times"></i>
    </button>
    
    <div class="max-w-5xl w-full flex flex-col items-center relative">
        <img id="lightbox-img" src="" alt="" class="max-w-full max-h-[80vh] object-contain border border-white/10 shadow-2xl rounded-lg">
        
        <div class="w-full max-w-3xl text-center mt-6 space-y-2">
            <h4 id="lightbox-title" class="text-white font-playfair text-2xl sm:text-3xl font-bold tracking-wide"></h4>
            <p id="lightbox-desc" class="text-gray-400 text-sm leading-relaxed"></p>
            <span id="lightbox-category" class="inline-block mt-2 text-[10px] text-batik-gold uppercase tracking-wider border border-batik-gold/30 px-4 py-1.5"></span>
        </div>
    </div>
</div>

<!-- LIGHTBOX SCRIPT -->
<script>
    document.addEventListener('DOMContentLoaded', () => {
        const triggers = document.querySelectorAll('.gallery-trigger');
        const lightbox = document.getElementById('lightbox');
        const lightboxImg = document.getElementById('lightbox-img');
        const lightboxTitle = document.getElementById('lightbox-title');
        const lightboxDesc = document.getElementById('lightbox-desc');
        const lightboxCategory = document.getElementById('lightbox-category');
        const closeBtn = document.getElementById('lightbox-close');

        triggers.forEach(trigger => {
            trigger.addEventListener('click', () => {
                const src = trigger.getAttribute('data-src');
                const title = trigger.getAttribute('data-title');
                const desc = trigger.getAttribute('data-desc');
                const category = trigger.getAttribute('data-category');

                lightboxImg.setAttribute('src', src);
                lightboxTitle.textContent = title;
                lightboxDesc.textContent = desc;
                lightboxCategory.textContent = category ? category.toUpperCase() : '';

                lightbox.classList.remove('hidden');
                document.body.classList.add('overflow-hidden');
            });
        });

        const closeLightbox = () => {
            lightbox.classList.add('hidden');
            lightboxImg.setAttribute('src', '');
            document.body.classList.remove('overflow-hidden');
        };

        closeBtn.addEventListener('click', closeLightbox);
        
        lightbox.addEventListener('click', (e) => {
            if (e.target === lightbox) {
                closeLightbox();
            }
        });

        document.addEventListener('keydown', (e) => {
            if (e.key === 'Escape' && !lightbox.classList.contains('hidden')) {
                closeLightbox();
            }
        });
    });
</script>
@endsection