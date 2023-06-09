<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Http\Requests\StoreArticleRequest;
use App\Http\Requests\UpdateArticleRequest;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = [
            'articles' => Article::all()
        ];
        return view('pages.article.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if (!auth()->user()) {
            return abort(403);
        }
        return view('pages.article.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreArticleRequest $request)
    {
        $validateData = [
            'title' => $request->title,
            'content' => $request->content,
            'slug' => Str::slug($request->title) . Str::random(5),
        ];
        $image = $request->file('image');

        $validateData['image'] = $image->store('article');
        $validateData['user_id'] = auth()->user()->id;
        $article = Article::create($validateData);

        return redirect()->route('tips-trick.index')->with('success', 'Article berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show($slug)
    {
        $article = Article::where('slug', $slug)->with('user')->first();
        return view('pages.article.show', compact('article'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($slug)
    {
        $article = Article::where('slug', $slug)->with('user')->first();
        return view('pages.article.edit', compact('article'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateArticleRequest $request, $slug)
    {
        $article = Article::where('slug', $slug)->with('user')->first();
        $validateData = [
            'title' => $request->title,
            'content' => $request->content,
        ];
        if ($request->file('image')) {
            if ($request->oldImage) {
                Storage::delete($request->oldImage);
            }
            $validateData['image'] = $request->file('image')->store('article');
        }
        $validateData['user_id'] = auth()->user()->id;
        $article->update($validateData);

        return redirect()->route('tips-trick.index')->with('success', 'Article berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($slug)
    {
        $article = Article::where('slug', $slug)->first();
        $article->delete();
        Storage::delete($article->image);
        return redirect()->route('tips-trick.index')->with('success', 'Article berhasil dihapus');
    }
}
