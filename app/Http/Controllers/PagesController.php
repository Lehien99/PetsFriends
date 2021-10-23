<?php

namespace App\Http\Controllers;

use Illuminate\Pagination\Paginator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use App\Category;
use App\Article;

class PagesController extends Controller
{
    //
    public function __construct()
    {
        $categorys = Category::withCount('article')->get();
        $recent =  Article::orderBy('id', 'desc')->where('status','1')->take(4)->get();
        $popular =  Article::orderBy('views', 'desc')->where('status','1')->take(4)->get();  
       // $inspiration  = Article::withCount('comment','desc')->take(2)->get();
        // $recent = Article::take(5)->latest()->get();
        // dd($recent);
        $editorPick = Article::join('comments', 'article.id', '=', 'comments.commentable_id')
                        ->where('comments.commentable_type', 'App\Article')
                        ->latest('comments.created_at')
                        ->take(5)
                        ->get();
        // dd($editorPick);   
        view::share(['category'=>$categorys,'recent'=>$recent,'popular'=>$popular,'$editorPick'=>$editorPick]);
        
    }
   
    public function index(){
        $category = Category::all();
        $article = Article::where('id','=',1)
                      ->where('status','1')
                      ->get();
        return view('pages.article',compact('article'));
        
    }
    public function detail( $article){
        // dd($article);
        Article::find($article)->increment('views');
        $article = Article::find($article);
        return view('pages.article_detail', compact('article'));
        // dd($article->comments);

        
    }
    public function search(Request $request){
        $search_text = $request->get('query');
        $article = Article::where('Title','LIKE','%'.$search_text.'%')->paginate(6);
        $article_count = count($article);
        // dd(  $article);
        return view('Pages.search',compact('article','article_count'));
        // return view('pages.search');
    }
    public function view($id){
        $category_id = Category::find($id);
        $article = Article::where('idCategory','=',$id)->get();
    //  dd($article);
        return view('pages.art_cate',compact('article','category_id'));
    }


}