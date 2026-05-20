<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\News;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Request $request, News $news)
    {


    /**
 * Valideert de inhoud van een reactie.
 *
 * Een reactie mag niet leeg zijn
 * en bevat maximum 1000 karakters.
 */
        $request->validate([
            'content' => 'required|max:1000',
        ]);



       /**
 * Maakt een nieuwe reactie aan
 * gekoppeld aan een gebruiker
 * en een nieuwsartikel.
 *
 * De reactie wordt opgeslagen
 * in de database.
 */ 
        Comment::create([
            'user_id' => auth()->id(),
            'news_id' => $news->id,
            'content' => $request->content,
        ]);

        return back()
            ->with('success', 'Comment toegevoegd.');
    }



    /**
 * Verwijdert een reactie.
 *
 * Deze functionaliteit wordt gebruikt
 * door admins om reacties te beheren.
 */
    public function destroy(Comment $comment)
{
    $comment->delete();

    return back()
        ->with('success', 'Reactie verwijderd.');
}
}
