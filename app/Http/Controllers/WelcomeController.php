<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WelcomeController extends Controller
{
   
public function welcome (){
    if(auth()->check()
        && auth()->user()->role === 'admin') {

        return redirect()
            ->route('dashboard');
    }
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
}
}
