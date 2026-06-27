@extends('layouts.admin')

@section('title', 'Tulis Artikel Baru')

@section('content')
<div class="space-y-6 max-w-4xl mx-auto">
    <!-- Header -->
    <div class="flex items-center gap-3">
        <a href="{{ route('admin.articles.index') }}" class="text-gray-400 hover:text-sogan transition-colors font-medium">← Kembali</a>
        <div>
            <h1 class="font-playfair text-3xl font-bold text-sogan">Tulis Artikel Baru</h1>
            <p class="text-sm text-gray-500">Isi formulir berikut untuk menerbitkan artikel edukasi baru.</p>
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
        <form action="{{ route('admin.articles.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <!-- Judul Artikel -->
                <div class="md:col-span-2">
                    <label for="title" class="block text-sm font-semibold text-dark-brown mb-2">Judul Artikel <span class="text-red-500">*</span></label>
                    <input type="text" name="title" id="title" required value="{{ old('title') }}"
                        class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-batik-gold focus:border-batik-gold text-sm"
                        placeholder="Masukkan judul artikel yang menarik">
                </div>

                <!-- Kategori -->
                <div>
                    <label for="category" class="block text-sm font-semibold text-dark-brown mb-2">Kategori <span class="text-red-500">*</span></label>
                    <select name="category" id="category" required
                        class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-batik-gold focus:border-batik-gold text-sm bg-white">
                        <option value="" disabled selected>-- Pilih Kategori --</option>
                        <option value="keramik_dinoyo" {{ old('category') === 'keramik_dinoyo' ? 'selected' : '' }}>Kampung Keramik Dinoyo</option>
                        <option value="batik_malang" {{ old('category') === 'batik_malang' ? 'selected' : '' }}>Batik Malang</option>
                        <option value="topeng_malangan" {{ old('category') === 'topeng_malangan' ? 'selected' : '' }}>Topeng Malangan</option>
                        <option value="higienitas" {{ old('category') === 'higienitas' ? 'selected' : '' }}>Higienitas Alat Makan</option>
                    </select>
                </div>
            </div>

            <!-- Foto Sampul -->
            <div>
                <label for="image" class="block text-sm font-semibold text-dark-brown mb-2">Foto Sampul Artikel (Max 2MB)</label>
                <input type="file" name="image" id="image" accept="image/*"
                    class="w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-xs file:font-semibold file:bg-ivory file:text-sogan hover:file:bg-batik-gold/20 file:cursor-pointer border border-gray-300 rounded-lg py-1.5 px-3">
            </div>

            <!-- Isi Artikel -->
            <div>
                <label for="content" class="block text-sm font-semibold text-dark-brown mb-2">Konten Artikel <span class="text-red-500">*</span></label>
                <textarea name="content" id="content" rows="12" required
                    class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-batik-gold focus:border-batik-gold text-sm font-sans"
                    placeholder="Tuliskan artikel lengkap di sini...">{{ old('content') }}</textarea>
            </div>

            <!-- Submit Button -->
            <div class="flex justify-end gap-3 border-t border-gray-100 pt-6">
                <a href="{{ route('admin.articles.index') }}" 
                    class="px-5 py-2.5 border border-gray-300 text-gray-700 rounded-lg font-semibold text-sm hover:bg-gray-50 transition-colors">
                    Batalkan
                </a>
                <button type="submit" 
                    class="px-6 py-2.5 bg-sogan hover:bg-dark-brown text-white rounded-lg font-semibold text-sm transition-colors">
                    Terbitkan Artikel
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
