@extends('layouts.admin')

@section('title', 'Kesehatan & Keamanan')

@section('content')
<div class="space-y-6">
    <!-- Header -->
    <div class="flex justify-between items-center">
        <div>
            <h1 class="font-playfair text-3xl font-bold text-sogan">Kesehatan & Keamanan</h1>
            <p class="text-sm text-gray-500">Kelola konten bagian Kesehatan & Keamanan.</p>
        </div>
        <a href="{{ route('admin.health-safety.edit', $data->id ?? 1) }}" 
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

    <!-- Preview Cards - SAMA SEPERTI CONTACT SETTINGS -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <!-- Card 1: Badge & Title -->
        <div class="bg-white border border-batik-gold/20 shadow-sm overflow-hidden">
            <div class="p-4 border-b border-gray-100 bg-ivory/30">
                <h3 class="font-playfair text-sm font-bold text-sogan">1. Header</h3>
            </div>
            <div class="p-4 space-y-2 text-sm">
                <div><span class="text-xs text-gray-400">Badge</span><br><span class="font-semibold">{{ $data->badge ?? '-' }}</span></div>
                <div><span class="text-xs text-gray-400">Title</span><br><span class="font-semibold">{{ $data->title ?? '-' }}</span></div>
                <div><span class="text-xs text-gray-400">Description</span><br><span class="text-gray-600">{{ Str::limit($data->description ?? '-', 80) }}</span></div>
            </div>
        </div>

        <!-- Card 2: Features -->
        <div class="bg-white border border-batik-gold/20 shadow-sm overflow-hidden">
            <div class="p-4 border-b border-gray-100 bg-ivory/30">
                <h3 class="font-playfair text-sm font-bold text-sogan">2. Features</h3>
            </div>
            <div class="p-4 space-y-2 text-sm">
                @if($data->features)
                    <div class="grid grid-cols-2 gap-2">
                        @foreach($data->features as $feature)
                            @if(!empty($feature))
                                <div class="flex items-center gap-2 text-sm text-gray-700 bg-ivory/30 p-2 border border-batik-gold/5">
                                    <span class="text-batik-gold text-sm">✓</span>
                                    <span class="text-[11px] font-medium text-sogan">{{ $feature }}</span>
                                </div>
                            @endif
                        @endforeach
                    </div>
                @else
                    <span class="text-gray-400">-</span>
                @endif
            </div>
        </div>

        <!-- Card 3: Button -->
        <div class="bg-white border border-batik-gold/20 shadow-sm overflow-hidden">
            <div class="p-4 border-b border-gray-100 bg-ivory/30">
                <h3 class="font-playfair text-sm font-bold text-sogan">3. Tombol</h3>
            </div>
            <div class="p-4 space-y-2 text-sm">
                <div><span class="text-xs text-gray-400">Button Text</span><br><span class="font-semibold">{{ $data->button_text ?? '-' }}</span></div>
                <div><span class="text-xs text-gray-400">Button Link</span><br><span class="text-gray-600 text-sm">{{ $data->button_link ?? '-' }}</span></div>
            </div>
        </div>

        <!-- Card 4: Status & Gambar -->
        <div class="bg-white border border-batik-gold/20 shadow-sm overflow-hidden">
            <div class="p-4 border-b border-gray-100 bg-ivory/30">
                <h3 class="font-playfair text-sm font-bold text-sogan">4. Status & Gambar</h3>
            </div>
            <div class="p-4 space-y-2 text-sm">
                <div>
                    <span class="text-xs text-gray-400">Status</span><br>
                    <span class="inline-block px-2 py-1 text-xs rounded {{ $data->is_active ? 'bg-green-100 text-green-700' : 'bg-gray-100 text-gray-500' }}">
                        {{ $data->is_active ? 'Aktif' : 'Nonaktif' }}
                    </span>
                </div>
                <div>
                    <span class="text-xs text-gray-400">Gambar</span><br>
                    @if($data->image && file_exists(public_path($data->image)))
                        <div class="mt-1">
                            <img src="{{ asset($data->image) }}" alt="{{ $data->image_alt ?? 'Kesehatan & Keamanan' }}" 
                                 class="w-32 h-20 object-cover border border-gray-200">
                            @if($data->image_alt)
                                <p class="text-xs text-gray-400 mt-1">Alt: {{ $data->image_alt }}</p>
                            @endif
                        </div>
                    @else
                        <span class="text-gray-400">Belum ada gambar</span>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <!-- Info Note -->
    <div class="bg-white border border-batik-gold/20 shadow-sm overflow-hidden">
        <div class="p-4 border-b border-gray-100 bg-ivory/30">
            <h3 class="font-playfair text-sm font-bold text-sogan">Informasi</h3>
        </div>
        <div class="p-4">
            <p class="text-sm text-gray-600">
                Konten ini akan ditampilkan di halaman utama pada bagian <strong>Kesehatan & Keamanan</strong>.
            </p>
        </div>
    </div>
</div>
@endsection