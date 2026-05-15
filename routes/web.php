<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\FAQController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ContactController;

Route::get('/', function () {

    $latestNews = \App\Models\News::latest()
        ->take(3)
        ->get();

    $latestFaqs = \App\Models\Faq::latest()
        ->take(4)
        ->get();

    return view('welcome', compact(
        'latestNews',
        'latestFaqs'
    ));

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

Route::get('/contact', [ContactController::class, 'index'])
    ->name('contact.index');

Route::post('/contact', [ContactController::class, 'store'])
    ->name('contact.store');

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'admin'])->group(function () {

    // Dashboard
    Route::get('/dashboard', function () {

    $usersCount = \App\Models\User::count();

    $newsCount = \App\Models\News::count();

    $faqCount = \App\Models\Faq::count();

    $commentsCount = \App\Models\Comment::count();

    return view('dashboard', compact(
        'usersCount',
        'newsCount',
        'faqCount',
        'commentsCount'
    ));

})->name('dashboard');

Route::get('/admin/users', [UserController::class, 'index'])
    ->name('admin.users.index');

Route::get('/admin/users/create',
    [UserController::class, 'create'])
    ->name('admin.users.create');

Route::post('/admin/users',
    [UserController::class, 'store'])
    ->name('admin.users.store');



Route::delete('/admin/users/{user}', [UserController::class, 'destroy'])
    ->name('admin.users.destroy');



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

Route::patch('/admin/users/{user}/toggle-admin',
    [UserController::class, 'toggleAdmin'])
    ->name('admin.users.toggle-admin');


    // FAQ
    Route::get('/admin/faq', [FAQController::class, 'adminIndex'])
        ->name('admin.faq.index');

    Route::post('/admin/faq/category', [FAQController::class, 'storeCategory'])
        ->name('admin.faq.category.store');

    Route::post('/admin/faq', [FAQController::class, 'store'])
        ->name('admin.faq.store');

    Route::delete('/admin/faq/{faq}', [FAQController::class, 'destroy'])
        ->name('admin.faq.destroy');

        Route::get('/admin/faq/{faq}/edit',
    [FAQController::class, 'edit'])
    ->name('admin.faq.edit');

Route::put('/admin/faq/{faq}',
    [FAQController::class, 'update'])
    ->name('admin.faq.update');
    

        //comments
        Route::delete('/admin/comments/{comment}', [CommentController::class, 'destroy'])
    ->name('admin.comments.destroy');
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

        Route::post('/nieuws/{news}/comment', [CommentController::class, 'store'])
    ->name('comments.store');
});



require __DIR__.'/auth.php';
