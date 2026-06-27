<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class PublicProductController extends Controller
{
    /**
     * Tampilkan katalog produk.
     */
    public function index(Request $request)
    {
        $query = Product::query();

        // Filter berdasarkan Motif
        if ($request->filled('motif')) {
            $query->where('motif', 'like', '%' . $request->motif . '%');
        }

        // Filter berdasarkan Pencarian Nama
        if ($request->filled('search')) {
            $query->where('name', 'like', '%' . $request->search . '%');
        }

        $products = $query->latest()->paginate(9);

        // Ambil semua motif untuk filter dropdown
        $motifs = Product::select('motif')->distinct()->pluck('motif');

        return view('public.products.index', compact('products', 'motifs'));
    }

    /**
     * Tampilkan detail produk tunggal.
     */
    public function show($slug)
    {
        $product = Product::where('slug', $slug)->firstOrFail();
        
        // Produk terkait
        $relatedProducts = Product::where('id', '!=', $product->id)
            ->where(function($q) use ($product) {
                $q->where('motif', $product->motif)
                  ->orWhere('size', $product->size);
            })
            ->take(3)
            ->get();

        return view('public.products.show', compact('product', 'relatedProducts'));
    }
}
