@extends('layouts.admin')

@section('title', 'Kelola Galeri')

@section('content')
<div class="space-y-6">
    <!-- Header -->
    <div class="flex justify-between items-center">
        <div>
            <h1 class="font-playfair text-3xl font-bold text-sogan">Kelola Galeri Foto</h1>
            <p class="text-sm text-gray-500">Unggah dan kelola foto produk, kemasan eksklusif, atau proses produksi piring batik Anda.</p>
        </div>
        <a href="{{ route('admin.galleries.create') }}" class="bg-sogan hover:bg-dark-brown text-white px-4 py-2.5 rounded-lg font-semibold transition-colors flex items-center gap-2">
            <span>+</span> Unggah Foto Baru
        </a>
    </div>

    <!-- Gallery Grid Card -->
    <div class="bg-white p-6 rounded-xl border border-batik-gold/20 shadow-sm">
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
            @forelse($galleries as $gal)
                <div class="border border-gray-150 rounded-xl overflow-hidden shadow-xs hover:shadow-md transition-shadow flex flex-col justify-between bg-white relative group">
                    <div>
                        <!-- Category Badge -->
                        <span class="absolute top-2.5 left-2.5 px-2 py-0.5 text-[9px] font-bold rounded-full bg-dark-brown/85 text-batik-gold uppercase tracking-wider z-10">
                            {{ $gal->category }}
                        </span>
                        
                        <!-- Image Container -->
                        <div class="aspect-video w-full overflow-hidden bg-gray-50 border-b border-gray-100">
                            @if(Str::startsWith($gal->image_path, 'http') || Str::startsWith($gal->image_path, 'storage/'))
                                <img src="{{ asset($gal->image_path) }}" alt="{{ $gal->title }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
                            @else
                                <img src="{{ asset('storage/' . $gal->image_path) }}" alt="{{ $gal->title }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
                            @endif
                        </div>
                        
                        <!-- Details -->
                        <div class="p-4">
                            <h5 class="text-sm font-bold text-dark-brown truncate">{{ $gal->title ?: 'Tanpa Judul' }}</h5>
                            <p class="text-xs text-gray-400 mt-1 line-clamp-2 h-8">{{ $gal->description ?: 'Tidak ada deskripsi.' }}</p>
                        </div>
                    </div>

                    <!-- Actions -->
                    <div class="px-4 pb-4 pt-2 border-t border-gray-50 flex gap-2 justify-end">
                        <a href="{{ route('admin.galleries.edit', $gal->id) }}" 
                            class="text-xs font-semibold text-indigo-600 hover:text-indigo-900 bg-indigo-50 hover:bg-indigo-100 px-3 py-1.5 rounded transition-colors">
                            Edit
                        </a>
                        <form action="{{ route('admin.galleries.destroy', $gal->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus foto galeri ini?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" 
                                class="text-xs font-semibold text-red-600 hover:text-red-900 bg-red-50 hover:bg-red-100 px-3 py-1.5 rounded transition-colors">
                                Hapus
                            </button>
                        </form>
                    </div>
                </div>
            @empty
                <div class="col-span-full py-16 text-center text-sm text-gray-400">
                    Belum ada foto di galeri. Klik "+ Unggah Foto Baru" untuk mengunggah.
                </div>
            @endforelse
        </div>

        <!-- Pagination -->
        @if($galleries->hasPages())
            <div class="mt-8 pt-4 border-t border-gray-100">
                {{ $galleries->links() }}
            </div>
        @endif
    </div>
</div>
@endsection
