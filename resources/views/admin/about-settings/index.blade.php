@extends('layouts.admin')

@section('title', 'Pengaturan About')

@section('content')
<div class="space-y-6">
    <div class="flex justify-between items-center">
        <div>
            <h1 class="font-playfair text-3xl font-bold text-sogan">Pengaturan About</h1>
            <p class="text-sm text-gray-500">Kelola konten halaman Tentang Kami.</p>
        </div>
        <a href="{{ route('admin.about-settings.edit', $about->id ?? 1) }}" class="bg-sogan hover:bg-dark-brown text-white px-4 py-2.5 font-semibold transition-colors flex items-center gap-2">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
            </svg>
            Edit Pengaturan
        </a>
    </div>

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

    <div class="bg-white border border-batik-gold/20 shadow-sm overflow-hidden">
        <div class="p-6 border-b border-gray-100">
            <h2 class="font-playfair text-xl font-bold text-sogan">Preview Konten About</h2>
            <p class="text-sm text-gray-400">Berikut adalah tampilan konten yang sedang aktif di halaman Tentang Kami.</p>
        </div>
        
        <div class="p-6 space-y-6">
            <!-- Hero -->
            <div>
                <h3 class="font-semibold text-sm text-batik-gold uppercase tracking-wider mb-3">1. Hero</h3>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 bg-ivory/30 p-4">
                    <div><p class="text-xs text-gray-400">Title</p><p class="text-sm font-semibold">{{ $about->hero_title ?? '-' }}</p></div>
                    <div><p class="text-xs text-gray-400">Subtitle</p><p class="text-sm font-semibold">{{ $about->hero_subtitle ?? '-' }}</p></div>
                    <div class="col-span-2"><p class="text-xs text-gray-400">Description</p><p class="text-sm">{{ Str::limit($about->hero_description ?? '-', 100) }}</p></div>
                </div>
            </div>

            <!-- Apa Itu Batikura -->
            <div>
                <h3 class="font-semibold text-sm text-batik-gold uppercase tracking-wider mb-3">2. Apa Itu Batikura?</h3>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 bg-ivory/30 p-4">
                    <div><p class="text-xs text-gray-400">Title</p><p class="text-sm font-semibold">{{ $about->apa_title ?? '-' }}</p></div>
                    <div class="col-span-2"><p class="text-xs text-gray-400">Description</p><p class="text-sm">{{ Str::limit($about->apa_description ?? '-', 100) }}</p></div>
                    <div><p class="text-xs text-gray-400">Gambar</p>
                        @if($about->apa_image)
                            <img src="{{ asset('storage/' . $about->apa_image) }}" class="w-24 h-16 object-cover border mt-1">
                        @else
                            <p class="text-sm text-gray-400">Belum ada gambar</p>
                        @endif
                    </div>
                </div>
            </div>

            <!-- Mengapa -->
            <div>
                <h3 class="font-semibold text-sm text-batik-gold uppercase tracking-wider mb-3">3. Mengapa Harus Batikura?</h3>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 bg-ivory/30 p-4">
                    <div><p class="text-xs text-gray-400">Title</p><p class="text-sm font-semibold">{{ $about->mengapa_title ?? '-' }}</p></div>
                    <div class="col-span-2"><p class="text-xs text-gray-400">Description</p><p class="text-sm">{{ Str::limit($about->mengapa_description ?? '-', 100) }}</p></div>
                    <div><p class="text-xs text-gray-400">Poin 1</p><p class="text-sm">{{ $about->mengapa_poin_1 ?? '-' }}</p></div>
                    <div><p class="text-xs text-gray-400">Poin 2</p><p class="text-sm">{{ $about->mengapa_poin_2 ?? '-' }}</p></div>
                    <div><p class="text-xs text-gray-400">Poin 3</p><p class="text-sm">{{ $about->mengapa_poin_3 ?? '-' }}</p></div>
                    <div><p class="text-xs text-gray-400">Gambar</p>
                        @if($about->mengapa_image)
                            <img src="{{ asset('storage/' . $about->mengapa_image) }}" class="w-24 h-16 object-cover border mt-1">
                        @else
                            <p class="text-sm text-gray-400">Belum ada gambar</p>
                        @endif
                    </div>
                </div>
            </div>


            <!-- Timeline -->
            <div>
                <h3 class="font-semibold text-sm text-batik-gold uppercase tracking-wider mb-3">4. Cerita Kami - Timeline</h3>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 bg-ivory/30 p-4">
                    <div><p class="text-xs text-gray-400">Timeline 1 (1950)</p><p class="text-sm">{{ Str::limit($about->cerita_timeline_1 ?? '-', 80) }}</p></div>
                    <div><p class="text-xs text-gray-400">Timeline 2 (1970)</p><p class="text-sm">{{ Str::limit($about->cerita_timeline_2 ?? '-', 80) }}</p></div>
                    <div><p class="text-xs text-gray-400">Timeline 3 (2024)</p><p class="text-sm">{{ Str::limit($about->cerita_timeline_3 ?? '-', 80) }}</p></div>
                    <div><p class="text-xs text-gray-400">Timeline 4 (Masa Depan)</p><p class="text-sm">{{ Str::limit($about->cerita_timeline_4 ?? '-', 80) }}</p></div>
                </div>
            </div>

            
            <!-- Cerita Kami -->
            <div>
                <h3 class="font-semibold text-sm text-batik-gold uppercase tracking-wider mb-3">4.1 Cerita Kami</h3>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 bg-ivory/30 p-4">
                    <div><p class="text-xs text-gray-400">Title</p><p class="text-sm font-semibold">{{ $about->cerita_title ?? '-' }}</p></div>
                    <div class="col-span-2"><p class="text-xs text-gray-400">Paragraf</p><p class="text-sm">{{ Str::limit($about->cerita_paragraf_1 ?? '-', 100) }}</p></div>
                    <div><p class="text-xs text-gray-400">Hashtag</p><p class="text-sm font-semibold">{{ $about->cerita_hashtag ?? '-' }}</p></div>
                </div>
            </div>

            <!-- Proses -->
            <div>
                <h3 class="font-semibold text-sm text-batik-gold uppercase tracking-wider mb-3">5. Proses Pembuatan</h3>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 bg-ivory/30 p-4">
                    <div><p class="text-xs text-gray-400">Title</p><p class="text-sm font-semibold">{{ $about->proses_title ?? '-' }}</p></div>
                    <div><p class="text-xs text-gray-400">Proses 1</p><p class="text-sm">{{ $about->proses_1 ?? '-' }}</p></div>
                    <div><p class="text-xs text-gray-400">Proses 2</p><p class="text-sm">{{ $about->proses_2 ?? '-' }}</p></div>
                    <div><p class="text-xs text-gray-400">Proses 3</p><p class="text-sm">{{ $about->proses_3 ?? '-' }}</p></div>
                    <div><p class="text-xs text-gray-400">Proses 4</p><p class="text-sm">{{ $about->proses_4 ?? '-' }}</p></div>
                </div>
            </div>

            <!-- Nilai -->
            <div>
                <h3 class="font-semibold text-sm text-batik-gold uppercase tracking-wider mb-3">6. Nilai-Nilai Kami</h3>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4 bg-ivory/30 p-4">
                    <div><p class="text-xs text-gray-400">Nilai 1</p><p class="text-sm font-semibold">{{ $about->nilai_1 ?? '-' }}</p></div>
                    <div><p class="text-xs text-gray-400">Nilai 2</p><p class="text-sm font-semibold">{{ $about->nilai_2 ?? '-' }}</p></div>
                    <div><p class="text-xs text-gray-400">Nilai 3</p><p class="text-sm font-semibold">{{ $about->nilai_3 ?? '-' }}</p></div>
                    <div><p class="text-xs text-gray-400">Nilai 4</p><p class="text-sm font-semibold">{{ $about->nilai_4 ?? '-' }}</p></div>
                    <div><p class="text-xs text-gray-400">Nilai 5</p><p class="text-sm font-semibold">{{ $about->nilai_5 ?? '-' }}</p></div>
                    <div><p class="text-xs text-gray-400">Nilai 6</p><p class="text-sm font-semibold">{{ $about->nilai_6 ?? '-' }}</p></div>
                </div>
            </div>

            <!-- Book Now -->
            <div>
                <h3 class="font-semibold text-sm text-batik-gold uppercase tracking-wider mb-3">7. Book Now</h3>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 bg-ivory/30 p-4">
                    <div><p class="text-xs text-gray-400">Title</p><p class="text-sm font-semibold">{{ $about->book_title ?? '-' }}</p></div>
                    <div class="col-span-2"><p class="text-xs text-gray-400">Description</p><p class="text-sm">{{ Str::limit($about->book_description ?? '-', 100) }}</p></div>
                    <div><p class="text-xs text-gray-400">Link</p><p class="text-sm truncate">{{ $about->book_link ?? '-' }}</p></div>
                    <div><p class="text-xs text-gray-400">Button Text</p><p class="text-sm font-semibold">{{ $about->book_button_text ?? '-' }}</p></div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection