@extends('layouts.admin')

@section('title', 'Kelola Produk')

@section('content')
<div class="space-y-6">
    <!-- Header -->
    <div class="flex justify-between items-center">
        <div>
            <h1 class="font-playfair text-3xl font-bold text-sogan">Kelola Produk</h1>
            <p class="text-sm text-gray-500">Tambah, ubah, atau hapus produk piring keramik batik Anda.</p>
        </div>
        <a href="{{ route('admin.products.create') }}" class="bg-sogan hover:bg-dark-brown text-white px-4 py-2.5 rounded-lg font-semibold transition-colors flex items-center gap-2">
            <span>+</span> Tambah Produk Baru
        </a>
    </div>

    <!-- Product Table Card -->
    <div class="bg-white rounded-xl border border-batik-gold/20 shadow-sm overflow-hidden">
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
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="w-12 h-12 rounded border border-gray-200 overflow-hidden bg-gray-50">
                                    @if(Str::startsWith($prod->image_path, 'http') || Str::startsWith($prod->image_path, 'storage/'))
                                        <img src="{{ asset($prod->image_path) }}" alt="{{ $prod->name }}" class="w-full h-full object-cover">
                                    @else
                                        <img src="{{ asset('storage/' . $prod->image_path) }}" alt="{{ $prod->name }}" class="w-full h-full object-cover">
                                    @endif
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm font-semibold text-dark-brown">{{ $prod->name }}</div>
                                <div class="text-xs text-gray-400 max-w-xs truncate">{{ $prod->slug }}</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                {{ $prod->motif }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                {{ $prod->size }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-semibold text-sogan">
                                Rp {{ number_format($prod->price, 0, ',', '.') }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                <div class="flex justify-end gap-3">
                                    <a href="{{ route('admin.products.edit', $prod->id) }}" class="text-indigo-600 hover:text-indigo-900 bg-indigo-50 hover:bg-indigo-100 px-3 py-1 rounded transition-colors">Edit</a>
                                    
                                    <form action="{{ route('admin.products.destroy', $prod->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus produk ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-600 hover:text-red-900 bg-red-50 hover:bg-red-100 px-3 py-1 rounded transition-colors">Hapus</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="px-6 py-12 text-center text-sm text-gray-400">
                                Belum ada data produk. Klik "+ Tambah Produk Baru" untuk menambahkan.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        
        <!-- Pagination Links -->
        @if($products->hasPages())
            <div class="px-6 py-4 border-t border-gray-100">
                {{ $products->links() }}
            </div>
        @endif
    </div>
</div>
@endsection
