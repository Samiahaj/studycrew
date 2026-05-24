<?php

namespace App\Http\Controllers;
use App\Models\News;
use App\Models\Tag;

use Illuminate\Http\Request;

class NewsController extends Controller
{
    /**
 * Haalt alle nieuwsartikelen op
 * en toont deze op de publieke
 * nieuwspagina.
 *
 * Artikelen worden gesorteerd
 * van nieuw naar oud.
 */
    public function index()
    {
         $news = News::latest()->get();

    return view('news.index', compact('news'));
}
 
/**
 * Haalt alle nieuwsartikelen op
 * voor het admin dashboard.
 *
 * Admins kunnen nieuws beheren
 * via deze pagina.
 */
public function adminIndex()
{
    $news = News::latest()->get();

    return view('admin.news.index', compact('news'));
}
    

/**
 * Toont een detailpagina van
 * een nieuwsartikel in het
 * admin dashboard.
 *
 * Reacties en gebruikers
 * worden automatisch geladen.
 */
public function adminShow(News $news)
{
    $news->load('comments.user');

    return view('admin.news.show', compact('news'));
}




/**
 * Haalt alle tags op
 * voor het aanmaken
 * van een nieuwsartikel.
 */
 public function create()
{
    $tags = Tag::all();

    return view('news.create', compact('tags'));
}






   public function store(Request $request)
{
    /**
 * Valideert de gegevens
 * van een nieuw nieuwsartikel.
 *
 * Een afbeelding is optioneel.
 */
    $validated = $request->validate([
        'title' => 'required|max:255',
        'content' => 'required',
        'image' => 'nullable|image|max:2048',
    ]);

    $imagePath = null;

    /**
 * Controleert of een afbeelding
 * werd geüpload.
 *
 * Indien aanwezig wordt de afbeelding
 * opgeslagen op de server.
 */
    if ($request->hasFile('image')) {

        $imagePath = $request->file('image')
            ->store('news-images', 'public');
    }

    /**
 * Maakt een nieuw nieuwsartikel aan
 * en slaat dit op in de database.
 *
 * Het artikel wordt gekoppeld
 * aan de ingelogde gebruiker.
 */
    $news = News::create([

        'user_id' => auth()->id(),
        'title' => $validated['title'],
        'content' => $validated['content'],
        'image' => $imagePath,
        'published_at' => now(),
    ]);

    /**
 * Controleert of tags geselecteerd zijn.
 *
 * Indien aanwezig worden de tags
 * gekoppeld aan het nieuwsartikel.
 */
    if($request->has('tags')) {

        $news->tags()->attach($request->tags);
    }

    return redirect()
        ->route('admin.news.index')
        ->with('success', 'Nieuwsartikel succesvol aangemaakt.');
}

 /**
 * Toont een detailpagina
 * van een nieuwsartikel.
 *
 * Reacties en gebruikers
 * worden automatisch geladen.
 */
 public function show(News $news)
{
    $news->load('comments.user');

    return view('news.show', compact('news'));
}

  

    /**
 * Verwijdert een nieuwsartikel
 * uit de database.
 *
 * Enkel admins hebben toegang
 * tot deze functionaliteit.
 */
 public function destroy(News $news)
{
    $news->delete();

    return redirect()
        ->route('admin.news.index')
        ->with('success', 'Nieuwsartikel verwijderd.');
}

/**
 * Toont formulier
 * om een nieuwsartikel
 * te bewerken.
 *
 * Alle tags worden geladen
 * zodat de admin tags
 * kan aanpassen.
 */
public function edit(News $news)
{
    $tags = Tag::all();

    return view(
        'admin.news.edit',
        compact(
            'news',
            'tags'
        )
    );
}


/**
 * Werkt een bestaand
 * nieuwsartikel bij.
 *
 * Titel, content,
 * afbeelding en tags
 * kunnen aangepast worden.
 */
public function update(
    Request $request,
    News $news
)
{
    /**
     * Valideert de gegevens.
     */
    $validated = $request->validate([
        'title' => 'required|max:255',
        'content' => 'required',
        'image' => 'nullable|image|max:2048',
    ]);

    /**
     * Controleert of
     * nieuwe afbeelding
     * werd geüpload.
     */
    if ($request->hasFile('image')) {

        $imagePath = $request
            ->file('image')
            ->store(
                'news-images',
                'public'
            );

        $news->image = $imagePath;
    }

    /**
     * Werkt gegevens bij.
     */
    $news->update([

        'title' =>
            $validated['title'],

        'content' =>
            $validated['content'],
    ]);

    /**
     * Synchroniseert tags.
     *
     * Oude tags worden verwijderd
     * en nieuwe gekoppeld.
     */
    $news->tags()->sync(
        $request->tags ?? []
    );

    return redirect()
        ->route('admin.news.index')
        ->with(
            'success',
            'Nieuwsartikel bijgewerkt.'
        );
}

}