@extends('layouts.admin')

@section('title', 'Pengaturan Kontak')

@section('content')
<div class="space-y-6">
    <!-- Header -->
    <div class="flex justify-between items-center">
        <div>
            <h1 class="font-playfair text-3xl font-bold text-sogan">Pengaturan Kontak</h1>
            <p class="text-sm text-gray-500">Kelola konten halaman Kontak.</p>
        </div>
        <a href="{{ route('admin.contact-settings.edit', $contact->id ?? 1) }}" 
           class="bg-sogan hover:bg-dark-brown text-white px-4 py-2.5 font-semibold transition-colors flex items-center gap-2">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
            </svg>
            Edit Pengaturan
        </a>
    </div>

    <!-- Alert Messages -->
    @if(session('success'))
        <div class="bg-green-50 border-l-4 border-green-500 p-4 text-sm text-green-700 shadow-sm flex items-center gap-2">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
            {{ session('success') }}
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

    <!-- Preview Cards -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <!-- Header Preview -->
        <div class="bg-white border border-batik-gold/20 shadow-sm overflow-hidden">
            <div class="p-4 border-b border-gray-100 bg-ivory/30">
                <h3 class="font-playfair text-sm font-bold text-sogan">1. Header</h3>
            </div>
            <div class="p-4 space-y-2 text-sm">
                <div><span class="text-xs text-gray-400">Title</span><br><span class="font-semibold">{{ $contact->header_title ?? '-' }}</span></div>
                <div><span class="text-xs text-gray-400">Subtitle</span><br><span class="font-semibold">{{ $contact->header_subtitle ?? '-' }}</span></div>
                <div><span class="text-xs text-gray-400">Description</span><br><span class="text-gray-600">{{ Str::limit($contact->header_description ?? '-', 80) }}</span></div>
            </div>
        </div>

        <!-- Alamat Preview -->
        <div class="bg-white border border-batik-gold/20 shadow-sm overflow-hidden">
            <div class="p-4 border-b border-gray-100 bg-ivory/30">
                <h3 class="font-playfair text-sm font-bold text-sogan">2. Alamat</h3>
            </div>
            <div class="p-4 space-y-2 text-sm">
                <div><span class="text-xs text-gray-400">Title</span><br><span class="font-semibold">{{ $contact->address_title ?? '-' }}</span></div>
                <div><span class="text-xs text-gray-400">Alamat</span><br><span class="text-gray-600">{{ Str::limit($contact->address ?? '-', 80) }}</span></div>
            </div>
        </div>

        <!-- Instagram Preview -->
        <div class="bg-white border border-batik-gold/20 shadow-sm overflow-hidden">
            <div class="p-4 border-b border-gray-100 bg-ivory/30">
                <h3 class="font-playfair text-sm font-bold text-sogan">3. Instagram</h3>
            </div>
            <div class="p-4 space-y-2 text-sm">
                <div><span class="text-xs text-gray-400">Title</span><br><span class="font-semibold">{{ $contact->instagram_title ?? '-' }}</span></div>
                <div><span class="text-xs text-gray-400">Username</span><br><span class="font-semibold">{{ $contact->instagram_username ?? '-' }}</span></div>
                <div><span class="text-xs text-gray-400">Description</span><br><span class="text-gray-600">{{ $contact->instagram_description ?? '-' }}</span></div>
            </div>
        </div>

        <!-- Google Form Preview -->
        <div class="bg-white border border-batik-gold/20 shadow-sm overflow-hidden">
            <div class="p-4 border-b border-gray-100 bg-ivory/30">
                <h3 class="font-playfair text-sm font-bold text-sogan">4. Google Form</h3>
            </div>
            <div class="p-4 space-y-2 text-sm">
                <div><span class="text-xs text-gray-400">Title</span><br><span class="font-semibold">{{ $contact->form_title ?? '-' }}</span></div>
                <div><span class="text-xs text-gray-400">Button Text</span><br><span class="font-semibold">{{ $contact->form_button_text ?? '-' }}</span></div>
                <div><span class="text-xs text-gray-400">Footer</span><br><span class="text-gray-600">{{ Str::limit($contact->form_footer_text ?? '-', 60) }}</span></div>
                <div><span class="text-xs text-gray-400">Link</span><br><span class="text-gray-600 text-xs font-mono">Diambil dari Home Settings</span></div>
            </div>
        </div>
    </div>

    <!-- Info Maps -->
    <div class="bg-white border border-batik-gold/20 shadow-sm overflow-hidden">
        <div class="p-4 border-b border-gray-100 bg-ivory/30">
            <h3 class="font-playfair text-sm font-bold text-sogan">5. Google Maps</h3>
        </div>
        <div class="p-4">
            <p class="text-sm text-gray-600">
                 Data Maps diambil dari <strong>Pengaturan Home</strong>. 
                <a href="{{ route('admin.home-settings.edit', $homeSetting->id ?? 1) }}" class="text-batik-gold hover:underline">
                    Klik di sini untuk mengubah
                </a>
            </p>
        </div>
    </div>
</div>
@endsection