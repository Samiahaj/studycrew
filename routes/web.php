<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NewsController;

Route::get('/', function () {
    return view('welcome');
});




Route::get('/news', [NewsController::class, 'index'])
    ->name('news.index');

Route::get('/news/{news}', [NewsController::class, 'show'])
    ->name('news.show');


Route::middleware(['auth', 'admin'])->group(function () {

    Route::get('/admin/news/create', [NewsController::class, 'create'])
        ->name('news.create');

    Route::post('/admin/news', [NewsController::class, 'store'])
        ->name('news.store');

    Route::get('/admin/news/{news}/edit', [NewsController::class, 'edit'])
        ->name('news.edit');

    Route::put('/admin/news/{news}', [NewsController::class, 'update'])
        ->name('news.update');

    Route::delete('/admin/news/{news}', [NewsController::class, 'destroy'])
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
