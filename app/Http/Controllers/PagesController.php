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
        $category = Category::all();
        // $category = Category::withCount('article')->get();
        view::share(['category'=>$category]);
        
    }
   
    public function index(){
        $category = Category::all();
        $article = Article::where('id','=',1)
                      ->where('status','1')
                      ->get();
        return view('pages.article',compact('article'));
    }
    public function detail($id){
        $article = Article::find($id);
        return view('pages.article_detail', compact('article'));
    }

}
