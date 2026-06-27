@extends('layouts.admin')

@section('title', 'Edit Artikel')

@section('content')
<div class="space-y-6 max-w-4xl mx-auto">
    <!-- Header -->
    <div class="flex items-center gap-3">
        <a href="{{ route('admin.articles.index') }}" class="text-gray-400 hover:text-sogan transition-colors font-medium">← Kembali</a>
        <div>
            <h1 class="font-playfair text-3xl font-bold text-sogan">Edit Artikel</h1>
            <p class="text-sm text-gray-500">Ubah formulir berikut untuk memperbarui artikel edukasi.</p>
        </div>
    </div>

    <!-- Error Alert -->
    @if($errors->any())
        <div class="bg-red-50 border-l-4 border-red-500 p-4 rounded text-sm text-red-700 shadow-sm">
            <span class="font-bold">Mohon perbaiki kesalahan berikut:</span>
            <ul class="list-disc pl-5 mt-1">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <!-- Form Card -->
    <div class="bg-white p-8 rounded-xl border border-batik-gold/20 shadow-sm">
        <form action="{{ route('admin.articles.update', $article->id) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf
            @method('PUT')
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <!-- Judul Artikel -->
                <div class="md:col-span-2">
                    <label for="title" class="block text-sm font-semibold text-dark-brown mb-2">Judul Artikel <span class="text-red-500">*</span></label>
                    <input type="text" name="title" id="title" required value="{{ old('title', $article->title) }}"
                        class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-batik-gold focus:border-batik-gold text-sm"
                        placeholder="Masukkan judul artikel yang menarik">
                </div>

                <!-- Kategori -->
                <div>
                    <label for="category" class="block text-sm font-semibold text-dark-brown mb-2">Kategori <span class="text-red-500">*</span></label>
                    <select name="category" id="category" required
                        class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-batik-gold focus:border-batik-gold text-sm bg-white">
                        <option value="" disabled>-- Pilih Kategori --</option>
                        <option value="keramik_dinoyo" {{ old('category', $article->category) === 'keramik_dinoyo' ? 'selected' : '' }}>Kampung Keramik Dinoyo</option>
                        <option value="batik_malang" {{ old('category', $article->category) === 'batik_malang' ? 'selected' : '' }}>Batik Malang</option>
                        <option value="topeng_malangan" {{ old('category', $article->category) === 'topeng_malangan' ? 'selected' : '' }}>Topeng Malangan</option>
                        <option value="higienitas" {{ old('category', $article->category) === 'higienitas' ? 'selected' : '' }}>Higienitas Alat Makan</option>
                    </select>
                </div>
            </div>

            <!-- Foto Sampul -->
            <div>
                <label for="image" class="block text-sm font-semibold text-dark-brown mb-2">Ganti Foto Sampul (Opsional, Max 2MB)</label>
                <input type="file" name="image" id="image" accept="image/*"
                    class="w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-xs file:font-semibold file:bg-ivory file:text-sogan hover:file:bg-batik-gold/20 file:cursor-pointer border border-gray-300 rounded-lg py-1.5 px-3">
            </div>

            <!-- Tampilan Gambar Sekarang -->
            @if($article->image_path)
                <div>
                    <span class="block text-sm font-semibold text-dark-brown mb-2">Foto Sampul Sekarang:</span>
                    <div class="w-64 h-36 border border-gray-200 rounded-lg overflow-hidden bg-gray-50">
                        @if(Str::startsWith($article->image_path, 'http') || Str::startsWith($article->image_path, 'storage/'))
                            <img src="{{ asset($article->image_path) }}" alt="{{ $article->title }}" class="w-full h-full object-cover">
                        @else
                            <img src="{{ asset('storage/' . $article->image_path) }}" alt="{{ $article->title }}" class="w-full h-full object-cover">
                        @endif
                    </div>
                </div>
            @endif

            <!-- Isi Artikel -->
            <div>
                <label for="content" class="block text-sm font-semibold text-dark-brown mb-2">Konten Artikel <span class="text-red-500">*</span></label>
                <textarea name="content" id="content" rows="12" required
                    class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-batik-gold focus:border-batik-gold text-sm font-sans"
                    placeholder="Tuliskan artikel lengkap di sini...">{{ old('content', $article->content) }}</textarea>
            </div>

            <!-- Submit Button -->
            <div class="flex justify-end gap-3 border-t border-gray-100 pt-6">
                <a href="{{ route('admin.articles.index') }}" 
                    class="px-5 py-2.5 border border-gray-300 text-gray-700 rounded-lg font-semibold text-sm hover:bg-gray-50 transition-colors">
                    Batalkan
                </a>
                <button type="submit" 
                    class="px-6 py-2.5 bg-sogan hover:bg-dark-brown text-white rounded-lg font-semibold text-sm transition-colors">
                    Simpan Perubahan
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
