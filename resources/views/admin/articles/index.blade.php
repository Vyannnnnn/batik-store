@extends('layouts.admin')

@section('title', 'Kelola Artikel')

@section('content')
<div class="space-y-6">
    <!-- Header -->
    <div class="flex justify-between items-center">
        <div>
            <h1 class="font-playfair text-3xl font-bold text-sogan">Kelola Artikel Edukasi</h1>
            <p class="text-sm text-gray-500">Tulis, perbarui, atau hapus artikel edukasi budaya dan higienitas Anda.</p>
        </div>
        <a href="{{ route('admin.articles.create') }}" class="bg-sogan hover:bg-dark-brown text-white px-4 py-2.5 rounded-lg font-semibold transition-colors flex items-center gap-2">
            <span>+</span> Tulis Artikel Baru
        </a>
    </div>

    <!-- Articles Table Card -->
    <div class="bg-white rounded-xl border border-batik-gold/20 shadow-sm overflow-hidden">
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3.5 text-left text-xs font-semibold text-batik-gold uppercase tracking-wider">Foto Sampul</th>
                        <th class="px-6 py-3.5 text-left text-xs font-semibold text-batik-gold uppercase tracking-wider">Judul Artikel</th>
                        <th class="px-6 py-3.5 text-left text-xs font-semibold text-batik-gold uppercase tracking-wider">Kategori</th>
                        <th class="px-6 py-3.5 text-left text-xs font-semibold text-batik-gold uppercase tracking-wider">Tanggal Dibuat</th>
                        <th class="px-6 py-3.5 text-right text-xs font-semibold text-batik-gold uppercase tracking-wider">Aksi</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-100">
                    @forelse($articles as $art)
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="w-16 h-10 rounded border border-gray-200 overflow-hidden bg-gray-50">
                                    @if($art->image_path)
                                        @if(Str::startsWith($art->image_path, 'http') || Str::startsWith($art->image_path, 'storage/'))
                                            <img src="{{ asset($art->image_path) }}" alt="{{ $art->title }}" class="w-full h-full object-cover">
                                        @else
                                            <img src="{{ asset('storage/' . $art->image_path) }}" alt="{{ $art->title }}" class="w-full h-full object-cover">
                                        @endif
                                    @else
                                        <div class="w-full h-full flex items-center justify-center text-xs text-gray-400">📖</div>
                                    @endif
                                </div>
                            </td>
                            <td class="px-6 py-4">
                                <div class="text-sm font-semibold text-dark-brown max-w-md truncate">{{ $art->title }}</div>
                                <div class="text-xs text-gray-400 max-w-md truncate">{{ $art->slug }}</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span class="px-2.5 py-1 text-xs font-semibold rounded-full bg-ivory text-sogan border border-batik-gold/30 uppercase tracking-wider">
                                    {{ str_replace('_', ' ', $art->category) }}
                                </span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                {{ $art->created_at->format('d M Y, H:i') }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                <div class="flex justify-end gap-3">
                                    <a href="{{ route('admin.articles.edit', $art->id) }}" class="text-indigo-600 hover:text-indigo-900 bg-indigo-50 hover:bg-indigo-100 px-3 py-1 rounded transition-colors font-medium">Edit</a>
                                    
                                    <form action="{{ route('admin.articles.destroy', $art->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus artikel ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-600 hover:text-red-900 bg-red-50 hover:bg-red-100 px-3 py-1 rounded transition-colors font-medium">Hapus</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="px-6 py-12 text-center text-sm text-gray-400">
                                Belum ada data artikel. Klik "+ Tulis Artikel Baru" untuk menambahkan.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        
        <!-- Pagination Links -->
        @if($articles->hasPages())
            <div class="px-6 py-4 border-t border-gray-100">
                {{ $articles->links() }}
            </div>
        @endif
    </div>
</div>
@endsection
