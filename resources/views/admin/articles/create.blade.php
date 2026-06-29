@extends('layouts.admin')

@section('title', 'Tulis Artikel Baru')

@section('content')
<div class="max-w-4xl mx-auto space-y-6">
    <!-- Header -->
    <div class="flex items-center gap-3">
        <a href="{{ route('admin.articles.index') }}" class="text-gray-400 hover:text-sogan transition-colors">← Kembali</a>
        <div>
            <h1 class="font-playfair text-2xl font-bold text-sogan">Tulis Artikel Baru</h1>
            <p class="text-sm text-gray-500">Tambahkan artikel edukasi baru.</p>
        </div>
    </div>

    @if($errors->any())
        <div class="bg-red-50 border-l-4 border-red-500 p-4 text-sm text-red-700">
            <ul class="list-disc list-inside">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.articles.store') }}" method="POST" enctype="multipart/form-data" class="bg-white border border-gray-200 p-6 space-y-6">
        @csrf

        <div class="grid grid-cols-1 gap-4">
            <!-- Judul -->
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Judul Artikel <span class="text-red-500">*</span></label>
                <input type="text" name="title" value="{{ old('title') }}" 
                       class="w-full border border-gray-300 p-2.5 text-sm focus:border-batik-gold focus:outline-none" required>
            </div>

            <!-- Kategori - DARI DATABASE categories -->
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Kategori <span class="text-red-500">*</span></label>
                <select name="category_id" class="w-full border border-gray-300 p-2.5 text-sm focus:border-batik-gold focus:outline-none bg-white">
                    <option value="">Pilih Kategori</option>
                    @foreach($categories as $cat)
                        <option value="{{ $cat->id }}" {{ old('category_id') == $cat->id ? 'selected' : '' }}>
                            {{ $cat->name }}
                        </option>
                    @endforeach
                </select>
                <p class="text-xs text-gray-400 mt-1">
                    Kelola kategori di <a href="{{ route('admin.categories.index') }}" class="text-batik-gold hover:underline">Menu Kategori</a>.
                </p>
            </div>

            <!-- Content -->
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Konten <span class="text-red-500">*</span></label>
                <textarea name="content" rows="8" class="w-full border border-gray-300 p-2.5 text-sm focus:border-batik-gold focus:outline-none" required>{{ old('content') }}</textarea>
            </div>

            <!-- Image -->
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Foto Sampul</label>
                <input type="file" name="image" accept="image/*" class="w-full border border-gray-300 p-2 text-sm focus:border-batik-gold focus:outline-none">
                <p class="text-xs text-gray-400 mt-1">Max 2MB (JPG, PNG, WEBP)</p>
            </div>

            <!-- Published -->
            <div>
                <label class="flex items-center gap-2 text-sm font-medium text-gray-700">
                    <input type="checkbox" name="is_published" value="1" {{ old('is_published', true) ? 'checked' : '' }}>
                    Publikasikan Artikel
                </label>
            </div>
        </div>

        <div class="flex justify-end gap-3 border-t border-gray-200 pt-6">
            <a href="{{ route('admin.articles.index') }}" class="px-6 py-2.5 border border-gray-300 text-gray-700 text-sm hover:bg-gray-50 transition">Batal</a>
            <button type="submit" class="px-8 py-2.5 bg-sogan hover:bg-dark-brown text-white text-sm font-medium transition">Simpan Artikel</button>
        </div>
    </form>
</div>
@endsection