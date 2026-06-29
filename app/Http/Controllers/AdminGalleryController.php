<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminGalleryController extends Controller
{
    public function index(Request $request)
    {
        $query = Gallery::with('category');
        
        if ($request->has('category') && $request->category) {
            $query->where('category_id', $request->category);
        }
        
        $galleries = $query->latest()->paginate(12);
        $categories = Category::where('is_active', true)->orderBy('name')->get();
        
        return view('admin.galleries.index', compact('galleries', 'categories'));
    }

    public function create()
    {
        $categories = Category::where('is_active', true)->orderBy('name')->get();
        return view('admin.galleries.create', compact('categories'));
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'title' => 'nullable|string|max:255',
                'category_id' => 'nullable|exists:categories,id',
                'image' => 'required|image|mimes:jpeg,png,jpg,webp|max:2048',
                'description' => 'nullable|string',
                'is_active' => 'nullable|boolean',
            ]);

            $data = $request->all();
            $data['is_active'] = $request->has('is_active');

            if ($request->hasFile('image')) {
                $file = $request->file('image');
                $filename = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
                $path = $file->storeAs('galleries', $filename, 'public');
                $data['image_path'] = $path;
            }

            Gallery::create($data);

            return redirect()
                ->route('admin.galleries.index')
                ->with('success', 'Foto galeri berhasil ditambahkan!');
                
        } catch (\Exception $e) {
            return redirect()
                ->back()
                ->withInput()
                ->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    public function edit($id)
    {
        $gallery = Gallery::with('category')->findOrFail($id);
        $categories = Category::where('is_active', true)->orderBy('name')->get();
        return view('admin.galleries.edit', compact('gallery', 'categories'));
    }

  public function update(Request $request, $id)
{
    try {
        $gallery = Gallery::findOrFail($id);

        $request->validate([
            'title' => 'nullable|string|max:255',
            'category_id' => 'nullable|exists:categories,id',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'description' => 'nullable|string',
            'is_active' => 'nullable|boolean',
        ]);

        $data = $request->all();
        $data['is_active'] = $request->has('is_active');

        // HANYA UPLOAD GAMBAR JIKA ADA FILE BARU
        if ($request->hasFile('image')) {
            // Hapus gambar lama jika ada
            if ($gallery->image_path) {
                $oldPath = $gallery->image_path;
                // Coba berbagai kemungkinan path
                if (Storage::disk('public')->exists($oldPath)) {
                    Storage::disk('public')->delete($oldPath);
                }
                // Coba dengan storage/ prefix
                if (Storage::disk('public')->exists(str_replace('storage/', '', $oldPath))) {
                    Storage::disk('public')->delete(str_replace('storage/', '', $oldPath));
                }
            }

            // Upload gambar baru
            $file = $request->file('image');
            $filename = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
            $path = $file->storeAs('galleries', $filename, 'public');
            $data['image_path'] = $path;
        }
        // JIKA TIDAK ADA FILE BARU, PERTAHANKAN GAMBAR LAMA
        else {
            $data['image_path'] = $gallery->image_path;
        }

        $gallery->update($data);

        return redirect()
            ->route('admin.galleries.index')
            ->with('success', 'Foto galeri berhasil diupdate!');
            
    } catch (\Exception $e) {
        return redirect()
            ->back()
            ->withInput()
            ->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
    }
}
    public function destroy($id)
    {
        try {
            $gallery = Gallery::findOrFail($id);

            if ($gallery->image_path) {
                $oldPath = $gallery->image_path;
                if (Storage::disk('public')->exists($oldPath)) {
                    Storage::disk('public')->delete($oldPath);
                }
            }

            $gallery->delete();

            return redirect()
                ->route('admin.galleries.index')
                ->with('success', 'Foto galeri berhasil dihapus!');
                
        } catch (\Exception $e) {
            return redirect()
                ->back()
                ->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    public function toggleActive($id)
    {
        $gallery = Gallery::findOrFail($id);
        $gallery->is_active = !$gallery->is_active;
        $gallery->save();

        $status = $gallery->is_active ? 'diaktifkan' : 'dinonaktifkan';
        return redirect()
            ->back()
            ->with('success', "Foto '{$gallery->title}' berhasil {$status}!");
    }
}