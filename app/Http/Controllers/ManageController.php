<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;

class ManageController extends Controller
{
    public function index($id){
        $article = Article::find($id);
        return view('admin.manage.requestarticle', compact('article'));     
    }
}
