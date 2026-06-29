@extends('layouts.admin')

@section('title', 'Pengaturan Home')

@section('content')
<div class="space-y-6">
    <!-- Header -->
    <div class="flex justify-between items-center">
        <div>
            <h1 class="font-playfair text-3xl font-bold text-sogan">Pengaturan Home</h1>
            <p class="text-sm text-gray-500">Kelola semua konten halaman depan website.</p>
        </div>
        <a href="{{ route('admin.home-settings.edit', $homeSetting->id ?? 1) }}" 
           class="bg-sogan hover:bg-dark-brown text-white px-4 py-2.5 font-semibold transition-colors">
            Edit Pengaturan
        </a>
    </div>

    <!-- Alert Messages -->
    @if(session('success'))
        <div class="bg-green-50 border-l-4 border-green-500 p-4 text-sm text-green-700 shadow-sm flex items-center justify-between">
            <span>{{ session('success') }}</span>
            <button onclick="this.parentElement.style.display='none'" class="text-green-700 hover:text-green-900">×</button>
        </div>
    @endif

    @if($errors->any())
        <div class="bg-red-50 border-l-4 border-red-500 p-4 text-sm text-red-700 shadow-sm">
            <ul class="list-disc pl-5">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <!-- Preview -->
    <div class="bg-white border border-batik-gold/20 shadow-sm overflow-hidden">
        <div class="p-6 border-b border-gray-100">
            <h2 class="font-playfair text-xl font-bold text-sogan">Preview Konten Home</h2>
            <p class="text-sm text-gray-400">Berikut adalah tampilan konten yang sedang aktif.</p>
        </div>

        <div class="p-6 space-y-6">
            <!-- 1. Hero -->
            <div>
                <h3 class="font-semibold text-sm text-batik-gold uppercase tracking-wider mb-3">1. Hero Banner</h3>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 bg-ivory/30 p-4">
                    <div><p class="text-xs text-gray-400">Badge</p><p class="text-sm font-semibold">{{ $homeSetting->hero_badge ?? '-' }}</p></div>
                    <div><p class="text-xs text-gray-400">Judul</p><p class="text-sm font-semibold">{{ $homeSetting->hero_title ?? '-' }}</p></div>
                    <div><p class="text-xs text-gray-400">Subtitle</p><p class="text-sm font-semibold">{{ $homeSetting->hero_subtitle ?? '-' }}</p></div>
                    <div><p class="text-xs text-gray-400">Tombol</p><p class="text-sm font-semibold">{{ $homeSetting->hero_button_text ?? '-' }}</p></div>
                    <div><p class="text-xs text-gray-400">Link</p><p class="text-sm font-semibold">{{ $homeSetting->hero_button_link ?? '-' }}</p></div>
                    <div class="col-span-2">
                        <p class="text-xs text-gray-400">Gambar</p>
                        @if($homeSetting->hero_image && file_exists(public_path($homeSetting->hero_image)))
                            <img src="{{ asset($homeSetting->hero_image) }}" class="w-32 h-20 object-cover border">
                        @else
                            <p class="text-sm text-gray-400">Belum ada gambar</p>
                        @endif
                    </div>
                </div>
            </div>

            <!-- 2. Product -->
            <div>
                <h3 class="font-semibold text-sm text-batik-gold uppercase tracking-wider mb-3">2. Produk Unggulan</h3>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 bg-ivory/30 p-4">
                    <div><p class="text-xs text-gray-400">Section Label</p><p class="text-sm font-semibold">{{ $homeSetting->product_section_label ?? '-' }}</p></div>
                    <div><p class="text-xs text-gray-400">Section Title</p><p class="text-sm font-semibold">{{ $homeSetting->product_section_title ?? '-' }}</p></div>
                    <div><p class="text-xs text-gray-400">Nama</p><p class="text-sm font-semibold">{{ $homeSetting->product_title ?? '-' }}</p></div>
                    <div><p class="text-xs text-gray-400">Motif</p><p class="text-sm font-semibold">{{ $homeSetting->product_motif ?? '-' }}</p></div>
                    <div><p class="text-xs text-gray-400">Badge</p><p class="text-sm font-semibold">{{ $homeSetting->product_badge ?? '-' }}</p></div>
                    <div><p class="text-xs text-gray-400">Booking Link</p><p class="text-sm font-semibold truncate">{{ Str::limit($homeSetting->product_booking_link ?? '-', 30) }}</p></div>
                    <div class="col-span-2">
                        <p class="text-xs text-gray-400">Deskripsi</p>
                        <p class="text-sm">{{ Str::limit($homeSetting->product_description ?? '-', 100) }}</p>
                    </div>
                    <div class="col-span-2">
                        <p class="text-xs text-gray-400">Gambar</p>
                        @if($homeSetting->product_image && file_exists(public_path($homeSetting->product_image)))
                            <img src="{{ asset($homeSetting->product_image) }}" class="w-32 h-20 object-cover border">
                        @else
                            <p class="text-sm text-gray-400">Belum ada gambar</p>
                        @endif
                    </div>
                </div>
            </div>

            <!-- 3. Instagram -->
            <div>
                <h3 class="font-semibold text-sm text-batik-gold uppercase tracking-wider mb-3">3. Instagram CTA</h3>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 bg-ivory/30 p-4">
                    <div><p class="text-xs text-gray-400">Title</p><p class="text-sm font-semibold">{{ $homeSetting->instagram_title ?? '-' }}</p></div>
                    <div><p class="text-xs text-gray-400">Subtitle</p><p class="text-sm">{{ $homeSetting->instagram_subtitle ?? '-' }}</p></div>
                    <div><p class="text-xs text-gray-400">Username</p><p class="text-sm font-semibold">{{ $homeSetting->instagram_username ?? '-' }}</p></div>
                    <div>
                        <p class="text-xs text-gray-400">Status</p>
                        <span class="inline-block px-2 py-1 text-xs rounded {{ $homeSetting->instagram_is_active ? 'bg-green-100 text-green-700' : 'bg-gray-100 text-gray-500' }}">
                            {{ $homeSetting->instagram_is_active ? 'Aktif' : 'Nonaktif' }}
                        </span>
                    </div>
                </div>
            </div>

            <!-- 4. Google Maps -->
            <div>
                <h3 class="font-semibold text-sm text-batik-gold uppercase tracking-wider mb-3">4. Google Maps</h3>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 bg-ivory/30 p-4">
                    <div><p class="text-xs text-gray-400">Title</p><p class="text-sm font-semibold">{{ $homeSetting->map_title ?? '-' }}</p></div>
                    <div><p class="text-xs text-gray-400">Button</p><p class="text-sm font-semibold">{{ $homeSetting->map_button_text ?? '-' }}</p></div>
                    <div class="col-span-2"><p class="text-xs text-gray-400">Alamat</p><p class="text-sm">{{ $homeSetting->map_address ?? '-' }}</p></div>
                    <div><p class="text-xs text-gray-400">Operational Hours</p><p class="text-sm">{{ $homeSetting->map_operational_hours ?? '-' }}</p></div>
                    <div><p class="text-xs text-gray-400">Closed Day</p><p class="text-sm">{{ $homeSetting->map_closed_day ?? '-' }}</p></div>
                    <div>
                        <p class="text-xs text-gray-400">Status</p>
                        <span class="inline-block px-2 py-1 text-xs rounded {{ $homeSetting->map_is_active ? 'bg-green-100 text-green-700' : 'bg-gray-100 text-gray-500' }}">
                            {{ $homeSetting->map_is_active ? 'Aktif' : 'Nonaktif' }}
                        </span>
                    </div>
                </div>
            </div>

            <!-- 5. Dinoyo -->
            <div>
                <h3 class="font-semibold text-sm text-batik-gold uppercase tracking-wider mb-3">5. Kampung Dinoyo</h3>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4 bg-ivory/30 p-4 mb-4">
                    <div><p class="text-xs text-gray-400">Section Label</p><p class="text-sm font-semibold">{{ $homeSetting->dinoyo_section_label ?? 'Warisan Budaya' }}</p></div>
                    <div><p class="text-xs text-gray-400">Section Title</p><p class="text-sm font-semibold">{{ $homeSetting->dinoyo_section_title ?? 'Kampung Keramik Dinoyo' }}</p></div>
                    <div><p class="text-xs text-gray-400">Deskripsi</p><p class="text-sm">{{ Str::limit($homeSetting->dinoyo_section_description ?? 'Pusat kerajinan keramik tertua di Malang.', 50) }}</p></div>
                </div>
                <div class="flex gap-3 flex-wrap bg-ivory/30 p-4">
                    @forelse($dinoyoImages ?? [] as $image)
                        <div class="border p-2 bg-white">
                            @php
                                $imgPath = $image->image_path ?? $image->image_url ?? $image->path ?? $image->image ?? '';
                                $imgExists = false;
                                if (!empty($imgPath)) {
                                    if (str_starts_with($imgPath, 'storage/') && file_exists(public_path($imgPath))) {
                                        $imgExists = true;
                                    } elseif (file_exists(public_path($imgPath))) {
                                        $imgExists = true;
                                    } elseif (filter_var($imgPath, FILTER_VALIDATE_URL)) {
                                        $imgExists = true;
                                    }
                                }
                            @endphp
                            @if($imgExists && !empty($imgPath))
                                <img src="{{ asset($imgPath) }}" class="w-24 h-24 object-cover">
                            @else
                                <div class="w-24 h-24 bg-gray-100 flex items-center justify-center text-gray-300 text-2xl">✦</div>
                            @endif
                            <p class="text-xs text-center mt-1">{{ $image->title ?? 'Gallery' }}</p>
                            <span class="text-[8px] text-center block {{ ($image->is_active ?? false) ? 'text-green-600' : 'text-gray-400' }}">
                                {{ ($image->is_active ?? false) ? 'Aktif' : 'Nonaktif' }}
                            </span>
                        </div>
                    @empty
                        <p class="text-sm text-gray-400">Belum ada foto di galeri. Tambahkan melalui menu Galeri.</p>
                    @endforelse
                </div>
                <div class="mt-2 text-right">
                    <a href="{{ route('admin.galleries.index') }}" class="text-xs text-batik-gold hover:underline">
                        Kelola Galeri →
                    </a>
                </div>
            </div>

            <!-- 6. Health & Safety -->
            <div>
                <h3 class="font-semibold text-sm text-batik-gold uppercase tracking-wider mb-3">6. Kesehatan & Keamanan</h3>
                @php
                    $healthSafety = App\Models\HealthSafetySetting::where('is_active', true)->first();
                @endphp
                
                @if($healthSafety)
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 bg-ivory/30 p-4">
                        <div><p class="text-xs text-gray-400">Badge</p><p class="text-sm font-semibold">{{ $healthSafety->badge ?? '-' }}</p></div>
                        <div><p class="text-xs text-gray-400">Title</p><p class="text-sm font-semibold">{{ $healthSafety->title ?? '-' }}</p></div>
                        <div class="col-span-2">
                            <p class="text-xs text-gray-400">Deskripsi</p>
                            <p class="text-sm">{{ Str::limit($healthSafety->description ?? '-', 100) }}</p>
                        </div>
                        <div class="col-span-2">
                            <p class="text-xs text-gray-400">Features</p>
                            <div class="flex flex-wrap gap-2 mt-1">
                                @if($healthSafety->features)
                                    @foreach($healthSafety->features as $feature)
                                        @if(!empty($feature))
                                            <span class="inline-block px-2 py-1 text-xs bg-batik-gold/10 text-batik-gold rounded">
                                                ✓ {{ $feature }}
                                            </span>
                                        @endif
                                    @endforeach
                                @endif
                            </div>
                        </div>
                        <div>
                            <p class="text-xs text-gray-400">Button Text</p>
                            <p class="text-sm font-semibold">{{ $healthSafety->button_text ?? '-' }}</p>
                        </div>
                        <div>
                            <p class="text-xs text-gray-400">Status</p>
                            <span class="inline-block px-2 py-1 text-xs rounded {{ $healthSafety->is_active ? 'bg-green-100 text-green-700' : 'bg-gray-100 text-gray-500' }}">
                                {{ $healthSafety->is_active ? 'Aktif' : 'Nonaktif' }}
                            </span>
                        </div>
                        <div class="col-span-2">
                            <p class="text-xs text-gray-400">Gambar</p>
                            @if($healthSafety->image && file_exists(public_path($healthSafety->image)))
                                <img src="{{ asset($healthSafety->image) }}" class="w-32 h-20 object-cover border">
                            @else
                                <p class="text-sm text-gray-400">Belum ada gambar</p>
                            @endif
                        </div>
                    </div>
                    <div class="mt-2 text-right">
                        <a href="{{ route('admin.health-safety.edit', $healthSafety->id) }}" class="text-xs text-batik-gold hover:underline">
                            Edit Kesehatan & Keamanan →
                        </a>
                    </div>
                @else
                    <div class="bg-ivory/30 p-4 text-center text-sm text-gray-400">
                        Belum ada data Kesehatan & Keamanan. 
                        <a href="{{ route('admin.health-safety.index') }}" class="text-batik-gold hover:underline">Buat sekarang</a>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection