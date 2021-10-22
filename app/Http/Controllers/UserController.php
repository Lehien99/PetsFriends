<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Role;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    //
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }
    public function getUser_list(){
        $user = User::all();
        return view('admin.user.users_list',compact('user'));
    }

    public function getUser_Add(){
        $role = Role::all();
        return view('admin.user.users_add', compact('role'));
    }
    public function postUser_Add(Request $request){
        
        $this->validate($request,
        [
            'Name' => ['required', 'string', 'max:255'],
            'Email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'Password' => ['required', 'string', 'min:8'],
        ],
        [ 
            'Name.required'=>'You have not entered Name',
            'Name.max'=>'The name Category max 255',
            'Email.required'=>'You have not entered Email',
            'Email.unique'=>'your email already exists',
            'Email.email'=>'You need to enter the correct email type',
            'Password.required'=>'You have not entered Password',
            'Password.min'=>'Your password is at least 8 characters',
        ]);

        $user = new User;
        $user->name = $request->Name;
        $user->email = $request->Email;
        $user->password = Hash::make($request->Password);
        $user-> idRole = $request->Role;

        if($request->hasFile('avatar'))
        {
            $avatar = $request->file('avatar')->getClientOriginalName();
            $request->file('avatar')->storeAs('avatars', auth()->id().'/'.$avatar,'');
            $user->update(['avatar'=>$avatar]);
            $user->avatar = $avatar;
        }
        $user ->save();

        return redirect('admin/user/add')->with('Message','Add data successfully');
    
    }

    public function getUser_edit($id){
        $user = User::find($id);
        $role = Role::all();
        return view('admin.user.users_edit', compact('user','role'));
        
    }
    public function postUser_edit(){

    }

    public function destroy($id){
        $user = User::find($id);
        $user->delete();

        return redirect('admin/user/list')->with('Message','User deleted successfully.');

    }
}
