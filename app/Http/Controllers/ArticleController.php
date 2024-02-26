<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $article = Article::create([
            'title' => $request->title,
            'body' => $request->body,
            'image' => $request->image ?? null, //modify it later
            'user_id' => auth()->user()->id,
            'category_id' => $request->category
        ]);
    }

//    /**
//     * Display the specified resource.
//     *
//     * @param  \App\Models\Article  $article
//     * @return \Illuminate\Http\Response|object
//     */
    public function show()
    {
        $request = request();
        $categories = Category::all();
        $article = Article::query()
            ->where('articles.id','=', $request->query('article'))
            ->join('users', 'users.id', '=', 'articles.user_id')
            ->select(['users.name','articles.title', 'articles.body', 'articles.created_at', 'articles.image']);
        //dd( $article->get());
        return view('layouts.article', ['categories' => $categories, 'article' => $article->first()]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function edit(Article $article)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Article $article)
    {
        $article->update($request);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function destroy(Article $article)
    {
        $article->delete();
    }
}
