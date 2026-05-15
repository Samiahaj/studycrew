<?php

namespace App\Http\Controllers;

use App\Models\Faq;
use App\Models\FaqCategory;
use Illuminate\Http\Request;

class FAQController extends Controller
{
    public function index()
    {
        $categories = FaqCategory::with('faqs')->get();

        return view('faq.index', compact('categories'));
    }

    public function adminIndex()
    {
        $categories = FaqCategory::with('faqs')->get();

        return view('admin.faq.index', compact('categories'));
    }

    public function storeCategory(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
        ]);

        FaqCategory::create([
            'name' => $request->name,
        ]);

        return back()->with('success', 'Categorie toegevoegd.');
    }

    public function store(Request $request)
    {
        $request->validate([
            'faq_category_id' => 'required',
            'question' => 'required',
            'answer' => 'required',
        ]);

        Faq::create([
            'faq_category_id' => $request->faq_category_id,
            'question' => $request->question,
            'answer' => $request->answer,
        ]);

        return back()->with('success', 'FAQ toegevoegd.');
    }


    public function edit(Faq $faq)
{
    $categories = FaqCategory::all();

    return view('admin.faq.edit', compact(
        'faq',
        'categories'
    ));
}


public function update(Request $request, Faq $faq)
{
    $request->validate([
        'faq_category_id' => 'required',
        'question' => 'required',
        'answer' => 'required',
    ]);

    $faq->update([
        'faq_category_id' => $request->faq_category_id,
        'question' => $request->question,
        'answer' => $request->answer,
    ]);

    return redirect()
        ->route('admin.faq.index')
        ->with('success', 'FAQ bijgewerkt.');
}

    public function destroy(Faq $faq)
    {
        $faq->delete();

        return back()->with('success', 'FAQ verwijderd.');
    }
}
