<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use Illuminate\Http\Request;

class PublicGalleryController extends Controller
{
    /**
     * Tampilkan halaman galeri.
     */
    public function index(Request $request)
    {
        $query = Gallery::query();

        if ($request->filled('category')) {
            $query->where('category', $request->category);
        }

        $galleries = $query->latest()->get();

        return view('public.gallery.index', compact('galleries'));
    }
}
