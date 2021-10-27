<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Role;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Category;
use App\Article;
use Auth;

class UserController extends Controller
{
    //
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }
    //======================================admin==============================
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

        // if($request->hasFile('avatar'))
        // {
        //     $avatar = $request->file('avatar')->getClientOriginalName();
        //     $request->file('avatar')->storeAs('avatars', auth()->id().'/'.$avatar,'');
        //     $user->update(['avatar'=>$avatar]);
        //     $user->avatar = $avatar;
        // }
        
        if($request->hasFile('avatar'))
        {
            $file = $request->file('avatar');
            $name = $file->getClientOriginalName();
            $Avatar = Str::random(4)."_".$name;
            while(file_exists("upload/article/". $Avatar))
            {
                $Avatar = Str::random(4)."_". $name;
            }
            $file->move("upload/avatar", $Avatar);
            $user->avatar = $Avatar;

        }
        else
        {
            $Image->Image ="defaut.png";
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
    //===================================user===========================
    public function viewProfile(){
        $category = Category::all();
        $user = User::find(Auth::user()->id);
        $article_count = Article::where('idUser','=',Auth::user()->id)->count(); 
        $views_count = Article::where('idUser','=',Auth::user()->id)->orderBy('views','desc')->take(1)->get();
        // dd($views_count );
       
        return view('user.profile.view', compact('user','category','article_count','views_count'));
    }
    public function editProfile(Request $request,$id){
        $idRole = 2;
        $user = User::find($id);
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

        $user->name = $request->Name;
        $user->email = $request->Email;
        $user->password = Hash::make($request->Password);
        $user-> idRole = $idRole;

        if($request->hasFile('avatar'))
        {
            $file = $request->file('avatar');
            $name = $file->getClientOriginalName();
            $Avatar = Str::random(4)."_".$name;
            while(file_exists("upload/article/". $Avatar))
            {
                $Avatar = Str::random(4)."_". $name;
            }
            $file->move("upload/avatar", $Avatar);
            unlink("upload/avatar". $user->avatar);
            $user->avatar = $Avatar;

        }
        $user ->save();
        return back();

    }
    public function search(Request $request){
        $category = Category::withCount('article')->get();
        $search_text = $request->get('query');
        $article = Article::where('Title','LIKE','%'.$search_text.'%')->paginate(6);
        $article_count = count($article);
        return view('user.manage.search',compact('article','article_count','category'));
    }

}
