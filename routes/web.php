<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\FacilityController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\BankAccountController;
use App\Http\Controllers\ScheduleController;
use App\Http\Controllers\ProgramController;
use App\Http\Controllers\TestimonialController;
use App\Http\Controllers\BoardMemberController;

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\DonasiController;
use App\Http\Controllers\DonationController;

// Public Routes with Visitor Tracking
Route::middleware('track.visitor')->group(function () {
    Route::get('/', [HomeController::class, 'index'])->name('home');
    Route::get('/artikel', [HomeController::class, 'articles'])->name('articles');
    Route::get('/artikel/{slug}', [HomeController::class, 'showArticle'])->name('article.show');
    Route::get('/galeri', [HomeController::class, 'gallery'])->name('gallery');
    Route::get('/galeri/album/{id}', [HomeController::class, 'showAlbum'])->name('album.show');
    Route::get('/tentang-kami', [HomeController::class, 'about'])->name('about');
    Route::get('/program-unggulan', [HomeController::class, 'programs'])->name('programs');
    Route::get('/jadwal-harian', [HomeController::class, 'schedule'])->name('schedule');
    Route::get('/kontak', [HomeController::class, 'contact'])->name('contact');

    Route::prefix('donasi')->name('donasi.')->group(function () {
        Route::get('/', [DonasiController::class, 'index'])->name('index');
        Route::post('/', [DonasiController::class, 'store'])->name('store');
        Route::get('panduan', [DonasiController::class, 'panduan'])->name('panduan');
    });
});

// Contact form submission (without tracking middleware)
Route::post('/kontak', [HomeController::class, 'submitFeedback'])->name('contact.submit');

// Authentication Routes
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

    // Donation Confirmations
    Route::resource('donations', DonationController::class);

    // Galleries - Admin only
    Route::middleware('can:admin')->group(function () {
        Route::resource('galleries', GalleryController::class);
    });

    // Users - Admin only
    Route::middleware('can:admin')->group(function () {
        Route::resource('users', UserController::class);
    });

    // Facilities - Admin only
    Route::middleware('can:admin')->group(function () {
        Route::resource('facilities', FacilityController::class)->except(['show']);
    });

    // Contacts - Admin only
    Route::middleware('can:admin')->group(function () {
        Route::resource('contacts', ContactController::class)->except(['show']);
    });

    // Feedbacks - Admin only
    Route::middleware('can:admin')->group(function () {
        Route::resource('feedbacks', FeedbackController::class)->except(['edit', 'update']);
    });

    // Bank Accounts - Admin only
    Route::middleware('can:admin')->group(function () {
        Route::resource('bank-accounts', BankAccountController::class)->except(['show']);
    });

    // Schedules - Admin only
    Route::middleware('can:admin')->group(function () {
        Route::resource('schedules', ScheduleController::class)->except(['show']);
    });

    // Programs - Admin only
    Route::middleware('can:admin')->group(function () {
        Route::resource('programs', ProgramController::class)->except(['show']);
    });

    // Testimonials - Admin only
    Route::middleware('can:admin')->group(function () {
        Route::resource('testimonials', TestimonialController::class)->except(['show']);
    });

    // Board Members - Admin only
    Route::middleware('can:admin')->group(function () {
        Route::resource('board-members', BoardMemberController::class)->except(['show']);
    });

    // Settings - Admin only
    Route::middleware('can:admin')->group(function () {
        // Tentang Kami
        Route::get('/settings/about', [SettingController::class, 'aboutEdit'])->name('settings.about');
        Route::put('/settings/about', [SettingController::class, 'aboutUpdate'])->name('settings.about.update');

        // Visi & Misi
        Route::get('/settings/vision-mission', [SettingController::class, 'visionMissionEdit'])->name('settings.vision-mission');
        Route::put('/settings/vision-mission', [SettingController::class, 'visionMissionUpdate'])->name('settings.vision-mission.update');

        // Sambutan Ketua
        Route::get('/settings/chairman', [SettingController::class, 'chairmanEdit'])->name('settings.chairman');
        Route::put('/settings/chairman', [SettingController::class, 'chairmanUpdate'])->name('settings.chairman.update');

        // Kontak Organisasi
        Route::get('/settings/organization', [SettingController::class, 'organizationEdit'])->name('settings.organization');
        Route::put('/settings/organization', [SettingController::class, 'organizationUpdate'])->name('settings.organization.update');

        // QRIS
        Route::get('/settings/qris', [SettingController::class, 'qrisEdit'])->name('settings.qris');
        Route::put('/settings/qris', [SettingController::class, 'qrisUpdate'])->name('settings.qris.update');
    });

    // File Manager for CKEditor
    Route::post('/filemanager/upload', [App\Http\Controllers\FileManagerController::class, 'upload'])->name('filemanager.upload');
    Route::get('/filemanager/list', [App\Http\Controllers\FileManagerController::class, 'list'])->name('filemanager.list');
});
