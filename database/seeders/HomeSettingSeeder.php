<?php

namespace Database\Seeders;

use App\Models\HomeSetting;
use Illuminate\Database\Seeder;

class HomeSettingSeeder extends Seeder
{
    public function run(): void
    {
        // Cek apakah data sudah ada, jika belum buat
        if (!HomeSetting::exists()) {
            HomeSetting::create([
                // ===== HERO SECTION =====
                'hero_title' => 'Keanggunan Tradisi',
                'hero_subtitle' => 'di Setiap Sajian',
                'hero_badge' => 'Premium Art Tableware',
                'hero_image' => 'hero-banners/default-hero.jpg',
                'hero_button_text' => 'Lihat Produk',
                'hero_button_link' => '#product',

                // ===== PRODUCT SECTION =====
                'product_section_label' => 'Koleksi Unggulan',
                'product_section_title' => 'Produk Kami',
                'product_title' => 'Mangkuk Batik Kembang Malang',
                'product_motif' => 'Motif Kembang Malang',
                'product_description' => 'Mangkuk keramik premium dengan hiasan lukisan tangan motif Kembang Malang. Dibuat oleh pengrajin berpengalaman dari Kampung Keramik Dinoyo, Malang. Dilapisi glasir food-grade yang aman untuk makanan.',
                'product_image' => 'products/mangkuk-default.jpg',
                'product_booking_link' => 'https://forms.gle/your-google-form-link',
                'product_badge' => 'Best Seller',

                // ===== DINOYO SECTION =====
                'dinoyo_section_label' => 'Warisan Budaya',
                'dinoyo_section_title' => 'Kampung Keramik Dinoyo',
                'dinoyo_section_description' => 'Pusat kerajinan keramik tertua di Malang, tempat Batikura Plate lahir dan berkembang.',

                // ===== INSTAGRAM =====
                'instagram_title' => 'Ikuti Kami di Instagram',
                'instagram_subtitle' => 'Dapatkan informasi produk terbaru dan proses melukis batik langsung dari pengrajin.',
                'instagram_username' => 'batikura_plate',
                'instagram_url' => 'https://instagram.com/batikura_plate',
                'instagram_is_active' => true,

                // ===== MAP =====
                'map_title' => 'Kampung Keramik Dinoyo',
                'map_address' => 'Jl. MT Haryono, Kampung Wisata Keramik Dinoyo, Kec. Lowokwaru, Kota Malang, Jawa Timur 65144',
                'map_url' => 'https://www.google.com/maps/search/?api=1&query=Kampung+Keramik+Dinoyo+Malang',
                'map_button_text' => 'Buka di Google Maps',
                'map_description' => 'Temukan kami di jantung kota Malang, tempat Anda bisa melihat langsung proses pembuatan keramik dan berinteraksi dengan pengrajin berpengalaman.',
                'map_operational_hours' => 'Senin - Sabtu: 08.00 - 17.00 WIB',
                'map_closed_day' => 'Minggu: Tutup',
                'map_is_active' => true,

                // ===== STATUS =====
                'is_active' => true,
            ]);
        }
    }
}