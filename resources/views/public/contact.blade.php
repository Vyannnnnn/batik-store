@extends('layouts.public')

@section('title', 'Hubungi Kami - Batikura Plate')

@section('content')
<div class="bg-ivory/20 py-16">
    <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 space-y-12">
        <!-- Page Header -->
        <div class="text-center space-y-2">
            <span class="text-xs font-bold text-batik-gold uppercase tracking-widest">Informasi Kontak</span>
            <h1 class="font-playfair text-4xl font-extrabold text-sogan">Hubungi Batikura</h1>
            <div class="w-16 h-[2px] bg-batik-gold mx-auto mt-2"></div>
            <p class="text-xs text-gray-500 max-w-md mx-auto">Ada pertanyaan atau ingin memesan kustom piring keramik batik? Silakan hubungi kami melalui saluran berikut.</p>
        </div>

        <!-- Contact Options Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8 items-start">
            <!-- Left: Contact info details -->
            <div class="bg-white p-8 rounded-2xl border border-batik-gold/15 shadow-sm space-y-6">
                <h3 class="font-playfair text-2xl font-bold text-sogan border-b border-gray-100 pb-3">Galeri & Workshop</h3>
                
                <div class="space-y-4 text-xs leading-relaxed">
                    <!-- Address -->
                    <div class="flex items-start gap-4">
                        <span class="text-xl bg-ivory p-2.5 rounded-lg border border-batik-gold/10">📍</span>
                        <div>
                            <h4 class="font-bold text-sogan uppercase tracking-wider mb-1">Alamat Galeri</h4>
                            <p class="text-dark-brown/80">
                                Jalan MT Haryono, Kampung Wisata Keramik Dinoyo, Kec. Lowokwaru, Kota Malang, Jawa Timur 65144
                            </p>
                        </div>
                    </div>
                    
                    <!-- WhatsApp -->
                    <div class="flex items-start gap-4">
                        <span class="text-xl bg-ivory p-2.5 rounded-lg border border-batik-gold/10">📞</span>
                        <div>
                            <h4 class="font-bold text-sogan uppercase tracking-wider mb-1">WhatsApp Fast Response</h4>
                            <p class="text-dark-brown/80">
                                +62 812-3456-7890 (Senin - Sabtu, 08.00 - 17.00 WIB)
                            </p>
                        </div>
                    </div>

                    <!-- Instagram -->
                    <div class="flex items-start gap-4">
                        <span class="text-xl bg-ivory p-2.5 rounded-lg border border-batik-gold/10">📸</span>
                        <div>
                            <h4 class="font-bold text-sogan uppercase tracking-wider mb-1">Direct Message Instagram</h4>
                            <p class="text-dark-brown/80">
                                <a href="https://instagram.com/batikura_plate" target="_blank" class="text-moss-green hover:underline">
                                    @batikura_plate
                                </a>
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Ordering Info -->
                <div class="p-4 bg-ivory/40 rounded-lg border border-batik-gold/10 text-xs">
                    <h5 class="font-bold text-sogan uppercase tracking-wider mb-1">💡 Catatan Pemesanan:</h5>
                    <p class="text-gray-600 leading-relaxed">
                        Kami tidak melayani transaksi langsung di website ini. Pembelian produk dapat diarahkan secara resmi melalui lapak e-commerce Shopee/Tokopedia kami, atau chat langsung ke WhatsApp admin.
                    </p>
                </div>
            </div>

            <!-- Right: Send Message Form or Simulated Map -->
            <div class="bg-white p-8 rounded-2xl border border-batik-gold/15 shadow-sm space-y-6">
                <h3 class="font-playfair text-2xl font-bold text-sogan border-b border-gray-100 pb-3">Hubungi Lewat Pesan</h3>
                
                <form action="https://wa.me/6281234567890" method="GET" target="_blank" class="space-y-4">
                    <!-- User Name -->
                    <div>
                        <label for="name" class="block text-xs font-semibold text-dark-brown mb-2">Nama Lengkap</label>
                        <input type="text" id="name-input" required 
                            class="w-full px-4 py-2.5 border border-gray-300 rounded-lg text-xs focus:outline-none focus:ring-2 focus:ring-batik-gold"
                            placeholder="Masukkan nama Anda">
                    </div>

                    <!-- Message Body -->
                    <div>
                        <label for="message" class="block text-xs font-semibold text-dark-brown mb-2">Pesan Anda</label>
                        <textarea id="message-input" rows="4" required 
                            class="w-full px-4 py-2.5 border border-gray-300 rounded-lg text-xs focus:outline-none focus:ring-2 focus:ring-batik-gold"
                            placeholder="Tulis pertanyaan Anda di sini..."></textarea>
                    </div>

                    <!-- hidden input to bind text parameter for WhatsApp -->
                    <input type="hidden" name="text" id="wa-text">

                    <button type="submit" id="wa-submit"
                        class="w-full py-3 bg-sogan hover:bg-dark-brown text-white text-xs font-bold uppercase tracking-wider rounded-lg transition-colors border border-gold-accent/20">
                        Kirim via WhatsApp 💬
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Script to encode custom WhatsApp message dynamic string -->
<script>
    document.addEventListener('DOMContentLoaded', () => {
        const nameInput = document.getElementById('name-input');
        const msgInput = document.getElementById('message-input');
        const waText = document.getElementById('wa-text');
        const waSubmit = document.getElementById('wa-submit');

        waSubmit.addEventListener('click', (e) => {
            const name = nameInput.value.trim();
            const message = msgInput.value.trim();

            if (name && message) {
                const textValue = `Halo Admin Batikura, saya ${name}. \n\n${message}`;
                waText.value = textValue;
            }
        });
    });
</script>
@endsection
