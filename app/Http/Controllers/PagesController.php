<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;

class PagesController extends Controller
{
    //
    public function __construct()
    {
        $catgory = Category::all();
        view()->share('category',$catgory);
    }
    public function index(){
        return view('pages.article');
    }
}
