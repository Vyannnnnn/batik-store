<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class AdminProductController extends Controller
{
    /**
     * Tampilkan daftar produk.
     */
    public function index()
    {
        $products = Product::latest()->paginate(10);
        return view('admin.products.index', compact('products'));
    }

    /**
     * Tampilkan form tambah produk.
     */
    public function create()
    {
        return view('admin.products.create');
    }

    /**
     * Simpan produk baru.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|integer|min:0',
            'motif' => 'required|string|max:255',
            'size' => 'required|string|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg,webp|max:2048',
            'shopee_url' => 'nullable|url',
            'tokopedia_url' => 'nullable|url',
            'whatsapp_text' => 'nullable|string',
        ]);

        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('products', 'public');
        }

        Product::create([
            'name' => $request->name,
            'slug' => Str::slug($request->name) . '-' . time(),
            'description' => $request->description,
            'price' => $request->price,
            'motif' => $request->motif,
            'size' => $request->size,
            'image_path' => $imagePath,
            'shopee_url' => $request->shopee_url,
            'tokopedia_url' => $request->tokopedia_url,
            'whatsapp_text' => $request->whatsapp_text ?: 'Halo Admin, saya tertarik memesan produk ' . $request->name . '.',
        ]);

        return redirect()->route('admin.products.index')->with('success', 'Produk berhasil ditambahkan.');
    }

    /**
     * Tampilkan form edit produk.
     */
    public function edit(Product $product)
    {
        return view('admin.products.edit', compact('product'));
    }

    /**
     * Update produk yang sudah ada.
     */
    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|integer|min:0',
            'motif' => 'required|string|max:255',
            'size' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'shopee_url' => 'nullable|url',
            'tokopedia_url' => 'nullable|url',
            'whatsapp_text' => 'nullable|string',
        ]);

        $imagePath = $product->image_path;
        if ($request->hasFile('image')) {
            // Hapus gambar lama jika ada
            if ($imagePath && Storage::disk('public')->exists($imagePath)) {
                Storage::disk('public')->delete($imagePath);
            }
            $imagePath = $request->file('image')->store('products', 'public');
        }

        // Update slug hanya jika nama produk berubah
        $slug = $product->slug;
        if ($product->name !== $request->name) {
            $slug = Str::slug($request->name) . '-' . time();
        }

        $product->update([
            'name' => $request->name,
            'slug' => $slug,
            'description' => $request->description,
            'price' => $request->price,
            'motif' => $request->motif,
            'size' => $request->size,
            'image_path' => $imagePath,
            'shopee_url' => $request->shopee_url,
            'tokopedia_url' => $request->tokopedia_url,
            'whatsapp_text' => $request->whatsapp_text,
        ]);

        return redirect()->route('admin.products.index')->with('success', 'Produk berhasil diperbarui.');
    }

    /**
     * Hapus produk.
     */
    public function destroy(Product $product)
    {
        if ($product->image_path && Storage::disk('public')->exists($product->image_path)) {
            Storage::disk('public')->delete($product->image_path);
        }

        $product->delete();

        return redirect()->route('admin.products.index')->with('success', 'Produk berhasil dihapus.');
    }
}
