<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\News;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Request $request, News $news)
    {
        $request->validate([
            'content' => 'required|max:1000',
        ]);

        Comment::create([
            'user_id' => auth()->id(),
            'news_id' => $news->id,
            'content' => $request->content,
        ]);

        return back()
            ->with('success', 'Comment toegevoegd.');
    }
}
