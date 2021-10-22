<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;
use App\Comment;

class DashboardController extends Controller
{
    //
    public function barchart(Request $request)
    {
        $health = Article::where('idCategory','=',1)->get();
        $food = Article::where('idCategory','=',2)->get();
        $life = Article::where('idCategory','=',3)->get();
        $accessory = Article::where('idCategory','=',4)->get();
        $health_count = count($health);
        $food_count = count($food);
        $life_count = count($life);
        $accessory_count = count($accessory);
        // dd($health_count);
        $article_count = Article::where('status','=',1)->count();
        $comment_count = Comment::all()->count();
        $reject_count = Article::where('status','=',0)->count();
        $views_count = Article::orderBy('views','desc')->take(1)->get();
        // dd($views_count);
        
        return view('admin.home', compact('health_count','food_count','life_count','accessory_count','article_count','comment_count','reject_count','views_count'));


    }
}
