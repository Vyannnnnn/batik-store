@extends('layouts.public')

@section('title', $homeSetting->hero_title ?? 'Batikura Plate - Mangkuk Keramik Batik Premium')

@section('content')

<!-- ============================================ -->
<!-- HERO SECTION - DARI DATABASE -->
<!-- ============================================ -->
<section class="relative min-h-[80vh] flex items-center bg-cover bg-center bg-no-repeat" 
         style="background-image: url('{{ $homeSetting->hero_image ? asset($homeSetting->hero_image) : asset('images/hero-batik-bg.jpg') }}');">
    
    <div class="absolute inset-0 bg-gradient-to-r from-sogan/60 via-sogan/65 to-sogan/20"></div>
    
    <div class="absolute left-0 top-1/2 -translate-y-1/2 w-[2px] h-24 bg-batik-gold/40 hidden lg:block"></div>
    
    <div class="absolute inset-0 opacity-5 pointer-events-none">
        <div class="w-full h-full bg-[radial-gradient(#c9a96e_1px,transparent_1px)] [background-size:24px_24px]"></div>
    </div>
    
    <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 w-full py-20">
        <div class="max-w-2xl">
            <span class="inline-block text-[11px] font-bold text-batik-gold uppercase tracking-[0.25em] border-l-2 border-batik-gold pl-4 mb-6">
                {{ $homeSetting->hero_badge ?? 'Premium Art Tableware' }}
            </span>
            
            <h1 class="font-playfair text-4xl sm:text-5xl lg:text-6xl xl:text-7xl font-bold text-white leading-[1.08]">
                {{ $homeSetting->hero_title ?? 'Keanggunan Tradisi' }}
                @if($homeSetting->hero_subtitle)
                <br>
                <span class="text-batik-gold">{{ $homeSetting->hero_subtitle }}</span>
                @endif
            </h1>
            
            <p class="text-base text-white/70 max-w-lg mt-4 leading-relaxed">
                Mangkuk keramik premium buatan tangan dari Kampung Keramik Dinoyo, 
                berhias motif batik Malang yang elegan dan aman bagi kesehatan keluarga.
            </p>
            
            <div class="flex flex-wrap gap-4 mt-10">
                <a href="#product" 
                    class="px-10 py-4 bg-batik-gold hover:bg-batik-gold-light text-sogan text-sm font-semibold tracking-[0.15em] uppercase transition-all duration-300 shadow-xl hover:shadow-2xl border border-transparent hover:border-batik-gold/30">
                    {{ $homeSetting->hero_button_text ?? 'Lihat Produk' }}
                </a>
                <a href="{{ route('about') }}" 
                    class="px-10 py-4 border border-white/40 text-white hover:bg-white/10 text-sm font-semibold tracking-[0.15em] uppercase transition-all duration-300">
                    Tentang Kami
                </a>
            </div>
        </div>
    </div>
</section>

<!-- ============================================ -->
<!-- SINGLE PRODUCT - DARI DATABASE -->
<!-- ============================================ -->
<section id="product" class="py-16 md:py-24 bg-white">
    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <div class="text-center mb-12">
            <span class="text-[11px] font-bold text-batik-gold uppercase tracking-[0.25em]">
                {{ $homeSetting->product_section_label ?? 'Koleksi Unggulan' }}
            </span>
            <h2 class="font-playfair text-3xl sm:text-4xl font-bold text-sogan mt-1">
                {{ $homeSetting->product_section_title ?? 'Produk Kami' }}
            </h2>
            <div class="w-12 h-[2px] bg-batik-gold mx-auto mt-3"></div>
        </div>

        <!-- PAKAI items-stretch AGAR TINGGI SAMA -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-10 lg:gap-16 items-stretch">
            
            <!-- KIRI: Gambar Produk - FLEX COLUMN -->
            <div class="bg-ivory border border-batik-gold/10 overflow-hidden shadow-sm flex flex-col">
                <div class="flex-1">
                    @if($homeSetting->product_image && file_exists(public_path($homeSetting->product_image)))
                        <img src="{{ asset($homeSetting->product_image) }}" 
                             alt="{{ $homeSetting->product_title }}" 
                             class="w-full h-full object-cover">
                    @else
                        <div class="w-full h-full flex items-center justify-center bg-ivory">
                            <div class="text-center">
                                <span class="block text-7xl font-playfair text-batik-gold/20">✦</span>
                                <span class="block mt-4 text-sm text-gray-400 font-playfair tracking-widest">Mangkuk Batikura</span>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
            
            <!-- KANAN: Deskripsi - FLEX COLUMN DENGAN TOMBOL DI BAWAH -->
            <div class="flex flex-col justify-between space-y-6">
                <div>
                    <span class="inline-block text-[10px] font-bold text-batik-gold uppercase tracking-[0.2em] border border-batik-gold/30 px-4 py-1.5">
                        {{ $homeSetting->product_badge ?? 'Best Seller' }}
                    </span>
                    
                    <h1 class="font-playfair text-3xl sm:text-4xl lg:text-5xl font-bold text-sogan leading-tight mt-4">
                        {{ $homeSetting->product_title ?? 'Mangkuk Batik Kembang Malang' }}
                    </h1>
                    
                    <p class="text-sm text-gray-400 tracking-[0.15em] uppercase mt-2">
                        {{ $homeSetting->product_motif ?? 'Motif Kembang Malang' }}
                    </p>
                    
                    <div class="w-12 h-[2px] bg-batik-gold mt-4"></div>
                    
                    <div class="mt-4">
                        <h3 class="text-sm font-bold text-sogan uppercase tracking-wider mb-2">Deskripsi</h3>
                        <p class="text-sm text-dark-brown/70 leading-relaxed">
                            {{ $homeSetting->product_description ?? 'Mangkuk keramik premium dengan hiasan lukisan tangan motif Kembang Malang. Dibuat oleh pengrajin berpengalaman dari Kampung Keramik Dinoyo, Malang. Dilapisi glasir food-grade yang aman untuk makanan.' }}
                        </p>
                    </div>
                </div>
                
                <!-- Tombol BOOK - DI BAWAH, SEJAJAR DENGAN GAMBAR -->
                <div class="pt-6 border-t border-gray-100">
                    <a href="{{ $homeSetting->product_booking_link ?? 'https://forms.gle/your-google-form-link' }}" 
                       target="_blank"
                       class="inline-block w-full text-center px-8 py-4 bg-sogan hover:bg-dark-brown text-white text-sm font-semibold tracking-[0.15em] uppercase transition-all duration-300 border border-batik-gold/20 hover:shadow-lg">
                        PESAN SEKARANG
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ============================================ -->
<!-- HEALTH & SAFETY - DARI DATABASE -->
<!-- ============================================ -->
@php
    $healthSafety = App\Models\HealthSafetySetting::where('is_active', true)->first();
@endphp

@if($healthSafety)
<section class="py-16 md:py-20 bg-white border-y border-batik-gold/5">
    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <div class="text-center mb-12">
            <span class="text-[11px] font-bold text-batik-gold uppercase tracking-[0.25em]">
                {{ $healthSafety->badge ?? 'Kesehatan & Keamanan' }}
            </span>
            <h2 class="font-playfair text-3xl sm:text-4xl font-bold text-sogan mt-1">
                {{ $healthSafety->title ?? 'Higienitas Alat Makan' }}
            </h2>
            <div class="w-12 h-[2px] bg-batik-gold mx-auto mt-3"></div>
        </div>

        <!-- PAKAI items-stretch AGAR TINGGI SAMA -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-10 lg:gap-16 items-stretch">
            
            <!-- KIRI: Deskripsi - FLEX COLUMN DENGAN TOMBOL DI BAWAH -->
            <div class="flex flex-col justify-between space-y-6 order-2 lg:order-1">
                <div>
                    <span class="inline-block text-[10px] font-bold text-batik-gold uppercase tracking-[0.2em] border border-batik-gold/30 px-4 py-1.5">
                        Food Grade Certified
                    </span>
                    
                    <h1 class="font-playfair text-3xl sm:text-4xl lg:text-5xl font-bold text-sogan leading-tight mt-4">
                        {{ $healthSafety->title ?? 'Higienitas Alat Makan' }}
                    </h1>
                    
                    <div class="w-12 h-[2px] bg-batik-gold mt-4"></div>
                    
                    <div class="mt-4">
                        <p class="text-sm text-dark-brown/70 leading-relaxed">
                            {{ Str::limit($healthSafety->description ?? '', 350) }}
                        </p>
                    </div>
                    
                    <!-- Features Grid -->
                    @if($healthSafety->features)
                    <div class="grid grid-cols-2 gap-3 pt-4">
                        @foreach($healthSafety->features as $feature)
                            @if(!empty($feature))
                                <div class="flex items-center gap-2 bg-ivory/30 p-2.5 border border-batik-gold/5">
                                    <span class="text-batik-gold text-sm">✓</span>
                                    <span class="text-[11px] font-medium text-sogan">{{ $feature }}</span>
                                </div>
                            @endif
                        @endforeach
                    </div>
                    @endif
                </div>
                
                <!-- Tombol BACA SELENGKAPNYA - DI BAWAH, SEJAJAR DENGAN GAMBAR -->
                @if($healthSafety->button_text)
                <div class="pt-2 border-t border-gray-100">
                    <a href="{{ $healthSafety->button_link ?? '#' }}" 
                        class="inline-block w-full text-center px-8 py-3.5 bg-sogan hover:bg-dark-brown text-white text-sm font-semibold tracking-[0.15em] uppercase transition-all duration-300 border border-batik-gold/20 hover:shadow-lg">
                        {{ $healthSafety->button_text }}
                    </a>
                </div>
                @endif
            </div>
            
            <!-- KANAN: Gambar - TETAP ADA OVERLAY -->
            <div class="relative bg-ivory border border-batik-gold/10 overflow-hidden group order-1 lg:order-2">
                @php
                    $imagePath = $healthSafety->image ?? '';
                    $imageExists = false;
                    $imageUrl = '';
                    
                    if (!empty($imagePath)) {
                        if (str_starts_with($imagePath, 'storage/')) {
                            $fullPath = public_path($imagePath);
                            if (file_exists($fullPath)) {
                                $imageExists = true;
                                $imageUrl = asset($imagePath);
                            }
                        } elseif (file_exists(public_path($imagePath))) {
                            $imageExists = true;
                            $imageUrl = asset($imagePath);
                        } elseif (filter_var($imagePath, FILTER_VALIDATE_URL)) {
                            $imageExists = true;
                            $imageUrl = $imagePath;
                        }
                    }
                @endphp
                
                @if($imageExists && !empty($imageUrl))
                    <img src="{{ $imageUrl }}" 
                         alt="{{ $healthSafety->title ?? 'Kesehatan & Keamanan' }}" 
                         class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                @else
                    <div class="w-full aspect-[4/3] flex flex-col items-center justify-center bg-ivory">
                        <span class="text-7xl font-playfair text-batik-gold/20">✦</span>
                        <span class="text-sm text-gray-400 mt-4">Gambar Kesehatan & Keamanan</span>
                        @if($imagePath)
                            <span class="text-xs text-red-400 mt-1">(File: {{ basename($imagePath) }} tidak ditemukan)</span>
                        @endif
                    </div>
                @endif
                
                <!-- ============================================ -->
                <!-- OVERLAY TETAP ADA - SEMUA TEKS PERTAHANKAN -->
                <!-- ============================================ -->
                
                <!-- Overlay Teks di Bawah Gambar -->
                <div class="absolute bottom-0 left-0 right-0 bg-gradient-to-t from-sogan/90 via-sogan/70 to-transparent p-6">
                    <div class="flex items-center justify-between">
                        <div>
                            <span class="block text-[10px] text-batik-gold uppercase tracking-wider font-semibold">Safe & Hygienic</span>
                            <span class="block text-sm font-bold text-white">100% Food Grade</span>
                        </div>
                        <div class="flex items-center gap-4">
                            <span class="text-white/60 text-[10px] uppercase tracking-wider">Bebas Timbal</span>
                            <span class="w-px h-6 bg-white/20"></span>
                            <span class="text-white/60 text-[10px] uppercase tracking-wider">Non-porous</span>
                        </div>
                    </div>
                </div>
                
                <!-- Badge Atas -->
                <div class="absolute top-4 right-4 bg-batik-gold/90 text-sogan px-3 py-1.5 text-[10px] font-bold uppercase tracking-wider">
                    Premium Quality
                </div>
                
                <!-- Badge Kiri Atas -->
                <div class="absolute top-4 left-4 flex items-center gap-1.5 bg-sogan/80 text-white px-3 py-1.5 text-[10px] font-bold uppercase tracking-wider border border-batik-gold/20">
                    <span class="text-batik-gold text-sm">✦</span>
                    Food Grade
                </div>
            </div>
        </div>
    </div>
</section>
@endif
<!-- ============================================ -->
<!-- KAMPUNG DINOYO - 3 FOTO TERBARU DARI GALLERY -->
<!-- ============================================ -->
<section class="py-16 bg-ivory/30 border-y border-batik-gold/5">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-10">
            <span class="text-[11px] font-bold text-batik-gold uppercase tracking-[0.25em]">
                {{ $homeSetting->dinoyo_section_label ?? 'Warisan Budaya' }}
            </span>
            <h2 class="font-playfair text-2xl sm:text-3xl font-bold text-sogan mt-1">
                {{ $homeSetting->dinoyo_section_title ?? 'Kampung Keramik Dinoyo' }}
            </h2>
            <div class="w-12 h-[2px] bg-batik-gold mx-auto mt-2"></div>
            <p class="text-sm text-dark-brown/50 mt-3 max-w-lg mx-auto">
                {{ $homeSetting->dinoyo_section_description ?? 'Pusat kerajinan keramik tertua di Malang, tempat Batikura Plate lahir dan berkembang.' }}
            </p>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            @forelse($dinoyoImages as $image)
                <div class="group overflow-hidden bg-white border border-batik-gold/10 hover:border-batik-gold/30 transition-all hover:shadow-md">
                    <div class="aspect-[4/3] bg-ivory overflow-hidden">
                        @php
                            // Cek field gambar (image_path, image_url, path, image)
                            $imagePath = $image->image_path ?? $image->image_url ?? $image->path ?? $image->image ?? '';
                            $imageExists = false;
                            $imageUrl = '';
                            
                            if (!empty($imagePath)) {
                                // Cek jika path menggunakan storage/
                                if (str_starts_with($imagePath, 'storage/')) {
                                    $fullPath = public_path($imagePath);
                                    if (file_exists($fullPath)) {
                                        $imageExists = true;
                                        $imageUrl = asset($imagePath);
                                    }
                                } 
                                // Cek jika path langsung (galleries/xxx.jpg)
                                elseif (str_starts_with($imagePath, 'galleries/')) {
                                    $fullPath = public_path('storage/' . $imagePath);
                                    if (file_exists($fullPath)) {
                                        $imageExists = true;
                                        $imageUrl = asset('storage/' . $imagePath);
                                    } else {
                                        // Coba tanpa storage
                                        $fullPath = public_path($imagePath);
                                        if (file_exists($fullPath)) {
                                            $imageExists = true;
                                            $imageUrl = asset($imagePath);
                                        }
                                    }
                                }
                                // Cek jika path langsung
                                elseif (file_exists(public_path($imagePath))) {
                                    $imageExists = true;
                                    $imageUrl = asset($imagePath);
                                }
                                // Cek jika URL lengkap
                                elseif (filter_var($imagePath, FILTER_VALIDATE_URL)) {
                                    $imageExists = true;
                                    $imageUrl = $imagePath;
                                }
                            }
                        @endphp
                        
                        @if($imageExists && !empty($imageUrl))
                            <img src="{{ $imageUrl }}" 
                                 alt="{{ $image->title ?? 'Gallery' }}" 
                                 class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                        @else
                            <div class="w-full h-full flex items-center justify-center bg-ivory">
                                <span class="text-6xl font-playfair text-batik-gold/20">✦</span>
                                @if(!empty($imagePath))
                                    <span class="text-xs text-red-400 absolute bottom-2">File: {{ basename($imagePath) }}</span>
                                @endif
                            </div>
                        @endif
                    </div>
                    <div class="p-4 text-center">
                        <h4 class="text-sm font-bold text-sogan">{{ $image->title ?? 'Karya Pengrajin' }}</h4>
                        <p class="text-[10px] text-gray-400 mt-1">{{ $image->description ?? 'Karya pengrajin Dinoyo' }}</p>
                        <span class="text-[8px] text-gray-300">{{ $image->category ?? '' }}</span>
                    </div>
                </div>
            @empty
                <!-- Default 3 foto jika belum ada data -->
                <div class="group overflow-hidden bg-white border border-batik-gold/10 hover:border-batik-gold/30 transition-all hover:shadow-md">
                    <div class="aspect-[4/3] bg-ivory overflow-hidden flex items-center justify-center">
                        <span class="text-6xl font-playfair text-batik-gold/20">✦</span>
                    </div>
                    <div class="p-4 text-center">
                        <h4 class="text-sm font-bold text-sogan">Suasana Kampung</h4>
                        <p class="text-[10px] text-gray-400 mt-1">Kehidupan pengrajin di Dinoyo</p>
                    </div>
                </div>

                <div class="group overflow-hidden bg-white border border-batik-gold/10 hover:border-batik-gold/30 transition-all hover:shadow-md">
                    <div class="aspect-[4/3] bg-ivory overflow-hidden flex items-center justify-center">
                        <span class="text-6xl font-playfair text-batik-gold/20">✦</span>
                    </div>
                    <div class="p-4 text-center">
                        <h4 class="text-sm font-bold text-sogan">Proses Pembuatan</h4>
                        <p class="text-[10px] text-gray-400 mt-1">Pengerjaan keramik secara manual</p>
                    </div>
                </div>

                <div class="group overflow-hidden bg-white border border-batik-gold/10 hover:border-batik-gold/30 transition-all hover:shadow-md">
                    <div class="aspect-[4/3] bg-ivory overflow-hidden flex items-center justify-center">
                        <span class="text-6xl font-playfair text-batik-gold/20">✦</span>
                    </div>
                    <div class="p-4 text-center">
                        <h4 class="text-sm font-bold text-sogan">Hasil Karya</h4>
                        <p class="text-[10px] text-gray-400 mt-1">Produk keramik berkualitas tinggi</p>
                    </div>
                </div>
            @endforelse
        </div>

<div class="text-center mt-10">
    <a href="{{ route('gallery.index') }}" 
        class="inline-flex items-center gap-3 px-8 py-3 border border-sogan text-sogan hover:bg-sogan hover:text-white text-[11px] font-medium tracking-[0.15em] uppercase transition-all duration-300">
        
        Lihat Galeri Lengkap
        
        <!-- Panah ke kanan -->
        <svg class="w-3.5 h-3.5 transition-transform group-hover:translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/>
        </svg>
    </a>
</div>
        </div>
    </div>
</section>


<!-- ============================================ -->
<!-- INSTAGRAM CTA - DARI DATABASE -->
<!-- ============================================ -->
@if($homeSetting->instagram_is_active ?? true)
<section class="py-16 bg-white border-t border-batik-gold/5">
    <div class="max-w-3xl mx-auto px-4 text-center">
        <div class="w-12 h-[2px] bg-batik-gold mx-auto mb-6"></div>
        
        <h2 class="font-playfair text-3xl sm:text-4xl font-bold text-sogan">
            {{ $homeSetting->instagram_title ?? 'Ikuti Kami di Instagram' }}
        </h2>
        
        <p class="text-sm text-dark-brown/50 mt-3 max-w-md mx-auto">
            {{ $homeSetting->instagram_subtitle ?? 'Dapatkan informasi produk terbaru dan proses melukis batik langsung dari pengrajin.' }}
        </p>
        
        <a href="{{ $homeSetting->instagram_url ?? 'https://instagram.com/batikura_plate' }}" target="_blank" 
            class="inline-flex items-center gap-3 mt-8 px-12 py-4 border border-sogan text-sogan hover:bg-sogan hover:text-white text-[11px] font-medium tracking-[0.15em] uppercase transition-all duration-300">
            
            <!-- Icon Instagram -->
            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                <path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zM12 0C8.741 0 8.333.014 7.053.072 2.695.272.273 2.69.073 7.052.014 8.333 0 8.741 0 12c0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98C8.333 23.986 8.741 24 12 24c3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98C15.668.014 15.259 0 12 0zm0 5.838a6.162 6.162 0 100 12.324 6.162 6.162 0 000-12.324zM12 16a4 4 0 110-8 4 4 0 010 8zm6.406-11.845a1.44 1.44 0 100 2.881 1.44 1.44 0 000-2.881z"/>
            </svg>
            
            {{ $homeSetting->instagram_username ?? 'batikura_plate' }}
        </a>
    </div>
</section>
@endif

<!-- ============================================ -->
<!-- GOOGLE MAPS - DARI DATABASE -->
<!-- ============================================ -->
@if($homeSetting->map_is_active ?? true)
<section class="py-16 bg-white border-t border-batik-gold/5">
    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-10 items-center">
            
            <!-- KIRI: Informasi Alamat -->
            <div class="space-y-6">
                <div>
                    <span class="text-[11px] font-bold text-batik-gold uppercase tracking-[0.25em]">Kunjungi Kami</span>
                    <h2 class="font-playfair text-3xl sm:text-4xl font-bold text-sogan mt-2">{{ $homeSetting->map_title ?? 'Kampung Keramik Dinoyo' }}</h2>
                    <div class="w-12 h-[2px] bg-batik-gold mt-3"></div>
                </div>
                
                <p class="text-sm text-dark-brown/70 leading-relaxed">{{ $homeSetting->map_description ?? 'Temukan kami di jantung kota Malang.' }}</p>
                
                <div class="flex items-start gap-4">
                    <span class="text-xl text-batik-gold mt-0.5">✦</span>
                    <div>
                        <h4 class="text-sm font-bold text-sogan uppercase tracking-wider">Alamat</h4>
                        <p class="text-sm text-dark-brown/70">{{ $homeSetting->map_address ?? 'Jl. MT Haryono, Kampung Wisata Keramik Dinoyo, Kec. Lowokwaru, Kota Malang, Jawa Timur 65144' }}</p>
                    </div>
                </div>
                
                <div class="flex items-start gap-4">
                    <span class="text-xl text-batik-gold mt-0.5">✦</span>
                    <div>
                        <h4 class="text-sm font-bold text-sogan uppercase tracking-wider">Jam Operasional</h4>
                        <p class="text-sm text-dark-brown/70">{{ $homeSetting->map_operational_hours ?? 'Senin - Sabtu: 08.00 - 17.00 WIB' }}</p>
                        <p class="text-sm text-dark-brown/70">{{ $homeSetting->map_closed_day ?? 'Minggu: Tutup' }}</p>
                    </div>
                </div>
                
                <div class="pt-4">
                    <a href="{{ $homeSetting->map_url ?? 'https://www.google.com/maps/search/?api=1&query=Kampung+Keramik+Dinoyo+Malang' }}" target="_blank"
                        class="inline-flex items-center gap-3 px-8 py-4 bg-sogan hover:bg-dark-brown text-white text-sm font-semibold tracking-[0.15em] uppercase transition-all duration-300 border border-batik-gold/20 hover:shadow-lg">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                        </svg>
                        {{ $homeSetting->map_button_text ?? 'Buka di Google Maps' }}
                    </a>
                </div>
            </div>
            
            <!-- KANAN: Google Maps Embed -->
            <div class="bg-ivory border border-batik-gold/10 overflow-hidden shadow-sm hover:shadow-md transition-all group relative">
                <a href="{{ $homeSetting->map_url ?? 'https://www.google.com/maps/search/?api=1&query=Kampung+Keramik+Dinoyo+Malang' }}" 
                   target="_blank" 
                   class="block relative">
                    <div class="aspect-[4/3] w-full">
                        <iframe 
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3951.551532721958!2d112.6116907!3d-7.9418156!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e78827327aa4fd3%3A0x5a49804dcae940ba!2sKampung%20Wisata%20Keramik%20Dinoyo!5e0!3m2!1sid!2sid!4v1782665358113!5m2!1sid!2sid" 
                            width="100%" 
                            height="100%" 
                            style="border:0; pointer-events: none;" 
                            allowfullscreen="" 
                            loading="lazy" 
                            referrerpolicy="strict-origin-when-cross-origin"
                            class="w-full h-full">
                        </iframe>
                    </div>
                    
                    <!-- Overlay Hover -->
                    <div class="absolute inset-0 bg-sogan/0 group-hover:bg-sogan/10 transition-colors flex items-center justify-center">
                        <span class="bg-sogan/80 text-white px-6 py-3 text-xs font-semibold tracking-[0.15em] uppercase opacity-0 group-hover:opacity-100 transition-all duration-300">
                            Lihat di Google Maps →
                        </span>
                    </div>
                </a>
            </div>
        </div>
    </div>
</section>
@endif

@endsection