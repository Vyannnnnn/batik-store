<?php

namespace App\Http\Controllers;

use App\Models\ContactSetting;
use App\Models\HomeSetting;
use Illuminate\Http\Request;

class AdminContactSettingController extends Controller
{
    public function index()
    {
        $contact = ContactSetting::first() ?? new ContactSetting();
        $homeSetting = HomeSetting::where('is_active', true)->first();
        return view('admin.contact-settings.index', compact('contact', 'homeSetting'));
    }

    public function edit($id)
    {
        $contact = ContactSetting::findOrFail($id);
        $homeSetting = HomeSetting::where('is_active', true)->first();
        return view('admin.contact-settings.edit', compact('contact', 'homeSetting'));
    }

    public function update(Request $request, $id)
    {
        // HAPUS validasi untuk form_link dan maps
        $validated = $request->validate([
            'header_title' => 'nullable|string|max:255',
            'header_subtitle' => 'nullable|string|max:255',
            'header_description' => 'nullable|string',
            'address_title' => 'nullable|string|max:255',
            'address' => 'nullable|string',
            'instagram_title' => 'nullable|string|max:255',
            'instagram_username' => 'nullable|string|max:255',
            'instagram_url' => 'nullable|url|max:255',
            'instagram_description' => 'nullable|string|max:255',
            'form_title' => 'nullable|string|max:255',
            'form_description' => 'nullable|string',
            'form_button_text' => 'nullable|string|max:255',
            'form_footer_text' => 'nullable|string|max:255',
            // form_link dan maps dihapus dari validasi
        ]);

        try {
            $contact = ContactSetting::findOrFail($id);
            
            // Hanya update field yang ada di tabel
            $contact->update([
                'header_title' => $validated['header_title'] ?? null,
                'header_subtitle' => $validated['header_subtitle'] ?? null,
                'header_description' => $validated['header_description'] ?? null,
                'address_title' => $validated['address_title'] ?? null,
                'address' => $validated['address'] ?? null,
                'instagram_title' => $validated['instagram_title'] ?? null,
                'instagram_username' => $validated['instagram_username'] ?? null,
                'instagram_url' => $validated['instagram_url'] ?? null,
                'instagram_description' => $validated['instagram_description'] ?? null,
                'form_title' => $validated['form_title'] ?? null,
                'form_description' => $validated['form_description'] ?? null,
                'form_button_text' => $validated['form_button_text'] ?? null,
                'form_footer_text' => $validated['form_footer_text'] ?? null,
                'is_active' => true,
            ]);

            return redirect()
                ->route('admin.contact-settings.index')
                ->with('success', '✅ Pengaturan Kontak berhasil diupdate!');

        } catch (\Exception $e) {
            return redirect()
                ->back()
                ->withErrors(['error' => '❌ Terjadi kesalahan: ' . $e->getMessage()])
                ->withInput();
        }
    }
}