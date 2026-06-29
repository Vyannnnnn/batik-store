<?php

namespace App\Http\Controllers;

use App\Models\HomeSetting;
use App\Models\HealthSafetySetting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminHomeSettingController extends Controller
{
    public function index()
    {
        $homeSetting = HomeSetting::first();
        
        if (!$homeSetting) {
            $homeSetting = HomeSetting::create([
                'hero_title' => 'Batikura Plate',
                'hero_subtitle' => 'Mangkuk Batik Premium',
                'is_active' => true,
            ]);
        }
        
        return view('admin.home-settings.index', compact('homeSetting'));
    }

    public function edit($id)
    {
        $homeSetting = HomeSetting::find($id);
        
        if (!$homeSetting) {
            return redirect()->route('admin.home-settings.index')
                ->with('error', 'Data tidak ditemukan!');
        }
        
        // Ambil data health safety
        $healthSafety = HealthSafetySetting::first();
        
        // Jika belum ada, buat default
        if (!$healthSafety) {
            $healthSafety = HealthSafetySetting::create([
                'title' => 'Higienitas Alat Makan',
                'badge' => 'Kesehatan & Keamanan',
                'description' => 'Alat makan plastik murah sering kali menyimpan risiko zat kimia berbahaya seperti BPA yang dapat larut ke dalam makanan hangat. Keramik premium dari Batikura Plate dibuat menggunakan bahan tanah liat alami yang dibakar pada suhu ekstrem di atas 1200 derajat Celsius. Proses vitrifikasi ini membuat permukaan keramik menjadi padat, non-porous, dan aman bagi kesehatan keluarga Anda.',
                'features' => ['Non-porous', 'Lead-free', 'Anti Bakteri', 'Mudah Dibersihkan'],
                'button_text' => 'Baca Selengkapnya',
                'button_link' => '/artikel/kesehatan-keramik',
                'is_active' => true,
            ]);
        }
        
        return view('admin.home-settings.edit', compact('homeSetting', 'healthSafety'));
    }

    public function update(Request $request, $id)
    {
        $homeSetting = HomeSetting::find($id);
        
        if (!$homeSetting) {
            return redirect()->route('admin.home-settings.index')
                ->with('error', 'Data tidak ditemukan!');
        }

        // Validasi Home Settings
        $validated = $request->validate([
            // Hero
            'hero_title' => 'nullable|string|max:255',
            'hero_subtitle' => 'nullable|string|max:255',
            'hero_badge' => 'nullable|string|max:255',
            'hero_button_text' => 'nullable|string|max:255',
            'hero_button_link' => 'nullable|string|max:255',
            
            // Product
            'product_section_label' => 'nullable|string|max:255',
            'product_section_title' => 'nullable|string|max:255',
            'product_title' => 'nullable|string|max:255',
            'product_motif' => 'nullable|string|max:255',
            'product_description' => 'nullable|string',
            'product_booking_link' => 'nullable|string|max:255',
            'product_badge' => 'nullable|string|max:255',
            
            // Dinoyo
            'dinoyo_section_label' => 'nullable|string|max:255',
            'dinoyo_section_title' => 'nullable|string|max:255',
            'dinoyo_section_description' => 'nullable|string',
            
            // Instagram
            'instagram_title' => 'nullable|string|max:255',
            'instagram_subtitle' => 'nullable|string',
            'instagram_username' => 'nullable|string|max:255',
            'instagram_url' => 'nullable|string|max:255',
            'instagram_is_active' => 'nullable|boolean',
            
            // Map
            'map_title' => 'nullable|string|max:255',
            'map_address' => 'nullable|string',
            'map_url' => 'nullable|string|max:255',
            'map_button_text' => 'nullable|string|max:255',
            'map_description' => 'nullable|string',
            'map_operational_hours' => 'nullable|string|max:255',
            'map_closed_day' => 'nullable|string|max:255',
            'map_is_active' => 'nullable|boolean',
            
            // Health & Safety
            'health_title' => 'nullable|string|max:255',
            'health_badge' => 'nullable|string|max:255',
            'health_description' => 'nullable|string',
            'health_features' => 'nullable|array',
            'health_features.*' => 'nullable|string|max:255',
            'health_button_text' => 'nullable|string|max:255',
            'health_button_link' => 'nullable|string|max:255',
            'health_is_active' => 'nullable|boolean',
            
            'is_active' => 'nullable|boolean',
        ]);

        // Handle Hero Image
        if ($request->hasFile('hero_image')) {
            if ($homeSetting->hero_image && Storage::disk('public')->exists(str_replace('storage/', '', $homeSetting->hero_image))) {
                Storage::disk('public')->delete(str_replace('storage/', '', $homeSetting->hero_image));
            }
            $file = $request->file('hero_image');
            $filename = time() . '_hero.' . $file->getClientOriginalExtension();
            $path = $file->storeAs('hero-banners', $filename, 'public');
            $validated['hero_image'] = 'storage/' . $path;
        }

        // Handle Product Image
        if ($request->hasFile('product_image')) {
            if ($homeSetting->product_image && Storage::disk('public')->exists(str_replace('storage/', '', $homeSetting->product_image))) {
                Storage::disk('public')->delete(str_replace('storage/', '', $homeSetting->product_image));
            }
            $file = $request->file('product_image');
            $filename = time() . '_product.' . $file->getClientOriginalExtension();
            $path = $file->storeAs('products', $filename, 'public');
            $validated['product_image'] = 'storage/' . $path;
        }

        // Boolean fields for Home
        $validated['instagram_is_active'] = $request->has('instagram_is_active');
        $validated['map_is_active'] = $request->has('map_is_active');
        $validated['is_active'] = $request->has('is_active');

        // Update Home Settings
        $homeSetting->update($validated);

        // ============================================ //
        // UPDATE HEALTH & SAFETY
        // ============================================ //
        $healthSafety = HealthSafetySetting::first();
        
        // Jika healthSafety tidak ada, buat baru
        if (!$healthSafety) {
            $healthSafety = new HealthSafetySetting();
        }
        
        // Data Health Safety
        $healthData = [
            'title' => $request->health_title,
            'badge' => $request->health_badge,
            'description' => $request->health_description,
            'features' => $request->has('health_features') ? array_filter($request->health_features) : [],
            'button_text' => $request->health_button_text,
            'button_link' => $request->health_button_link,
            'is_active' => $request->has('health_is_active'),
        ];
        
        // Handle Health Image UPLOAD
        if ($request->hasFile('health_image')) {
            // Hapus gambar lama jika ada
            if ($healthSafety->image && Storage::disk('public')->exists(str_replace('storage/', '', $healthSafety->image))) {
                Storage::disk('public')->delete(str_replace('storage/', '', $healthSafety->image));
            }
            
            // Upload gambar baru
            $file = $request->file('health_image');
            $filename = time() . '_health.' . $file->getClientOriginalExtension();
            $path = $file->storeAs('health-safety', $filename, 'public');
            $healthData['image'] = 'storage/' . $path;
        }
        
        // Simpan/Update Health Safety
        $healthSafety->fill($healthData);
        $healthSafety->save();

        return redirect()
            ->route('admin.home-settings.index')
            ->with('success', 'Semua pengaturan berhasil diupdate!');
    }
}