<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Category;
use App\Article;

class ArticleController extends Controller
{
    //
    public function getArt_list(){
        $article = Article::orderBy('id','DESC')->get();
        return view('admin.article.art_list', compact('article'));
    }

    public function getArt_add(){

        $category = Category::All();
        return view('admin.article.art_add', compact('category'));
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
        return redirect('admin/article/add')->with('Message','Add data successfully');

    }

    public function destroy(Request $request, $id){
        $article = Article::find($id);
        $article->delete();

        return redirect('admin/article/list')->with('Message','Category deleted successfully.');

    }
}
