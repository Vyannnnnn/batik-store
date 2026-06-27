<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // Seed Admin User
        User::create([
            'name' => 'Admin Batikura Plate',
            'username' => 'admin',
            'password' => bcrypt('password123'),
        ]);

        // Seed Products
        \App\Models\Product::create([
            'name' => 'Batikura Plate - Motif Kembang Malang (25cm)',
            'slug' => 'batikura-plate-motif-kembang-malang-25cm',
            'description' => 'Piring keramik premium dengan hiasan lukisan tangan (hand-painted) motif Kembang Malang yang melambangkan keindahan alam Malang. Cocok untuk alat makan formal maupun hiasan dekorasi rumah.',
            'price' => 185000,
            'motif' => 'Kembang Malang',
            'size' => '25cm',
            'image_path' => 'products/plate-kembang-malang.jpg',
            'shopee_url' => 'https://shopee.co.id',
            'tokopedia_url' => 'https://tokopedia.com',
            'whatsapp_text' => 'Halo Admin, saya tertarik untuk memesan piring Batikura Plate Motif Kembang Malang (25cm). Mohon info ketersediaan barang.',
        ]);

        \App\Models\Product::create([
            'name' => 'Batikura Plate - Motif Candi Badut (20cm)',
            'slug' => 'batikura-plate-motif-candi-badut-20cm',
            'description' => 'Piring makan keramik estetik dengan detail batik motif Candi Badut khas Malang. Dibuat langsung oleh pengrajin lokal di Kampung Keramik Dinoyo dengan pembakaran suhu tinggi sehingga aman untuk makanan (food-grade).',
            'price' => 150000,
            'motif' => 'Candi Badut',
            'size' => '20cm',
            'image_path' => 'products/plate-candi-badut.jpg',
            'shopee_url' => 'https://shopee.co.id',
            'tokopedia_url' => 'https://tokopedia.com',
            'whatsapp_text' => 'Halo Admin, saya tertarik untuk memesan piring Batikura Plate Motif Candi Badut (20cm). Mohon info ketersediaan barang.',
        ]);

        \App\Models\Product::create([
            'name' => 'Batikura Plate - Edisi Eksklusif Topeng Malangan',
            'slug' => 'batikura-plate-edisi-eksklusif-topeng-malangan',
            'description' => 'Produk mahakarya kolaborasi pengrajin Dinoyo dengan motif Topeng Malangan (Karakter Panji). Sangat cocok sebagai hadiah eksklusif (gift) atau souvenir budaya mewah.',
            'price' => 220000,
            'motif' => 'Topeng Malangan',
            'size' => '22cm',
            'image_path' => 'products/plate-topeng-malangan.jpg',
            'shopee_url' => 'https://shopee.co.id',
            'tokopedia_url' => 'https://tokopedia.com',
            'whatsapp_text' => 'Halo Admin, saya tertarik untuk memesan piring Batikura Plate Edisi Eksklusif Topeng Malangan. Mohon info ketersediaan barang.',
        ]);

        // Seed Articles (Edukasi)
        \App\Models\Article::create([
            'title' => 'Sejarah Panjang Kampung Keramik Dinoyo Malang',
            'slug' => 'sejarah-panjang-kampung-keramik-dinoyo-malang',
            'category' => 'keramik_dinoyo',
            'content' => 'Kampung Keramik Dinoyo merupakan salah satu ikon wisata budaya dan kerajinan legendaris di Kota Malang. Berdiri sejak tahun 1950-an, industri rumahan di daerah Dinoyo awalnya memproduksi gerabah tanah liat tradisional sebelum beralih ke keramik porselen putih yang lebih modern dan tahan lama. Keahlian ini diwariskan secara turun-temurun hingga saat ini, menciptakan produk piring, cangkir, dan vas hias dengan kualitas ekspor yang bernilai seni tinggi.',
            'image_path' => 'articles/sejarah-keramik-dinoyo.jpg',
        ]);

        \App\Models\Article::create([
            'title' => 'Mengenal Ragam Motif Batik Khas Malang',
            'slug' => 'mengenal-ragam-motif-batik-khas-malang',
            'category' => 'batik_malang',
            'content' => 'Batik Malang (Malangan) memiliki karakter visual yang kuat, cerah, dan berani. Berbeda dari batik Solo atau Yogyakarta yang bernuansa kalem dan klasik, Batik Malang banyak mengeksplorasi simbol alam lokal seperti kembang tanjung, motif Candi Singosari, hingga ilustrasi Topeng Malangan. Di Batikura Plate, kami meramu filosofi batik Malangan ini ke atas permukaan piring keramik Dinoyo, menghasilkan perpaduan kebudayaan yang modern tanpa meninggalkan akar tradisi.',
            'image_path' => 'articles/batik-malang.jpg',
        ]);

        \App\Models\Article::create([
            'title' => 'Topeng Malangan: Dari Pertunjukan Tari Ke Karya Seni Keramik',
            'slug' => 'topeng-malangan-dari-pertunjukan-tari-ke-karya-seni-keramik',
            'category' => 'topeng_malangan',
            'content' => 'Topeng Malangan bukan sekadar pelindung wajah dalam pementasan Tari Topeng, melainkan simbol karakter watak manusia yang kaya makna spiritual. Tokoh seperti Raden Panji yang melambangkan kebaikan dan kelembutan serta Klono yang gagah berani diadaptasi ke dalam ukiran piring keramik premium kami. Piring Batikura Plate edisi Topeng Malangan ini didesain khusus agar setiap sajian kuliner di atasnya terasa seperti merayakan karya seni kebudayaan Jawa Timur.',
            'image_path' => 'articles/topeng-malangan.jpg',
        ]);

        \App\Models\Article::create([
            'title' => 'Mengapa Higienitas Alat Makan Keramik Sangat Penting?',
            'slug' => 'mengapa-higienitas-alat-makan-keramik-sangat-penting',
            'category' => 'higienitas',
            'content' => 'Alat makan plastik murah sering kali menyimpan risiko zat kimia berbahaya seperti BPA yang dapat larut ke dalam makanan hangat. Keramik premium dari Batikura Plate dibuat menggunakan bahan tanah liat alami yang dibakar pada suhu ekstrem di atas 1200 derajat Celsius. Proses vitrifikasi ini membuat permukaan piring keramik benar-benar padat (non-porous), bebas zat timbal berbahaya (Lead-free), sangat mudah dibersihkan dari minyak membandel, serta tidak menyerap bakteri.',
            'image_path' => 'articles/higienitas-alat-makan.jpg',
        ]);

        // Seed Galleries
        \App\Models\Gallery::create([
            'title' => 'Piring Batikura di Meja Makan',
            'category' => 'produk',
            'image_path' => 'gallery/gallery-produk-1.jpg',
            'description' => 'Tampilan sajian kuliner nusantara di atas piring premium Batikura Plate.',
        ]);

        \App\Models\Gallery::create([
            'title' => 'Kemasan Kotak Kayu Eksklusif',
            'category' => 'kemasan',
            'image_path' => 'gallery/gallery-kemasan-1.jpg',
            'description' => 'Kemasan hantaran / gift box eksklusif dari bahan kayu pinus pilihan.',
        ]);

        \App\Models\Gallery::create([
            'title' => 'Proses Pemolesan Tanah Liat',
            'category' => 'proses',
            'image_path' => 'gallery/gallery-proses-1.jpg',
            'description' => 'Tahap pembentukan tanah liat secara manual (throwing) oleh pengrajin Dinoyo.',
        ]);

        \App\Models\Gallery::create([
            'title' => 'Proses Melukis Motif Batik',
            'category' => 'proses',
            'image_path' => 'gallery/gallery-proses-2.jpg',
            'description' => 'Tahapan hand-painting gambar batik halus di atas keramik setengah matang sebelum diglasir.',
        ]);
    }
}
