<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use App\Models\Category;
use Illuminate\Http\Request;

class PublicGalleryController extends Controller
{
    public function index(Request $request)
    {
        $query = Gallery::with('category')->where('is_active', true);
        
        // Filter by category slug
        if ($request->has('category') && $request->category) {
            $category = Category::where('slug', $request->category)->first();
            if ($category) {
                $query->where('category_id', $category->id);
            }
        }
        
        $galleries = $query->latest()->paginate(12);
        
        // Ambil semua kategori aktif untuk filter
        $categories = Category::where('is_active', true)
            ->orderBy('name')
            ->get();
        
        // PAKAI VIEW YANG BENAR: public.gallery.index
        return view('public.gallery.index', compact('galleries', 'categories'));
    }
}