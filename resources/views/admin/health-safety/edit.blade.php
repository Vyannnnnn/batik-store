@extends('layouts.admin')

@section('title', 'Edit Kesehatan & Keamanan')

@section('content')
<div class="max-w-5xl mx-auto">
    <div class="border-b border-gray-200 pb-4 mb-6 flex justify-between items-center">
        <div>
            <h1 class="font-playfair text-2xl font-bold text-sogan">Edit Kesehatan & Keamanan</h1>
            <p class="text-sm text-gray-400 mt-1">Ubah konten bagian Kesehatan & Keamanan</p>
        </div>
        <a href="{{ route('admin.health-safety.index') }}" class="text-sm text-gray-400 hover:text-sogan transition">
            ← Kembali
        </a>
    </div>

    @if(session('success'))
        <div class="mb-6 bg-green-50 border-l-4 border-green-500 p-4 text-sm text-green-700">
            ✅ {{ session('success') }}
        </div>
    @endif

    @if($errors->any())
        <div class="mb-6 bg-red-50 border-l-4 border-red-500 p-4 text-sm text-red-700">
            <ul class="list-disc list-inside">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.health-safety.update', $data->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <!-- Content -->
        <div class="bg-white border border-gray-200 p-6 mb-6">
            <h2 class="font-playfair text-xl font-bold text-sogan border-b border-gray-200 pb-3 mb-4">Konten</h2>
            
            <div class="grid grid-cols-1 gap-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Badge</label>
                    <input type="text" name="badge" value="{{ old('badge', $data->badge) }}" 
                           class="w-full border border-gray-300 p-2.5 text-sm focus:border-batik-gold focus:outline-none" 
                           placeholder="Kesehatan & Keamanan">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Title</label>
                    <input type="text" name="title" value="{{ old('title', $data->title) }}" 
                           class="w-full border border-gray-300 p-2.5 text-sm focus:border-batik-gold focus:outline-none"
                           placeholder="Higienitas Alat Makan">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Description</label>
                    <textarea name="description" rows="5" 
                              class="w-full border border-gray-300 p-2.5 text-sm focus:border-batik-gold focus:outline-none">{{ old('description', $data->description) }}</textarea>
                </div>
            </div>
        </div>

        <!-- Features -->
        <div class="bg-white border border-gray-200 p-6 mb-6">
            <h2 class="font-playfair text-xl font-bold text-sogan border-b border-gray-200 pb-3 mb-4">Features (Checklist)</h2>
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                @php
                    $defaultFeatures = ['Non-porous', 'Lead-free', 'Anti Bakteri', 'Mudah Dibersihkan'];
                    $features = old('features', $data->features ?? $defaultFeatures);
                @endphp
                
                @foreach($defaultFeatures as $index => $default)
                    <div>
                        <label class="flex items-center gap-2 text-sm text-gray-700">
                            <input type="checkbox" name="features[]" value="{{ $default }}"
                                   {{ in_array($default, $features) ? 'checked' : '' }}>
                            {{ $default }}
                        </label>
                    </div>
                @endforeach
                
                <!-- Custom feature -->
                <div class="md:col-span-2 mt-2">
                    <label class="block text-sm font-medium text-gray-700 mb-1">Tambahkan Feature Lain</label>
                    <input type="text" name="features[]" class="w-full border border-gray-300 p-2.5 text-sm focus:border-batik-gold focus:outline-none" placeholder="Feature tambahan...">
                </div>
            </div>
            <p class="text-xs text-gray-400 mt-2">
                <i class="fas fa-info-circle"></i> 
                Centang atau isi features yang ingin ditampilkan
            </p>
        </div>

        <!-- Image -->
        <div class="bg-white border border-gray-200 p-6 mb-6">
            <h2 class="font-playfair text-xl font-bold text-sogan border-b border-gray-200 pb-3 mb-4">Gambar</h2>
            
            <div class="grid grid-cols-1 gap-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Gambar</label>
                    @if($data->image && file_exists(public_path($data->image)))
                        <div class="mb-3">
                            <img src="{{ asset($data->image) }}" alt="Health Safety" 
                                 class="w-48 h-48 object-cover border border-gray-200">
                        </div>
                    @endif
                    <input type="file" name="image" accept="image/*" 
                           class="w-full border border-gray-300 p-2 text-sm focus:border-batik-gold focus:outline-none">
                    <p class="text-xs text-gray-400 mt-1">Max 2MB (JPG, PNG, WEBP)</p>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Alt Text (untuk SEO)</label>
                    <input type="text" name="image_alt" value="{{ old('image_alt', $data->image_alt) }}" 
                           class="w-full border border-gray-300 p-2.5 text-sm focus:border-batik-gold focus:outline-none"
                           placeholder="Kesehatan & Keamanan Alat Makan">
                </div>
            </div>
        </div>

        <!-- Button -->
        <div class="bg-white border border-gray-200 p-6 mb-6">
            <h2 class="font-playfair text-xl font-bold text-sogan border-b border-gray-200 pb-3 mb-4">Tombol</h2>
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Button Text</label>
                    <input type="text" name="button_text" value="{{ old('button_text', $data->button_text) }}" 
                           class="w-full border border-gray-300 p-2.5 text-sm focus:border-batik-gold focus:outline-none"
                           placeholder="Baca Selengkapnya">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Button Link</label>
                    <input type="text" name="button_link" value="{{ old('button_link', $data->button_link) }}" 
                           class="w-full border border-gray-300 p-2.5 text-sm focus:border-batik-gold focus:outline-none"
                           placeholder="/artikel/kesehatan">
                </div>
            </div>
        </div>

        <!-- Status -->
        <div class="bg-white border border-gray-200 p-6 mb-6">
            <div class="flex items-center gap-2">
                <input type="checkbox" name="is_active" value="1" 
                       {{ old('is_active', $data->is_active) ? 'checked' : '' }}>
                <label class="text-sm font-medium text-gray-700">Aktifkan Section</label>
            </div>
        </div>

        <!-- Submit -->
        <div class="flex justify-end gap-3 border-t border-gray-200 pt-6">
            <a href="{{ route('admin.health-safety.index') }}" class="px-6 py-2.5 border border-gray-300 text-gray-700 text-sm hover:bg-gray-50 transition">
                Batal
            </a>
            <button type="submit" class="px-8 py-2.5 bg-sogan hover:bg-dark-brown text-white text-sm font-medium transition flex items-center gap-2">
                <i class="fas fa-save"></i>
                Simpan Perubahan
            </button>
        </div>
    </form>
</div>
@endsection