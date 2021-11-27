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
        $editorPick =  Article::orderBy('views', 'desc')->where('status','1')->skip(1)->take(4)->get();  
        // dd($editorPick);
        $editorPick1 = Article::orderBy('views', 'desc')->where('status','1')->take(1)->get();                                       
        view::share(
            ['category'=>$categorys,'recent'=>$recent,'popular'=>$popular,'editorPick'=>$editorPick, 'editorPick1'=> $editorPick1]);
        
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
        // increment views
        Article::find($article)->increment('views');
        $article = Article::find($article);
        // dd($article->status);
        if($article->status ){
        return view('pages.article_detail', compact('article'));
        }
        else{
            abort(403);
        }  
        // dd($article->comments);

        
    }
    public function search(Request $request){
        $search_text = $request->get('query');
        $article = Article::where('Title','LIKE','%'.$search_text.'%')->where('status','1')->paginate(6);
        $article_count = count($article);
        // dd(  $article);
        return view('Pages.search',compact('article','article_count'));
        // return view('pages.search');
    }
    public function view($id){
        $category_id = Category::find($id);
        $article = Article::where('idCategory','=',$id)->where('status','1')->get();
    //  dd($article);
        return view('pages.art_cate',compact('article','category_id'));
    }


}