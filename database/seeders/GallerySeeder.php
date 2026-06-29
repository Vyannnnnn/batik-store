<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Gallery;

class GallerySeeder extends Seeder
{
    public function run()
    {
        $galleries = [
            [
                'title' => 'Suasana Kampung Dinoyo',
                'category' => 'proses',
                'image_path' => 'galleries/dinoyo-1.jpg',
                'description' => 'Kehidupan pengrajin keramik di Kampung Dinoyo',
                'order' => 1,
                'is_active' => true,
            ],
            [
                'title' => 'Proses Pembuatan Keramik',
                'category' => 'proses',
                'image_path' => 'galleries/dinoyo-2.jpg',
                'description' => 'Pengrajin sedang membentuk tanah liat',
                'order' => 2,
                'is_active' => true,
            ],
            [
                'title' => 'Hasil Karya Keramik Dinoyo',
                'category' => 'proses',
                'image_path' => 'galleries/dinoyo-3.jpg',
                'description' => 'Produk keramik berkualitas tinggi',
                'order' => 3,
                'is_active' => true,
            ],
        ];

        foreach ($galleries as $gallery) {
            Gallery::updateOrCreate(
                ['title' => $gallery['title']],
                $gallery
            );
        }
    }
}