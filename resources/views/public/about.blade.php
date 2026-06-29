@extends('layouts.public')

@section('title', 'Tentang Kami - Batikura Plate')

@section('content')

<!-- HERO -->
<section class="relative py-20 bg-white overflow-hidden border-b border-batik-gold/10">
    <div class="absolute inset-0 opacity-[0.03] pointer-events-none">
        <div class="w-full h-full bg-[radial-gradient(#c9a96e_1px,transparent_1px)] [background-size:20px_20px]"></div>
    </div>
    <div class="relative max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <div class="inline-flex items-center gap-3 mb-4">
            <div class="w-8 h-[1px] bg-batik-gold"></div>
            <span class="text-[10px] font-bold text-batik-gold uppercase tracking-[0.25em]">{{ $about->hero_subtitle ?? 'Tentang Kami' }}</span>
            <div class="w-8 h-[1px] bg-batik-gold"></div>
        </div>
        <h1 class="font-playfair text-4xl sm:text-5xl md:text-6xl font-bold text-sogan">{{ $about->hero_title ?? 'Batikura Plate' }}</h1>
        <div class="w-20 h-[2px] bg-batik-gold mx-auto mt-4"></div>
        <p class="text-sm text-gray-500 max-w-md mx-auto mt-4">{{ $about->hero_description ?? 'Perpaduan higienitas, fungsi, dan nilai budaya Nusantara' }}</p>
    </div>
</section>

<!-- APA ITU BATIKURA? -->
<section class="py-20 bg-white border-b border-batik-gold/10">
    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
            <div>
                <span class="text-[11px] font-bold text-batik-gold uppercase tracking-[0.25em] border-l-2 border-batik-gold pl-3">{{ $about->apa_title ?? 'Apa Itu Batikura?' }}</span>
                <h2 class="font-playfair text-3xl sm:text-4xl font-bold text-sogan mt-3">Mangkuk & Piring Khas Malang</h2>
                <div class="w-12 h-[2px] bg-batik-gold mt-4"></div>
                <p class="text-sm text-dark-brown/80 leading-relaxed mt-4">
                    {{ $about->apa_description ?? 'Mangkuk dan piring khas Malang dengan higienitas yang dipadukan dengan estetika budaya Nusantara.' }}
                </p>
                <div class="grid grid-cols-2 gap-3 mt-6">
                    <div class="flex items-center gap-2 bg-ivory/30 p-2.5 border border-batik-gold/5 hover:border-batik-gold/20 transition-colors">
                        <span class="text-batik-gold text-sm">✦</span>
                        <span class="text-[11px] font-medium text-sogan">Handcrafted</span>
                    </div>
                    <div class="flex items-center gap-2 bg-ivory/30 p-2.5 border border-batik-gold/5 hover:border-batik-gold/20 transition-colors">
                        <span class="text-batik-gold text-sm">✦</span>
                        <span class="text-[11px] font-medium text-sogan">Food Grade</span>
                    </div>
                    <div class="flex items-center gap-2 bg-ivory/30 p-2.5 border border-batik-gold/5 hover:border-batik-gold/20 transition-colors">
                        <span class="text-batik-gold text-sm">✦</span>
                        <span class="text-[11px] font-medium text-sogan">Batik Malangan</span>
                    </div>
                    <div class="flex items-center gap-2 bg-ivory/30 p-2.5 border border-batik-gold/5 hover:border-batik-gold/20 transition-colors">
                        <span class="text-batik-gold text-sm">✦</span>
                        <span class="text-[11px] font-medium text-sogan">Keramik Dinoyo</span>
                    </div>
                </div>
            </div>
            <div class="bg-ivory border border-batik-gold/10 overflow-hidden relative group">
                <div class="aspect-[4/3] overflow-hidden">
                    @if($about->apa_image)
                        <img src="{{ asset('storage/' . $about->apa_image) }}" alt="Batikura Plate" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700">
                    @else
                        <div class="w-full h-full flex items-center justify-center">
                            <span class="text-6xl font-playfair text-batik-gold/20">✦</span>
                        </div>
                    @endif
                </div>
                <div class="absolute bottom-0 left-0 right-0 bg-gradient-to-t from-sogan/80 to-transparent p-4 opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                    <p class="text-white text-[10px] tracking-wider uppercase text-center">Karya Seni dari Malang</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- MENGAPA HARUS BATIKURA? -->
<section class="py-20 bg-ivory/20 border-b border-batik-gold/10">
    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
            <div class="bg-ivory border border-batik-gold/10 overflow-hidden relative group">
                <div class="aspect-[4/3] overflow-hidden">
                    @if($about->mengapa_image)
                        <img src="{{ asset('storage/' . $about->mengapa_image) }}" alt="Batikura Plate" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700">
                    @else
                        <div class="w-full h-full flex items-center justify-center">
                            <span class="text-6xl font-playfair text-batik-gold/20">✦</span>
                        </div>
                    @endif
                </div>
                <div class="absolute bottom-0 left-0 right-0 bg-gradient-to-t from-sogan/80 to-transparent p-4 opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                    <p class="text-white text-[10px] tracking-wider uppercase text-center">Kualitas & Keamanan Terjamin</p>
                </div>
            </div>

            <div>
                <span class="text-[11px] font-bold text-batik-gold uppercase tracking-[0.25em] border-l-2 border-batik-gold pl-3">{{ $about->mengapa_title ?? 'Kenapa Batikura?' }}</span>
                <h2 class="font-playfair text-3xl sm:text-4xl font-bold text-sogan mt-3">Mengapa Harus Batikura?</h2>
                <div class="w-12 h-[2px] bg-batik-gold mt-4"></div>
                <p class="text-sm text-dark-brown/80 leading-relaxed mt-4">
                    {{ $about->mengapa_description ?? 'Piring keramik yang menghadirkan perpaduan antara higienitas, fungsi, dan nilai budaya dalam satu kesatuan.' }}
                </p>
                <div class="space-y-3 mt-6">
                    <div class="flex items-start gap-3 p-3 bg-white border-l-2 border-batik-gold/40 hover:border-batik-gold transition-all">
                        <span class="text-batik-gold text-sm mt-0.5">✦</span>
                        <div>
                            <h4 class="text-xs font-bold text-sogan">Lapisan Biopolimer</h4>
                            <p class="text-[11px] text-dark-brown/60">{{ $about->mengapa_poin_1 ?? 'Membantu menjaga kebersihan permukaan alat makan.' }}</p>
                        </div>
                    </div>
                    <div class="flex items-start gap-3 p-3 bg-white border-l-2 border-batik-gold/40 hover:border-batik-gold transition-all">
                        <span class="text-batik-gold text-sm mt-0.5">✦</span>
                        <div>
                            <h4 class="text-xs font-bold text-sogan">Aman Setiap Penggunaan</h4>
                            <p class="text-[11px] text-dark-brown/60">{{ $about->mengapa_poin_2 ?? 'Dirancang untuk memberikan rasa aman dalam setiap penggunaan.' }}</p>
                        </div>
                    </div>
                    <div class="flex items-start gap-3 p-3 bg-white border-l-2 border-batik-gold/40 hover:border-batik-gold transition-all">
                        <span class="text-batik-gold text-sm mt-0.5">✦</span>
                        <div>
                            <h4 class="text-xs font-bold text-sogan">Estetika Nusantara</h4>
                            <p class="text-[11px] text-dark-brown/60">{{ $about->mengapa_poin_3 ?? 'Motif batik Malang yang sarat makna dan filosofi.' }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ============================================ -->
<!-- CERITA KAMI - DENGAN TIMELINE VISUAL -->
<!-- ============================================ -->
<section class="py-20 bg-white border-b border-batik-gold/10 relative overflow-hidden">
    <!-- Background Pattern -->
    <div class="absolute inset-0 opacity-[0.02] pointer-events-none">
        <div class="w-full h-full bg-[radial-gradient(#c9a96e_1px,transparent_1px)] [background-size:20px_20px]"></div>
    </div>
    
    <div class="relative max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-14">
            <span class="text-[11px] font-bold text-batik-gold uppercase tracking-[0.25em] border border-batik-gold/20 px-4 py-1">{{ $about->cerita_title ?? 'Cerita Kami' }}</span>
            <h2 class="font-playfair text-3xl sm:text-4xl font-bold text-sogan mt-3">Perjalanan Batikura</h2>
            <div class="w-16 h-[2px] bg-batik-gold mx-auto mt-3"></div>
            <p class="text-sm text-gray-500 max-w-md mx-auto mt-3">Dari tradisi menuju inovasi, menghadirkan seni di setiap sajian</p>
        </div>

        <!-- ========================================== -->
        <!-- TIMELINE VERTIKAL -->
        <!-- ========================================== -->
        <div class="max-w-3xl mx-auto relative">
            <!-- Garis Vertikal -->
            <div class="absolute left-[27px] top-0 bottom-0 w-[2px] bg-batik-gold/20 hidden md:block"></div>
            
            <!-- Point 1 -->
            <div class="flex flex-col md:flex-row gap-6 md:gap-8 mb-10 group">
                <div class="flex-shrink-0 flex items-start">
                    <div class="w-14 h-14 rounded-full border-2 border-batik-gold/30 bg-white flex items-center justify-center group-hover:border-batik-gold group-hover:bg-batik-gold/5 transition-all duration-300 z-10">
                        <span class="text-lg font-bold text-batik-gold group-hover:scale-110 transition-transform">01</span>
                    </div>
                </div>
                <div class="flex-1 bg-ivory/10 p-6 border border-batik-gold/10 group-hover:border-batik-gold/30 transition-all">
                    <span class="text-xs font-bold text-batik-gold uppercase tracking-wider">Awal Mula</span>
                    <h4 class="text-lg font-bold text-sogan mt-1">1950</h4>
                    <p class="text-sm text-dark-brown/70 mt-2 leading-relaxed">
                        {{ $about->cerita_timeline_1 ?? 'Kampung Keramik Dinoyo mulai dikenal sebagai pusat kerajinan tanah liat dan gerabah tradisional yang diwariskan secara turun-temurun.' }}
                    </p>
                </div>
            </div>
            
            <!-- Point 2 -->
            <div class="flex flex-col md:flex-row gap-6 md:gap-8 mb-10 group">
                <div class="flex-shrink-0 flex items-start">
                    <div class="w-14 h-14 rounded-full border-2 border-batik-gold/30 bg-white flex items-center justify-center group-hover:border-batik-gold group-hover:bg-batik-gold/5 transition-all duration-300 z-10">
                        <span class="text-lg font-bold text-batik-gold group-hover:scale-110 transition-transform">02</span>
                    </div>
                </div>
                <div class="flex-1 bg-ivory/10 p-6 border border-batik-gold/10 group-hover:border-batik-gold/30 transition-all">
                    <span class="text-xs font-bold text-batik-gold uppercase tracking-wider">Berkembang</span>
                    <h4 class="text-lg font-bold text-sogan mt-1">1970</h4>
                    <p class="text-sm text-dark-brown/70 mt-2 leading-relaxed">
                        {{ $about->cerita_timeline_2 ?? 'Pengrajin beralih ke keramik porselen putih (stoneware) dengan teknologi pembakaran gas, mengubah Dinoyo menjadi produsen keramik kelas ekspor.' }}
                    </p>
                </div>
            </div>
            
            <!-- Point 3 -->
            <div class="flex flex-col md:flex-row gap-6 md:gap-8 mb-10 group">
                <div class="flex-shrink-0 flex items-start">
                    <div class="w-14 h-14 rounded-full border-2 border-batik-gold/30 bg-white flex items-center justify-center group-hover:border-batik-gold group-hover:bg-batik-gold/5 transition-all duration-300 z-10">
                        <span class="text-lg font-bold text-batik-gold group-hover:scale-110 transition-transform">03</span>
                    </div>
                </div>
                <div class="flex-1 bg-ivory/10 p-6 border border-batik-gold/10 group-hover:border-batik-gold/30 transition-all">
                    <span class="text-xs font-bold text-batik-gold uppercase tracking-wider">Lahirnya Batikura</span>
                    <h4 class="text-lg font-bold text-sogan mt-1">2024</h4>
                    <p class="text-sm text-dark-brown/70 mt-2 leading-relaxed">
                        {{ $about->cerita_timeline_3 ?? 'Perpaduan batik Malang dan keramik Dinoyo menjadi satu dalam produk Batikura Plate, menghadirkan seni di setiap sajian.' }}
                    </p>
                </div>
            </div>
            
            <!-- Point 4 -->
            <div class="flex flex-col md:flex-row gap-6 md:gap-8 group">
                <div class="flex-shrink-0 flex items-start">
                    <div class="w-14 h-14 rounded-full border-2 border-batik-gold/30 bg-white flex items-center justify-center group-hover:border-batik-gold group-hover:bg-batik-gold/5 transition-all duration-300 z-10">
                        <span class="text-lg font-bold text-batik-gold group-hover:scale-110 transition-transform">✦</span>
                    </div>
                </div>
                <div class="flex-1 bg-ivory/10 p-6 border border-batik-gold/10 group-hover:border-batik-gold/30 transition-all">
                    <span class="text-xs font-bold text-batik-gold uppercase tracking-wider">Masa Depan</span>
                    <h4 class="text-lg font-bold text-sogan mt-1">Bersama</h4>
                    <p class="text-sm text-dark-brown/70 mt-2 leading-relaxed">
                        {{ $about->cerita_timeline_4 ?? 'Terus berinovasi dengan teknologi biopolimer dan melestarikan budaya Nusantara untuk generasi mendatang.' }}
                    </p>
                </div>
            </div>
        </div>

        <!-- ========================================== -->
        <!-- CERITA PENUTUP -->
        <!-- ========================================== -->
        <div class="mt-16 max-w-3xl mx-auto">
            <div class="bg-gradient-to-r from-ivory/30 to-ivory/10 p-8 border border-batik-gold/10">
                <div class="text-center">
                    <p class="text-sm text-dark-brown/70 leading-relaxed">
                        {{ $about->cerita_paragraf_1 ?? 'Batikura Plate lahir dari rasa cinta terhadap kekayaan budaya Nusantara. Kami percaya bahwa alat makan adalah medium seni yang menghubungkan kebiasaan makan keluarga dengan apresiasi budaya lokal.' }}
                    </p>
                    <div class="flex items-center justify-center gap-3 mt-4">
                        <div class="w-8 h-[2px] bg-batik-gold/20"></div>
                        <span class="text-[10px] text-batik-gold/40 uppercase tracking-wider">{{ $about->cerita_hashtag ?? '#Batikura' }}</span>
                        <div class="w-8 h-[2px] bg-batik-gold/20"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ============================================ -->
<!-- NILAI-NILAI KAMI - TANPA ICON -->
<!-- ============================================ -->
<section class="py-20 bg-ivory/10 border-b border-batik-gold/10 relative overflow-hidden">
    <!-- Background Pattern -->
    <div class="absolute inset-0 opacity-[0.02] pointer-events-none">
        <div class="w-full h-full bg-[radial-gradient(#c9a96e_1px,transparent_1px)] [background-size:20px_20px]"></div>
    </div>
    
    <div class="relative max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-14">
            <span class="text-[11px] font-bold text-batik-gold uppercase tracking-[0.25em] border border-batik-gold/20 px-4 py-1">{{ $about->nilai_title ?? 'Nilai-Nilai Kami' }}</span>
            <h2 class="font-playfair text-3xl sm:text-4xl font-bold text-sogan mt-3">Yang Kami Perjuangkan</h2>
            <div class="w-16 h-[2px] bg-batik-gold mx-auto mt-3"></div>
            <p class="text-sm text-gray-500 max-w-md mx-auto mt-3">6 prinsip yang menjadi fondasi setiap produk Batikura</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 max-w-5xl mx-auto">
            
            @php
                $nilaiList = [
                    ['nilai' => $about->nilai_1 ?? 'Kualitas Premium', 'tagline' => 'Excellence', 'desc' => 'Standar kualitas tinggi dan bahan baku terbaik pilihan.'],
                    ['nilai' => $about->nilai_2 ?? 'Budaya Nusantara', 'tagline' => 'Heritage', 'desc' => 'Melestarikan motif batik Malang dan keramik Dinoyo.'],
                    ['nilai' => $about->nilai_3 ?? 'Higienitas', 'tagline' => 'Safety', 'desc' => 'Standar food-grade aman untuk kesehatan keluarga.'],
                    ['nilai' => $about->nilai_4 ?? 'Keberlanjutan', 'tagline' => 'Sustainability', 'desc' => 'Memberdayakan pengrajin lokal dan ekonomi kreatif.'],
                    ['nilai' => $about->nilai_5 ?? 'Inovasi', 'tagline' => 'Innovation', 'desc' => 'Teknologi biopolimer untuk produk yang lebih baik.'],
                    ['nilai' => $about->nilai_6 ?? 'Keindahan', 'tagline' => 'Elegance', 'desc' => 'Seni dalam setiap sajian di meja makan keluarga.'],
                ];
            @endphp
            
            @foreach($nilaiList as $index => $item)
                <div class="group relative bg-white p-8 border border-batik-gold/10 hover:border-batik-gold/40 hover:shadow-xl transition-all duration-500 overflow-hidden">
                    <div class="absolute inset-0 bg-gradient-to-br from-ivory/0 to-ivory/0 group-hover:from-ivory/20 group-hover:to-ivory/10 transition-all duration-500"></div>
                    <div class="relative">
                        <div class="flex items-center justify-between mb-4">
                            <span class="text-3xl font-playfair text-batik-gold/20 group-hover:text-batik-gold/40 transition-colors">{{ str_pad($index + 1, 2, '0', STR_PAD_LEFT) }}</span>
                            <span class="text-xs font-bold text-batik-gold/30 group-hover:text-batik-gold/60 transition-colors">0{{ $index + 1 }}</span>
                        </div>
                        <h3 class="text-lg font-bold text-sogan group-hover:text-batik-gold transition-colors">{{ $item['nilai'] }}</h3>
                        <p class="text-[10px] text-batik-gold/60 uppercase tracking-wider mt-1">{{ $item['tagline'] }}</p>
                        <div class="w-12 h-[2px] bg-batik-gold/30 mt-3 mb-3 group-hover:w-full transition-all duration-500"></div>
                        <p class="text-sm text-dark-brown/60 leading-relaxed">{{ $item['desc'] }}</p>
                    </div>
                </div>
            @endforeach

        </div>
        
        <!-- Tagline Penutup -->
        <div class="text-center mt-12">
            <div class="inline-flex items-center gap-4">
                <div class="w-12 h-[2px] bg-batik-gold/20"></div>
                <span class="text-xs text-batik-gold/40 uppercase tracking-wider">6 Prinsip • 1 Visi</span>
                <div class="w-12 h-[2px] bg-batik-gold/20"></div>
            </div>
            <p class="text-xs text-dark-brown/50 mt-3 max-w-lg mx-auto">
                Setiap nilai adalah cerminan komitmen kami terhadap <strong class="text-sogan">kualitas, budaya, dan kesehatan</strong>
            </p>
        </div>
    </div>
</section>

<!-- STATISTIK -->
<section class="py-12 bg-sogan border-b border-batik-gold/20">
    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-2 md:grid-cols-4 gap-0">
            <div class="text-center text-white border-r border-white/5 last:border-r-0 p-4">
                <span class="block text-3xl font-bold">100%</span>
                <span class="block text-[10px] text-white/50 uppercase tracking-wider mt-1">Handcrafted</span>
            </div>
            <div class="text-center text-white border-r border-white/5 last:border-r-0 p-4">
                <span class="block text-3xl font-bold">1200°C</span>
                <span class="block text-[10px] text-white/50 uppercase tracking-wider mt-1">Suhu Bakar</span>
            </div>
            <div class="text-center text-white border-r border-white/5 last:border-r-0 p-4">
                <span class="block text-3xl font-bold">1950</span>
                <span class="block text-[10px] text-white/50 uppercase tracking-wider mt-1">Sejak Dinoyo</span>
            </div>
            <div class="text-center text-white p-4">
                <span class="block text-3xl font-bold">Food</span>
                <span class="block text-[10px] text-white/50 uppercase tracking-wider mt-1">Grade Certified</span>
            </div>
        </div>
    </div>
</section>

<!-- BOOK NOW -->
<section class="py-20 bg-white">
    <div class="max-w-3xl mx-auto px-4 text-center">
        <div class="flex items-center justify-center gap-4 mb-4">
            <div class="w-12 h-[2px] bg-batik-gold"></div>
            <span class="text-[10px] font-bold text-batik-gold uppercase tracking-[0.2em]">{{ $about->book_title ?? 'Pesan Sekarang' }}</span>
            <div class="w-12 h-[2px] bg-batik-gold"></div>
        </div>
        <h2 class="font-playfair text-3xl font-bold text-sogan">Mulai Petualangan Kuliner Anda</h2>
        <p class="text-sm text-dark-brown/60 max-w-md mx-auto mt-3">
            {{ $about->book_description ?? 'Dapatkan piring keramik batik elegan untuk keluarga Anda.' }}
        </p>
        <div class="mt-6">
            <a href="{{ $about->book_link ?? 'https://forms.gle/irsjT6jmL4ErVrqNA' }}" target="_blank" 
                class="inline-block px-10 py-3.5 bg-sogan hover:bg-dark-brown text-white text-sm font-bold uppercase tracking-wider transition-all duration-300 border border-batik-gold/20 shadow-md hover:shadow-lg">
                {{ $about->book_button_text ?? 'Book Now →' }}
            </a>
            <p class="text-[9px] text-gray-400 mt-3">* Klik untuk pemesanan melalui Google Form</p>
        </div>
    </div>
</section>

@endsection