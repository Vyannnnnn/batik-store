<?php

namespace App\Http\Controllers;

use App\Models\AboutSetting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminAboutSettingController extends Controller
{
    public function index()
    {
        $about = AboutSetting::first() ?? new AboutSetting();
        return view('admin.about-settings.index', compact('about'));
    }

    public function edit($id)
    {
        $about = AboutSetting::findOrFail($id);
        return view('admin.about-settings.edit', compact('about'));
    }

 public function update(Request $request, $id)
{
    $request->validate([
        // Hero
        'hero_title' => 'nullable|string|max:255',
        'hero_subtitle' => 'nullable|string|max:255',
        'hero_description' => 'nullable|string',
        
        // Apa Itu Batikura
        'apa_title' => 'nullable|string|max:255',
        'apa_description' => 'nullable|string',
        'apa_image' => 'nullable|image|max:2048',
        
        // Mengapa
        'mengapa_title' => 'nullable|string|max:255',
        'mengapa_description' => 'nullable|string',
        'mengapa_image' => 'nullable|image|max:2048',
        'mengapa_poin_1' => 'nullable|string',
        'mengapa_poin_2' => 'nullable|string',
        'mengapa_poin_3' => 'nullable|string',
        
        // Cerita Kami
        'cerita_title' => 'nullable|string|max:255',
        'cerita_timeline_1' => 'nullable|string',
        'cerita_timeline_2' => 'nullable|string',
        'cerita_timeline_3' => 'nullable|string',
        'cerita_timeline_4' => 'nullable|string',
        'cerita_paragraf_1' => 'nullable|string',
        'cerita_hashtag' => 'nullable|string|max:255',
        
        // Proses
        'proses_title' => 'nullable|string|max:255',
        'proses_1' => 'nullable|string',
        'proses_2' => 'nullable|string',
        'proses_3' => 'nullable|string',
        'proses_4' => 'nullable|string',
        
        // Nilai
        'nilai_title' => 'nullable|string|max:255',
        'nilai_1' => 'nullable|string',
        'nilai_2' => 'nullable|string',
        'nilai_3' => 'nullable|string',
        'nilai_4' => 'nullable|string',
        'nilai_5' => 'nullable|string',
        'nilai_6' => 'nullable|string',
        
        // Book
        'book_title' => 'nullable|string|max:255',
        'book_description' => 'nullable|string',
        'book_link' => 'nullable|string|max:255',
        'book_button_text' => 'nullable|string|max:255',
    ]);

    try {
        $about = AboutSetting::findOrFail($id);
        $data = $request->except(['apa_image', 'mengapa_image', '_token', '_method']);

        // Upload Apa Image
        if ($request->hasFile('apa_image')) {
            if ($about->apa_image && Storage::disk('public')->exists($about->apa_image)) {
                Storage::disk('public')->delete($about->apa_image);
            }
            $data['apa_image'] = $request->file('apa_image')->store('about', 'public');
        }

        // Upload Mengapa Image
        if ($request->hasFile('mengapa_image')) {
            if ($about->mengapa_image && Storage::disk('public')->exists($about->mengapa_image)) {
                Storage::disk('public')->delete($about->mengapa_image);
            }
            $data['mengapa_image'] = $request->file('mengapa_image')->store('about', 'public');
        }

        $data['is_active'] = true;
        $about->update($data);

        return redirect()->route('admin.about-settings.index')
            ->with('success', 'Pengaturan About berhasil diupdate!');

    } catch (\Exception $e) {
        return redirect()->back()
            ->withErrors(['error' => 'Terjadi kesalahan: ' . $e->getMessage()])
            ->withInput();
    }
}
}