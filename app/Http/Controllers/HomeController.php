<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Article;

class HomeController extends Controller
{
    public function index()
    {
        $featuredProducts = Product::latest()->take(3)->get();
        $latestArticles = Article::latest()->take(3)->get();

        return view('public.home', compact('featuredProducts', 'latestArticles'));
    }
}
