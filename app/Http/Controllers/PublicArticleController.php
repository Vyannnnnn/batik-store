<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class PublicArticleController extends Controller
{
    /**
     * Tampilkan halaman edukasi (artikel).
     */
    public function index(Request $request)
    {
        $query = Article::query();

        if ($request->filled('category')) {
            $query->where('category', $request->category);
        }

        $articles = $query->latest()->paginate(6);
        
        return view('public.articles.index', compact('articles'));
    }

    /**
     * Tampilkan detail artikel.
     */
    public function show($slug)
    {
        $article = Article::where('slug', $slug)->firstOrFail();
        
        // Artikel terbaru lainnya
        $otherArticles = Article::where('id', '!=', $article->id)
            ->latest()
            ->take(3)
            ->get();

        return view('public.articles.show', compact('article', 'otherArticles'));
    }
}
