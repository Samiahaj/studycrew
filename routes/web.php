<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NewsController;

Route::get('/', function () {

    $latestNews = \App\Models\News::latest()
        ->take(3)
        ->get();

    return view('welcome', compact('latestNews'));
});




Route::get('/nieuws', [NewsController::class, 'index'])
    ->name('news.index');

Route::get('/nieuws/{news}', [NewsController::class, 'show'])
    ->name('news.show');


Route::middleware(['auth', 'admin'])->group(function () {

Route::get('/admin/nieuws', [NewsController::class, 'adminIndex'])
    ->name('admin.news.index');

    Route::get('/admin/nieuws/create', [NewsController::class, 'create'])
        ->name('news.create');

    Route::post('/admin/nieuws', [NewsController::class, 'store'])
        ->name('news.store');

    Route::get('/admin/nieuws/{news}/edit', [NewsController::class, 'edit'])
        ->name('news.edit');

    Route::put('/admin/nieuws/{news}', [NewsController::class, 'update'])
        ->name('news.update');

    Route::delete('/admin/nieuws/{news}', [NewsController::class, 'destroy'])
        ->name('news.destroy');
});




Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
