<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Article;
use App\Models\Gallery;
use App\Models\Category;

class AdminDashboardController extends Controller
{
    public function index()
    {
        $productCount = Product::count();
        $articleCount = Article::count();
        $galleryCount = Gallery::count();
        $categoryCount = Category::count();

        // Ambil data dengan relasi
        $latestProducts = Product::with('category')->latest()->take(5)->get();
        $latestArticles = Article::with('category')->latest()->take(5)->get();

        $activeProducts = Product::where('is_active', true)->count();
        $publishedArticles = Article::where('is_published', true)->count();

        return view('admin.dashboard', compact(
            'productCount',
            'articleCount',
            'galleryCount',
            'categoryCount',
            'latestProducts',
            'latestArticles',
            'activeProducts',
            'publishedArticles'
        ));
    }
}