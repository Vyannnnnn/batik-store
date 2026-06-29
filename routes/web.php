<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\AdminProductController;
use App\Http\Controllers\AdminArticleController;
use App\Http\Controllers\AdminGalleryController;
use App\Http\Controllers\AdminCategoryController;
use App\Http\Controllers\AdminHomeSettingController;
use App\Http\Controllers\AdminAboutSettingController;
use App\Http\Controllers\AdminContactSettingController;
use App\Http\Controllers\AdminHealthSafetyController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PublicProductController;
use App\Http\Controllers\PublicArticleController;
use App\Http\Controllers\PublicGalleryController;

// ============================================
// PUBLIC ROUTES
// ============================================
Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/produk', [PublicProductController::class, 'index'])->name('products.index');
Route::get('/produk/{slug}', [PublicProductController::class, 'show'])->name('products.show');

Route::get('/edukasi', [PublicArticleController::class, 'index'])->name('articles.index');
Route::get('/edukasi/{slug}', [PublicArticleController::class, 'show'])->name('articles.show');

Route::get('/tentang-kami', [HomeController::class, 'about'])->name('about');

Route::get('/galeri', [PublicGalleryController::class, 'index'])->name('gallery.index');

Route::get('/kontak', [HomeController::class, 'contact'])->name('contact');

// ============================================
// AUTENTIKASI KUSTOM
// ============================================
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// ============================================
// PANEL ADMIN
// ============================================
Route::middleware(['auth', 'admin'])->prefix('admin')->as('admin.')->group(function () {
    
    // Dashboard
    Route::get('/', [AdminDashboardController::class, 'index'])->name('dashboard');
    
    // ============================================
    // CRUD PRODUK
    // ============================================
    Route::resource('products', AdminProductController::class)->except(['show']);
    Route::post('products/{id}/toggle-active', [AdminProductController::class, 'toggleActive'])
    ->name('products.toggle-active');
    // ============================================
    // CRUD ARTIKEL
    // ============================================
    Route::resource('articles', AdminArticleController::class)->except(['show']);
    
    // ============================================
    // CRUD GALERI
    // ============================================
    Route::resource('galleries', AdminGalleryController::class)->except(['show']);
    Route::post('galleries/{gallery}/toggle-active', [AdminGalleryController::class, 'toggleActive'])
        ->name('galleries.toggle-active');
    
    // ============================================
    // CRUD KATEGORI
    // ============================================
    Route::resource('categories', AdminCategoryController::class)->except(['show']);
    Route::post('categories/{id}/toggle-active', [AdminCategoryController::class, 'toggleActive'])
        ->name('categories.toggle-active');
    
    // ============================================
    // PENGATURAN HOME
    // ============================================
    Route::get('/home-settings', [AdminHomeSettingController::class, 'index'])->name('home-settings.index');
    Route::get('/home-settings/{id}/edit', [AdminHomeSettingController::class, 'edit'])->name('home-settings.edit');
    Route::put('/home-settings/{id}', [AdminHomeSettingController::class, 'update'])->name('home-settings.update');

    // ============================================
    // PENGATURAN ABOUT
    // ============================================
    Route::get('/about-settings', [AdminAboutSettingController::class, 'index'])->name('about-settings.index');
    Route::get('/about-settings/{id}/edit', [AdminAboutSettingController::class, 'edit'])->name('about-settings.edit');
    Route::put('/about-settings/{id}', [AdminAboutSettingController::class, 'update'])->name('about-settings.update');

    // ============================================
    // PENGATURAN KONTAK
    // ============================================
    Route::get('/contact-settings', [AdminContactSettingController::class, 'index'])->name('contact-settings.index');
    Route::get('/contact-settings/{id}/edit', [AdminContactSettingController::class, 'edit'])->name('contact-settings.edit');
    Route::put('/contact-settings/{id}', [AdminContactSettingController::class, 'update'])->name('contact-settings.update');

    // ============================================
    // PENGATURAN KESEHATAN & KEAMANAN
    // ============================================
    Route::get('/health-safety', [AdminHealthSafetyController::class, 'index'])->name('health-safety.index');
    Route::get('/health-safety/{id}/edit', [AdminHealthSafetyController::class, 'edit'])->name('health-safety.edit');
    Route::put('/health-safety/{id}', [AdminHealthSafetyController::class, 'update'])->name('health-safety.update');
});