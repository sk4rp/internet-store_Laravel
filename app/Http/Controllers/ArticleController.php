<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class ArticleController extends Controller
{
    public function index()
    {
        $articles = Article::orderBy('created_at', 'desc')->paginate(10);
        return view('articles.index', compact('articles'));
    }

    public function show($slug)
    {
        $article = Article::where('slug', $slug)->firstOrFail();
        return view('articles.show', compact('article'));
    }

    public function storeComment(Request $request, $articleId)
    {
        $request->validate([
            'content' => 'required|min:5',
        ]);

        $article = Article::findOrFail($articleId);
        $comment = new Comment([
            'content' => $request->input('content'),
        ]);

        $article->comments()->save($comment);

        return redirect()->route('articles.show', $article->slug)
            ->with('success', 'Comment added successfully');
    }
}
