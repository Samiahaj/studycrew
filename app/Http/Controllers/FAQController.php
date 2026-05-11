<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FaqCategory;

class FAQController extends Controller
{
    public function index()
    {
        $categories = FaqCategory::with('faqs')->get();

        return view('faq.index', compact('categories'));
    }


    
}
