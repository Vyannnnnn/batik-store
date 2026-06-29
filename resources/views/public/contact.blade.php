@extends('layouts.public')

@section('title', $contact->header_title ?? 'Hubungi Kami - Batikura Plate')

@section('content')
<div class="bg-ivory/20 py-16">
    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 space-y-12">
        
        <!-- ============================================ -->
        <!-- HEADER -->
        <!-- ============================================ -->
        <div class="text-center space-y-3">
            <span class="inline-block text-[10px] font-bold text-batik-gold uppercase tracking-[0.25em] border border-batik-gold/20 px-4 py-1">
                {{ $contact->header_subtitle ?? 'Informasi Kontak' }}
            </span>
            <h1 class="font-playfair text-4xl sm:text-5xl font-bold text-sogan">
                {{ $contact->header_title ?? 'Hubungi Batikura' }}
            </h1>
            <div class="w-16 h-[2px] bg-batik-gold mx-auto"></div>
            <p class="text-sm text-gray-500 max-w-md mx-auto">
                {{ $contact->header_description ?? 'Ada pertanyaan atau ingin memesan? Silakan hubungi kami melalui saluran berikut.' }}
            </p>
        </div>

        <!-- ============================================ -->
        <!-- CONTACT GRID -->
        <!-- ============================================ -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
            
            <!-- KIRI: Informasi Kontak -->
            <div class="bg-white border border-batik-gold/15 shadow-sm p-8 space-y-6">
                <h3 class="font-playfair text-2xl font-bold text-sogan border-b border-gray-100 pb-3">
                    {{ $contact->address_title ?? 'Informasi Kontak' }}
                </h3>
                
                <div class="space-y-5 text-sm leading-relaxed">
                    <!-- Alamat -->
                    <div class="flex items-start gap-4">
                        <div class="w-10 h-10 border border-batik-gold/20 flex items-center justify-center flex-shrink-0">
                            <svg class="w-5 h-5 text-batik-gold" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                            </svg>
                        </div>
                        <div>
                            <h4 class="text-[10px] font-bold text-sogan uppercase tracking-wider mb-1">Alamat Galeri</h4>
                            <p class="text-dark-brown/80 leading-relaxed">
                                {{ $contact->address ?? 'Jalan MT Haryono, Kampung Wisata Keramik Dinoyo, Kec. Lowokwaru, Kota Malang, Jawa Timur 65144' }}
                            </p>
                        </div>
                    </div>
                    
                    <!-- Instagram -->
                    <div class="flex items-start gap-4">
                        <div class="w-10 h-10 border border-batik-gold/20 flex items-center justify-center flex-shrink-0">
                            <svg class="w-5 h-5 text-batik-gold" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zM12 0C8.741 0 8.333.014 7.053.072 2.695.272.273 2.69.073 7.052.014 8.333 0 8.741 0 12c0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98C8.333 23.986 8.741 24 12 24c3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98C15.668.014 15.259 0 12 0zm0 5.838a6.162 6.162 0 100 12.324 6.162 6.162 0 000-12.324zM12 16a4 4 0 110-8 4 4 0 010 8zm6.406-11.845a1.44 1.44 0 100 2.881 1.44 1.44 0 000-2.881z"/>
                            </svg>
                        </div>
                        <div>
                            <h4 class="text-[10px] font-bold text-sogan uppercase tracking-wider mb-1">
                                {{ $contact->instagram_title ?? 'Instagram' }}
                            </h4>
                            <a href="{{ $contact->instagram_url ?? 'https://instagram.com/batikura_plate' }}" 
                               target="_blank" 
                               class="text-batik-gold hover:text-sogan transition-colors font-medium">
                                {{ $contact->instagram_username ?? '@batikura_plate' }}
                            </a>
                            <p class="text-[10px] text-gray-400 mt-0.5">
                                {{ $contact->instagram_description ?? 'Follow untuk update produk terbaru' }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- KANAN: Google Form -->
            <div class="bg-white border border-batik-gold/15 shadow-sm p-8 space-y-6">
                <h3 class="font-playfair text-2xl font-bold text-sogan border-b border-gray-100 pb-3">
                    {{ $contact->form_title ?? 'Pesan Sekarang' }}
                </h3>
                <p class="text-sm text-dark-brown/60 leading-relaxed">
                    {{ $contact->form_description ?? 'Klik tombol di bawah untuk melakukan pemesanan melalui Google Form.' }}
                </p>
                
                <div class="space-y-4">
                    <a href="{{ $contact->form_link ?? 'https://forms.gle/irsjT6jmL4ErVrqNA' }}" 
                       target="_blank" 
                       class="block w-full py-4 px-6 bg-sogan hover:bg-dark-brown text-white text-center text-sm font-bold uppercase tracking-wider transition-colors duration-300 border border-batik-gold/20 hover:shadow-lg">
                        {{ $contact->form_button_text ?? 'PESAN SEKARANG' }}
                    </a>
                    <p class="text-[9px] text-gray-400 text-center">
                        {{ $contact->form_footer_text ?? '* Klik untuk melakukan pemesanan melalui Google Form' }}
                    </p>
                </div>
            </div>
        </div>

        <!-- ============================================ -->
        <!-- MAPS SECTION -->
        <!-- ============================================ -->
        <div class="bg-white border border-batik-gold/15 shadow-sm overflow-hidden">
            <div class="p-6 border-b border-batik-gold/10">
                <h3 class="font-playfair text-xl font-bold text-sogan">
                    {{ $contact->maps_title ?? 'Lokasi Kami' }}
                </h3>
                <p class="text-xs text-gray-400">
                    {{ $contact->maps_subtitle ?? 'Kampung Wisata Keramik Dinoyo, Malang' }}
                </p>
            </div>
            <div class="aspect-[16/6] w-full">
                @if($contact->maps_embed)
                    {!! $contact->maps_embed !!}
                @else
                    <iframe 
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3951.551532721958!2d112.6116907!3d-7.9418156!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e78827327aa4fd3%3A0x5a49804dcae940ba!2sKampung%20Wisata%20Keramik%20Dinoyo!5e0!3m2!1sid!2sid!4v1782665358113!5m2!1sid!2sid" 
                        width="100%" 
                        height="100%" 
                        style="border:0;" 
                        allowfullscreen="" 
                        loading="lazy" 
                        referrerpolicy="strict-origin-when-cross-origin"
                        class="w-full h-full">
                    </iframe>
                @endif
            </div>
            <div class="p-4 bg-ivory/30 border-t border-batik-gold/10">
                <p class="text-[10px] text-gray-400 text-center">
                    {{ $contact->maps_footer ?? ' Kampung Wisata Keramik Dinoyo, Malang' }}
                </p>
            </div>
        </div>
    </div>
</div>
@endsection