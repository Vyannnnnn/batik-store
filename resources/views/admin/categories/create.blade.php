@extends('layouts.admin')

@section('title', 'Tambah Kategori')

@section('content')
<div class="max-w-3xl mx-auto">
    <div class="border-b border-gray-200 pb-4 mb-6 flex justify-between items-center">
        <div>
            <h1 class="font-playfair text-2xl font-bold text-sogan">Tambah Kategori</h1>
            <p class="text-sm text-gray-400 mt-1">Buat kategori baru untuk dropdown di form.</p>
        </div>
        <a href="{{ route('admin.categories.index') }}" class="text-sm text-gray-400 hover:text-sogan transition">
            ← Kembali
        </a>
    </div>

    @if($errors->any())
        <div class="mb-6 bg-red-50 border-l-4 border-red-500 p-4 text-sm text-red-700">
            <ul class="list-disc list-inside">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.categories.store') }}" method="POST">
        @csrf

        <div class="bg-white border border-gray-200 p-6 mb-6">
            <div class="grid grid-cols-1 gap-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Nama Kategori <span class="text-red-500">*</span></label>
                    <input type="text" name="name" value="{{ old('name') }}" 
                           class="w-full border border-gray-300 p-2.5 text-sm focus:border-batik-gold focus:outline-none"
                           placeholder="Contoh: Produk, Kemasan, Proses" required>
                    <p class="text-xs text-gray-400 mt-1">Nama kategori akan muncul di dropdown form.</p>
                </div>

                <div>
                    <label class="flex items-center gap-2 text-sm font-medium text-gray-700">
                        <input type="checkbox" name="is_active" value="1" {{ old('is_active', true) ? 'checked' : '' }}>
                        Aktifkan Kategori
                    </label>
                    <p class="text-xs text-gray-400 mt-1">Kategori yang tidak aktif tidak muncul di dropdown.</p>
                </div>
            </div>
        </div>

        <div class="flex justify-end gap-3 border-t border-gray-200 pt-6">
            <a href="{{ route('admin.categories.index') }}" class="px-6 py-2.5 border border-gray-300 text-gray-700 text-sm hover:bg-gray-50 transition">
                Batal
            </a>
            <button type="submit" class="px-8 py-2.5 bg-sogan hover:bg-dark-brown text-white text-sm font-medium transition">
                Simpan Kategori
            </button>
        </div>
    </form>
</div>
@endsection