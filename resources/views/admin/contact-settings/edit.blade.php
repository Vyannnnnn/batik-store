@extends('layouts.admin')

@section('title', 'Edit Pengaturan Kontak')

@section('content')
<div class="max-w-6xl mx-auto space-y-6">
    <!-- Header -->
    <div class="flex items-center gap-3">
        <a href="{{ route('admin.contact-settings.index') }}" class="text-gray-400 hover:text-sogan transition-colors flex items-center gap-1">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/></svg>
            Kembali
        </a>
        <div>
            <h1 class="font-playfair text-3xl font-bold text-sogan">Edit Pengaturan Kontak</h1>
            <p class="text-sm text-gray-500">Ubah semua konten halaman Kontak.</p>
        </div>
    </div>

    <!-- Alert -->
    @if(session('success'))
        <div class="bg-green-50 border-l-4 border-green-500 p-4 text-sm text-green-700 shadow-sm">{{ session('success') }}</div>
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

    <form action="{{ route('admin.contact-settings.update', $contact->id) }}" method="POST" class="space-y-8">
        @csrf
        @method('PUT')

        <!-- 1. HEADER -->
        <div class="bg-white p-8 border border-batik-gold/20 shadow-sm">
            <h2 class="font-playfair text-2xl font-bold text-sogan mb-6 border-b border-gray-100 pb-3">1. Header</h2>
            <div class="grid grid-cols-1 gap-6">
                <div>
                    <label class="block text-sm font-semibold text-dark-brown mb-2">Title</label>
                    <input type="text" name="header_title" value="{{ old('header_title', $contact->header_title) }}" 
                           class="w-full px-4 py-2.5 border border-gray-300 text-sm focus:outline-none focus:ring-2 focus:ring-batik-gold rounded">
                </div>
                <div>
                    <label class="block text-sm font-semibold text-dark-brown mb-2">Subtitle</label>
                    <input type="text" name="header_subtitle" value="{{ old('header_subtitle', $contact->header_subtitle) }}" 
                           class="w-full px-4 py-2.5 border border-gray-300 text-sm focus:outline-none focus:ring-2 focus:ring-batik-gold rounded">
                </div>
                <div>
                    <label class="block text-sm font-semibold text-dark-brown mb-2">Description</label>
                    <textarea name="header_description" rows="3" 
                              class="w-full px-4 py-2.5 border border-gray-300 text-sm focus:outline-none focus:ring-2 focus:ring-batik-gold rounded">{{ old('header_description', $contact->header_description) }}</textarea>
                </div>
            </div>
        </div>

        <!-- 2. ALAMAT -->
        <div class="bg-white p-8 border border-batik-gold/20 shadow-sm">
            <h2 class="font-playfair text-2xl font-bold text-sogan mb-6 border-b border-gray-100 pb-3">2. Alamat</h2>
            <div class="grid grid-cols-1 gap-6">
                <div>
                    <label class="block text-sm font-semibold text-dark-brown mb-2">Title</label>
                    <input type="text" name="address_title" value="{{ old('address_title', $contact->address_title) }}" 
                           class="w-full px-4 py-2.5 border border-gray-300 text-sm focus:outline-none focus:ring-2 focus:ring-batik-gold rounded">
                </div>
                <div>
                    <label class="block text-sm font-semibold text-dark-brown mb-2">Alamat</label>
                    <textarea name="address" rows="4" 
                              class="w-full px-4 py-2.5 border border-gray-300 text-sm focus:outline-none focus:ring-2 focus:ring-batik-gold rounded">{{ old('address', $contact->address) }}</textarea>
                </div>
            </div>
        </div>

        <!-- 3. INSTAGRAM -->
        <div class="bg-white p-8 border border-batik-gold/20 shadow-sm">
            <h2 class="font-playfair text-2xl font-bold text-sogan mb-6 border-b border-gray-100 pb-3">3. Instagram</h2>
            <div class="grid grid-cols-1 gap-6">
                <div>
                    <label class="block text-sm font-semibold text-dark-brown mb-2">Title</label>
                    <input type="text" name="instagram_title" value="{{ old('instagram_title', $contact->instagram_title) }}" 
                           class="w-full px-4 py-2.5 border border-gray-300 text-sm focus:outline-none focus:ring-2 focus:ring-batik-gold rounded">
                </div>
                <div>
                    <label class="block text-sm font-semibold text-dark-brown mb-2">Username</label>
                    <input type="text" name="instagram_username" value="{{ old('instagram_username', $contact->instagram_username) }}" 
                           class="w-full px-4 py-2.5 border border-gray-300 text-sm focus:outline-none focus:ring-2 focus:ring-batik-gold rounded" placeholder="@batikura_plate">
                </div>
                <div>
                    <label class="block text-sm font-semibold text-dark-brown mb-2">URL</label>
                    <input type="url" name="instagram_url" value="{{ old('instagram_url', $contact->instagram_url) }}" 
                           class="w-full px-4 py-2.5 border border-gray-300 text-sm focus:outline-none focus:ring-2 focus:ring-batik-gold rounded" placeholder="https://instagram.com/...">
                </div>
                <div>
                    <label class="block text-sm font-semibold text-dark-brown mb-2">Description</label>
                    <input type="text" name="instagram_description" value="{{ old('instagram_description', $contact->instagram_description) }}" 
                           class="w-full px-4 py-2.5 border border-gray-300 text-sm focus:outline-none focus:ring-2 focus:ring-batik-gold rounded" placeholder="Follow untuk update produk terbaru">
                </div>
            </div>
        </div>

        <!-- 4. GOOGLE FORM (Tanpa form_link) -->
        <div class="bg-white p-8 border border-batik-gold/20 shadow-sm">
            <h2 class="font-playfair text-2xl font-bold text-sogan mb-6 border-b border-gray-100 pb-3">4. Google Form</h2>
            
            <!-- Info Link dari Home Settings -->
            <div class="bg-ivory/30 p-4 mb-6">
                <p class="text-sm text-gray-600">
                    ⚠️ <strong>Link Google Form</strong> diambil dari Pengaturan Home → Product Booking Link.
                    <a href="{{ route('admin.home-settings.edit', $homeSetting->id ?? 1) }}" class="text-batik-gold hover:underline">
                        Klik di sini untuk mengubah
                    </a>
                </p>
                @if($homeSetting && $homeSetting->product_booking_link)
                    <p class="text-xs text-gray-500 mt-1">🔗 Link saat ini: {{ $homeSetting->product_booking_link }}</p>
                @else
                    <p class="text-xs text-red-500 mt-1">⚠️ Belum diatur</p>
                @endif
            </div>
            
            <div class="grid grid-cols-1 gap-6">
                <div>
                    <label class="block text-sm font-semibold text-dark-brown mb-2">Title</label>
                    <input type="text" name="form_title" value="{{ old('form_title', $contact->form_title) }}" 
                           class="w-full px-4 py-2.5 border border-gray-300 text-sm focus:outline-none focus:ring-2 focus:ring-batik-gold rounded">
                </div>
                <div>
                    <label class="block text-sm font-semibold text-dark-brown mb-2">Description</label>
                    <textarea name="form_description" rows="3" 
                              class="w-full px-4 py-2.5 border border-gray-300 text-sm focus:outline-none focus:ring-2 focus:ring-batik-gold rounded">{{ old('form_description', $contact->form_description) }}</textarea>
                </div>
                <div>
                    <label class="block text-sm font-semibold text-dark-brown mb-2">Button Text</label>
                    <input type="text" name="form_button_text" value="{{ old('form_button_text', $contact->form_button_text) }}" 
                           class="w-full px-4 py-2.5 border border-gray-300 text-sm focus:outline-none focus:ring-2 focus:ring-batik-gold rounded" placeholder="Book Now →">
                </div>
                <div>
                    <label class="block text-sm font-semibold text-dark-brown mb-2">Footer Text</label>
                    <input type="text" name="form_footer_text" value="{{ old('form_footer_text', $contact->form_footer_text) }}" 
                           class="w-full px-4 py-2.5 border border-gray-300 text-sm focus:outline-none focus:ring-2 focus:ring-batik-gold rounded" placeholder="* Klik untuk melakukan pemesanan">
                </div>
            </div>
        </div>

        <!-- 5. MAPS - Data dari Home Settings (Read Only) -->
        <div class="bg-white p-8 border border-batik-gold/20 shadow-sm">
            <h2 class="font-playfair text-2xl font-bold text-sogan mb-6 border-b border-gray-100 pb-3">5. Google Maps</h2>
            
            <div class="bg-ivory/30 p-4 mb-6">
                <p class="text-sm text-gray-600">
                    ⚠️ <strong>Data Maps</strong> diambil dari Pengaturan Home.
                    <a href="{{ route('admin.home-settings.edit', $homeSetting->id ?? 1) }}" class="text-batik-gold hover:underline">
                        Klik di sini untuk mengubah
                    </a>
                </p>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label class="block text-sm font-semibold text-dark-brown mb-2">Title</label>
                    <input type="text" value="{{ $homeSetting->map_title ?? '-' }}" disabled 
                           class="w-full px-4 py-2.5 border border-gray-300 bg-gray-50 text-sm rounded">
                </div>
                <div>
                    <label class="block text-sm font-semibold text-dark-brown mb-2">Alamat</label>
                    <input type="text" value="{{ $homeSetting->map_address ?? '-' }}" disabled 
                           class="w-full px-4 py-2.5 border border-gray-300 bg-gray-50 text-sm rounded">
                </div>
                <div class="col-span-2">
                    <label class="block text-sm font-semibold text-dark-brown mb-2">URL Google Maps</label>
                    <input type="text" value="{{ $homeSetting->map_url ?? '-' }}" disabled 
                           class="w-full px-4 py-2.5 border border-gray-300 bg-gray-50 text-sm font-mono rounded">
                </div>
                <div>
                    <label class="block text-sm font-semibold text-dark-brown mb-2">Jam Operasional</label>
                    <input type="text" value="{{ $homeSetting->map_operational_hours ?? '-' }}" disabled 
                           class="w-full px-4 py-2.5 border border-gray-300 bg-gray-50 text-sm rounded">
                </div>
                <div>
                    <label class="block text-sm font-semibold text-dark-brown mb-2">Hari Tutup</label>
                    <input type="text" value="{{ $homeSetting->map_closed_day ?? '-' }}" disabled 
                           class="w-full px-4 py-2.5 border border-gray-300 bg-gray-50 text-sm rounded">
                </div>
                <div class="col-span-2">
                    <label class="block text-sm font-semibold text-dark-brown mb-2">Deskripsi</label>
                    <textarea rows="2" disabled 
                              class="w-full px-4 py-2.5 border border-gray-300 bg-gray-50 text-sm rounded">{{ $homeSetting->map_description ?? '-' }}</textarea>
                </div>
            </div>
        </div>

        <!-- SUBMIT -->
        <div class="flex justify-end gap-3 border-t border-gray-100 pt-6">
            <a href="{{ route('admin.contact-settings.index') }}" 
               class="px-6 py-2.5 border border-gray-300 text-gray-700 text-sm font-semibold hover:bg-gray-50 transition rounded">
                Batal
            </a>
            <button type="submit" 
                    class="px-8 py-2.5 bg-sogan hover:bg-dark-brown text-white text-sm font-semibold transition rounded flex items-center gap-2">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                Simpan Perubahan
            </button>
        </div>
    </form>
</div>
@endsection