@extends('layouts.admin')

@section('title', 'Edit Foto Galeri')

@section('content')
<div class="space-y-6 max-w-2xl mx-auto">
    <!-- Header -->
    <div class="flex items-center gap-3">
        <a href="{{ route('admin.galleries.index') }}" class="text-gray-400 hover:text-sogan transition-colors font-medium">← Kembali</a>
        <div>
            <h1 class="font-playfair text-3xl font-bold text-sogan">Edit Foto Galeri</h1>
            <p class="text-sm text-gray-500">Ubah formulir berikut untuk memperbarui foto galeri.</p>
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
        <form action="{{ route('admin.galleries.update', $gallery->id) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf
            @method('PUT')
            
            <!-- Judul Foto -->
            <div>
                <label for="title" class="block text-sm font-semibold text-dark-brown mb-2">Judul/Label Foto (Opsional)</label>
                <input type="text" name="title" id="title" value="{{ old('title', $gallery->title) }}"
                    class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-batik-gold focus:border-batik-gold text-sm"
                    placeholder="Contoh: Detail piring tampak samping">
            </div>

            <!-- Kategori -->
            <div>
                <label for="category" class="block text-sm font-semibold text-dark-brown mb-2">Kategori Foto <span class="text-red-500">*</span></label>
                <select name="category" id="category" required
                    class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-batik-gold focus:border-batik-gold text-sm bg-white">
                    <option value="" disabled>-- Pilih Kategori --</option>
                    <option value="produk" {{ old('category', $gallery->category) === 'produk' ? 'selected' : '' }}>Foto Produk</option>
                    <option value="kemasan" {{ old('category', $gallery->category) === 'kemasan' ? 'selected' : '' }}>Foto Kemasan</option>
                    <option value="proses" {{ old('category', $gallery->category) === 'proses' ? 'selected' : '' }}>Foto Proses Pembuatan</option>
                </select>
            </div>

            <!-- File Gambar (Optional) -->
            <div>
                <label for="image" class="block text-sm font-semibold text-dark-brown mb-2">Ganti Gambar (Opsional, Max 2MB)</label>
                <input type="file" name="image" id="image" accept="image/*"
                    class="w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-xs file:font-semibold file:bg-ivory file:text-sogan hover:file:bg-batik-gold/20 file:cursor-pointer border border-gray-300 rounded-lg py-1.5 px-3">
            </div>

            <!-- Tampilan Gambar Sekarang -->
            <div>
                <span class="block text-sm font-semibold text-dark-brown mb-2">Gambar Sekarang:</span>
                <div class="w-64 h-36 border border-gray-200 rounded-lg overflow-hidden bg-gray-50">
                    @if(Str::startsWith($gallery->image_path, 'http') || Str::startsWith($gallery->image_path, 'storage/'))
                        <img src="{{ asset($gallery->image_path) }}" alt="{{ $gallery->title }}" class="w-full h-full object-cover">
                    @else
                        <img src="{{ asset('storage/' . $gallery->image_path) }}" alt="{{ $gallery->title }}" class="w-full h-full object-cover">
                    @endif
                </div>
            </div>

            <!-- Deskripsi Singkat -->
            <div>
                <label for="description" class="block text-sm font-semibold text-dark-brown mb-2">Deskripsi Singkat (Opsional)</label>
                <textarea name="description" id="description" rows="3"
                    class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-batik-gold focus:border-batik-gold text-sm"
                    placeholder="Tuliskan keterangan singkat mengenai foto ini...">{{ old('description', $gallery->description) }}</textarea>
            </div>

            <!-- Submit Button -->
            <div class="flex justify-end gap-3 border-t border-gray-100 pt-6">
                <a href="{{ route('admin.galleries.index') }}" 
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
