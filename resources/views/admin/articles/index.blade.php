@extends('layouts.admin')

@section('title', 'Kelola Artikel')

@section('content')
<div class="space-y-6">
    <!-- Header -->
    <div class="flex justify-between items-center">
        <div>
            <h1 class="font-playfair text-3xl font-bold text-sogan">Kelola Artikel Edukasi</h1>
            <p class="text-sm text-gray-500">Tulis, perbarui, atau hapus artikel edukasi budaya dan higienitas.</p>
        </div>
        <a href="{{ route('admin.articles.create') }}" 
           class="bg-sogan hover:bg-dark-brown text-white px-4 py-2.5 font-semibold transition-colors flex items-center gap-2">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
            </svg>
            Tulis Artikel Baru
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

    <!-- Filter Kategori -->
    @if(isset($categories) && $categories->count())
    <div class="flex flex-wrap gap-2">
        <a href="{{ route('admin.articles.index') }}" 
           class="px-4 py-2 text-xs font-medium {{ !request('category') ? 'bg-sogan text-white' : 'bg-gray-100 text-gray-600 hover:bg-gray-200' }} transition rounded">
            Semua
        </a>
        @foreach($categories as $cat)
            <a href="{{ route('admin.articles.index', ['category' => $cat->id]) }}" 
               class="px-4 py-2 text-xs font-medium {{ request('category') == $cat->id ? 'bg-sogan text-white' : 'bg-gray-100 text-gray-600 hover:bg-gray-200' }} transition rounded">
                {{ $cat->name }}
            </a>
        @endforeach
    </div>
    @endif

    <!-- Articles Table -->
    <div class="bg-white border border-batik-gold/20 shadow-sm overflow-hidden">
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
                        <tr class="hover:bg-ivory/30 transition-colors">
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="w-12 h-12 border border-gray-200 overflow-hidden bg-gray-50">
                                    @php
                                        $imgPath = $art->image_path ?? '';
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
                                            } elseif (str_starts_with($imgPath, 'articles/')) {
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
                                        <img src="{{ $imgUrl }}" alt="{{ $art->title }}" class="w-full h-full object-cover">
                                    @else
                                        <div class="w-full h-full flex items-center justify-center text-gray-300 text-xs">No Image</div>
                                    @endif
                                </div>
                            </td>
                            <td class="px-6 py-4">
                                <div class="text-sm font-semibold text-dark-brown max-w-md truncate">{{ $art->title }}</div>
                                <div class="text-xs text-gray-400 max-w-md truncate">{{ $art->slug }}</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                @if($art->category)
                                    <span class="inline-block px-2.5 py-1 text-xs font-semibold rounded-full bg-ivory text-sogan border border-batik-gold/30 uppercase tracking-wider">
                                        {{ $art->category->name }}
                                    </span>
                                @else
                                    <span class="inline-block px-2.5 py-1 text-xs font-semibold rounded-full bg-gray-100 text-gray-400">
                                        Uncategorized
                                    </span>
                                @endif
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                {{ $art->created_at->format('d M Y, H:i') }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-right">
                                <div class="flex justify-end gap-2">
                                    <!-- Edit -->
                                    <a href="{{ route('admin.articles.edit', $art->id) }}" 
                                       class="text-indigo-600 hover:text-indigo-900 bg-indigo-50 hover:bg-indigo-100 px-3 py-1 rounded transition-colors text-xs">
                                        Edit
                                    </a>
                                    
                                    <!-- Delete -->
                                    <form action="{{ route('admin.articles.destroy', $art->id) }}" method="POST" class="inline" onsubmit="return confirm('Apakah Anda yakin ingin menghapus artikel ini?')">
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
                            <td colspan="5" class="px-6 py-12 text-center text-sm text-gray-400">
                                Belum ada artikel. 
                                <a href="{{ route('admin.articles.create') }}" class="text-batik-gold hover:underline">Tulis artikel pertama</a>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        
        <!-- Pagination -->
        @if(method_exists($articles, 'hasPages') && $articles->hasPages())
            <div class="px-6 py-4 border-t border-gray-100">
                {{ $articles->links() }}
            </div>
        @endif
    </div>
</div>
@endsection