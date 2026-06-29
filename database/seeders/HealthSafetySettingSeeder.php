<?php

namespace Database\Seeders;

use App\Models\HealthSafetySetting;
use Illuminate\Database\Seeder;

class HealthSafetySettingSeeder extends Seeder
{
    public function run(): void
    {
        HealthSafetySetting::create([
            'title' => 'Higienitas Alat Makan',
            'badge' => 'Kesehatan & Keamanan',
            'description' => 'Alat makan plastik murah sering kali menyimpan risiko zat kimia berbahaya seperti BPA yang dapat larut ke dalam makanan hangat. Keramik premium dari Batikura Plate dibuat menggunakan bahan tanah liat alami yang dibakar pada suhu ekstrem di atas 1200 derajat Celsius. Proses vitrifikasi ini membuat permukaan keramik menjadi padat, non-porous, dan aman bagi kesehatan keluarga Anda.',
            'features' => ['Non-porous', 'Lead-free', 'Anti Bakteri', 'Mudah Dibersihkan'],
            'button_text' => 'Baca Selengkapnya',
            'button_link' => '/artikel/kesehatan-keramik',
            'is_active' => true,
        ]);
    }
}