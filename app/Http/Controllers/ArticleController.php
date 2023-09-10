<?php

namespace App\Http\Controllers;

use App\Http\Requests\ArticleRequest;
use App\Models\Article;
use App\Models\Comment;
use Illuminate\Routing\Controller;

class ArticleController extends Controller
{
    public function index()
    {
        $articles = Article::orderBy('created_at', 'desc')->paginate(3);
        return view('articles.index', compact('articles'));
    }

    public function show($slug)
    {
        $article = Article::where('slug', $slug)->firstOrFail();
        return view('articles.show', compact('article'));
    }

    public function storeComment(ArticleRequest $request, $articleId)
    {
        $article = Article::findOrFail($articleId);
        $comment = new Comment([
            'content' => $request->input('content'),
        ]);

        $article->comments()->save($comment);

        return redirect()->route('articles.show', $article->slug)
            ->with('success', 'Комментарий был добавлен');
    }
}
