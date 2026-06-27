@extends('layouts.public')

@section('title', 'Tentang Kami - Batikura Plate')

@section('content')
<div class="bg-ivory/20 py-16">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 space-y-16">
        <!-- Header -->
        <div class="text-center space-y-2">
            <span class="text-xs font-bold text-batik-gold uppercase tracking-widest">Kisah Kami</span>
            <h1 class="font-playfair text-4xl font-extrabold text-sogan">Tentang Batikura Plate</h1>
            <div class="w-16 h-[2px] bg-batik-gold mx-auto mt-2"></div>
        </div>

        <!-- Concept & Philosophy -->
        <section class="bg-white p-8 sm:p-12 rounded-2xl border border-batik-gold/15 shadow-sm space-y-6">
            <h2 class="font-playfair text-2xl font-bold text-sogan border-b border-gray-100 pb-3">Konsep & Filosofi</h2>
            <p class="text-xs text-dark-brown/85 leading-relaxed">
                <strong>Batikura Plate</strong> lahir dari rasa cinta yang mendalam terhadap kekayaan budaya Nusantara, khususnya kerajinan keramik tradisional di Kampung Dinoyo dan motif batik khas Malangan. Nama "Batikura" merupakan peleburan dari kata <strong>Batik</strong> (karya seni bernilai tinggi) dan <strong>Kura-kura</strong> (simbol ketenangan, perlindungan, kekuatan, serta umur panjang).
            </p>
            <p class="text-xs text-dark-brown/85 leading-relaxed">
                Kami percaya bahwa alat makan bukan sekadar wadah untuk menyajikan makanan, melainkan medium seni yang menghubungkan kebiasaan makan keluarga dengan apresiasi budaya lokal. Setiap goresan kuas di atas piring Batikura Plate dilukis dengan penuh dedikasi oleh pengrajin lokal Malang.
            </p>
        </section>

        <!-- Why Choose Batikura -->
        <section class="grid grid-cols-1 md:grid-cols-2 gap-8">
            <div class="bg-white p-8 rounded-2xl border border-batik-gold/15 shadow-sm space-y-4">
                <span class="text-2xl">🏆</span>
                <h3 class="font-playfair text-lg font-bold text-sogan">Kualitas Premium & Eksklusif</h3>
                <p class="text-xs text-dark-brown/70 leading-relaxed">
                    Setiap piring kami diproduksi secara terbatas (limited edition) dengan pembakaran suhu tinggi di atas 1200°C menghasilkan keramik porselen putih yang tebal, kuat, dan tidak mudah pecah.
                </p>
            </div>
            
            <div class="bg-white p-8 rounded-2xl border border-batik-gold/15 shadow-sm space-y-4">
                <span class="text-2xl">🌱</span>
                <h3 class="font-playfair text-lg font-bold text-sogan">100% Food-Grade & Higienis</h3>
                <p class="text-xs text-dark-brown/70 leading-relaxed">
                    Aman digunakan untuk menyajikan makanan panas maupun dingin. Lapisan glasir kami bebas timbal (Lead-free) dan tidak porous sehingga bakteri tidak dapat menempel pada permukaan piring.
                </p>
            </div>
        </section>

        <!-- History of Kampung Dinoyo -->
        <section class="bg-white p-8 sm:p-12 rounded-2xl border border-batik-gold/15 shadow-sm space-y-6">
            <h2 class="font-playfair text-2xl font-bold text-sogan border-b border-gray-100 pb-3">Sejarah Kampung Keramik Dinoyo</h2>
            <div class="text-xs text-dark-brown/85 leading-relaxed space-y-4">
                <p>
                    Kampung Wisata Keramik Dinoyo Malang telah lama dikenal sebagai pusat pembuatan gerabah dan keramik sejak tahun 1950-an. Awalnya, warga setempat memproduksi alat-alat rumah tangga sederhana dari tanah liat merah (gerabah). Seiring berjalannya waktu dan transfer ilmu teknologi, pada tahun 1970-an para pengrajin beralih memproduksi keramik berbahan dasar porselen batu putih (stoneware) yang memiliki ketahanan jauh lebih baik.
                </p>
                <p>
                    Perpindahan teknologi pembakaran dari oven kayu tradisional ke sistem tungku gas bertekanan tinggi mengubah wajah Dinoyo menjadi produsen keramik seni kelas ekspor. Melalui produk Batikura Plate, kami berupaya mengintegrasikan batik Malangan ke atas keramik legendaris ini demi mendorong ekonomi kreatif pengrajin lokal agar tetap eksis di era modern.
                </p>
            </div>
        </section>

        <!-- Address and CTA -->
        <section class="bg-sogan text-white p-8 sm:p-12 rounded-2xl border border-gold-accent/20 shadow-lg text-center space-y-6">
            <span class="text-3xl">📍</span>
            <h2 class="font-playfair text-2xl font-bold text-batik-gold">Kunjungi Galeri Fisik Kami</h2>
            <p class="text-xs text-gray-200 max-w-md mx-auto leading-relaxed">
                Anda dapat melihat langsung proses pembuatan keramik dan melukis piring batik di workshop kami yang beralamat di:
                <br><br>
                <strong>Jalan MT Haryono, Kampung Wisata Keramik Dinoyo, Kec. Lowokwaru, Kota Malang, Jawa Timur 65144</strong>
            </p>
            <div>
                <a href="{{ route('contact') }}" class="inline-block px-6 py-3 bg-batik-gold hover:bg-white text-sogan font-bold text-xs rounded transition-colors uppercase tracking-wider">
                    Hubungi Kami Sekarang
                </a>
            </div>
        </section>
    </div>
</div>
@endsection
