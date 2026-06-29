@extends('layouts.admin')

@section('title', 'Edit Pengaturan Home')

@section('content')
<div class="max-w-6xl mx-auto">
    <!-- Header -->
    <div class="border-b border-gray-200 pb-4 mb-6 flex justify-between items-center">
        <div>
            <h1 class="font-playfair text-2xl font-bold text-sogan">Edit Pengaturan Home</h1>
            <p class="text-sm text-gray-400 mt-1">Kelola semua konten halaman utama Batikura Plate</p>
        </div>
        <a href="{{ route('admin.home-settings.index') }}" class="text-sm text-gray-400 hover:text-sogan transition">
            ← Kembali
        </a>
    </div>

    <!-- Alert Messages -->
    @if(session('success'))
        <div class="mb-6 bg-green-50 border-l-4 border-green-500 p-4 text-sm text-green-700">
            ✅ {{ session('success') }}
        </div>
    @endif

    @if(session('error'))
        <div class="mb-6 bg-red-50 border-l-4 border-red-500 p-4 text-sm text-red-700">
            ❌ {{ session('error') }}
        </div>
    @endif

    @if($errors->any())
        <div class="mb-6 bg-red-50 border-l-4 border-red-500 p-4 text-sm text-red-700">
            <ul class="list-disc list-inside">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.home-settings.update', $homeSetting->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <!-- ============================================ -->
        <!-- 1. HERO SECTION -->
        <!-- ============================================ -->
        <div class="bg-white border border-gray-200 p-6 mb-6">
            <h2 class="font-playfair text-xl font-bold text-sogan border-b border-gray-200 pb-3 mb-4">1. Hero Section</h2>
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div class="md:col-span-2">
                    <label class="block text-sm font-medium text-gray-700 mb-1">Hero Title</label>
                    <input type="text" name="hero_title" value="{{ old('hero_title', $homeSetting->hero_title) }}" 
                           class="w-full border border-gray-300 p-2.5 text-sm focus:border-batik-gold focus:outline-none">
                </div>
                <div class="md:col-span-2">
                    <label class="block text-sm font-medium text-gray-700 mb-1">Hero Subtitle</label>
                    <input type="text" name="hero_subtitle" value="{{ old('hero_subtitle', $homeSetting->hero_subtitle) }}" 
                           class="w-full border border-gray-300 p-2.5 text-sm focus:border-batik-gold focus:outline-none">
                </div>
                <div class="md:col-span-2">
                    <label class="block text-sm font-medium text-gray-700 mb-1">Hero Badge</label>
                    <input type="text" name="hero_badge" value="{{ old('hero_badge', $homeSetting->hero_badge) }}" 
                           class="w-full border border-gray-300 p-2.5 text-sm focus:border-batik-gold focus:outline-none">
                </div>
                <div class="md:col-span-2">
                    <label class="block text-sm font-medium text-gray-700 mb-1">Hero Image</label>
                    @if($homeSetting->hero_image && file_exists(public_path($homeSetting->hero_image)))
                        <div class="mb-2">
                            <img src="{{ asset($homeSetting->hero_image) }}" alt="Hero" class="w-40 h-40 object-cover border border-gray-200">
                            <p class="text-xs text-gray-400 mt-1">Current: {{ basename($homeSetting->hero_image) }}</p>
                        </div>
                    @endif
                    <input type="file" name="hero_image" accept="image/*" 
                           class="w-full border border-gray-300 p-2 text-sm focus:border-batik-gold focus:outline-none">
                    <p class="text-xs text-gray-400 mt-1">Max 2MB (JPG, PNG, WEBP)</p>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Hero Button Text</label>
                    <input type="text" name="hero_button_text" value="{{ old('hero_button_text', $homeSetting->hero_button_text) }}" 
                           class="w-full border border-gray-300 p-2.5 text-sm focus:border-batik-gold focus:outline-none">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Hero Button Link</label>
                    <input type="text" name="hero_button_link" value="{{ old('hero_button_link', $homeSetting->hero_button_link) }}" 
                           class="w-full border border-gray-300 p-2.5 text-sm focus:border-batik-gold focus:outline-none">
                </div>
            </div>
        </div>

        <!-- ============================================ -->
        <!-- 2. PRODUCT SECTION -->
        <!-- ============================================ -->
        <div class="bg-white border border-gray-200 p-6 mb-6">
            <h2 class="font-playfair text-xl font-bold text-sogan border-b border-gray-200 pb-3 mb-4">2. Product Section</h2>
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Section Label</label>
                    <input type="text" name="product_section_label" value="{{ old('product_section_label', $homeSetting->product_section_label) }}" 
                           class="w-full border border-gray-300 p-2.5 text-sm focus:border-batik-gold focus:outline-none">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Section Title</label>
                    <input type="text" name="product_section_title" value="{{ old('product_section_title', $homeSetting->product_section_title) }}" 
                           class="w-full border border-gray-300 p-2.5 text-sm focus:border-batik-gold focus:outline-none">
                </div>
                <div class="md:col-span-2">
                    <label class="block text-sm font-medium text-gray-700 mb-1">Product Title</label>
                    <input type="text" name="product_title" value="{{ old('product_title', $homeSetting->product_title) }}" 
                           class="w-full border border-gray-300 p-2.5 text-sm focus:border-batik-gold focus:outline-none">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Motif</label>
                    <input type="text" name="product_motif" value="{{ old('product_motif', $homeSetting->product_motif) }}" 
                           class="w-full border border-gray-300 p-2.5 text-sm focus:border-batik-gold focus:outline-none">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Badge</label>
                    <input type="text" name="product_badge" value="{{ old('product_badge', $homeSetting->product_badge) }}" 
                           class="w-full border border-gray-300 p-2.5 text-sm focus:border-batik-gold focus:outline-none">
                </div>
                <div class="md:col-span-2">
                    <label class="block text-sm font-medium text-gray-700 mb-1">Description</label>
                    <textarea name="product_description" rows="3" 
                              class="w-full border border-gray-300 p-2.5 text-sm focus:border-batik-gold focus:outline-none">{{ old('product_description', $homeSetting->product_description) }}</textarea>
                </div>
                <div class="md:col-span-2">
                    <label class="block text-sm font-medium text-gray-700 mb-1">Product Image</label>
                    @if($homeSetting->product_image && file_exists(public_path($homeSetting->product_image)))
                        <div class="mb-2">
                            <img src="{{ asset($homeSetting->product_image) }}" alt="Product" class="w-40 h-40 object-cover border border-gray-200">
                            <p class="text-xs text-gray-400 mt-1">Current: {{ basename($homeSetting->product_image) }}</p>
                        </div>
                    @endif
                    <input type="file" name="product_image" accept="image/*" 
                           class="w-full border border-gray-300 p-2 text-sm focus:border-batik-gold focus:outline-none">
                    <p class="text-xs text-gray-400 mt-1">Max 2MB (JPG, PNG, WEBP)</p>
                </div>
                <div class="md:col-span-2">
                    <label class="block text-sm font-medium text-gray-700 mb-1">Booking Link (Google Form)</label>
                    <input type="text" name="product_booking_link" value="{{ old('product_booking_link', $homeSetting->product_booking_link) }}" 
                           class="w-full border border-gray-300 p-2.5 text-sm focus:border-batik-gold focus:outline-none" placeholder="https://forms.gle/...">
                </div>
            </div>
        </div>

        <!-- ============================================ -->
        <!-- 6. HEALTH & SAFETY SECTION -->
        <!-- ============================================ -->
        <div class="bg-white border border-gray-200 p-6 mb-6">
            <h2 class="font-playfair text-xl font-bold text-sogan border-b border-gray-200 pb-3 mb-4">3. Kesehatan & Keamanan</h2>
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div class="md:col-span-2">
                    <label class="block text-sm font-medium text-gray-700 mb-1">Badge</label>
                    <input type="text" name="health_badge" value="{{ old('health_badge', $healthSafety->badge ?? '') }}" 
                           class="w-full border border-gray-300 p-2.5 text-sm focus:border-batik-gold focus:outline-none" placeholder="Kesehatan & Keamanan">
                </div>
                <div class="md:col-span-2">
                    <label class="block text-sm font-medium text-gray-700 mb-1">Title</label>
                    <input type="text" name="health_title" value="{{ old('health_title', $healthSafety->title ?? '') }}" 
                           class="w-full border border-gray-300 p-2.5 text-sm focus:border-batik-gold focus:outline-none" placeholder="Higienitas Alat Makan">
                </div>
                <div class="md:col-span-2">
                    <label class="block text-sm font-medium text-gray-700 mb-1">Description</label>
                    <textarea name="health_description" rows="4" 
                              class="w-full border border-gray-300 p-2.5 text-sm focus:border-batik-gold focus:outline-none">{{ old('health_description', $healthSafety->description ?? '') }}</textarea>
                </div>
                
                <!-- Features -->
                <div class="md:col-span-2">
                    <label class="block text-sm font-medium text-gray-700 mb-2">Features (Checklist)</label>
                    @php
                        $defaultFeatures = ['Non-porous', 'Lead-free', 'Anti Bakteri', 'Mudah Dibersihkan'];
                        $currentFeatures = old('health_features', $healthSafety->features ?? $defaultFeatures);
                    @endphp
                    
                    <div class="grid grid-cols-2 gap-3">
                        @foreach($defaultFeatures as $feature)
                            <label class="flex items-center gap-2 text-sm text-gray-700">
                                <input type="checkbox" name="health_features[]" value="{{ $feature }}"
                                       {{ in_array($feature, (array)$currentFeatures) ? 'checked' : '' }}>
                                {{ $feature }}
                            </label>
                        @endforeach
                    </div>
                    <p class="text-xs text-gray-400 mt-2">Centang features yang ingin ditampilkan</p>
                </div>
                
                <!-- Health Image -->
                <div class="md:col-span-2">
                    <label class="block text-sm font-medium text-gray-700 mb-1">Gambar</label>
                    @if($healthSafety && $healthSafety->image && file_exists(public_path($healthSafety->image)))
                        <div class="mb-2">
                            <img src="{{ asset($healthSafety->image) }}" alt="Health Safety" class="w-40 h-40 object-cover border border-gray-200">
                            <p class="text-xs text-gray-400 mt-1">Current: {{ basename($healthSafety->image) }}</p>
                        </div>
                    @endif
                    <input type="file" name="health_image" accept="image/*" 
                           class="w-full border border-gray-300 p-2 text-sm focus:border-batik-gold focus:outline-none">
                    <p class="text-xs text-gray-400 mt-1">Max 2MB (JPG, PNG, WEBP)</p>
                </div>
                
                <!-- Button -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Button Text</label>
                    <input type="text" name="health_button_text" value="{{ old('health_button_text', $healthSafety->button_text ?? '') }}" 
                           class="w-full border border-gray-300 p-2.5 text-sm focus:border-batik-gold focus:outline-none" placeholder="Baca Selengkapnya">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Button Link</label>
                    <input type="text" name="health_button_link" value="{{ old('health_button_link', $healthSafety->button_link ?? '') }}" 
                           class="w-full border border-gray-300 p-2.5 text-sm focus:border-batik-gold focus:outline-none" placeholder="/artikel/kesehatan">
                </div>
                
                <!-- Status -->
                <div class="md:col-span-2">
                    <label class="flex items-center gap-2 text-sm font-medium text-gray-700">
                        <input type="checkbox" name="health_is_active" value="1" 
                               {{ old('health_is_active', $healthSafety->is_active ?? true) ? 'checked' : '' }}>
                        Aktifkan Section Kesehatan & Keamanan
                    </label>
                </div>
            </div>
        </div>

        <!-- ============================================ -->
        <!-- 3. DINOYO SECTION -->
        <!-- ============================================ -->
        <div class="bg-white border border-gray-200 p-6 mb-6">
            <h2 class="font-playfair text-xl font-bold text-sogan border-b border-gray-200 pb-3 mb-4">4. Dinoyo Section</h2>
            
            <div class="grid grid-cols-1 gap-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Section Label</label>
                    <input type="text" name="dinoyo_section_label" value="{{ old('dinoyo_section_label', $homeSetting->dinoyo_section_label) }}" 
                           class="w-full border border-gray-300 p-2.5 text-sm focus:border-batik-gold focus:outline-none">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Section Title</label>
                    <input type="text" name="dinoyo_section_title" value="{{ old('dinoyo_section_title', $homeSetting->dinoyo_section_title) }}" 
                           class="w-full border border-gray-300 p-2.5 text-sm focus:border-batik-gold focus:outline-none">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Description</label>
                    <textarea name="dinoyo_section_description" rows="3" 
                              class="w-full border border-gray-300 p-2.5 text-sm focus:border-batik-gold focus:outline-none">{{ old('dinoyo_section_description', $homeSetting->dinoyo_section_description) }}</textarea>
                </div>
            </div>
        </div>

        <!-- ============================================ -->
        <!-- 4. INSTAGRAM SECTION -->
        <!-- ============================================ -->
        <div class="bg-white border border-gray-200 p-6 mb-6">
            <h2 class="font-playfair text-xl font-bold text-sogan border-b border-gray-200 pb-3 mb-4">5. Instagram</h2>
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div class="md:col-span-2">
                    <label class="block text-sm font-medium text-gray-700 mb-1">Title</label>
                    <input type="text" name="instagram_title" value="{{ old('instagram_title', $homeSetting->instagram_title) }}" 
                           class="w-full border border-gray-300 p-2.5 text-sm focus:border-batik-gold focus:outline-none">
                </div>
                <div class="md:col-span-2">
                    <label class="block text-sm font-medium text-gray-700 mb-1">Subtitle</label>
                    <input type="text" name="instagram_subtitle" value="{{ old('instagram_subtitle', $homeSetting->instagram_subtitle) }}" 
                           class="w-full border border-gray-300 p-2.5 text-sm focus:border-batik-gold focus:outline-none">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Username</label>
                    <input type="text" name="instagram_username" value="{{ old('instagram_username', $homeSetting->instagram_username) }}" 
                           class="w-full border border-gray-300 p-2.5 text-sm focus:border-batik-gold focus:outline-none">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">URL</label>
                    <input type="text" name="instagram_url" value="{{ old('instagram_url', $homeSetting->instagram_url) }}" 
                           class="w-full border border-gray-300 p-2.5 text-sm focus:border-batik-gold focus:outline-none">
                </div>
                <div class="md:col-span-2">
                    <label class="flex items-center gap-2 text-sm font-medium text-gray-700">
                        <input type="checkbox" name="instagram_is_active" value="1" 
                               {{ old('instagram_is_active', $homeSetting->instagram_is_active) ? 'checked' : '' }}>
                        Aktifkan Instagram Section
                    </label>
                </div>
            </div>
        </div>

        <!-- ============================================ -->
        <!-- 5. MAP SECTION -->
        <!-- ============================================ -->
        <div class="bg-white border border-gray-200 p-6 mb-6">
            <h2 class="font-playfair text-xl font-bold text-sogan border-b border-gray-200 pb-3 mb-4">6. Google Maps</h2>
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div class="md:col-span-2">
                    <label class="block text-sm font-medium text-gray-700 mb-1">Map Title</label>
                    <input type="text" name="map_title" value="{{ old('map_title', $homeSetting->map_title) }}" 
                           class="w-full border border-gray-300 p-2.5 text-sm focus:border-batik-gold focus:outline-none">
                </div>
                <div class="md:col-span-2">
                    <label class="block text-sm font-medium text-gray-700 mb-1">Address</label>
                    <textarea name="map_address" rows="2" 
                              class="w-full border border-gray-300 p-2.5 text-sm focus:border-batik-gold focus:outline-none">{{ old('map_address', $homeSetting->map_address) }}</textarea>
                </div>
                <div class="md:col-span-2">
                    <label class="block text-sm font-medium text-gray-700 mb-1">Map URL (Google Maps Embed)</label>
                    <input type="text" name="map_url" value="{{ old('map_url', $homeSetting->map_url) }}" 
                           class="w-full border border-gray-300 p-2.5 text-sm focus:border-batik-gold focus:outline-none" placeholder="https://www.google.com/maps/embed?pb=...">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Button Text</label>
                    <input type="text" name="map_button_text" value="{{ old('map_button_text', $homeSetting->map_button_text) }}" 
                           class="w-full border border-gray-300 p-2.5 text-sm focus:border-batik-gold focus:outline-none">
                </div>
                <div class="md:col-span-2">
                    <label class="block text-sm font-medium text-gray-700 mb-1">Description</label>
                    <textarea name="map_description" rows="2" 
                              class="w-full border border-gray-300 p-2.5 text-sm focus:border-batik-gold focus:outline-none">{{ old('map_description', $homeSetting->map_description) }}</textarea>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Operational Hours</label>
                    <input type="text" name="map_operational_hours" value="{{ old('map_operational_hours', $homeSetting->map_operational_hours) }}" 
                           class="w-full border border-gray-300 p-2.5 text-sm focus:border-batik-gold focus:outline-none">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Closed Day</label>
                    <input type="text" name="map_closed_day" value="{{ old('map_closed_day', $homeSetting->map_closed_day) }}" 
                           class="w-full border border-gray-300 p-2.5 text-sm focus:border-batik-gold focus:outline-none">
                </div>
                <div class="md:col-span-2">
                    <label class="flex items-center gap-2 text-sm font-medium text-gray-700">
                        <input type="checkbox" name="map_is_active" value="1" 
                               {{ old('map_is_active', $homeSetting->map_is_active) ? 'checked' : '' }}>
                        Aktifkan Map Section
                    </label>
                </div>
            </div>
        </div>

        

        <!-- ============================================ -->
        <!-- 7. STATUS HOME -->
        <!-- ============================================ -->
        <div class="bg-white border border-gray-200 p-6 mb-6">
            <h2 class="font-playfair text-xl font-bold text-sogan border-b border-gray-200 pb-3 mb-4">7. Status Halaman Home</h2>
            
            <div class="flex items-center gap-2">
                <input type="checkbox" name="is_active" value="1" 
                       {{ old('is_active', $homeSetting->is_active) ? 'checked' : '' }}>
                <label class="text-sm font-medium text-gray-700">Aktifkan Halaman Home</label>
            </div>
        </div>

        <!-- Submit -->
        <div class="flex justify-end gap-3 border-t border-gray-200 pt-6">
            <a href="{{ route('admin.home-settings.index') }}" class="px-6 py-2.5 border border-gray-300 text-gray-700 text-sm hover:bg-gray-50 transition">
                Batal
            </a>
            <button type="submit" class="px-8 py-2.5 bg-sogan hover:bg-dark-brown text-white text-sm font-medium transition">
                Simpan Semua Perubahan
            </button>
        </div>
    </form>
</div>
@endsection