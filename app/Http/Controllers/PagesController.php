<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use App\Category;
use App\Article;

class PagesController extends Controller
{
    //
    public function __construct()
    {
        // $category = Category::all();
        $category = Category::withCount('article')->get();
        view::share(['category'=>$category]);
        
    }
   
    public function index(){
        $category = Category::all();
        $article = Article::where('id','=',1)
                      ->where('status','1')
                      ->get();
        return view('pages.article',compact('article'));
    }
    public function detail( $article){
        $article = Article::find($article);
        return view('pages.article_detail', compact('article'));
        // dd($article->comments);

        
    }
    public function search(Request $request){
        $search_text = $request->get('query');
        $article = Article::where('Title','LIKE','%'.$search_text.'%')->get();
        $article_count = count($article);
        // dd(  $article);
        return view('Pages.search',compact('article','article_count'));
        // return view('pages.search');
    }


}