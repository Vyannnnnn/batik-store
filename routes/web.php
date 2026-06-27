<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\AdminProductController;
use App\Http\Controllers\AdminArticleController;
use App\Http\Controllers\AdminGalleryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PublicProductController;
use App\Http\Controllers\PublicArticleController;
use App\Http\Controllers\PublicGalleryController;

// --- Halaman Publik (Pengunjung) ---
Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/produk', [PublicProductController::class, 'index'])->name('products.index');
Route::get('/produk/{slug}', [PublicProductController::class, 'show'])->name('products.show');

Route::get('/edukasi', [PublicArticleController::class, 'index'])->name('articles.index');
Route::get('/edukasi/{slug}', [PublicArticleController::class, 'show'])->name('articles.show');

Route::get('/tentang-kami', function () {
    return view('public.about');
})->name('about');

Route::get('/galeri', [PublicGalleryController::class, 'index'])->name('gallery.index');

Route::get('/kontak', function () {
    return view('public.contact');
})->name('contact');

// --- Autentikasi Kustom ---
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// --- Panel Admin (Membutuhkan Login) ---
Route::middleware(['auth'])->prefix('admin')->as('admin.')->group(function () {
    Route::get('/', [AdminDashboardController::class, 'index'])->name('dashboard');
    
    // CRUD Produk
    Route::resource('products', AdminProductController::class)->except(['show']);
    
    // CRUD Artikel Edukasi
    Route::resource('articles', AdminArticleController::class)->except(['show']);
    
    // CRUD Galeri Foto
    Route::resource('galleries', AdminGalleryController::class)->except(['show']);
});
