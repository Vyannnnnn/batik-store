<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Article;
use App\Models\Gallery;

class AdminDashboardController extends Controller
{
    public function index()
    {
        $productCount = Product::count();
        $articleCount = Article::count();
        $galleryCount = Gallery::count();

        $latestProducts = Product::latest()->take(3)->get();
        $latestArticles = Article::latest()->take(3)->get();

        return view('admin.dashboard', compact(
            'productCount',
            'articleCount',
            'galleryCount',
            'latestProducts',
            'latestArticles'
        ));
    }
}
