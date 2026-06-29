@extends('layouts.admin')

@section('title', 'Kelola Galeri')

@section('content')
<div class="space-y-6">
    <!-- Header -->
    <div class="flex justify-between items-center">
        <div>
            <h1 class="font-playfair text-3xl font-bold text-sogan">Kelola Galeri</h1>
            <p class="text-sm text-gray-500">Tambah, ubah, atau hapus foto galeri.</p>
        </div>
        <a href="{{ route('admin.galleries.create') }}" class="bg-sogan hover:bg-dark-brown text-white px-4 py-2.5 font-semibold transition-colors flex items-center gap-2">
            <span class="text-lg font-bold">+</span> Tambah Galeri Baru
        </a>
    </div>

    <!-- Alert Success -->
    @if(session('success'))
        <div class="bg-green-50 border-l-4 border-green-500 p-4 text-sm text-green-700 shadow-sm flex items-center justify-between">
            <span>✅ {{ session('success') }}</span>
            <button onclick="this.parentElement.style.display='none'" class="text-green-700 hover:text-green-900 text-xl leading-none">×</button>
        </div>
    @endif

    @if(session('error'))
        <div class="bg-red-50 border-l-4 border-red-500 p-4 text-sm text-red-700 shadow-sm flex items-center justify-between">
            <span>❌ {{ session('error') }}</span>
            <button onclick="this.parentElement.style.display='none'" class="text-red-700 hover:text-red-900 text-xl leading-none">×</button>
        </div>
    @endif

    <!-- Filter Kategori -->
    <div class="flex flex-wrap gap-2">
        <a href="{{ route('admin.galleries.index') }}" 
           class="px-4 py-2 text-xs font-medium {{ !request('category') ? 'bg-sogan text-white' : 'bg-gray-100 text-gray-600 hover:bg-gray-200' }} transition rounded">
            Semua
        </a>
        @foreach($categories as $cat)
            <a href="{{ route('admin.galleries.index', ['category' => $cat->id]) }}" 
               class="px-4 py-2 text-xs font-medium {{ request('category') == $cat->id ? 'bg-sogan text-white' : 'bg-gray-100 text-gray-600 hover:bg-gray-200' }} transition rounded">
                {{ $cat->name }}
            </a>
        @endforeach
    </div>

    <!-- Gallery Table Card -->
    <div class="bg-white border border-batik-gold/20 shadow-sm overflow-hidden">
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3.5 text-left text-xs font-semibold text-batik-gold uppercase tracking-wider">Gambar</th>
                        <th class="px-6 py-3.5 text-left text-xs font-semibold text-batik-gold uppercase tracking-wider">Judul</th>
                        <th class="px-6 py-3.5 text-left text-xs font-semibold text-batik-gold uppercase tracking-wider">Kategori</th>
                        <th class="px-6 py-3.5 text-left text-xs font-semibold text-batik-gold uppercase tracking-wider">Status</th>
                        <th class="px-6 py-3.5 text-right text-xs font-semibold text-batik-gold uppercase tracking-wider">Aksi</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-100">
                    @forelse($galleries as $gallery)
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="w-12 h-12 border border-gray-200 overflow-hidden bg-gray-50">
                                    @php
                                        $imgPath = $gallery->image_path ?? '';
                                        $imgUrl = '';
                                        $fileExists = false;
                                        
                                        if (!empty($imgPath)) {
                                            // Coba berbagai kemungkinan path
                                            if (str_starts_with($imgPath, 'storage/')) {
                                                $imgUrl = asset($imgPath);
                                                if (file_exists(public_path($imgPath))) {
                                                    $fileExists = true;
                                                }
                                            } elseif (str_starts_with($imgPath, 'galleries/')) {
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
                                            
                                            // Jika masih tidak ada, coba langsung
                                            if (!$fileExists && file_exists(public_path($imgPath))) {
                                                $fileExists = true;
                                                $imgUrl = asset($imgPath);
                                            }
                                        }
                                    @endphp
                                    @if($fileExists && !empty($imgUrl))
                                        <img src="{{ $imgUrl }}" alt="{{ $gallery->title }}" class="w-full h-full object-cover">
                                    @else
                                        <div class="w-full h-full flex items-center justify-center text-gray-300 text-xs">
                                            <span>No Image</span>
                                        </div>
                                    @endif
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm font-semibold text-dark-brown">{{ $gallery->title ?? 'Tanpa Judul' }}</div>
                                <div class="text-xs text-gray-400 max-w-xs truncate">{{ $gallery->description ?? '-' }}</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                @php
                                    // Ambil nama kategori langsung dari database
                                    $categoryName = 'Uncategorized';
                                    if ($gallery->category_id) {
                                        try {
                                            $cat = App\Models\Category::find($gallery->category_id);
                                            if ($cat) {
                                                $categoryName = $cat->name;
                                            }
                                        } catch (\Exception $e) {
                                            $categoryName = 'Uncategorized';
                                        }
                                    }
                                @endphp
                                <span class="inline-block px-2 py-1 text-xs rounded-full bg-batik-gold/10 text-batik-gold">
                                    {{ $categoryName }}
                                </span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                <span class="inline-block px-2 py-1 text-xs rounded-full {{ $gallery->is_active ? 'bg-green-100 text-green-700' : 'bg-gray-100 text-gray-500' }}">
                                    {{ $gallery->is_active ? 'Aktif' : 'Nonaktif' }}
                                </span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                <div class="flex justify-end gap-3">
                                    <!-- Toggle Active -->
                                    <form action="{{ route('admin.galleries.toggle-active', $gallery->id) }}" method="POST" class="inline">
                                        @csrf
                                        <button type="submit" class="text-yellow-600 hover:text-yellow-900 bg-yellow-50 hover:bg-yellow-100 px-3 py-1 rounded transition-colors text-xs">
                                            {{ $gallery->is_active ? 'Nonaktif' : 'Aktif' }}
                                        </button>
                                    </form>
                                    
                                    <!-- Edit -->
                                    <a href="{{ route('admin.galleries.edit', $gallery->id) }}" class="text-indigo-600 hover:text-indigo-900 bg-indigo-50 hover:bg-indigo-100 px-3 py-1 rounded transition-colors text-xs">
                                        Edit
                                    </a>
                                    
                                    <!-- Hapus -->
                                    <form action="{{ route('admin.galleries.destroy', $gallery->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus foto ini?')" class="inline">
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
                                Belum ada data galeri. Klik "+ Tambah Galeri Baru" untuk menambahkan.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        
        <!-- Pagination Links -->
        @if(method_exists($galleries, 'hasPages') && $galleries->hasPages())
            <div class="px-6 py-4 border-t border-gray-100">
                {{ $galleries->appends(request()->input())->links() }}
            </div>
        @endif
    </div>
</div>
@endsection