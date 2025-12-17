<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\UserController;

use App\Http\Controllers\Auth\LoginController;

// Public Routes
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/artikel/{slug}', [HomeController::class, 'showArticle'])->name('article.show');
Route::get('/galeri', [HomeController::class, 'gallery'])->name('gallery');
Route::get('/galeri/album/{id}', [HomeController::class, 'showAlbum'])->name('album.show');

// Auth Routes
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'login'])->name('login.post')->middleware('guest');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout')->middleware('auth');

// Admin Routes
Route::prefix('admin')->name('admin.')->middleware('auth')->group(function () {
    // Dashboard
    Route::get('/', [App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard');

    // Categories - Admin only
    Route::middleware('can:admin')->group(function () {
        Route::resource('categories', CategoryController::class);
    });
    
    // Articles - All authenticated users can view, manage-articles can create/edit
    Route::resource('articles', ArticleController::class);
    
    // Galleries - Admin only
    Route::middleware('can:admin')->group(function () {
        Route::resource('galleries', GalleryController::class);
    });
    
    // Users - Admin only
    Route::middleware('can:admin')->group(function () {
        Route::resource('users', UserController::class);
    });
    
    // File Manager for CKEditor
    Route::post('/filemanager/upload', [App\Http\Controllers\FileManagerController::class, 'upload'])->name('filemanager.upload');
    Route::get('/filemanager/list', [App\Http\Controllers\FileManagerController::class, 'list'])->name('filemanager.list');
});
