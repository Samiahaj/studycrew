<?php

namespace App\Http\Controllers;
use App\Models\News;
use App\Models\Tag;

use Illuminate\Http\Request;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
         $news = News::latest()->get();

    return view('news.index', compact('news'));
}
    

    /**
     * Show the form for creating a new resource.
     */
 public function create()
{
    $tags = Tag::all();

    return view('news.create', compact('tags'));
}




    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       $validated = $request->validate([
        'title' => 'required|max:255',
        'content' => 'required',
          'image' => 'nullable|image|max:2048',
    ]);

    $imagePath = null;

if ($request->hasFile('image')) {

    $imagePath = $request->file('image')
        ->store('news-images', 'public');
}
    $news = News::create([
        
 if($request->has('tags')) {

    $news->tags()->attach($request->tags);
}
        'user_id' => auth()->id(),
        'title' => $validated['title'],
        'content' => $validated['content'],
         'image' => $imagePath,
        'published_at' => now(),
    ]);

    return redirect()
    ->route('news.index')
    ->with('success', 'Nieuwsartikel succesvol aangemaakt.');
    }

    /**
     * Display the specified resource.
     */
    public function show(News $news)
{
    return view('news.show', compact('news'));
}

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

}