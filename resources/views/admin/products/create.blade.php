@extends('layouts.admin')

@section('title', 'Tambah Produk Baru')

@section('content')
<div class="space-y-6 max-w-4xl mx-auto">
    <!-- Header -->
    <div class="flex items-center gap-3">
        <a href="{{ route('admin.products.index') }}" class="text-gray-400 hover:text-sogan transition-colors">← Kembali</a>
        <div>
            <h1 class="font-playfair text-3xl font-bold text-sogan">Tambah Produk Baru</h1>
            <p class="text-sm text-gray-500">Isi formulir berikut untuk memasukkan piring keramik batik baru ke katalog.</p>
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
        <form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf
            
            <!-- Grid 2 Column -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Nama Produk -->
                <div class="md:col-span-2">
                    <label for="name" class="block text-sm font-semibold text-dark-brown mb-2">Nama Produk <span class="text-red-500">*</span></label>
                    <input type="text" name="name" id="name" required value="{{ old('name') }}"
                        class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-batik-gold focus:border-batik-gold text-sm"
                        placeholder="Contoh: Piring Keramik Motif Kembang Malang">
                </div>

                <!-- Motif -->
                <div>
                    <label for="motif" class="block text-sm font-semibold text-dark-brown mb-2">Motif Batik <span class="text-red-500">*</span></label>
                    <input type="text" name="motif" id="motif" required value="{{ old('motif') }}"
                        class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-batik-gold focus:border-batik-gold text-sm"
                        placeholder="Contoh: Kembang Malang, Candi Badut, Topeng Malangan">
                </div>

                <!-- Ukuran -->
                <div>
                    <label for="size" class="block text-sm font-semibold text-dark-brown mb-2">Ukuran Piring <span class="text-red-500">*</span></label>
                    <input type="text" name="size" id="size" required value="{{ old('size') }}"
                        class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-batik-gold focus:border-batik-gold text-sm"
                        placeholder="Contoh: 20cm, 22cm, 25cm">
                </div>

                <!-- Harga -->
                <div>
                    <label for="price" class="block text-sm font-semibold text-dark-brown mb-2">Harga (Rupiah) <span class="text-red-500">*</span></label>
                    <div class="relative">
                        <span class="absolute inset-y-0 left-0 pl-3.5 flex items-center text-sm font-medium text-gray-500">Rp</span>
                        <input type="number" name="price" id="price" required min="0" value="{{ old('price') }}"
                            class="w-full pl-10 pr-4 py-2.5 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-batik-gold focus:border-batik-gold text-sm"
                            placeholder="150000">
                    </div>
                </div>

                <!-- Gambar Utama -->
                <div>
                    <label for="image" class="block text-sm font-semibold text-dark-brown mb-2">Gambar Produk Utama (Max 2MB) <span class="text-red-500">*</span></label>
                    <input type="file" name="image" id="image" required accept="image/*"
                        class="w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-xs file:font-semibold file:bg-ivory file:text-sogan hover:file:bg-batik-gold/20 file:cursor-pointer border border-gray-300 rounded-lg py-1.5 px-3">
                </div>
            </div>

            <!-- Deskripsi -->
            <div>
                <label for="description" class="block text-sm font-semibold text-dark-brown mb-2">Deskripsi Produk <span class="text-red-500">*</span></label>
                <textarea name="description" id="description" rows="5" required
                    class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-batik-gold focus:border-batik-gold text-sm"
                    placeholder="Tuliskan deskripsi lengkap mengenai detail pembuatan piring, bahan baku, keunikan, dll.">{{ old('description') }}</textarea>
            </div>

            <!-- Integrasi Link Pembelian -->
            <div class="border-t border-gray-100 pt-6 space-y-4">
                <h4 class="font-playfair text-lg font-bold text-sogan">Integrasi Link Pembelian & Hubungi Admin</h4>
                <p class="text-xs text-gray-400">Pemesanan diarahkan ke marketplace eksternal atau langsung ke chat WhatsApp.</p>
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Shopee Link -->
                    <div>
                        <label for="shopee_url" class="block text-sm font-semibold text-dark-brown mb-2">Link Produk Shopee (Opsional)</label>
                        <input type="url" name="shopee_url" id="shopee_url" value="{{ old('shopee_url') }}"
                            class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-batik-gold focus:border-batik-gold text-sm"
                            placeholder="https://shopee.co.id/nama-produk">
                    </div>

                    <!-- Tokopedia Link -->
                    <div>
                        <label for="tokopedia_url" class="block text-sm font-semibold text-dark-brown mb-2">Link Produk Tokopedia (Opsional)</label>
                        <input type="url" name="tokopedia_url" id="tokopedia_url" value="{{ old('tokopedia_url') }}"
                            class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-batik-gold focus:border-batik-gold text-sm"
                            placeholder="https://tokopedia.com/nama-produk">
                    </div>

                    <!-- WhatsApp Custom Text -->
                    <div class="md:col-span-2">
                        <label for="whatsapp_text" class="block text-sm font-semibold text-dark-brown mb-2">Template Pesan WhatsApp (Opsional)</label>
                        <textarea name="whatsapp_text" id="whatsapp_text" rows="2"
                            class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-batik-gold focus:border-batik-gold text-sm"
                            placeholder="Halo Admin, saya tertarik memesan produk ini. Mohon info ketersediaan barang.">{{ old('whatsapp_text') }}</textarea>
                    </div>
                </div>
            </div>

            <!-- Submit Button -->
            <div class="flex justify-end gap-3 border-t border-gray-100 pt-6">
                <a href="{{ route('admin.products.index') }}" 
                    class="px-5 py-2.5 border border-gray-300 text-gray-700 rounded-lg font-semibold text-sm hover:bg-gray-50 transition-colors">
                    Batalkan
                </a>
                <button type="submit" 
                    class="px-6 py-2.5 bg-sogan hover:bg-dark-brown text-white rounded-lg font-semibold text-sm transition-colors">
                    Simpan Produk
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
