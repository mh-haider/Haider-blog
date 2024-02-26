<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        $categories = Category::all();
        $articles = Article::query();
        if($category_label = $request->query('category')){
            $category = Category::where('label',$category_label)->first();
            $articles->where('category_id', $category->id);
        }
        if($title = $request->query('title')){
            $articles->where('title','LIKE', "%".$title."%" );
        }
        $articles->join('categories','categories.id','=', 'articles.category_id')
            ->select(['articles.id', 'articles.title', 'articles.body','articles.image', 'articles.created_at', 'categories.label'])->orderBy('created_at', 'desc');

        return view('layouts.blog',['articles' => $articles->paginate(10),'categories' => $categories,'category_label' => $category_label]);
    }
}
