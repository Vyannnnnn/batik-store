@extends('layouts.admin')

@section('title', 'Edit Pengaturan About')

@section('content')
<div class="max-w-6xl mx-auto space-y-6">
    <div class="flex items-center gap-3">
        <a href="{{ route('admin.about-settings.index') }}" class="text-gray-400 hover:text-sogan transition-colors">← Kembali</a>
        <div>
            <h1 class="font-playfair text-3xl font-bold text-sogan">Edit Pengaturan About</h1>
            <p class="text-sm text-gray-500">Ubah semua konten halaman Tentang Kami.</p>
        </div>
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

    <form action="{{ route('admin.about-settings.update', $about->id) }}" method="POST" enctype="multipart/form-data" class="space-y-8">
        @csrf
        @method('PUT')

        <!-- 1. HERO -->
        <div class="bg-white p-8 border border-batik-gold/20 shadow-sm">
            <h2 class="font-playfair text-2xl font-bold text-sogan mb-6 border-b border-gray-100 pb-3">1. Hero</h2>
            <div class="grid grid-cols-1 gap-6">
                <div>
                    <label class="block text-sm font-semibold text-dark-brown mb-2">Title</label>
                    <input type="text" name="hero_title" value="{{ old('hero_title', $about->hero_title) }}" class="w-full px-4 py-2.5 border border-gray-300 text-sm focus:outline-none focus:ring-2 focus:ring-batik-gold">
                </div>
                <div>
                    <label class="block text-sm font-semibold text-dark-brown mb-2">Subtitle</label>
                    <input type="text" name="hero_subtitle" value="{{ old('hero_subtitle', $about->hero_subtitle) }}" class="w-full px-4 py-2.5 border border-gray-300 text-sm focus:outline-none focus:ring-2 focus:ring-batik-gold">
                </div>
                <div>
                    <label class="block text-sm font-semibold text-dark-brown mb-2">Description</label>
                    <textarea name="hero_description" rows="3" class="w-full px-4 py-2.5 border border-gray-300 text-sm focus:outline-none focus:ring-2 focus:ring-batik-gold">{{ old('hero_description', $about->hero_description) }}</textarea>
                </div>
            </div>
        </div>

        <!-- 2. APA ITU BATIKURA -->
        <div class="bg-white p-8 border border-batik-gold/20 shadow-sm">
            <h2 class="font-playfair text-2xl font-bold text-sogan mb-6 border-b border-gray-100 pb-3">2. Apa Itu Batikura?</h2>
            <div class="grid grid-cols-1 gap-6">
                <div>
                    <label class="block text-sm font-semibold text-dark-brown mb-2">Title</label>
                    <input type="text" name="apa_title" value="{{ old('apa_title', $about->apa_title) }}" class="w-full px-4 py-2.5 border border-gray-300 text-sm focus:outline-none focus:ring-2 focus:ring-batik-gold">
                </div>
                <div>
                    <label class="block text-sm font-semibold text-dark-brown mb-2">Description</label>
                    <textarea name="apa_description" rows="4" class="w-full px-4 py-2.5 border border-gray-300 text-sm focus:outline-none focus:ring-2 focus:ring-batik-gold">{{ old('apa_description', $about->apa_description) }}</textarea>
                </div>
                <div>
                    <label class="block text-sm font-semibold text-dark-brown mb-2">Gambar</label>
                    @if($about->apa_image)
                        <div class="mb-2"><img src="{{ asset('storage/' . $about->apa_image) }}" class="w-32 h-20 object-cover border"></div>
                    @endif
                    <input type="file" name="apa_image" accept="image/*" class="w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:border-0 file:text-xs file:font-semibold file:bg-ivory file:text-sogan hover:file:bg-batik-gold/20 file:cursor-pointer border border-gray-300 py-1.5 px-3">
                </div>
            </div>
        </div>

        <!-- 3. MENGAPA -->
        <div class="bg-white p-8 border border-batik-gold/20 shadow-sm">
            <h2 class="font-playfair text-2xl font-bold text-sogan mb-6 border-b border-gray-100 pb-3">3. Mengapa Harus Batikura?</h2>
            <div class="grid grid-cols-1 gap-6">
                <div>
                    <label class="block text-sm font-semibold text-dark-brown mb-2">Title</label>
                    <input type="text" name="mengapa_title" value="{{ old('mengapa_title', $about->mengapa_title) }}" class="w-full px-4 py-2.5 border border-gray-300 text-sm focus:outline-none focus:ring-2 focus:ring-batik-gold">
                </div>
                <div>
                    <label class="block text-sm font-semibold text-dark-brown mb-2">Description</label>
                    <textarea name="mengapa_description" rows="3" class="w-full px-4 py-2.5 border border-gray-300 text-sm focus:outline-none focus:ring-2 focus:ring-batik-gold">{{ old('mengapa_description', $about->mengapa_description) }}</textarea>
                </div>
                <div>
                    <label class="block text-sm font-semibold text-dark-brown mb-2">Poin 1</label>
                    <input type="text" name="mengapa_poin_1" value="{{ old('mengapa_poin_1', $about->mengapa_poin_1) }}" class="w-full px-4 py-2.5 border border-gray-300 text-sm focus:outline-none focus:ring-2 focus:ring-batik-gold">
                </div>
                <div>
                    <label class="block text-sm font-semibold text-dark-brown mb-2">Poin 2</label>
                    <input type="text" name="mengapa_poin_2" value="{{ old('mengapa_poin_2', $about->mengapa_poin_2) }}" class="w-full px-4 py-2.5 border border-gray-300 text-sm focus:outline-none focus:ring-2 focus:ring-batik-gold">
                </div>
                <div>
                    <label class="block text-sm font-semibold text-dark-brown mb-2">Poin 3</label>
                    <input type="text" name="mengapa_poin_3" value="{{ old('mengapa_poin_3', $about->mengapa_poin_3) }}" class="w-full px-4 py-2.5 border border-gray-300 text-sm focus:outline-none focus:ring-2 focus:ring-batik-gold">
                </div>
                <div>
                    <label class="block text-sm font-semibold text-dark-brown mb-2">Gambar</label>
                    @if($about->mengapa_image)
                        <div class="mb-2"><img src="{{ asset('storage/' . $about->mengapa_image) }}" class="w-32 h-20 object-cover border"></div>
                    @endif
                    <input type="file" name="mengapa_image" accept="image/*" class="w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:border-0 file:text-xs file:font-semibold file:bg-ivory file:text-sogan hover:file:bg-batik-gold/20 file:cursor-pointer border border-gray-300 py-1.5 px-3">
                </div>
            </div>
        </div>
<!-- 4. CERITA KAMI - TIMELINE -->
<div class="bg-white p-8 border border-batik-gold/20 shadow-sm">
    <h2 class="font-playfair text-2xl font-bold text-sogan mb-6 border-b border-gray-100 pb-3">4. Cerita Kami - Timeline</h2>
    <div class="grid grid-cols-1 gap-6">
        <div>
            <label class="block text-sm font-semibold text-dark-brown mb-2">Timeline 1 (1950)</label>
            <textarea name="cerita_timeline_1" rows="3" class="w-full px-4 py-2.5 border border-gray-300 text-sm focus:outline-none focus:ring-2 focus:ring-batik-gold">{{ old('cerita_timeline_1', $about->cerita_timeline_1) }}</textarea>
        </div>
        <div>
            <label class="block text-sm font-semibold text-dark-brown mb-2">Timeline 2 (1970)</label>
            <textarea name="cerita_timeline_2" rows="3" class="w-full px-4 py-2.5 border border-gray-300 text-sm focus:outline-none focus:ring-2 focus:ring-batik-gold">{{ old('cerita_timeline_2', $about->cerita_timeline_2) }}</textarea>
        </div>
        <div>
            <label class="block text-sm font-semibold text-dark-brown mb-2">Timeline 3 (2024)</label>
            <textarea name="cerita_timeline_3" rows="3" class="w-full px-4 py-2.5 border border-gray-300 text-sm focus:outline-none focus:ring-2 focus:ring-batik-gold">{{ old('cerita_timeline_3', $about->cerita_timeline_3) }}</textarea>
        </div>
        <div>
            <label class="block text-sm font-semibold text-dark-brown mb-2">Timeline 4 (Masa Depan)</label>
            <textarea name="cerita_timeline_4" rows="3" class="w-full px-4 py-2.5 border border-gray-300 text-sm focus:outline-none focus:ring-2 focus:ring-batik-gold">{{ old('cerita_timeline_4', $about->cerita_timeline_4) }}</textarea>
        </div>
    </div>
</div>

      <!-- 4.1 CERITA KAMI -->
<div class="bg-white p-8 border border-batik-gold/20 shadow-sm">
    <h2 class="font-playfair text-2xl font-bold text-sogan mb-6 border-b border-gray-100 pb-3">4.1 Cerita Kami</h2>
    <div class="grid grid-cols-1 gap-6">
        <div>
            <label class="block text-sm font-semibold text-dark-brown mb-2">Title</label>
            <input type="text" name="cerita_title" value="{{ old('cerita_title', $about->cerita_title) }}" class="w-full px-4 py-2.5 border border-gray-300 text-sm focus:outline-none focus:ring-2 focus:ring-batik-gold">
        </div>
        <div>
            <label class="block text-sm font-semibold text-dark-brown mb-2">Paragraf 1</label>
            <textarea name="cerita_paragraf_1" rows="3" class="w-full px-4 py-2.5 border border-gray-300 text-sm focus:outline-none focus:ring-2 focus:ring-batik-gold">{{ old('cerita_paragraf_1', $about->cerita_paragraf_1) }}</textarea>
        </div>
        <div>
            <label class="block text-sm font-semibold text-dark-brown mb-2">Hashtag</label>
            <input type="text" name="cerita_hashtag" value="{{ old('cerita_hashtag', $about->cerita_hashtag) }}" class="w-full px-4 py-2.5 border border-gray-300 text-sm focus:outline-none focus:ring-2 focus:ring-batik-gold">
        </div>
    </div>
</div>

        <!-- 5. PROSES -->
        <div class="bg-white p-8 border border-batik-gold/20 shadow-sm">
            <h2 class="font-playfair text-2xl font-bold text-sogan mb-6 border-b border-gray-100 pb-3">5. Proses Pembuatan</h2>
            <div class="grid grid-cols-1 gap-6">
                <div>
                    <label class="block text-sm font-semibold text-dark-brown mb-2">Title</label>
                    <input type="text" name="proses_title" value="{{ old('proses_title', $about->proses_title) }}" class="w-full px-4 py-2.5 border border-gray-300 text-sm focus:outline-none focus:ring-2 focus:ring-batik-gold">
                </div>
                <div>
                    <label class="block text-sm font-semibold text-dark-brown mb-2">Proses 1</label>
                    <input type="text" name="proses_1" value="{{ old('proses_1', $about->proses_1) }}" class="w-full px-4 py-2.5 border border-gray-300 text-sm focus:outline-none focus:ring-2 focus:ring-batik-gold">
                </div>
                <div>
                    <label class="block text-sm font-semibold text-dark-brown mb-2">Proses 2</label>
                    <input type="text" name="proses_2" value="{{ old('proses_2', $about->proses_2) }}" class="w-full px-4 py-2.5 border border-gray-300 text-sm focus:outline-none focus:ring-2 focus:ring-batik-gold">
                </div>
                <div>
                    <label class="block text-sm font-semibold text-dark-brown mb-2">Proses 3</label>
                    <input type="text" name="proses_3" value="{{ old('proses_3', $about->proses_3) }}" class="w-full px-4 py-2.5 border border-gray-300 text-sm focus:outline-none focus:ring-2 focus:ring-batik-gold">
                </div>
                <div>
                    <label class="block text-sm font-semibold text-dark-brown mb-2">Proses 4</label>
                    <input type="text" name="proses_4" value="{{ old('proses_4', $about->proses_4) }}" class="w-full px-4 py-2.5 border border-gray-300 text-sm focus:outline-none focus:ring-2 focus:ring-batik-gold">
                </div>
            </div>
        </div>

        <!-- 6. NILAI -->
        <div class="bg-white p-8 border border-batik-gold/20 shadow-sm">
            <h2 class="font-playfair text-2xl font-bold text-sogan mb-6 border-b border-gray-100 pb-3">6. Nilai-Nilai Kami</h2>
            <div class="grid grid-cols-1 gap-6">
                <div>
                    <label class="block text-sm font-semibold text-dark-brown mb-2">Title</label>
                    <input type="text" name="nilai_title" value="{{ old('nilai_title', $about->nilai_title) }}" class="w-full px-4 py-2.5 border border-gray-300 text-sm focus:outline-none focus:ring-2 focus:ring-batik-gold">
                </div>
                <div>
                    <label class="block text-sm font-semibold text-dark-brown mb-2">Nilai 1</label>
                    <input type="text" name="nilai_1" value="{{ old('nilai_1', $about->nilai_1) }}" class="w-full px-4 py-2.5 border border-gray-300 text-sm focus:outline-none focus:ring-2 focus:ring-batik-gold">
                </div>
                <div>
                    <label class="block text-sm font-semibold text-dark-brown mb-2">Nilai 2</label>
                    <input type="text" name="nilai_2" value="{{ old('nilai_2', $about->nilai_2) }}" class="w-full px-4 py-2.5 border border-gray-300 text-sm focus:outline-none focus:ring-2 focus:ring-batik-gold">
                </div>
                <div>
                    <label class="block text-sm font-semibold text-dark-brown mb-2">Nilai 3</label>
                    <input type="text" name="nilai_3" value="{{ old('nilai_3', $about->nilai_3) }}" class="w-full px-4 py-2.5 border border-gray-300 text-sm focus:outline-none focus:ring-2 focus:ring-batik-gold">
                </div>
                <div>
                    <label class="block text-sm font-semibold text-dark-brown mb-2">Nilai 4</label>
                    <input type="text" name="nilai_4" value="{{ old('nilai_4', $about->nilai_4) }}" class="w-full px-4 py-2.5 border border-gray-300 text-sm focus:outline-none focus:ring-2 focus:ring-batik-gold">
                </div>
                <div>
                    <label class="block text-sm font-semibold text-dark-brown mb-2">Nilai 5</label>
                    <input type="text" name="nilai_5" value="{{ old('nilai_5', $about->nilai_5) }}" class="w-full px-4 py-2.5 border border-gray-300 text-sm focus:outline-none focus:ring-2 focus:ring-batik-gold">
                </div>
                <div>
                    <label class="block text-sm font-semibold text-dark-brown mb-2">Nilai 6</label>
                    <input type="text" name="nilai_6" value="{{ old('nilai_6', $about->nilai_6) }}" class="w-full px-4 py-2.5 border border-gray-300 text-sm focus:outline-none focus:ring-2 focus:ring-batik-gold">
                </div>
            </div>
        </div>

        <!-- 7. BOOK NOW -->
        <div class="bg-white p-8 border border-batik-gold/20 shadow-sm">
            <h2 class="font-playfair text-2xl font-bold text-sogan mb-6 border-b border-gray-100 pb-3">7. Book Now</h2>
            <div class="grid grid-cols-1 gap-6">
                <div>
                    <label class="block text-sm font-semibold text-dark-brown mb-2">Title</label>
                    <input type="text" name="book_title" value="{{ old('book_title', $about->book_title) }}" class="w-full px-4 py-2.5 border border-gray-300 text-sm focus:outline-none focus:ring-2 focus:ring-batik-gold">
                </div>
                <div>
                    <label class="block text-sm font-semibold text-dark-brown mb-2">Description</label>
                    <textarea name="book_description" rows="3" class="w-full px-4 py-2.5 border border-gray-300 text-sm focus:outline-none focus:ring-2 focus:ring-batik-gold">{{ old('book_description', $about->book_description) }}</textarea>
                </div>
                <div>
                    <label class="block text-sm font-semibold text-dark-brown mb-2">Link Google Form</label>
                    <input type="text" name="book_link" value="{{ old('book_link', $about->book_link) }}" class="w-full px-4 py-2.5 border border-gray-300 text-sm focus:outline-none focus:ring-2 focus:ring-batik-gold" placeholder="https://forms.gle/...">
                </div>
                <div>
                    <label class="block text-sm font-semibold text-dark-brown mb-2">Button Text</label>
                    <input type="text" name="book_button_text" value="{{ old('book_button_text', $about->book_button_text) }}" class="w-full px-4 py-2.5 border border-gray-300 text-sm focus:outline-none focus:ring-2 focus:ring-batik-gold">
                </div>
            </div>
        </div>

        <!-- SUBMIT -->
        <div class="flex justify-end gap-3 border-t border-gray-100 pt-6">
            <a href="{{ route('admin.about-settings.index') }}" class="px-6 py-2.5 border border-gray-300 text-gray-700 text-sm font-semibold hover:bg-gray-50 transition">Batal</a>
            <button type="submit" class="px-8 py-2.5 bg-sogan hover:bg-dark-brown text-white text-sm font-semibold transition">Simpan Perubahan</button>
        </div>
    </form>
</div>
@endsection