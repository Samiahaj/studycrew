<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FAQCategory;

class FAQController extends Controller
{
    public function index()
    {
        $categories = FAQCategory::with('faqs')->get();

        return view('faq.index', compact('categories'));
    }
}
