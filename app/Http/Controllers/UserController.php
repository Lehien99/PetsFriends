<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    //
    public function getUser_list(){
        $user = User::All();
        return view('admin.user.users_list',compact('user'));
    }

    public function getUser_Add(){
        return view('admin.user.users_add');
    }
}
