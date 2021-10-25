<?php

namespace App\Http\Controllers;

use Illuminate\Pagination\Paginator;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\View;
use App\Category;
use App\Article;
use Auth;

class ArticleController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth'); 
        $recent =  Article::orderBy('id', 'desc')->where('status','1')->take(4)->get();
        $popular =  Article::orderBy('views', 'desc')->where('status','1')->take(4)->get(); 
        view::share(['popular'=>$popular,'recent'=>$recent]);
       
    }

    // ==============================user================================
    public function getArt_add(){
        
        $category = Category::All();
        return view('user.article.art_add', compact('category'));
    }

    public function postArt_Add(Request $request){
 
        $this -> validate($request,
        [
            'Category'=>'required',
            'Title'=>'required|min:3|unique:Article,Title',
            'Summary'=>'required',
            'Content'=>'required',
            'IsPublisher'=>'required',
            'Image'=> 'mimes:jpeg,jpg,png | max:1000',

        ],
        [
            'Category.required'=>'You have not entered Category',
            'Title.required'=>'You have not entered Title Name',
            'Title.min'=>'Title name must be at least 3 characters long',
            'Title.unique'=>'Title already exists',
            'Summary.required'=>'You have not entered Summary',
            'Content.required'=>'You have not entered Content',
            'IsPublisher.required'=>'You have not entered IsPublisher Name',
            'Image.mimes'=>'The file you choose must have a jpg, jpeg or png extension'


        ]);
        $article = new Article;
        $article -> Title = $request -> Title;
        $article -> IsPublisher = $request -> IsPublisher;
        $article -> Summary = $request -> Summary;
        $article -> Content = $request -> Content;
        $article -> idCategory = $request -> Category;
        $article -> Highlights = $request -> Highlight;
        $article -> idUser = $request -> Witer;

        if($request->hasFile('Image'))
        {
            $file = $request->file('Image');
            $name = $file->getClientOriginalName();
            $Image = Str::random(4)."_".$name;
            while(file_exists("upload/article/". $Image))
            {
                $Image = Str::random(4)."_". $name;
            }
            $file->move("upload/article", $Image);
            $article->Image = $Image;

        }
        else
        {
            $Image->Image ="";
        }
        $article->save();
        return redirect('user/article/add')->with('Message','Add data successfully');

    }
    // my article
    public function view(){
        $category = Category::All();
        $article = Article::where('idUser','=',Auth::user()->id)->paginate(1);
        return view('user.manage.article',compact('article','category'));
    }
    public function getArt_edit($id){
        $article = Article::find($id);
        $category = Category::All();
        return view('user.article.art_edit',compact('article','category'));

    }
    public function postArt_edit(Request $request,$id){
        $article = Article::find($id);
        // dd($article);
        $this -> validate($request,
        [
            'Category'=>'required',
            'Title'=>'required|min:3',
            'Summary'=>'required',
            'Content'=>'required',
            'IsPublisher'=>'required',
            'Image'=> 'mimes:jpeg,jpg,png | max:1000',

        ],
        [
            'Category.required'=>'You have not entered Category',
            'Title.required'=>'You have not entered Title Name',
            'Title.min'=>'Title name must be at least 3 characters long',
            'Title.unique'=>'Title already exists',
            'Summary.required'=>'You have not entered Summary',
            'Content.required'=>'You have not entered Content',
            'IsPublisher.required'=>'You have not entered IsPublisher Name',
            'Image.mimes'=>'The file you choose must have a jpg, jpeg or png extension'

        ]);
        $article -> Title = $request -> Title;
        $article -> IsPublisher = $request -> IsPublisher;
        $article -> Summary = $request -> Summary;
        $article -> Content = $request -> Content;
        $article -> idCategory = $request -> Category;
        $article -> Highlights = $request -> Highlight;
        $article -> idUser = $request -> Witer;

        if($request->hasFile('Image'))
        {
            $file = $request->file('Image');
            $name = $file->getClientOriginalName();
            $Image = Str::random(4)."_".$name;
            while(file_exists("upload/article/". $Image))
            {
                $Image = Str::random(4)."_". $name;
            }
          
            $file->move("upload/article", $Image);
            unlink("upload/article/". $article->Image);
            $article->Image = $Image;

        }
        $article->save();
        return redirect('user/article/edit/'.$id)->with('Message','Edit data successfully');


    }
    //  ==============================Admin===============================
    public function getArt_list(){
        $article = Article::all();
        return view('admin.article.art_list', compact('article'));
    }

    public function post_status(Request $request)
    {
        $article = Article::find($request->articleID);
        $status = $request->Status;
        // dd($status);
        if($status == "on"){
            $status =1;
        }
        else
        {
            $status =0;

        }
        $article->status = $status;
        $article->save();
        // return redirect('admin/article/list')->with('Message','toggle status successfully');
        return back();
     
    }

    public function destroy(Request $request, $id){
        $article = Article::find($id);
        $article->delete();

        return back()->with('Message','Category deleted successfully.');

    }


}
