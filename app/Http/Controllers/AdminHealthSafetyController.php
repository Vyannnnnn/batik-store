<?php

namespace App\Http\Controllers;

use App\Models\HealthSafetySetting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminHealthSafetyController extends Controller
{
    public function index()
    {
        $data = HealthSafetySetting::first() ?? new HealthSafetySetting();
        return view('admin.health-safety.index', compact('data'));
    }

    public function edit($id)
    {
        $data = HealthSafetySetting::findOrFail($id);
        return view('admin.health-safety.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $data = HealthSafetySetting::findOrFail($id);

        $validated = $request->validate([
            'title' => 'nullable|string|max:255',
            'badge' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'image_alt' => 'nullable|string|max:255',
            'features' => 'nullable|array',
            'features.*' => 'nullable|string|max:255',
            'button_text' => 'nullable|string|max:255',
            'button_link' => 'nullable|string|max:255',
            'is_active' => 'nullable|boolean',
        ]);

        // Handle Image Upload
        if ($request->hasFile('image')) {
            // Hapus gambar lama
            if ($data->image && Storage::disk('public')->exists(str_replace('storage/', '', $data->image))) {
                Storage::disk('public')->delete(str_replace('storage/', '', $data->image));
            }

            $file = $request->file('image');
            $filename = time() . '_health_safety.' . $file->getClientOriginalExtension();
            $path = $file->storeAs('health-safety', $filename, 'public');
            $validated['image'] = 'storage/' . $path;
        }

        // Handle features (array to json)
        if ($request->has('features')) {
            $validated['features'] = array_filter($request->features); // remove empty values
        }

        $validated['is_active'] = $request->has('is_active');

        $data->update($validated);

        return redirect()
            ->route('admin.health-safety.index')
            ->with('success', 'Pengaturan Kesehatan & Keamanan berhasil diupdate!');
    }
}