<?php

namespace App\Http\Controllers;

use App\Models\Faq;
use App\Models\FaqCategory;
use Illuminate\Http\Request;

class FAQController extends Controller
{

/**
 * Haalt alle FAQ categorieën op
 * samen met hun FAQ’s.
 *
 * Deze gegevens worden getoond
 * op de publieke FAQ pagina.
 */
    public function index()
    {
        $categories = FaqCategory::with('faqs')->get();

        return view('faq.index', compact('categories'));
    }
/**
 * Haalt alle FAQ categorieën op
 * voor het admin dashboard.
 *
 * Admins kunnen FAQ’s beheren
 * via deze pagina.
 */
    public function adminIndex()
    {
        $categories = FaqCategory::with('faqs')->get();

        return view('admin.faq.index', compact('categories'));
    }

    public function storeCategory(Request $request)
    {
        /**
 * Valideert de naam
 * van een nieuwe FAQ categorie.
 */
        $request->validate([
            'name' => 'required|max:255',
        ]);
 /**
 * Maakt een nieuwe FAQ categorie aan
 * en slaat deze op in de database.
 */
        FaqCategory::create([
            'name' => $request->name,
        ]);

        return back()->with('success', 'Categorie toegevoegd.');
    }

    public function store(Request $request)
    { /**
 * Valideert een nieuwe FAQ.
 *
 * Elke FAQ moet gekoppeld zijn
 * aan een categorie.
 */
        $request->validate([
            'faq_category_id' => 'required',
            'question' => 'required',
            'answer' => 'required',
        ]);
 /**
 * Maakt een nieuwe FAQ aan
 * en slaat deze op in de database.
 */
        Faq::create([
            'faq_category_id' => $request->faq_category_id,
            'question' => $request->question,
            'answer' => $request->answer,
        ]);

        return back()->with('success', 'FAQ toegevoegd.');
    }

 /**
 * Toont het formulier
 * om een FAQ te bewerken.
 */
    public function edit(Faq $faq)
{
    $categories = FaqCategory::all();

    return view('admin.faq.edit', compact(
        'faq',
        'categories'
    ));
}

/**
 * Werkt een bestaande FAQ bij.
 *
 * De gewijzigde gegevens worden
 * opgeslagen in de database.
 */
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
 /**
 * Verwijdert een FAQ
 * uit de database.
 */
    public function destroy(Faq $faq)
    {
        $faq->delete();

        return back()->with('success', 'FAQ verwijderd.');
    }
}
