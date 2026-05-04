<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;

class ArticleController extends Controller
{
    public function index()
    {
        $articles = Article::latest()->get();

        // SESUAI file: resources/views/articles.blade.php
        return view('articles', compact('articles'));
    }

    public function create()
    {
        return view('articles.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required' // disesuaikan
        ]);

        Article::create($request->only([
            'title',
            'description'
        ]));

        return redirect('/articles')->with('success', 'Article created');
    }

    public function edit($id)
    {
        $article = Article::findOrFail($id);

        return view('articles.edit', compact('article'));
    }

    public function update(Request $request, $id)
    {
        $article = Article::findOrFail($id);

        $request->validate([
            'title' => 'required',
            'description' => 'required'
        ]);

        $article->update($request->only([
            'title',
            'description'
        ]));

        return redirect('/articles')->with('success', 'Article updated');
    }

    public function destroy($id)
    {
        Article::destroy($id);

        return redirect('/articles')->with('success', 'Article deleted');
    }
}