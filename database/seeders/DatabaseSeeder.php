<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Product;
use App\Models\Article;
use App\Models\Gallery;
use App\Models\HomeSetting;
use App\Models\AboutSetting;
use App\Models\Category;
use App\Models\HealthSafetySetting;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    public function run(): void
    {
        // ============================================
        // 1. SEED ADMIN USER
        // ============================================
        User::updateOrCreate(
            ['username' => 'admin'],
            [
                'name' => 'Admin Batikura Plate',
                'password' => bcrypt('password123'),
            ]
        );

        // ============================================
        // 2. SEED HOME SETTINGS (TANPA GAMBAR)
        // ============================================
        HomeSetting::updateOrCreate(
            ['id' => 1],
            [
                'hero_title' => 'Keanggunan Tradisi',
                'hero_subtitle' => 'di Setiap Sajian',
                'hero_badge' => 'Premium Art Tableware',
                'hero_image' => null, // ← TIDAK PAKAI GAMBAR
                'hero_button_text' => 'Lihat Produk',
                'hero_button_link' => '#product',
                'product_section_label' => 'Koleksi Unggulan',
                'product_section_title' => 'Produk Kami',
                'product_title' => 'Mangkuk Batik Kembang Malang',
                'product_motif' => 'Motif Kembang Malang',
                'product_description' => 'Mangkuk keramik premium dengan hiasan lukisan tangan motif Kembang Malang. Dibuat oleh pengrajin berpengalaman dari Kampung Keramik Dinoyo, Malang. Dilapisi glasir food-grade yang aman untuk makanan.',
                'product_image' => null, // ← TIDAK PAKAI GAMBAR
                'product_booking_link' => 'https://forms.gle/your-google-form-link',
                'product_badge' => 'Best Seller',
                'dinoyo_section_label' => 'Warisan Budaya',
                'dinoyo_section_title' => 'Kampung Keramik Dinoyo',
                'dinoyo_section_description' => 'Pusat kerajinan keramik tertua di Malang, tempat Batikura Plate lahir dan berkembang.',
                'instagram_title' => 'Ikuti Kami di Instagram',
                'instagram_subtitle' => 'Dapatkan informasi produk terbaru dan proses melukis batik langsung dari pengrajin.',
                'instagram_username' => 'batikura_plate',
                'instagram_url' => 'https://instagram.com/batikura_plate',
                'instagram_is_active' => true,
                'map_title' => 'Kampung Keramik Dinoyo',
                'map_address' => 'Jl. MT Haryono, Kampung Wisata Keramik Dinoyo, Kec. Lowokwaru, Kota Malang, Jawa Timur 65144',
                'map_url' => 'https://www.google.com/maps/search/?api=1&query=Kampung+Keramik+Dinoyo+Malang',
                'map_button_text' => 'Buka di Google Maps',
                'map_description' => 'Temukan kami di jantung kota Malang, tempat Anda bisa melihat langsung proses pembuatan keramik dan berinteraksi dengan pengrajin berpengalaman.',
                'map_operational_hours' => 'Senin - Sabtu: 08.00 - 17.00 WIB',
                'map_closed_day' => 'Minggu: Tutup',
                'map_is_active' => true,
                'is_active' => true,
            ]
        );

        // ============================================
        // 3. SEED ABOUT SETTINGS
        // ============================================
        AboutSetting::updateOrCreate(
            ['id' => 1],
            [
                'hero_title' => 'Batikura Plate',
                'hero_subtitle' => 'Tentang Kami',
                'hero_description' => 'Perpaduan higienitas, fungsi, dan nilai budaya Nusantara',
                
                'apa_title' => 'Apa Itu Batikura?',
                'apa_description' => 'Mangkuk dan piring khas Malang dengan higienitas yang dipadukan dengan estetika budaya Nusantara. Setiap produk adalah karya seni fungsional yang menghadirkan keindahan batik Malangan.',
                'apa_image' => null,
                
                'mengapa_title' => 'Kenapa Batikura?',
                'mengapa_description' => 'Piring keramik yang menghadirkan perpaduan antara higienitas, fungsi, dan nilai budaya dalam satu kesatuan.',
                'mengapa_image' => null,
                'mengapa_poin_1' => 'Membantu menjaga kebersihan permukaan alat makan.',
                'mengapa_poin_2' => 'Dirancang untuk memberikan rasa aman dalam setiap penggunaan.',
                'mengapa_poin_3' => 'Motif batik Malang yang sarat makna dan filosofi.',
                
                'cerita_title' => 'Cerita Kami',
                'cerita_paragraf_1' => 'Batikura Plate lahir dari rasa cinta terhadap kekayaan budaya Nusantara. Berawal dari keprihatinan terhadap minimnya alat makan yang menggabungkan estetika budaya dengan standar higienitas tinggi.',
                'cerita_paragraf_2' => 'Kami bekerja sama dengan pengrajin Kampung Keramik Dinoyo, Malang, yang telah mewarisi keahlian membentuk tanah liat selama puluhan tahun.',
                'cerita_paragraf_3' => 'Batikura berasal dari gabungan kata Batik (karya seni) dan Kura-kura (simbol kekuatan dan ketenangan).',
                'cerita_hashtag' => '#Batikura',
                
                'proses_title' => 'Proses Pembuatan',
                'proses_1' => 'Tanah liat dibentuk tangan oleh pengrajin berpengalaman.',
                'proses_2' => 'Motif batik Malang dilukis tangan dengan detail.',
                'proses_3' => 'Dibakar pada suhu 1200°C.',
                'proses_4' => 'Dilapisi glasir food-grade.',
                
                'nilai_title' => 'Nilai-Nilai Kami',
                'nilai_1' => 'Kualitas Premium',
                'nilai_2' => 'Budaya Nusantara',
                'nilai_3' => 'Higienitas',
                'nilai_4' => 'Keberlanjutan',
                'nilai_5' => 'Inovasi',
                'nilai_6' => 'Keindahan',
                
                'book_title' => 'Pesan Sekarang',
                'book_description' => 'Dapatkan piring keramik batik elegan untuk keluarga Anda.',
                'book_link' => 'https://forms.gle/irsjT6jmL4ErVrqNA',
                'book_button_text' => 'Book Now →',
                
                'is_active' => true,
            ]
        );

        // ============================================
        // 4. SEED CATEGORIES
        // ============================================
        $categories = [
            ['name' => 'Produk'],
            ['name' => 'Kemasan'],
            ['name' => 'Proses Pembuatan'],
            ['name' => 'Kampung Keramik Dinoyo'],
            ['name' => 'Batik Malang'],
            ['name' => 'Topeng Malangan'],
            ['name' => 'Higienitas Alat Makan'],
        ];

        foreach ($categories as $cat) {
            Category::firstOrCreate(
                ['name' => $cat['name']],
                [
                    'slug' => Str::slug($cat['name']),
                    'is_active' => true,
                ]
            );
        }

        // ============================================
        // 5. SEED HEALTH SAFETY (TANPA GAMBAR)
        // ============================================
        HealthSafetySetting::firstOrCreate(
            ['id' => 1],
            [
                'badge' => 'Kesehatan & Keamanan',
                'title' => 'Higienitas Alat Makan',
                'description' => 'Alat makan plastik murah sering kali menyimpan risiko zat kimia berbahaya seperti BPA yang dapat larut ke dalam makanan hangat. Keramik premium dari Batikura Plate dibuat menggunakan bahan tanah liat alami yang dibakar pada suhu ekstrem di atas 1200 derajat Celsius. Proses vitrifikasi ini membuat permukaan keramik menjadi padat, non-porous, dan aman bagi kesehatan keluarga Anda.',
                'features' => ['Non-porous', 'Lead-free', 'Anti Bakteri', 'Mudah Dibersihkan'],
                'button_text' => 'Baca Selengkapnya',
                'button_link' => '/artikel/kesehatan-keramik',
                'image' => null, // ← TANPA GAMBAR
                'is_active' => true,
            ]
        );

        // ============================================
        // 6. SEED PRODUCTS (TANPA GAMBAR)
        // ============================================
        $products = [
            [
                'name' => 'Batikura Plate - Motif Kembang Malang (25cm)',
                'slug' => 'batikura-plate-motif-kembang-malang-25cm',
                'description' => 'Piring keramik premium dengan hiasan lukisan tangan (hand-painted) motif Kembang Malang yang melambangkan keindahan alam Malang. Cocok untuk alat makan formal maupun hiasan dekorasi rumah.',
                'price' => 185000,
                'motif' => 'Kembang Malang',
                'size' => '25cm',
                'image_path' => null, // ← TANPA GAMBAR
                'shopee_url' => 'https://shopee.co.id',
                'tokopedia_url' => 'https://tokopedia.com',
                'whatsapp_text' => 'Halo Admin, saya tertarik untuk memesan piring Batikura Plate Motif Kembang Malang (25cm). Mohon info ketersediaan barang.',
                'is_active' => true,
            ],
            [
                'name' => 'Batikura Plate - Motif Candi Badut (20cm)',
                'slug' => 'batikura-plate-motif-candi-badut-20cm',
                'description' => 'Piring makan keramik estetik dengan detail batik motif Candi Badut khas Malang. Dibuat langsung oleh pengrajin lokal di Kampung Keramik Dinoyo dengan pembakaran suhu tinggi sehingga aman untuk makanan (food-grade).',
                'price' => 150000,
                'motif' => 'Candi Badut',
                'size' => '20cm',
                'image_path' => null, // ← TANPA GAMBAR
                'shopee_url' => 'https://shopee.co.id',
                'tokopedia_url' => 'https://tokopedia.com',
                'whatsapp_text' => 'Halo Admin, saya tertarik untuk memesan piring Batikura Plate Motif Candi Badut (20cm). Mohon info ketersediaan barang.',
                'is_active' => true,
            ],
            [
                'name' => 'Batikura Plate - Edisi Eksklusif Topeng Malangan',
                'slug' => 'batikura-plate-edisi-eksklusif-topeng-malangan',
                'description' => 'Produk mahakarya kolaborasi pengrajin Dinoyo dengan motif Topeng Malangan (Karakter Panji). Sangat cocok sebagai hadiah eksklusif (gift) atau souvenir budaya mewah.',
                'price' => 220000,
                'motif' => 'Topeng Malangan',
                'size' => '22cm',
                'image_path' => null, // ← TANPA GAMBAR
                'shopee_url' => 'https://shopee.co.id',
                'tokopedia_url' => 'https://tokopedia.com',
                'whatsapp_text' => 'Halo Admin, saya tertarik untuk memesan piring Batikura Plate Edisi Eksklusif Topeng Malangan. Mohon info ketersediaan barang.',
                'is_active' => true,
            ],
        ];

        foreach ($products as $product) {
            Product::updateOrCreate(
                ['slug' => $product['slug']],
                $product
            );
        }

        // ============================================
        // 7. SEED ARTICLES (TANPA GAMBAR)
        // ============================================
        $catDinoyo = Category::where('name', 'Kampung Keramik Dinoyo')->first();
        $catBatik = Category::where('name', 'Batik Malang')->first();
        $catTopeng = Category::where('name', 'Topeng Malangan')->first();
        $catHigienitas = Category::where('name', 'Higienitas Alat Makan')->first();

        $articles = [
            [
                'title' => 'Sejarah Panjang Kampung Keramik Dinoyo Malang',
                'slug' => 'sejarah-panjang-kampung-keramik-dinoyo-malang',
                'category_id' => $catDinoyo ? $catDinoyo->id : null,
                'content' => 'Kampung Keramik Dinoyo merupakan salah satu ikon wisata budaya dan kerajinan legendaris di Kota Malang. Berdiri sejak tahun 1950-an, industri rumahan di daerah Dinoyo awalnya memproduksi gerabah tanah liat tradisional sebelum beralih ke keramik porselen putih yang lebih modern dan tahan lama. Keahlian ini diwariskan secara turun-temurun hingga saat ini, menciptakan produk piring, cangkir, dan vas hias dengan kualitas ekspor yang bernilai seni tinggi.',
                'image_path' => null, // ← TANPA GAMBAR
                'is_published' => true,
            ],
            [
                'title' => 'Mengenal Ragam Motif Batik Khas Malang',
                'slug' => 'mengenal-ragam-motif-batik-khas-malang',
                'category_id' => $catBatik ? $catBatik->id : null,
                'content' => 'Batik Malang (Malangan) memiliki karakter visual yang kuat, cerah, dan berani. Berbeda dari batik Solo atau Yogyakarta yang bernuansa kalem dan klasik, Batik Malang banyak mengeksplorasi simbol alam lokal seperti kembang tanjung, motif Candi Singosari, hingga ilustrasi Topeng Malangan. Di Batikura Plate, kami meramu filosofi batik Malangan ini ke atas permukaan piring keramik Dinoyo, menghasilkan perpaduan kebudayaan yang modern tanpa meninggalkan akar tradisi.',
                'image_path' => null,
                'is_published' => true,
            ],
            [
                'title' => 'Topeng Malangan: Dari Pertunjukan Tari Ke Karya Seni Keramik',
                'slug' => 'topeng-malangan-dari-pertunjukan-tari-ke-karya-seni-keramik',
                'category_id' => $catTopeng ? $catTopeng->id : null,
                'content' => 'Topeng Malangan bukan sekadar pelindung wajah dalam pementasan Tari Topeng, melainkan simbol karakter watak manusia yang kaya makna spiritual. Tokoh seperti Raden Panji yang melambangkan kebaikan dan kelembutan serta Klono yang gagah berani diadaptasi ke dalam ukiran piring keramik premium kami. Piring Batikura Plate edisi Topeng Malangan ini didesain khusus agar setiap sajian kuliner di atasnya terasa seperti merayakan karya seni kebudayaan Jawa Timur.',
                'image_path' => null,
                'is_published' => true,
            ],
            [
                'title' => 'Mengapa Higienitas Alat Makan Keramik Sangat Penting?',
                'slug' => 'mengapa-higienitas-alat-makan-keramik-sangat-penting',
                'category_id' => $catHigienitas ? $catHigienitas->id : null,
                'content' => 'Alat makan plastik murah sering kali menyimpan risiko zat kimia berbahaya seperti BPA yang dapat larut ke dalam makanan hangat. Keramik premium dari Batikura Plate dibuat menggunakan bahan tanah liat alami yang dibakar pada suhu ekstrem di atas 1200 derajat Celsius. Proses vitrifikasi ini membuat permukaan piring keramik benar-benar padat (non-porous), bebas zat timbal berbahaya (Lead-free), sangat mudah dibersihkan dari minyak membandel, serta tidak menyerap bakteri.',
                'image_path' => null,
                'is_published' => true,
            ],
        ];

        foreach ($articles as $article) {
            Article::updateOrCreate(
                ['slug' => $article['slug']],
                $article
            );
        }

        // ============================================
        // 8. SEED GALLERIES (TANPA GAMBAR)
        // ============================================
        $catProduk = Category::where('name', 'Produk')->first();
        $catKemasan = Category::where('name', 'Kemasan')->first();
        $catProses = Category::where('name', 'Proses Pembuatan')->first();

        $galleries = [
            [
                'title' => 'Piring Batikura di Meja Makan',
                'category_id' => $catProduk ? $catProduk->id : null,
                'image_path' => null, // ← TANPA GAMBAR
                'description' => 'Tampilan sajian kuliner nusantara di atas piring premium Batikura Plate.',
                'is_active' => true,
            ],
            [
                'title' => 'Kemasan Kotak Kayu Eksklusif',
                'category_id' => $catKemasan ? $catKemasan->id : null,
                'image_path' => null,
                'description' => 'Kemasan hantaran / gift box eksklusif dari bahan kayu pinus pilihan.',
                'is_active' => true,
            ],
            [
                'title' => 'Proses Pemolesan Tanah Liat',
                'category_id' => $catProses ? $catProses->id : null,
                'image_path' => null,
                'description' => 'Tahap pembentukan tanah liat secara manual (throwing) oleh pengrajin Dinoyo.',
                'is_active' => true,
            ],
            [
                'title' => 'Proses Melukis Motif Batik',
                'category_id' => $catProses ? $catProses->id : null,
                'image_path' => null,
                'description' => 'Tahapan hand-painting gambar batik halus di atas keramik setengah matang sebelum diglasir.',
                'is_active' => true,
            ],
        ];

        foreach ($galleries as $gallery) {
            Gallery::updateOrCreate(
                ['title' => $gallery['title']],
                $gallery
            );
        }

        $this->command->info('✅ Database seeding selesai!');
        $this->command->info('🔑 Admin: username=admin, password=password123');
        $this->command->info('📸 Upload gambar melalui admin panel setelah seeding.');
    }
}