<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }
    //gate
    public function admin()
    {  
        if ( Gate::allows('role-admin')) {
            return view('admin.layout.index'); 
            // return redirect('admin/category/list');          
        }
        else{
            abort(403);       
        }
    }
}
