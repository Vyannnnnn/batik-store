<?php

namespace Database\Seeders;

use App\Models\ContactSetting;
use Illuminate\Database\Seeder;

class ContactSettingSeeder extends Seeder
{
    public function run(): void
    {
        ContactSetting::create([
            'header_title' => 'Hubungi Batikura',
            'header_subtitle' => 'Informasi Kontak',
            'header_description' => 'Ada pertanyaan atau ingin memesan? Silakan hubungi kami melalui saluran berikut.',
            
            'address_title' => 'Informasi Kontak',
            'address' => 'Jalan MT Haryono, Kampung Wisata Keramik Dinoyo, Kec. Lowokwaru, Kota Malang, Jawa Timur 65144',
            
            'instagram_title' => 'Instagram',
            'instagram_username' => '@batikura_plate',
            'instagram_url' => 'https://instagram.com/batikura_plate',
            'instagram_description' => 'Follow untuk update produk terbaru',
            
            'form_title' => 'Pesan Sekarang',
            'form_description' => 'Klik tombol di bawah untuk melakukan pemesanan melalui Google Form.',
            'form_button_text' => 'Book Now →',
            'form_link' => 'https://forms.gle/irsjT6jmL4ErVrqNA',
            'form_footer_text' => '* Klik untuk melakukan pemesanan melalui Google Form',
            
            'maps_title' => 'Lokasi Kami',
            'maps_subtitle' => 'Kampung Wisata Keramik Dinoyo, Malang',
            'maps_embed' => null,
            'maps_footer' => '📍 Kampung Wisata Keramik Dinoyo, Malang',
            
            'is_active' => true,
        ]);
    }
}