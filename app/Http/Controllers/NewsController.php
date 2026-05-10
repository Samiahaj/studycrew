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
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       $validated = $request->validate([
        'title' => 'required|max:255',
        'content' => 'required',
    ]);

    $news = News::create([
        'user_id' => auth()->id(),
        'title' => $validated['title'],
        'content' => $validated['content'],
        'published_at' => now(),
    ]);

    return $news;
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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

