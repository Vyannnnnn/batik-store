<?php

namespace App\Http\Controllers;

use App\Models\HomeSetting;
use App\Models\Gallery;
use App\Models\Article;
use App\Models\Category;
use App\Models\AboutSetting;
use App\Models\ContactSetting;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        // Ambil data home setting
        $homeSetting = HomeSetting::where('is_active', true)->first() ?? new HomeSetting();
        
        // Ambil 3 foto terbaru dari Gallery
        $dinoyoImages = Gallery::latest()->limit(3)->get();

        // AMBIL ARTIKEL HIGIENITAS - PAKAI category_id
        $higienitasCategory = Category::where('name', 'Higienitas Alat Makan')->first();
        
        if ($higienitasCategory) {
            $higienitasArticle = Article::where('category_id', $higienitasCategory->id)
                ->where('is_published', true)
                ->latest()
                ->first();
        } else {
            $higienitasArticle = null;
        }

        return view('public.home', compact('homeSetting', 'dinoyoImages', 'higienitasArticle'));
    }

    public function about()
    {
        // Ambil data about setting
        $about = AboutSetting::where('is_active', true)->first();
        
        if (!$about) {
            $about = new AboutSetting();
            $about->hero_title = 'Batikura Plate';
            $about->hero_subtitle = 'Tentang Kami';
            $about->hero_description = 'Perpaduan higienitas, fungsi, dan nilai budaya Nusantara';
            $about->apa_title = 'Apa Itu Batikura?';
            $about->apa_description = 'Mangkuk dan piring khas Malang dengan higienitas yang dipadukan dengan estetika budaya Nusantara.';
            $about->mengapa_title = 'Kenapa Batikura?';
            $about->mengapa_description = 'Piring keramik yang menghadirkan perpaduan antara higienitas, fungsi, dan nilai budaya.';
            $about->cerita_title = 'Cerita Kami';
            $about->cerita_paragraf_1 = 'Batikura Plate lahir dari rasa cinta terhadap kekayaan budaya Nusantara.';
            $about->cerita_paragraf_2 = 'Kami bekerja sama dengan pengrajin Kampung Keramik Dinoyo, Malang.';
            $about->cerita_paragraf_3 = 'Batikura berasal dari gabungan kata Batik dan Kura-kura.';
            $about->cerita_hashtag = '#Batikura';
            $about->proses_title = 'Proses Pembuatan';
            $about->proses_1 = 'Tanah liat dibentuk tangan oleh pengrajin.';
            $about->proses_2 = 'Motif batik Malang dilukis tangan.';
            $about->proses_3 = 'Dibakar pada suhu 1200°C.';
            $about->proses_4 = 'Dilapisi glasir food-grade.';
            $about->nilai_title = 'Nilai-Nilai Kami';
            $about->nilai_1 = 'Kualitas Premium';
            $about->nilai_2 = 'Budaya Nusantara';
            $about->nilai_3 = 'Higienitas';
            $about->nilai_4 = 'Keberlanjutan';
            $about->nilai_5 = 'Inovasi';
            $about->nilai_6 = 'Keindahan';
            $about->book_title = 'Pesan Sekarang';
            $about->book_description = 'Dapatkan piring keramik batik elegan untuk keluarga Anda.';
            $about->book_link = 'https://forms.gle/irsjT6jmL4ErVrqNA';
            $about->book_button_text = 'Book Now →';
            $about->is_active = true;
        }
        
        $aboutImages = [
            $about->apa_image ?? 'about/about-1.jpg',
            $about->mengapa_image ?? 'about/about-2.jpg',
        ];
        
        return view('public.about', compact('about', 'aboutImages'));
    }

    public function contact()
    {
        $contact = ContactSetting::where('is_active', true)->first() ?? new ContactSetting();
        return view('public.contact', compact('contact'));
    }
}