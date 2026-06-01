<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\Category;
use Illuminate\Support\Facades\Storage;

class ArticleController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'show']);
    }

    public function index()
    {
        $categories = Category::all();
        
        if (request()->get('category')) {
            $articles = Article::with('category')
                ->where('category_id', request()->get('category'))
                ->latest()
                ->get();
        } else {
            $articles = Article::with('category')->latest()->get();
        }
        
        return view('articles', compact('articles', 'categories'));
    }

    public function show($id)
    {
        $article = Article::findOrFail($id);
        return view('articles.show', compact('article'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('articles.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'full_content' => 'required',
            'category_id' => 'required|exists:categories,id',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'image_url' => 'nullable|url'
        ]);

        $data = $request->only(['title', 'description', 'full_content']);
        $data['category_id'] = $request->category_id;
        
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('articles', 'public');
            $data['image_path'] = $path;
        }
        
        if ($request->filled('image_url')) {
            $data['image_url'] = $request->image_url;
        }

        Article::create($data);

        return redirect('/articles')->with('success', 'Article created');
    }

    public function edit($id)
    {
        $article = Article::findOrFail($id);
        $categories = Category::all();
        return view('articles.edit', compact('article', 'categories'));
    }

    public function update(Request $request, $id)
    {
        $article = Article::findOrFail($id);

        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'full_content' => 'required',
            'category_id' => 'required|exists:categories,id',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $data = $request->only(['title', 'description', 'full_content']);
        $data['category_id'] = $request->category_id;
        
        if ($request->hasFile('image')) {
            if ($article->image_path) {
                Storage::disk('public')->delete($article->image_path);
            }
            $path = $request->file('image')->store('articles', 'public');
            $data['image_path'] = $path;
            $data['image_url'] = null;
        }

        $article->update($data);

        return redirect('/articles')->with('success', 'Article updated');
    }

    public function destroy($id)
    {
        $article = Article::findOrFail($id);
        
        if ($article->image_path) {
            Storage::disk('public')->delete($article->image_path);
        }
        
        $article->delete();

        return redirect('/articles')->with('success', 'Article deleted');
    }
}