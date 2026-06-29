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

            <!-- Kategori - DARI DATABASE categories -->
            <div>
                <label class="block text-sm font-semibold text-dark-brown mb-2">Kategori</label>
                <select name="category_id" class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-batik-gold focus:border-batik-gold text-sm bg-white">
                    <option value="">Pilih Kategori</option>
                    @foreach($categories as $cat)
                        <option value="{{ $cat->id }}" {{ old('category_id', $gallery->category_id) == $cat->id ? 'selected' : '' }}>
                            {{ $cat->name }}
                        </option>
                    @endforeach
                </select>
                <p class="text-xs text-gray-400 mt-1">
                    Kelola kategori di <a href="{{ route('admin.categories.index') }}" class="text-batik-gold hover:underline">Menu Kategori</a>.
                </p>
            </div>

            <!-- File Gambar (Optional) -->
<!-- File Gambar (Optional) -->
<div>
    <label for="image" class="block text-sm font-semibold text-dark-brown mb-2">Ganti Gambar (Opsional)</label>
    <input type="file" name="image" id="image" accept="image/*"
        class="w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-xs file:font-semibold file:bg-ivory file:text-sogan hover:file:bg-batik-gold/20 file:cursor-pointer border border-gray-300 rounded-lg py-1.5 px-3">
    <p class="text-xs text-gray-400 mt-1">Kosongkan jika tidak ingin mengganti gambar. Max 2MB (JPG, PNG, WEBP)</p>
</div>

<!-- Tampilan Gambar Sekarang -->
<div>
    <span class="block text-sm font-semibold text-dark-brown mb-2">Gambar Sekarang:</span>
    <div class="w-64 h-36 border border-gray-200 rounded-lg overflow-hidden bg-gray-50">
        @php
            $imagePath = $gallery->image_path ?? '';
            $imageUrl = '';
            $fileExists = false;
            
            if (!empty($imagePath)) {
                // Coba berbagai kemungkinan path
                if (str_starts_with($imagePath, 'storage/')) {
                    $imageUrl = asset($imagePath);
                    if (file_exists(public_path($imagePath))) {
                        $fileExists = true;
                    }
                } elseif (str_starts_with($imagePath, 'galleries/')) {
                    $imageUrl = asset('storage/' . $imagePath);
                    if (file_exists(public_path('storage/' . $imagePath))) {
                        $fileExists = true;
                    }
                } else {
                    $imageUrl = asset('storage/' . $imagePath);
                    if (file_exists(public_path('storage/' . $imagePath))) {
                        $fileExists = true;
                    }
                }
                
                // Jika masih tidak ada, coba langsung
                if (!$fileExists && file_exists(public_path($imagePath))) {
                    $fileExists = true;
                    $imageUrl = asset($imagePath);
                }
            }
        @endphp
        @if($fileExists && !empty($imageUrl))
            <img src="{{ $imageUrl }}" alt="{{ $gallery->title }}" class="w-full h-full object-cover">
        @else
            <div class="w-full h-full flex items-center justify-center text-gray-400 text-sm">
                <span>Gambar tidak ditemukan</span>
            </div>
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

            <!-- Status Aktif -->
            <div>
                <label class="flex items-center gap-2 text-sm font-medium text-gray-700">
                    <input type="checkbox" name="is_active" value="1" 
                           {{ old('is_active', $gallery->is_active) ? 'checked' : '' }}>
                    Aktifkan Foto
                </label>
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