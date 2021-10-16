<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;

class DashboardController extends Controller
{
    //
    public function barchart(Request $request)
    {
        $health = Article::where('id','=',1)->get();
        $food = Article::where('id','=',2)->get();
        $life = Article::where('id','=',3)->get();
        $sport = Article::where('id','=',4)->get();
        $health_count = count($health);
        $food_count = count($food);
        $life_count = count($life);
        $sport_count = count($sport);
        // dd($health_count);

        return view('admin.home', compact('health_count','food_count','life_count','sport_count'));


    }
}
