<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;

class PublicArticleController extends Controller
{
    public function index(Request $request)
    {
        $query = Article::with('category')->where('is_published', true);
        
        // Filter by category slug
        if ($request->has('category') && $request->category) {
            $category = Category::where('slug', $request->category)->first();
            if ($category) {
                $query->where('category_id', $category->id);
            }
        }
        
        $articles = $query->latest()->paginate(9);
        
        // AMBIL SEMUA KATEGORI UNTUK FILTER
        $categories = Category::where('is_active', true)
            ->orderBy('name')
            ->get();
        
        return view('public.articles.index', compact('articles', 'categories'));
    }

    public function show($slug)
    {
        $article = Article::with('category')->where('slug', $slug)->firstOrFail();
        return view('public.articles.show', compact('article'));
    }
}