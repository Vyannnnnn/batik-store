@extends('layouts.admin')

@section('title', 'Kelola Produk')

@section('content')
<div class="space-y-6">
    <!-- Header -->
    <div class="flex justify-between items-center">
        <div>
            <h1 class="font-playfair text-3xl font-bold text-sogan">Kelola Produk</h1>
            <p class="text-sm text-gray-500">Tambah, ubah, atau hapus produk mangkuk keramik batik.</p>
        </div>
        <a href="{{ route('admin.products.create') }}" 
           class="bg-sogan hover:bg-dark-brown text-white px-4 py-2.5 font-semibold transition-colors flex items-center gap-2">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
            </svg>
            Tambah Produk
        </a>
    </div>

    <!-- Alert Messages -->
    @if(session('success'))
        <div class="bg-green-50 border-l-4 border-green-500 p-4 text-sm text-green-700 shadow-sm flex items-center gap-2">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
            {{ session('success') }}
        </div>
    @endif

    @if(session('error'))
        <div class="bg-red-50 border-l-4 border-red-500 p-4 text-sm text-red-700 shadow-sm flex items-center gap-2">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
            {{ session('error') }}
        </div>
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

    <!-- Product Table -->
    <div class="bg-white border border-batik-gold/20 shadow-sm overflow-hidden">
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3.5 text-left text-xs font-semibold text-batik-gold uppercase tracking-wider">Gambar</th>
                        <th class="px-6 py-3.5 text-left text-xs font-semibold text-batik-gold uppercase tracking-wider">Nama Produk</th>
                        <th class="px-6 py-3.5 text-left text-xs font-semibold text-batik-gold uppercase tracking-wider">Motif</th>
                        <th class="px-6 py-3.5 text-left text-xs font-semibold text-batik-gold uppercase tracking-wider">Ukuran</th>
                        <th class="px-6 py-3.5 text-left text-xs font-semibold text-batik-gold uppercase tracking-wider">Harga</th>
                        <th class="px-6 py-3.5 text-right text-xs font-semibold text-batik-gold uppercase tracking-wider">Aksi</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-100">
                    @forelse($products as $prod)
                        <tr class="hover:bg-ivory/30 transition-colors">
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="w-12 h-12 border border-gray-200 overflow-hidden bg-gray-50">
                                    @php
                                        $imgPath = $prod->image_path ?? '';
                                        $imgUrl = '';
                                        $fileExists = false;
                                        
                                        if (!empty($imgPath)) {
                                            if (str_starts_with($imgPath, 'http')) {
                                                $imgUrl = $imgPath;
                                                $fileExists = true;
                                            } elseif (str_starts_with($imgPath, 'storage/')) {
                                                $imgUrl = asset($imgPath);
                                                if (file_exists(public_path($imgPath))) {
                                                    $fileExists = true;
                                                }
                                            } elseif (str_starts_with($imgPath, 'products/')) {
                                                $imgUrl = asset('storage/' . $imgPath);
                                                if (file_exists(public_path('storage/' . $imgPath))) {
                                                    $fileExists = true;
                                                }
                                            } else {
                                                $imgUrl = asset('storage/' . $imgPath);
                                                if (file_exists(public_path('storage/' . $imgPath))) {
                                                    $fileExists = true;
                                                }
                                            }
                                            if (!$fileExists && file_exists(public_path($imgPath))) {
                                                $fileExists = true;
                                                $imgUrl = asset($imgPath);
                                            }
                                        }
                                    @endphp
                                    @if($fileExists && !empty($imgUrl))
                                        <img src="{{ $imgUrl }}" alt="{{ $prod->name }}" class="w-full h-full object-cover">
                                    @else
                                        <div class="w-full h-full flex items-center justify-center text-gray-300 text-xs">No Image</div>
                                    @endif
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm font-semibold text-dark-brown">{{ $prod->name }}</div>
                                <div class="text-xs text-gray-400 truncate max-w-xs">{{ $prod->slug }}</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                {{ $prod->motif ?? '-' }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                {{ $prod->size ?? '-' }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-semibold text-sogan">
                                Rp {{ number_format($prod->price, 0, ',', '.') }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-right">
                                <div class="flex justify-end gap-2">
                                    <!-- Edit -->
                                    <a href="{{ route('admin.products.edit', $prod->id) }}" 
                                       class="text-indigo-600 hover:text-indigo-900 bg-indigo-50 hover:bg-indigo-100 px-3 py-1 rounded transition-colors text-xs">
                                        Edit
                                    </a>
                                    
                                    <!-- Delete -->
                                    <form action="{{ route('admin.products.destroy', $prod->id) }}" method="POST" class="inline" onsubmit="return confirm('Apakah Anda yakin ingin menghapus produk ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-600 hover:text-red-900 bg-red-50 hover:bg-red-100 px-3 py-1 rounded transition-colors text-xs">
                                            Hapus
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="px-6 py-12 text-center text-sm text-gray-400">
                                Belum ada produk. 
                                <a href="{{ route('admin.products.create') }}" class="text-batik-gold hover:underline">Tambah produk pertama</a>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        
        <!-- Pagination -->
        @if(method_exists($products, 'hasPages') && $products->hasPages())
            <div class="px-6 py-4 border-t border-gray-100">
                {{ $products->links() }}
            </div>
        @endif
    </div>
</div>
@endsection