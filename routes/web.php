<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\FAQController;

Route::get('/', function () {

    $latestNews = \App\Models\News::latest()
        ->take(3)
        ->get();

    return view('welcome', compact('latestNews'));

})->name('home');



Route::get('/profiel/{user}', [ProfileController::class, 'show'])
    ->name('profile.show');


/*
|--------------------------------------------------------------------------
| Public Routes
|--------------------------------------------------------------------------
*/

Route::get('/nieuws', [NewsController::class, 'index'])
    ->name('news.index');

Route::get('/nieuws/{news}', [NewsController::class, 'show'])
    ->name('news.show');

Route::get('/faq', [FAQController::class, 'index'])
    ->name('faq.index');



/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'admin'])->group(function () {

    // Dashboard
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');



    // Nieuws
    Route::get('/admin/nieuws', [NewsController::class, 'adminIndex'])
        ->name('admin.news.index');

    Route::get('/admin/nieuws/create', [NewsController::class, 'create'])
        ->name('news.create');

    Route::post('/admin/nieuws', [NewsController::class, 'store'])
        ->name('news.store');

    Route::get('/admin/nieuws/{news}', [NewsController::class, 'adminShow'])
        ->name('admin.news.show');

    Route::get('/admin/nieuws/{news}/edit', [NewsController::class, 'edit'])
        ->name('news.edit');

    Route::put('/admin/nieuws/{news}', [NewsController::class, 'update'])
        ->name('news.update');

    Route::delete('/admin/nieuws/{news}', [NewsController::class, 'destroy'])
        ->name('news.destroy');



    // FAQ
    Route::get('/admin/faq', [FAQController::class, 'adminIndex'])
        ->name('admin.faq.index');

    Route::post('/admin/faq/category', [FAQController::class, 'storeCategory'])
        ->name('admin.faq.category.store');

    Route::post('/admin/faq', [FAQController::class, 'store'])
        ->name('admin.faq.store');

    Route::delete('/admin/faq/{faq}', [FAQController::class, 'destroy'])
        ->name('admin.faq.destroy');
});



/*
|--------------------------------------------------------------------------
| Authenticated User Routes
|--------------------------------------------------------------------------
*/

Route::middleware('auth')->group(function () {

    Route::get('/profile', [ProfileController::class, 'edit'])
        ->name('profile.edit');

    Route::patch('/profile', [ProfileController::class, 'update'])
        ->name('profile.update');

    Route::delete('/profile', [ProfileController::class, 'destroy'])
        ->name('profile.destroy');
});



require __DIR__.'/auth.php';
